<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
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
        $Events = Event::orderBy('event_id', 'DESC')->where(['iStatus' => 1, 'isDelete' => 0])->paginate(20);
        return view('Event.index', compact('Events'));
    }
    public function EventParticipate(Request $request, $id)
    {

        $Events = Event::with('member')->where('event_id', $id)->orderBy('event_id', 'DESC')->where(['iStatus' => 1, 'isDelete' => 0])->paginate(20);
        return view('Event.Participate', compact('Events'));
    }
    public function storeview()
    {
        return view('Event.storeview');
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
