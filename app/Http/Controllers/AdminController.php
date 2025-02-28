<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function addview()
    {
        return view("admin.add_doctor");
    }

    public function upload(Request $request)
    {
        $doctor = new Doctor();

        $image = $request->file;
        $imagename = time() .".". $image->getClientOriginalExtension();
        $request->file->move("docorimage", $imagename);
        $doctor->image = $imagename;
        $doctor->name=$request->name;
        $doctor->phone= $request->phone;
        $doctor->room= $request->room;
        $doctor->speciality= $request->speciality;

        $doctor->save();

        return redirect()->back()->with("success","Doctor added successfully");

    }

    public function showappintment(){

        $data = Appoinment::all();

        return view("admin.showappintment", compact("data"));
    }

    public function approved($id){
        $data = Appoinment::find($id);
        $data->status = "Approved";
        $data->save();

        return redirect()->back();
    }

    public function canceled($id){
        $data = Appoinment::find($id);
        $data->status = "Canceled";
        $data->save();

        return redirect()->back();
    }
}
