<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use validate;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Eventcontroller extends Controller
{
    public function PastEventList(Request $request)
    {

        $today = Carbon::today();
        $Events = Event::where([
            'iStatus' => 1,
            'isDelete' => 0,
            'isapproved_status' => 1
        ])
            ->where('member_id', auth()->user()->id)
            ->whereDate('eventstart_date', '<', $today)
            ->orderBy('eventstart_date', 'DESC')
            ->paginate(20);
        // $Events = Event::orderBy('event_id', 'DESC')->where(['iStatus' => 1, 'isDelete' => 0])->paginate(20);
        return view('MemberEventList.index', compact('Events'));
    }

    public function UpcomingEventList(Request $request)
    {
        $today = Carbon::today();
        $Events = Event::where([
            'iStatus' => 1,
            'isDelete' => 0,
            'isapproved_status' => 1
        ])
            ->where('member_id', auth()->user()->id)
            ->whereDate('eventstart_date', '>=', $today)
            ->orderBy('eventstart_date', 'ASC')
            ->paginate(20);
        return view('MemberEventList.UpcomingEvent', compact('Events'));
    }
    public function index(Request $request)
    {
        // $Events = Event::orderBy('event_id', 'DESC')->where(['iStatus' => 1, 'isDelete' => 0])->paginate(20);
        $members = DB::table('members')
            ->select('id', 'Contact_person', 'phonenumber', 'email', 'user_id')
            ->where('iStatus', 1)
            ->where('isDelete', 0)
            ->orderBy('Contact_person')
            ->get();
        $givenby = $request->given_by;
        $FromDate = $request->fromdate;
        $ToDate = $request->todate;
        $Data = User::where('status', 1)->where('role_id', 2)->orderBy('first_name')->get();
        $Datadrop = User::where('status', 1)->where('role_id', 2)->orderBy('first_name')->get();

        $Events = Event::select(
            'news_and_events.*',
            'event_members.isapproved_status as member_status'
        )
            ->leftJoin('event_members', 'event_members.event_id', '=', 'news_and_events.event_id')

            ->where([
                'news_and_events.iStatus' => 1,
                'news_and_events.isDelete' => 0,
                'news_and_events.isapproved_status' => 0
            ])

            ->when($request->fromdate, function ($query, $FromDate) {
                return $query->where(
                    'news_and_events.eventstart_date',
                    '>=',
                    date('Y-m-d 00:00:00', strtotime($FromDate))
                );
            })

            ->when($request->todate, function ($query, $ToDate) {
                return $query->where(
                    'news_and_events.eventstart_date',
                    '<=',
                    date('Y-m-d 23:59:59', strtotime($ToDate))
                );
            })

            ->when($request->given_by, function ($query) use ($request) {
                return $query->where('event_members.member_id', $request->given_by);
            })

            ->groupBy('news_and_events.event_id') // ⚠️ duplicate avoid
            ->orderBy('news_and_events.event_id', 'DESC')
            ->paginate(env('PAR_PAGE_COUNT', 20));
        return view('Event.index', compact('Events', 'members', 'givenby', 'FromDate', 'ToDate'));
    }

    public function approvelist(Request $request)
    {
        $members = DB::table('members')
            ->select('id', 'Contact_person', 'phonenumber', 'email', 'user_id')
            ->where('iStatus', 1)
            ->where('isDelete', 0)
            ->orderBy('Contact_person')
            ->get();
        $givenby = $request->given_by;
        $FromDate = $request->fromdate;
        $ToDate = $request->todate;
        $Data = User::where('status', 1)->where('role_id', 2)->orderBy('first_name')->get();
        $Datadrop = User::where('status', 1)->where('role_id', 2)->orderBy('first_name')->get();

        $Events = Event::select('news_and_events.*', 'event_members.isapproved_status as member_status')
            ->join('event_members', 'event_members.event_id', '=', 'news_and_events.event_id')

            ->where([
                'news_and_events.iStatus' => 1,
                'news_and_events.isDelete' => 0,
            ])

            // ✅ status from event_members table
            ->where('event_members.isapproved_status', 1)

            ->when($request->fromdate, function ($query, $FromDate) {
                return $query->where(
                    'news_and_events.eventstart_date',
                    '>=',
                    date('Y-m-d 00:00:00', strtotime($FromDate))
                );
            })

            ->when($request->todate, function ($query, $ToDate) {
                return $query->where(
                    'news_and_events.eventstart_date',
                    '<=',
                    date('Y-m-d 23:59:59', strtotime($ToDate))
                );
            })

            ->when($request->given_by, function ($query) use ($request) {
                return $query->where('event_members.member_id', $request->given_by);
            })

            ->orderBy('news_and_events.event_id', 'DESC')
            ->paginate(env('PAR_PAGE_COUNT', 20));
        //$Count = $Business->count();
        return view('Event.approvelist', compact('Events', 'members', 'givenby', 'FromDate', 'ToDate'));
    }

    public function removelist(Request $request)
    {
        $members = DB::table('members')
            ->select('id', 'Contact_person', 'phonenumber', 'email', 'user_id')
            ->where('iStatus', 1)
            ->where('isDelete', 0)
            ->orderBy('Contact_person')
            ->get();
        $givenby = $request->given_by;
        $FromDate = $request->fromdate;
        $ToDate = $request->todate;
        $Data = User::where('status', 1)->where('role_id', 2)->orderBy('first_name')->get();
        $Datadrop = User::where('status', 1)->where('role_id', 2)->orderBy('first_name')->get();

        $Events = Event::select('news_and_events.*', 'event_members.isapproved_status as member_status')
            ->join('event_members', 'event_members.event_id', '=', 'news_and_events.event_id')

            ->where([
                'news_and_events.iStatus' => 1,
                'news_and_events.isDelete' => 0,
            ])

            // ✅ status from event_members table
            ->where('event_members.isapproved_status', 2)

            ->when($request->fromdate, function ($query, $FromDate) {
                return $query->where(
                    'news_and_events.eventstart_date',
                    '>=',
                    date('Y-m-d 00:00:00', strtotime($FromDate))
                );
            })

            ->when($request->todate, function ($query, $ToDate) {
                return $query->where(
                    'news_and_events.eventstart_date',
                    '<=',
                    date('Y-m-d 23:59:59', strtotime($ToDate))
                );
            })

            ->when($request->given_by, function ($query) use ($request) {
                return $query->where('event_members.member_id', $request->given_by);
            })

            ->orderBy('news_and_events.event_id', 'DESC')
            ->paginate(env('PAR_PAGE_COUNT', 20));
        //$Count = $Business->count();
        return view('Event.removelist', compact('Events', 'members', 'givenby', 'FromDate', 'ToDate'));
    }

    public function EventParticipate(Request $request, $id)
    {
        $Events = Event::with('EventMembers.member') // 🔥 important
            ->where('event_id', $id)
            ->where([
                'iStatus' => 1,
                'isDelete' => 0
            ])
            ->orderBy('event_id', 'DESC')
            ->get();

        return view('Event.Participate', compact('Events'));
    }

    public function exportToexcel_list(Request $request, $fromdate = null, $todate = null)
    {
        $datas = Event::select('news_and_events.*', 'event_members.isapproved_status as member_status')
            ->join('event_members', 'event_members.event_id', '=', 'news_and_events.event_id')

            ->where([
                'news_and_events.iStatus' => 1,
                'news_and_events.isDelete' => 0,
            ])

            // ✅ status from event_members table
            ->where('event_members.isapproved_status', 0)

            ->when($request->fromdate, function ($query, $FromDate) {
                return $query->where(
                    'news_and_events.eventstart_date',
                    '>=',
                    date('Y-m-d 00:00:00', strtotime($FromDate))
                );
            })

            ->when($request->todate, function ($query, $ToDate) {
                return $query->where(
                    'news_and_events.eventstart_date',
                    '<=',
                    date('Y-m-d 23:59:59', strtotime($ToDate))
                );
            })

            ->when($request->given_by, function ($query) use ($request) {
                return $query->where('event_members.member_id', $request->given_by);
            })

            ->orderBy('news_and_events.event_id', 'DESC')
            ->get();

        return view('Event.exportlist', compact('datas'));
    }

    public function exporteventapprove(Request $request, $fromdate = null, $todate = null)
    {
        $datas = Event::select('news_and_events.*', 'event_members.isapproved_status as member_status')
            ->join('event_members', 'event_members.event_id', '=', 'news_and_events.event_id')

            ->where([
                'news_and_events.iStatus' => 1,
                'news_and_events.isDelete' => 0,
            ])

            // ✅ status from event_members table
            ->where('event_members.isapproved_status', 1)

            ->when($request->fromdate, function ($query, $FromDate) {
                return $query->where(
                    'news_and_events.eventstart_date',
                    '>=',
                    date('Y-m-d 00:00:00', strtotime($FromDate))
                );
            })

            ->when($request->todate, function ($query, $ToDate) {
                return $query->where(
                    'news_and_events.eventstart_date',
                    '<=',
                    date('Y-m-d 23:59:59', strtotime($ToDate))
                );
            })

            ->when($request->given_by, function ($query) use ($request) {
                return $query->where('event_members.member_id', $request->given_by);
            })

            ->orderBy('news_and_events.event_id', 'DESC')
            ->get();

        return view('Event.exportlist', compact('datas'));
    }

    public function exporteventreject(Request $request, $fromdate = null, $todate = null)
    {
        $datas = Event::select('news_and_events.*', 'event_members.isapproved_status as member_status')
            ->join('event_members', 'event_members.event_id', '=', 'news_and_events.event_id')

            ->where([
                'news_and_events.iStatus' => 1,
                'news_and_events.isDelete' => 0,
            ])

            // ✅ status from event_members table
            ->where('event_members.isapproved_status', 1)

            ->when($request->fromdate, function ($query, $FromDate) {
                return $query->where(
                    'news_and_events.eventstart_date',
                    '>=',
                    date('Y-m-d 00:00:00', strtotime($FromDate))
                );
            })

            ->when($request->todate, function ($query, $ToDate) {
                return $query->where(
                    'news_and_events.eventstart_date',
                    '<=',
                    date('Y-m-d 23:59:59', strtotime($ToDate))
                );
            })

            ->when($request->given_by, function ($query) use ($request) {
                return $query->where('event_members.member_id', $request->given_by);
            })

            ->orderBy('news_and_events.event_id', 'DESC')
            ->get();

        return view('Event.exportlist', compact('datas'));
    }
    public function storeview()
    {
        $members = DB::table('members')
            ->select('id', 'Contact_person', 'phonenumber', 'email')
            ->where('iStatus', 1)
            ->where('isDelete', 0)
            ->orderBy('Contact_person')
            ->get();
        return view('Event.storeview', compact('members'));
    }
    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required',

        ]);

        $img = "";
        if ($request->hasFile('photo')) {
            $root = $_SERVER['DOCUMENT_ROOT'];
            $image = $request->file('photo');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $destinationpath = $root . '/event/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 0755, true);
            }
            $image->move($destinationpath, $img);
        }
        $slug = Str::slug($request->name);
        $Data = array(
            'name'            => $request->name,
            'user_id'   => auth()->id(),
            'photo'           => $img,
            'eventstart_date' => $request->eventstart_date,
            'eventstart_time'   => $request->eventstart_time,
            'eventend_time'   => $request->eventend_time,
            'event_type'   => $request->event_type,
            'assign_member_id'  => json_encode($request->assign_member_id),   // Save as JSON
            'ispaid'          => $request->ispaid,
            'price'           => $request->price,
            'limitedset'      => $request->limitedset,
            'setnumber'       => $request->setnumber,
            'description'     => $request->description,
            'event_slug' => $slug,
            'created_at'      => date('Y-m-d H:i:s'),
            'created_by'      => auth()->user()->id,
            'strIP' => $request->ip()
        );
        // dd($Data);
        DB::table('news_and_events')->insert($Data);
        return redirect()->route('Event.index')->with('success', 'Event Created Successfully.');
    }
    public function editview(Request $request, $Id)
    {
        $Event = Event::where(['iStatus' => 1, 'isDelete' => 0, 'event_id' => $Id])->first();
        echo json_encode($Event);
    }
    public function update(Request $request)
    {
        $img = "";
        if ($request->hasFile('photo')) {
            $root = $_SERVER['DOCUMENT_ROOT'];
            $image = $request->file('photo');
            $img = time() . '.' . $image->getClientOriginalExtension();
            //dd($img);
            $destinationpath = $root . '/event/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 0755, true);
            }
            $image->move($destinationpath, $img);
            $oldImg = $request->input('hiddenPhoto') ? $request->input('hiddenPhoto') : null;
            //dd($oldImg);

            if ($oldImg != null || $oldImg != "") {
                if (file_exists($destinationpath . $oldImg)) {
                    unlink($destinationpath . $oldImg);
                }
            }
        } elseif ($request->input('hiddenPhoto')) {
            $oldImg = $request->input('hiddenPhoto');
            $img = $oldImg;
        } else {
            // $root = $_SERVER['DOCUMENT_ROOT'];
            // $img = $root . '/images/noimage.jpg';
            //   $img = null;
        }
        // dd($img);
        $slug = Str::slug($request->name);
        $Event = DB::table('news_and_events')
            ->where(['iStatus' => 1, 'isDelete' => 0, 'event_id' => $request->event_id])
            ->update([
                'name'            => $request->name,
                'user_id'   => auth()->id(),
                'photo'           => $img,
                'eventstart_date' => $request->eventstart_date,
                'eventstart_time' => $request->eventstart_time,
                'eventend_time' => $request->eventend_time,
                'event_type'          => $request->event_type,
                'description' => $request->description,
                'assign_member_id' => !empty($request->assign_member_id)
                    ? json_encode($request->assign_member_id)
                    : json_encode([]),
                'event_slug' => $slug,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id,
            ]);

        return redirect()->route('Event.index')->with('success', 'Event Updated Successfully.');
    }
    public function delete(Request $request)
    {

        $delete = DB::table('news_and_events')->where(['iStatus' => 1, 'isDelete' => 0, 'event_id' => $request->id])->first();
        $root = $_SERVER['DOCUMENT_ROOT'];
        $destinationpath = $root . '/event/';
        unlink($destinationpath . $delete->photo);

        DB::table('news_and_events')->where(['iStatus' => 1, 'isDelete' => 0, 'event_id' => $request->id])->delete();
        return redirect()->route('Event.index')->with('success', 'Event Deleted Successfully!.');
    }

    public function Eventindex(Request $request, $id)
    {

        $eventname = DB::table('news_and_events')
            ->select('news_and_events.name')->where(['news_and_events.iStatus' => 1, 'news_and_events.isDelete' => 0, 'news_and_events.event_id' => $id])->first();

        $inquiry = DB::table('member_news_comment')
            ->select('member_news_comment.ispaid', 'member_news_comment.Payment_Status', 'member_news_comment.id', 'member_news_comment.news_id', 'member_news_comment.name as member_news_comment_name', 'member_news_comment.email', 'member_news_comment.companyname', 'member_news_comment.businesscategory', 'member_news_comment.phonenumber', 'member_news_comment.message', 'news_and_events.name', 'member_news_comment.referred_by', 'member_news_comment.reference_name')
            ->leftjoin('news_and_events', 'member_news_comment.news_id', '=', 'news_and_events.event_id')
            ->where(['member_news_comment.iStatus' => 1, 'member_news_comment.isDelete' => 0, 'member_news_comment.news_id' => $id])
            ->orderBy('id', 'DESC')
            ->paginate(50);
        return view('Eventinquiry.index', compact('inquiry', 'eventname'));
    }
    public function Eventdelete(Request $request)
    {
        // dd($request);
        DB::table('member_news_comment')->where(['iStatus' => 1, 'isDelete' => 0, 'id' => $request->id])->delete();
        return back()->with('success', 'Event inquiry Deleted Successfully!');
    }
}
