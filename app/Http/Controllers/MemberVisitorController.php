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

class MemberVisitorController extends Controller
{

    public function getStatus($id)
    {
        $data = Visitor::find($id);

        return response()->json($data);
    }
    public function index(Request $request)
    {
        $user = Auth::User();
        $memberData = members::select('*')
            ->where('user_id', $user->id)
            ->first();

        // $id = $memberData->id;
        $datas = Visitor::with('business_category', 'members')->paginate(env('PAR_PAGE_COUNT', 20));
        $count = $datas->count();
        // dd($datas);
        return view('MemberVisitor.index', compact('datas', 'user', 'count'));
    }

    public function updateStatus(Request $request)
    {
        $data = Visitor::find($request->id);

        if ($data) {
            $data->iStatus = $request->newStatus;
            $data->comments = $request->comment;
            $data->save();

            return redirect()->back()->with('success', 'Status Updated');
        }

        return redirect()->back()->with('error', 'Something went wrong');
    }
}
