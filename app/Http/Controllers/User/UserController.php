<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Registration;
use App\Models\RegistrationForm;
use App\Models\SubCampus;
use App\Models\Test;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Http\Request;
Use Image;

class UserController extends Controller
{
    //
    public function index()
    {
        $data = Campus::latest()->get();
        $data2 = SubCampus::latest()->get();
        $data3 = Test::latest()->get();
        return view('User.registration_form',compact('data','data2','data3'));
    }

    public function UserDashboard()
    {
        $data = Registration::latest()->get();
        $data2 = Campus::latest()->get();
        $data3 = SubCampus::latest()->get();
        return view('User.dashboard',compact('data','data2','data3'));
    }

    public function GetSubCampus($campus_id){

        $subcat = SubCampus::where('campus_id',$campus_id)->orderBy('subcamus_name','ASC')->get();
        return json_encode($subcat);
    }

    public function GetTest($sub_campus_id){

        $subcat = Test::where('sub_campus_id',$sub_campus_id)->orderBy('TestName','ASC')->get();
        return json_encode($subcat);
    }

    public function insertregistrationform(Request $request)
    {
        $add_product = new Registration();

        $image = $request->image;
        //we are giving random name to the image 
        $imagename = time(). '.' . $image->getClientoriginalExtension(); 
        //moving the image in folder with imagename
        $request->image ->move('upload', $imagename);
        $add_product->challan = $imagename;
        $add_product->save();

        Registration::insert([
            'sname' => $request->sname,
            'fname' => $request->fname,
            'age' => $request->age,
            'cnic' => $request->cnic,
            'phone' => $request->phone,
            'address' => $request->address,
            'campus_id' => $request->campus_id,
            'sub_campus_id' => $request->sub_campus_id,
            'test' => $request->test,
            
            'date' => $request->date,
            'status' => 0,
        ]);

        return redirect()->back();
    }
}
