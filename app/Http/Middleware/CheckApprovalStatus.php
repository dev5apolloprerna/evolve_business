<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\OneToOne;
use App\Models\Event;
use App\Models\members;
use App\Models\Member_metting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckApprovalStatus
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return $next($request);
        }

        if ($user->role_id == 2) {

            /*
             * Important:
             * pendinglogincheck routes ko allow karo,
             * warna same page par bhi redirect loop / menu block issue aayega.
             */
            if ($request->routeIs('pendinglogincheck.*')) {
                return $next($request);
            }

            $loginPendingCheck = Business::where('Business.business_to_id', $user->id)
                ->where('Business.iStatus', 1)
                ->where('Business.isDelete', 0)
                ->where('Business.isapproved_status', 0)
                ->orderBy('Business.business_id', 'DESC')
                ->get();

            $loginPendingOneToOneCheck = OneToOne::where('one_to_one_detail.to_id', $user->id)
                ->where('one_to_one_detail.iStatus', 1)
                ->where('one_to_one_detail.isDelete', 0)
                ->where('one_to_one_detail.isapproved_status', 0)
                ->orderBy('one_to_one_detail.id', 'DESC')
                ->get();

            // $loginPendingEventCheck = Event::where('iStatus', 1)
            //     ->where('isDelete', 0)
            //     ->whereNotIn('event_id', function ($query) use ($user) {
            //         $query->select('event_id')
            //             ->from('event_members')
            //             ->where('member_id', $user->id);
            //     })
            //     ->orderBy('event_id', 'DESC')
            //     ->get();
            $loginPendingEventCheck = Event::where('iStatus', 1)
                ->where('isDelete', 0)
                ->whereJsonContains('assign_member_id', (string) Auth::id())
                ->whereNotIn('event_id', function ($query) use ($user) {
                    $query->select('event_id')
                        ->from('event_members')
                        ->where('member_id', $user->id);
                })
                ->orderByDesc('event_id')
                ->get();

            $member = members::where('user_id', $user->id)->first();

            $pendingMeeting = collect();
            $Member_metting = collect();

            if ($member) {
                /*
                 * Sirf logged-in member ki pending meeting check karo.
                 * City group ki all meetings check mat karo.
                 */
                $pendingMeeting = DB::table('Cluster_Meet')
                    ->select(
                        'Cluster_Meet.*',
                        'mm.id as member_meeting_id',
                        'mm.member_id'
                    )
                    ->join('Cluster_Meet_Member_meeting AS mm', 'mm.meeting_id', '=', 'Cluster_Meet.id')
                    ->where('Cluster_Meet.city_group_id', $member->citygroup_id)
                    ->where('mm.member_id', $member->id)
                    ->where('mm.iStatus', 1)
                    ->where('mm.isDelete', 0)
                    ->where('mm.is_approve_meeting', 0)
                    ->whereRaw("STR_TO_DATE(Cluster_Meet.start_date, '%d.%m.%y %H:%i') >= ?", [
                        Carbon::today()->format('Y-m-d')
                    ])
                    ->orderByRaw("STR_TO_DATE(Cluster_Meet.start_date, '%d.%m.%y %H:%i') ASC")
                    ->get();
                // $Member_metting = Member_metting::join('members', 'members.id', '=', 'Cluster_Meet_Member_meeting.member_id')
                //     ->where('members.id', $member->id)
                //     ->select('Cluster_Meet_Member_meeting.*', 'members.Contact_person As name')
                //     ->where('Cluster_Meet_Member_meeting.iStatus', 1)
                //     ->where('Cluster_Meet_Member_meeting.isDelete', 0)
                //     ->where('Cluster_Meet_Member_meeting.is_approve', 0)
                //     ->orderBy('Cluster_Meet_Member_meeting.id', 'DESC')
                //     ->get();

                $Member_metting = Member_metting::join(
                    'members',
                    'members.id',
                    '=',
                    'Cluster_Meet_Member_meeting.member_id'
                )
                    ->where('members.id', $member->id)
                    ->where('Cluster_Meet_Member_meeting.iStatus', 1)
                    ->where('Cluster_Meet_Member_meeting.isDelete', 0)
                    ->where('Cluster_Meet_Member_meeting.is_approve', 0)
                    ->where(function ($q) {
                        $q->where('brand_showcase_1', '>', 0)
                            ->orWhere('brand_showcase_2', '>', 0)
                            ->orWhere('ppt_taken_1', '>', 0)
                            ->orWhere('ppt_taken_2', '>', 0);
                    })
                    ->orderBy('Cluster_Meet_Member_meeting.id', 'DESC')
                    ->get();
            }
            if (
                !$loginPendingCheck->isEmpty() ||
                !$loginPendingOneToOneCheck->isEmpty() ||
                !$loginPendingEventCheck->isEmpty() ||
                !$Member_metting->isEmpty() ||
                !$pendingMeeting->isEmpty()
            ) {
                return redirect()->route('pendinglogincheck.index');
            }
        }

        return $next($request);
    }
}
