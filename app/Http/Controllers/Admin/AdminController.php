<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Campus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCampus;
use App\Models\Test;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.admin_index');
    }

    public function ManageUni()
    {
        $data = Campus::latest()->get();
        return view('admin.manage_uni',compact('data'));
    }

    public function insertuni(Request $request)
    {
        Campus::insert([
            'campus_name' => $request->uniname,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back();
    }


    //subcampus

    public function manageSubCampus()
    {
        $data = Campus::latest()->get();
        $data2 = SubCampus::latest()->get();
        return view('admin.manage_subcampus',compact('data','data2'));
    }

    public function insertCampus(Request $request)
    {
        SubCampus::insert([
            'campus_id' => $request->campus_id,
            'subcamus_name' => $request->campusname,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back();
    }

    // manage test 
    public function managetest()
    {
        $data = Campus::latest()->get();
        $data2 = SubCampus::latest()->get();
        $data3 = Test::latest()->get();
        return view('admin.manage_test',compact('data','data2','data3'));
    }

    public function GetSubCampus($campus_id){

        $subcat = SubCampus::where('campus_id',$campus_id)->orderBy('subcamus_name','ASC')->get();
        return json_encode($subcat);
    }

    public function GetTest($sub_campus_id){

        $subcat = SubCampus::where('sub_campus_id',$sub_campus_id)->orderBy('TestName','ASC')->get();
        return json_encode($subcat);
    }

    public function inserttest(Request $request)
    {
        Test::insert([
            'campus_id' => $request->campus_id,
            'sub_campus_id' => $request->sub_campus_id,
            'TestName' => $request->testname,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back();
    }

}

