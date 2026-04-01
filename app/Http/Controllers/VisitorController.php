<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products_service;
use App\Models\Visitor;
use App\Models\members;
use App\Models\User;
use App\Models\City;
use App\Models\City_group;
use App\Models\Categories;
use App\Models\subcategories;
use App\Models\membershipplans;
use App\Models\renewalhistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use validate;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::User();
        $memberData = members::select('*')
            ->where('user_id', $user->id)
            ->first();

        $id = $memberData->id;
        $datas = Visitor::with('business_category')->paginate(env('PAR_PAGE_COUNT', 20));
        $count = $datas->count();
        // dd($datas);
        return view('Visitor.index', compact('datas', 'user', 'id', 'count'));
    }

    public function createnew(Request $request, $id)
    {
        $memberid = $id;
        return view('Visitor.create', compact('memberid'));
    }

    public function create(Request $request)
    {
        $request->validate([

            'memberid' => 'required',
            'name' => 'required',
        ]);
        $Data = array(
            'member_id' => $request->memberid,
            'name'    => $request->name,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'business_catgory'    => $request->business_category_id,
            'business_name'    => $request->business_name,
            'created_at' => date('Y-m-d H:i:s'),
            //'strIP' => $request->ip(),
            'created_by'     => auth()->id()

        );
        DB::table('visitors')->insert($Data);

        return redirect()->route('Visitor.index')->with('success', 'Visitor Created Successfully.');
    }

    public function editview(Request $request, $id)
    {
        // dd($request);
        $data = Visitor::where(['id' => $id])
            ->first();
        // echo json_encode($data);

        return view('Visitor.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $Data = array(
            'member_id' => $request->member_id,
            'name'    => $request->name,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'business_catgory'    => $request->business_category_id,
            'business_name'    => $request->business_name,
            'updated_at' => date('Y-m-d H:i:s'),
            //'updated_by'     => auth()->id()

        );
        //  dd($Data);
        DB::table('visitors')->where('id', $request->id)->update($Data);

        return redirect()->route('Visitor.index')->with('success', 'Visitor update Successfully.');
    }

    public function delete(Request $request)
    {
        // $delete = DB::table('member_services')->where(['iStatus' => 1, 'isDelete' => 0, 'id' => $request->id])->first();
        DB::table('visitors')->where(['id' => $request->id])->delete();
        return back()->with('success', 'Visitor Deleted Successfully!.');
    }
}
