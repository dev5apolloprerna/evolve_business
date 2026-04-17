<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\members;
use App\Models\User;
use App\Models\City;
use App\Models\City_group;
use App\Models\Categories;
use App\Models\subcategories;
use App\Models\membershipplans;
use App\Models\renewalhistory;
use App\Models\Business;
use App\Models\OneToOne;
use App\Models\Member_metting;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BusinessCreated;
use validate;
use Illuminate\Support\Str;
use App\Mail\BusinessStatusMail;

class MemberBusinesscontroller extends Controller
{
    public function index(Request $request)
    {

        try {
            $businesstype = $request->business_type;
            $FromDate = $request->fromdate;
            $ToDate = $request->todate;
            $session = Auth::user()->id;
            $Data = User::where('status', 1)->orderBy('first_name')->get();
            $Datadrop = User::where('status', 1)->orderBy('first_name')->get();
            // $Business = Business::join('users', 'users.id', '=', 'Business.business_from_id')
            // ->where('users.id', $session)
            // ->where(['iStatus' => 1, 'isDelete' => 0])
            // ->orderBy('Business.business_id', 'DESC')
            $Businesses = Business::leftjoin('users', 'users.id', '=', 'Business.business_from_id')
                ->where('users.id', $session)
                ->where(['iStatus' => 1, 'isDelete' => 0])
                ->when($request->fromdate, fn($query, $FromDate) => $query
                    ->where('Business.business_Date', '>=', date('Y-m-d 00:00:00', strtotime($FromDate))))
                ->when($request->todate, fn($query, $ToDate) => $query
                    ->where('Business.business_Date', '<=', date('Y-m-d 23:59:59', strtotime($ToDate))));
            if ($businesstype != "") {
                $Businesses->where('Business.isapproved_status', '=', $businesstype);
            }
            $Business = $Businesses->orderBy('Business.business_id', 'DESC')
                ->paginate(env('PAR_PAGE_COUNT', 20));
            $Count = $Business->count();
            return view('MemberBusiness.index', compact('Business', 'Data', 'Datadrop', 'Count', 'businesstype', 'FromDate', 'ToDate'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function exportToexcel_list(Request $request, $fromdate = null, $todate = null)
    {
        try {
            $FromDate = $fromdate;
            $ToDate = $todate;
            $datas = Business::select(
                'Business.*'
            )
                ->where(['Business.iStatus' => 1, 'Business.isDelete' => 0, 'isapproved_status' => 0])
                ->when($fromdate, fn($query, $FromDate) => $query
                    ->where('Business.business_Date', '>=', date('Y-m-d 00:00:00', strtotime($FromDate))))
                ->when($todate, fn($query, $ToDate) => $query
                    ->where('Business.business_Date', '<=', date('Y-m-d 23:59:59', strtotime($ToDate))))
                ->get();
            //    ->paginate(20);

            return view('Business.exportlist', compact('datas', 'FromDate', 'ToDate'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function storeview1()
    {

        try {
            $session = Auth::user();
            $Data = User::leftjoin('members', 'members.user_id', '=', 'users.id')
                ->where('users.status', 1)
                ->where('users.role_id', 2)
                ->where('members.Arrival_flag', 0)
                ->orderBy('users.first_name')
                ->select('users.*')
                ->get();
            return view('MemberBusiness.storeview', compact('Data', 'session'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            $session = Auth::user();
            $ToUser = User::find($request->business_to);
            $ToUserName = $ToUser ? $ToUser->first_name : 'Unknown User';

            $request->validate([
                'business_type'   => 'required',
                // 'business_from'   => 'required',
                'business_to'     => 'required',
                'Business_amount' => 'required|numeric',
                'business_Date'   => 'required|date',
            ]);

            $gu_id = Str::random(10);

            $Data = array(
                'business_type'   => $request->business_type,
                'business_from'   => $session->first_name,
                'business_to'     => $ToUserName,
                'Business_amount' => $request->Business_amount,
                'business_Date'   => $request->business_Date,
                'gu_id'           => $gu_id,
                'business_from_id' => $session->id,
                'business_to_id' => $request->business_to,
                'created_at'      => date('Y-m-d H:i:s'),
                'created_by'      => auth()->id(),
                "strIP" => $_SERVER['REMOTE_ADDR']

            );

            $businessId = DB::table('Business')->insertGetId($Data);

            /* ================================
                Insert into member_points
                ================================ */

            $pointsId = null;

            if ($request->business_type == 1) {
                // Direct
                $pointsId = 4;
            } elseif ($request->business_type == 2) {
                // Reference
                $pointsId = 5;
            }

            if ($pointsId) {
                $pointsData = DB::table('points_master')
                    ->where('id', $pointsId)
                    ->first();

                if ($pointsData) {
                    DB::table('member_points')->insert([
                        'business_id' => $businessId,
                        'member_id'  => $session->id,
                        'points_id'  => $pointsData->id,
                        'points'     => $pointsData->points,
                        'status'     => 0,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }

            $toUserEmail = $ToUser ? $ToUser->email : null;
            $sendemaildetails = DB::table('sendemaildetails')->where('id', 2)->first();

            $msg = [
                'FromMail' => $sendemaildetails->strFromMail ??  'info@getdemo.in',
                'Title' => $sendemaildetails->strTitle ??  'business send',
                'ToEmail' => isset($ToUser) ? ($ToUser->email ?? '') : '',
                'CCEmail' => 'k.krupa0101@gmail.com',
                'Subject' => $sendemaildetails->strSubject ?? 'Business send' ?? '',
            ];

            $data = [
                'business_type' => $request->business_type == 2 ? 'Reference' : 'Direct',
                'business_from' => $session->first_name ?? '',
                'business_to' => $ToUserName,
                'Business_amount' => $request->Business_amount ?? 0,
                'business_Date' => $request->business_Date,
                'gu_id' => $gu_id ?? '',
            ];

            $mail = Mail::send('emails.statusemail', ['data' => $data], function ($message) use ($msg) {
                $message->from($msg['FromMail'], $msg['Title']);
                $message->to($msg['ToEmail'])->subject($msg['Subject']);
                if (!empty($msg['CCEmail'])) {
                    $message->cc($msg['CCEmail']);
                }
            });


            return response()->json(['success' => true, 'message' => 'Business Created Successfully.']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        $session = Auth::user();
        $Business = DB::table('Business')
            ->where(['iStatus' => 1, 'isDelete' => 0, 'business_id' => $request->business_id])
            ->update([
                'business_type'   => $request->business_type,
                'business_from'   => $session->first_name,
                'business_to'     => $request->business_to,
                'Business_amount' => $request->Business_amount,
                'business_Date'   => $request->business_Date,
                // 'business_from_id'=> $session->id,
                // 'business_to_id'=> $request->business_to,
                'updated_at'      => date('Y-m-d H:i:s'),
                'updated_by'      => auth()->id(),
                "strIP" => $_SERVER['REMOTE_ADDR']
            ]);

        return redirect()->route('MemberBusiness.index')->with('success', 'Business Updated Successfully.');
    }

    public function editview(Request $request, $Id)
    {

        $Business = Business::where(['iStatus' => 1, 'isDelete' => 0, 'business_id' => $Id])->first();
        echo json_encode($Business);
    }

    public function delete(Request $request)
    {

        DB::table('Business')->where(['iStatus' => 1, 'isDelete' => 0, 'business_id' => $request->id])->delete();
        return redirect()->route('MemberBusiness.index')->with('success', 'Business Deleted Successfully!.');
    }


    public function newstatus($gu_id)
    {

        return view('MemberBusiness.newstatus', compact('gu_id'));
    }
    public function statusadd(Request $request)
    {
        DB::table('Business')->where('business_id', $request->id)->update([
            'isapproved_status' => $request->newStatus,
            'businesscomment'  => $request->businesscomment,
            'approved_by' => Auth::user()->user_type,
            'approved_by_id' => Auth::user()->id,

        ]);
        return redirect()->route('newstatus', $request->id)->with('success', 'Business Status updated successfully!');
    }

    public function approveBusiness(Request $request, $gu_id)
    {

        $Data = DB::table('Business')->where('gu_id', $gu_id)->update([
            'isapproved_status' => 1,
            // 'businesscomment'  => $request->businesscomment,
            // 'approved_by' =>Auth::user()->user_type,
            // 'approved_by_id' =>Auth::user()->id,
        ]);
        return view('newstatus');
    }
    public function rejectBusiness(Request $request, $gu_id)
    {

        return view('rejectstatus', compact('gu_id'));
    }
    public function updatestatus(Request $request)
    {
        $d = DB::table('Business')->where('gu_id', $request->id)->first();

        $Data = DB::table('Business')->where('gu_id', $request->id)->update([
            'isapproved_status' => 2,
            'businesscomment'  => $request->businesscomment,
            'approved_by' => Auth::user()->user_type ?? 'User',
            'approved_by_id' => Auth::user()->id ?? $d->business_to_id,
        ]);


        return view('rejectedcom');
    }

    // login member user pending list code 

    public function indexpending(Request $request)
    {
        $Data = User::where('status', 1)->get();
        $Datadrop = User::where('status', 1)->get();
        $session = Auth::user();
        $Business = Business::join('users', 'users.id', '=', 'Business.business_to_id')
            ->where('users.id', $session->id)
            ->where(['iStatus' => 1, 'isDelete' => 0, 'isapproved_status' => 0])
            ->orderBy('Business.business_id', 'DESC')
            ->paginate(env('PAR_PAGE_COUNT', 20));

        $OneToOne = OneToOne::join('users', 'users.id', '=', 'one_to_one_detail.to_id')
            ->where('users.id', $session->id)
            ->select('one_to_one_detail.*')
            ->where(['iStatus' => 1, 'isDelete' => 0, 'isapproved_status' => 0])
            ->orderBy('one_to_one_detail.id', 'DESC')
            ->paginate(env('PAR_PAGE_COUNT', 20));


        $Events = Event::where([
            'iStatus' => 1,
            'isDelete' => 0,
        ])
            ->whereNotIn('event_id', function ($query) {
                $query->select('event_id')
                    ->from('event_members')
                    ->where('member_id', Auth::id());
            })
            ->orderBy('event_id', 'DESC')
            ->paginate(env('PAR_PAGE_COUNT', 20));
        return view('pendinglogincheck.index', compact('Events', 'Business', 'Data', 'Datadrop', 'OneToOne'));
    }

    public function statuspendinglogin(Request $request)
    {
        DB::table('Business')->where('business_id', $request->id)->update([
            'isapproved_status' => $request->newStatus,
            'businesscomment'  => $request->businesscomment,
            'approved_by' => Auth::user()->user_type,
            'approved_by_id' => Auth::user()->id,
            'Business_received_date' => date('Y-m-d H:i:s'),

        ]);

        // update member_points status
        DB::table('member_points')
            ->where('business_id', $request->id)
            ->update([
                'status' => $request->newStatus,
                'updated_at' => now()
            ]);
        return redirect()->back();
    }

    public function onestatuspendinglogin(Request $request)
    {

        DB::table('one_to_one_detail')->where('id', $request->id)->update([
            'isapproved_status' => $request->newStatus,
            'reject_comment'  => $request->businesscomment,
            'approved_by' => Auth::user()->user_type,
            'approved_by_id' => Auth::user()->id,
            'receive_date' => date('Y-m-d H:i:s'),

        ]);

        // update member_points status
        DB::table('member_points')
            ->where('business_id', $request->id)
            ->update([
                'status' => $request->newStatus,
                'updated_at' => now()
            ]);
        return redirect()->back();
    }

    public function Eventpendinglogin(Request $request)
    {

        DB::table('event_members')->insert([
            'event_id' => $request->id,
            'member_id' => Auth::user()->id,
            'created_at' => now()
        ]);
        DB::table('news_and_events')->where('event_id', $request->id)->update([
            'isapproved_status' => $request->newStatus,
            'member_id' => Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->back();
    }

    public function Received1(Request $request)
    {

        $Data = User::where('status', 1)->get();
        $Datadrop = User::where('status', 1)->get();
        $session = Auth::user();
        $Business = Business::join('users', 'users.id', '=', 'Business.business_to_id')
            ->where('users.id', $session->id)
            ->where([
                'iStatus' => 1,
                'isDelete' => 0
            ])
            ->whereIn('isapproved_status', [1])
            ->orderBy('Business.business_Date', 'DESC')
            ->paginate(env('PAR_PAGE_COUNT', 20));
        $Count = $Business->count();
        return view('MemberBusiness.Received', compact('Business', 'Data', 'Datadrop', 'Count'));
    }
    public function member_listing(Request $request, $id = null)
    {
        try {
            $datas = DB::table('Cluster_Meet_Member_meeting')
                ->select('Cluster_Meet_Member_meeting.*', 'members.Contact_person', 'Cluster_Meet.*') // optionally select columns
                ->leftJoin('members', 'Cluster_Meet_Member_meeting.member_id', '=', 'members.id')
                ->leftJoin('Cluster_Meet', 'Cluster_Meet_Member_meeting.meeting_id', '=', 'Cluster_Meet.id')
                ->where('Cluster_Meet_Member_meeting.meeting_id', $id)
                ->paginate(env('PAR_PAGE_COUNT', 20));
            $count = $datas->count();
            return view('MemberBusiness.Memberlist', compact('datas', 'count'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
