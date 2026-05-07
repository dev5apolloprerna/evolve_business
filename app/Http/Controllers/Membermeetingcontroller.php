<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\City_group;
use App\Models\Member_metting;
use App\Models\members;
use App\Models\MemberRoleUsage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use validate;


class Membermeetingcontroller extends Controller
{
    public function index(Request $request)
    {

        // dd('call');
        $cities = City::select('id', 'city_name')->orderBy('city_name')->get();
        $cityGroups = City_group::select('id', 'group_name')->orderBy('group_name')->get();
        $datas = DB::table('Cluster_Meet')->orderBy(DB::raw('STR_TO_DATE(`start_date`,"%d.%m.%y %H:%i")'), 'DESC')->paginate(env('PAR_PAGE_COUNT', 20));
        //$datas =DB::table('Cluster_Meet')->paginate(env('PAR_PAGE_COUNT'));
        $Count = $datas->count();

        return view('Membermeeting.index', compact('Count', 'cityGroups', 'cities', 'datas'));
    }

    public function create(Request $request)
    {
        // dd($request);

        $Data = array(
            'city_id' => $request->city_id,
            'city_group_id'    => $request->citygroup_id,
            'Meeting_title'    => $request->Meetingtitle,
            'start_date'    => $request->start_date,
            'End_date'    => $request->End_date,
            'created_at' => date('Y-m-d H:i:s'),
        );
        DB::table('Cluster_Meet')->insert($Data);
        return back()->with('success', 'Cluster Meet Created Successfully.');
    }

    public function editview(Request $request, $id)
    {

        $cities = City::select('id', 'city_name')->get();
        $cityGroups = City_group::select('id', 'group_name')->orderBy('group_name')->get();
        $data = DB::table('Cluster_Meet')->where('id', $id)->first();
        // dd($data);
        echo json_encode($data);
    }


    public function update(Request $request)
    {

        // dd($request);

        $update = DB::table('Cluster_Meet')
            ->where(['iStatus' => 1, 'isDelete' => 0, 'id' => $request->id])
            ->update([
                'city_id' => $request->city_id,
                'city_group_id'    => $request->citygroup_id,
                'Meeting_title'    => $request->Meeting_title,
                'start_date'    => $request->start_date,
                'End_date'    => $request->End_date,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Cluster Meet Updated Successfully.');
    }


    public function delete(Request $request)
    {
        // dd($request);

        DB::table('Cluster_Meet')->where(['iStatus' => 1, 'isDelete' => 0, 'id' => $request->id])->delete();
        DB::table('Cluster_Meet_Member_meeting')->where(['iStatus' => 1, 'isDelete' => 0, 'meeting_id' => $request->id])->delete();

        return back()->with('success', 'Cluster Meet Deleted Successfully!.');
    }

    public function Memberindex(Request $request, $id)
    {
        $allmembers = members::select('id', 'Contact_person')->orderBy('Contact_person')->get();
        $meetingdata = Member_metting::where(['meeting_id' => $id])->get();
        //    dd($permission);
        $data = DB::table('Cluster_Meet')->where('id', $id)->first();
        $meetingid = $id;
        $members = DB::table('Cluster_Meet as cm')
            ->select('m.id as member_id', 'm.Contact_person')
            ->join('members as m', function ($join) {
                $join->on('cm.city_id', '=', 'm.city_id')
                    ->on('cm.city_group_id', '=', 'm.citygroup_id');
            })
            ->where('cm.isDelete', 0)
            ->where('m.isDelete', 0)
            ->where('cm.city_id', $data->city_id)
            ->where('cm.city_group_id', $data->city_group_id)
            ->orderBy('Contact_person', 'asc')
            ->distinct()
            ->get();
        $pptTaken1 = Member_metting::where('meeting_id', $id)
            ->pluck('ppt_taken_1')
            ->toArray();

        $pptTaken2 = Member_metting::where('meeting_id', $id)
            ->pluck('ppt_taken_2')
            ->toArray();

        $brand_showcase_1 = Member_metting::where('meeting_id', $id)
            ->pluck('brand_showcase_1')
            ->toArray();

        $brand_showcase_2 = Member_metting::where('meeting_id', $id)
            ->pluck('brand_showcase_2')
            ->toArray();
        return view('Membermeeting.Memberindex', compact('brand_showcase_1', 'brand_showcase_2', 'pptTaken1', 'pptTaken2', 'allmembers', 'members', 'meetingid', 'meetingdata'));
    }


    public function saveBrandAmount(Request $request)
    {
        $meetingId = $request->meeting_id;

        // Brand Showcase 1 Amount
        if (!empty($request->brand_showcase_1_amount)) {
            foreach ($request->brand_showcase_1_amount as $memberId => $amount) {

                DB::table('Cluster_Meet_Member_meeting')
                    ->where('meeting_id', $meetingId)
                    ->where('member_id', $memberId)
                    ->update([
                        'brand_showcase_1_amount' => $amount ?? 0,
                    ]);
            }
        }

        // Brand Showcase 2 Amount
        if (!empty($request->brand_showcase_2_amount)) {
            foreach ($request->brand_showcase_2_amount as $memberId => $amount) {

                DB::table('Cluster_Meet_Member_meeting')
                    ->where('meeting_id', $meetingId)
                    ->where('member_id', $memberId)
                    ->update([
                        'brand_showcase_2_amount' => $amount ?? 0,
                    ]);
            }
        }

        return back()->with('success', 'Brand Showcase Amount Updated!');
    }

    public function memberstore(Request $request)
    {

        if (!empty($request->ppt_taken_1) && $request->ppt_taken_1 == $request->ppt_taken_2) {
            return back()->withInput()->withErrors([
                'ppt_taken_2' => 'Same member cannot be selected for both PPT Taken 1 and PPT Taken 2.'
            ]);
        }

        if (!empty($request->brand_showcase_1) && $request->brand_showcase_1 == $request->brand_showcase_2) {
            return back()->withInput()->withErrors([
                'brand_showcase_2' => 'Same member cannot be selected for both Brand Showcase 1 and Brand Showcase 2.'
            ]);
        }

        $meetingDate = DB::table('Cluster_Meet_Member_meeting')
            ->where('meeting_id', $request->meetingid)
            ->value('created_at');

        $threeMonthsAgo = Carbon::parse($meetingDate)->subMonths(3);

        $fieldLabels = [
            'ppt_taken_1' => 'PPT Taken 1',
            'ppt_taken_2' => 'PPT Taken 2',
            'brand_showcase_1' => 'Brand Showcase 1',
            'brand_showcase_2' => 'Brand Showcase 2',
        ];

        foreach ($fieldLabels as $field => $label) {

            $memberId = $request->$field;

            if (!empty($memberId)) {

                $member = DB::table('members')->where('id', $memberId)->first();

                $allowedCount = ($member && $member->priority_club_3_year == 1) ? 2 : 1;

                $usedCount = MemberRoleUsage::where('member_id', $memberId)
                    ->where('role_type', $field)
                    ->whereBetween('meeting_date', [$threeMonthsAgo, $meetingDate])
                    ->count();

                if ($usedCount >= $allowedCount) {
                    return back()->withInput()->withErrors([
                        $field => "Member already used for {$label} {$allowedCount} time(s) within last 3 months."
                    ]);
                }
            }
        }

        DB::table('Cluster_Meet_Member_meeting')
            ->where('meeting_id', $request->meetingid)
            ->delete();

        $meetingId = $request->meetingid;
        $memberIds = $request->members ?? [];

        foreach ($memberIds as $memberId) {
            Member_metting::create([
                'meeting_id' => $meetingId,
                'member_id' => $memberId,
                'ppt_taken_1' => $request->ppt_taken_1,
                'ppt_taken_2' => $request->ppt_taken_2,
                'brand_showcase_1' => $request->brand_showcase_1,
                'brand_showcase_2' => $request->brand_showcase_2,
            ]);
        }

        foreach ($fieldLabels as $field => $label) {

            $memberId = $request->$field;

            if (!empty($memberId)) {

                MemberRoleUsage::create([
                    'member_id' => $memberId,
                    'role_type' => $field,
                    'meeting_id' => $meetingId,
                    'meeting_date' => $meetingDate,
                ]);
            }
        }

        return redirect()->route('Membermeeting.index')
            ->with('success', 'Meeting Members added successfully!');
    }

    public function Membermeeting_comment(Request $request, $id = null)
    {
        try {
            $metting_id = $id ?? '';
            $datas = DB::table('Cluster_Meet_Member_meeting')
                ->select('Cluster_Meet_Member_meeting.id as Cluster_Meet_Member_meeting_id', 'Cluster_Meet_Member_meeting.member_id', 'Cluster_Meet_Member_meeting.meeting_id', 'members.Contact_person', 'Cluster_Meet.*')
                ->leftJoin('members', 'Cluster_Meet_Member_meeting.member_id', '=', 'members.id')
                ->leftJoin('Cluster_Meet', 'Cluster_Meet_Member_meeting.meeting_id', '=', 'Cluster_Meet.id')
                ->where('Cluster_Meet_Member_meeting.meeting_id', $id)
                ->paginate(env('PAR_PAGE_COUNT', 20));

            $count = $datas->count();
            $brandshowcasedata = DB::table('Cluster_Meet_Member_meeting as c')
                ->leftJoin('members as m1', 'c.brand_showcase_1', '=', 'm1.id')
                ->leftJoin('members as m2', 'c.brand_showcase_2', '=', 'm2.id')
                ->leftJoin('Cluster_Meet as CM', 'c.meeting_id', '=', 'CM.id')
                ->select(
                    'CM.id as meeting_id',
                    'CM.Meeting_title',
                    'c.id as Cluster_Meet_Member_meeting_id',
                    'c.member_id',

                    'c.brand_showcase_1',
                    'c.brand_showcase_2',

                    'c.brand_showcase_1_amount',
                    'c.brand_showcase_2_amount',

                    'm1.Contact_person as brand1_name',
                    'm2.Contact_person as brand2_name',

                    'c.is_approve'
                )
                ->where('c.meeting_id', $id)
                ->orderByDesc('c.brand_showcase_1_amount')
                ->orderByDesc('c.brand_showcase_2_amount')
                ->paginate(20);
            //dd($brandshowcasedata->toArray());

            return view('Membermeeting.Membercomment', compact('datas', 'count', 'metting_id', 'brandshowcasedata'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function comments_store(Request $request)
    {
        try {
            $request->validate([
                'cluster_meet_member_meeting_id' => 'required|integer',
            ]);
            DB::table('Cluster_Meet_Member_meeting')
                ->where('id', $request->cluster_meet_member_meeting_id)
                ->update([
                    'comment' => $request->comment,
                ]);
            return back()->with('success', 'Comment added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function getAvailableMembers($meeting_id)
    {
        try {
            $existing = DB::table('Cluster_Meet_Member_meeting')
                ->where('meeting_id', $meeting_id)
                ->pluck('member_id');
            // Get members not already in this meeting
            $availableMembers = DB::table('members')
                ->whereNotIn('id', $existing)
                ->where('Arrival_flag', '!=', 1)
                ->where('iStatus', 1)
                ->select('members.id', 'members.Contact_person as name')
                ->get();
            return response()->json($availableMembers);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function Meeting_add_member(Request $request)
    {
        try {
            $request->validate([
                'meeting_id' => 'required|exists:Cluster_Meet_Member_meeting,meeting_id',
                'member_id' => 'required|exists:members,id',
            ]);

            DB::table('Cluster_Meet_Member_meeting')->insert([
                'meeting_id' => $request->meeting_id ?? '',
                'member_id' => $request->member_id ?? '',
                'created_at' => now(),
            ]);
            return redirect()->route('Membermeeting.Membercomment', ['id' => $request->meeting_id])
                ->with('success', 'Member added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
