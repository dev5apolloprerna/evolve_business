<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\members;
use App\Models\City;
use App\Models\City_group;
use App\Models\Categories;
use App\Models\subcategories;
use App\Models\membershipplans;
use App\Models\Business;
use App\Models\OneToOne;
use App\Models\Event;
use App\Models\Adminuserpermission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Member_metting;
use Carbon\Carbon;


class CheckApprovalStatus
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user->role_id == 2) {
            $loginPendingCheck = Business::join('users', 'users.id', '=', 'Business.business_to_id')
                ->where('users.id', $user->id)
                ->where(['iStatus' => 1, 'isDelete' => 0, 'isapproved_status' => 0])
                ->orderBy('Business.business_id', 'DESC')
                ->get();

            $loginPendingOneToOneCheck =
                OneToOne::join('users', 'users.id', '=', 'one_to_one_detail.to_id')
                ->where('users.id', $user->id)
                ->where(['iStatus' => 1, 'isDelete' => 0, 'isapproved_status' => 0])
                ->orderBy('one_to_one_detail.id', 'DESC')
                ->get();

            $loginPendingEventCheck = Event::where([
                'iStatus' => 1,
                'isDelete' => 0,
            ])
                ->whereNotIn('event_id', function ($query) {
                    $query->select('event_id')
                        ->from('event_members')
                        ->where('member_id', Auth::id());
                })
                ->orderBy('event_id', 'DESC')
                ->get();
            $member = members::where('user_id', $user->id)->first();
            $pendingMeeting = false;
            if ($member) {
                $pendingMeeting = DB::table('Cluster_Meet')
                    ->select('Cluster_Meet.*', DB::raw('GROUP_CONCAT(mm.member_id) AS member_ids'), DB::raw('COUNT(mm.member_id) AS member_count'))
                    ->join('Cluster_Meet_Member_meeting AS mm', 'mm.meeting_id', '=', 'Cluster_Meet.id')
                    ->where('Cluster_Meet.city_group_id', $member->citygroup_id)
                    ->whereRaw("STR_TO_DATE(Cluster_Meet.start_date, '%d.%m.%y %H:%i') >= ?", [Carbon::today()->format('Y-m-d')])
                    ->groupBy('Cluster_Meet.id')
                    ->orderByRaw("STR_TO_DATE(Cluster_Meet.start_date, '%d.%m.%y %T') ASC")
                    ->get();
            }
            $Member_metting = Member_metting::join('members', 'members.id', '=', 'Cluster_Meet_Member_meeting.member_id')
                ->where('members.id', $member->id)
                ->select('Cluster_Meet_Member_meeting.*', 'members.Contact_person As name')
                ->where(['Cluster_Meet_Member_meeting.iStatus' => 1, 'Cluster_Meet_Member_meeting.isDelete' => 0, 'Cluster_Meet_Member_meeting.is_approve' => 0])
                ->orderBy('Cluster_Meet_Member_meeting.id', 'DESC')
                ->get();

            if (!$loginPendingCheck->isEmpty() || !$loginPendingOneToOneCheck->isEmpty() || !$loginPendingEventCheck->isEmpty() || !$Member_metting->isEmpty() || $pendingMeeting) {
                // foreach ($loginPendingCheck as $pendingCheck)
                // {
                //     if ($pendingCheck->isapproved_status == 0)
                //     {
                // dd('enter');
                return redirect()->route('pendinglogincheck.index');
                //     }
                // }
            } else {
                return $next($request);
            }
        }
        return $next($request);
    }
}
