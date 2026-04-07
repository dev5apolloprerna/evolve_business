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
use App\Models\OneToOne;
use App\Models\Member_metting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BusinessCreated;
use validate;
use Illuminate\Support\Str;
use App\Mail\BusinessStatusMail;

class OneToOneController extends Controller
{
    public function index(Request $request)
    {
        try {
            $businesstype = $request->business_type;
            $FromDate = $request->fromdate;
            $ToDate = $request->todate;
            $session = Auth::user()->id;
            // $Data = User::where('status', 1)->orderBy('first_name')->get();
            $Data = User::leftjoin('members', 'members.user_id', '=', 'users.id')
                ->where('users.status', 1)
                ->where('users.role_id', 2)
                ->where('members.Arrival_flag', 0)
                ->orderBy('users.first_name')
                ->select('users.*')
                ->get();
            $Datadrop = User::where('status', 1)->orderBy('first_name')->get();

            $OneToOne = OneToOne::leftjoin('users', 'users.id', '=', 'one_to_one_detail.from_id')
                ->select('one_to_one_detail.*', 'users.first_name', 'users.id as user_id')
                ->where('users.id', $session)
                ->where(['iStatus' => 1, 'isDelete' => 0])
                ->when($request->fromdate, fn($query, $FromDate) => $query
                    ->where('one_to_one_detail.date', '>=', date('Y-m-d 00:00:00', strtotime($FromDate))))
                ->when($request->todate, fn($query, $ToDate) => $query
                    ->where('one_to_one_detail.date', '<=', date('Y-m-d 23:59:59', strtotime($ToDate))));
            if ($businesstype != "") {
                $OneToOne->where('one_to_one_detail.isapproved_status', '=', $businesstype);
            }
            $Business = $OneToOne->orderBy('one_to_one_detail.id', 'DESC')
                ->paginate(env('PAR_PAGE_COUNT', 20));

            $Count = $Business->count();
            return view('OneToOne.index', compact('Business', 'Data', 'Datadrop', 'Count', 'businesstype', 'FromDate', 'ToDate'));
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

            return view('OneToOne.exportlist', compact('datas', 'FromDate', 'ToDate'));
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
            return view('OneToOne.storeview', compact('Data', 'session'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            $session = Auth::user();

            $ToUser = User::find($request->oneToone_to);
            $ToUserName = $ToUser ? $ToUser->first_name : 'Unknown User';
            $request->validate([
                'place'   => 'required',
                'oneToone_to'     => 'required',
                'comment' => 'required',
                'Date'   => 'required|date',
            ]);

            $img = "";
            if ($request->hasFile('photo')) {
                $root = $_SERVER['DOCUMENT_ROOT'];
                $image = $request->file('photo');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $destinationpath = $root . '/OneToOne/';
                if (!file_exists($destinationpath)) {
                    mkdir($destinationpath, 0755, true);
                }
                $image->move($destinationpath, $img);
            }

            $gu_id = Str::random(10);

            $Data = array(
                'from'   => $session->first_name,
                'to'     => $ToUserName,
                'date'   => $request->Date,
                'photo'   => $img,
                'place'   => $request->place,
                'comment'   => $request->comment,
                'gu_id'           => $gu_id,
                'from_id' => $session->id,
                'to_id' => $request->oneToone_to,
                'created_at'      => date('Y-m-d H:i:s'),
                'created_by'      => auth()->id(),
                "strIP" => $_SERVER['REMOTE_ADDR']

            );

            $businessId = DB::table('one_to_one_detail')->insertGetId($Data);
            $id = DB::table('member_points')->insertGetId([
                'member_id' => $session->id,
                'business_id' => $businessId,
                'points_id' => 6,
                'points' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['success' => true, 'message' => 'One To One Created Successfully.']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function editview(Request $request, $Id)
    {

        $Business = OneToOne::where(['iStatus' => 1, 'isDelete' => 0, 'id' => $Id])->first();
        return response()->json($Business);
    }

    public function update(Request $request)
    {

        $session = Auth::user();
        $ToUser = User::find($request->oneToone_to);
        $ToUserName = $ToUser ? $ToUser->first_name : 'Unknown User';
        $request->validate([
            'place'   => 'required',
            'oneToone_to'     => 'required',
            'comment' => 'required',
            'Date'   => 'required|date',
        ]);

        $img = "";
        if ($request->hasFile('photo')) {
            $root = $_SERVER['DOCUMENT_ROOT'];
            $image = $request->file('photo');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $destinationpath = $root . '/OneToOne/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 0755, true);
            }
            $image->move($destinationpath, $img);
            $oldImg = $request->input('hiddenPhoto') ? $request->input('hiddenPhoto') : null;

            if ($oldImg != null || $oldImg != "") {
                if (file_exists($destinationpath . $oldImg)) {
                    unlink($destinationpath . $oldImg);
                }
            }
        } else {
            $oldImg = $request->input('hiddenPhoto');
            $img = $oldImg;
        }

        $Data = array(
            'from'   => $session->first_name,
            'to'     => $ToUserName,
            'date'   => $request->Date,
            'photo'   => $img,
            'place'   => $request->place,
            'comment'   => $request->comment,
            'from_id' => $session->id,
            'to_id' => $request->oneToone_to,
            'updated_at'      => now(),
            'updated_by'      => auth()->id(),
            "strIP" => request()->ip()

        );
        DB::table('one_to_one_detail')
            ->where(['iStatus' => 1, 'isDelete' => 0, 'id' => $request->id])
            ->update($Data);

        return redirect()->route('OneToOne.index')->with('success', 'One To One Updated Successfully.');
    }

    public function delete(Request $request)
    {

        DB::table('one_to_one_detail')->where(['iStatus' => 1, 'isDelete' => 0, 'id' => $request->id])->delete();
        return redirect()->route('OneToOne.index')->with('success', 'One To One Deleted Successfully!.');
    }
}
