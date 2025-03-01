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
        $imagename = time() . "." . $image->getClientOriginalExtension();
        $request->file->move("docorimage", $imagename);
        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $doctor->save();

        return redirect()->back()->with("success", "Doctor added successfully");

    }

    public function showappintment()
    {

        $data = Appoinment::all();

        return view("admin.showappintment", compact("data"));
    }

    public function approved($id)
    {
        $data = Appoinment::find($id);
        $data->status = "Approved";
        $data->save();

        return redirect()->back();
    }

    public function canceled($id)
    {
        $data = Appoinment::find($id);
        $data->status = "Canceled";
        $data->save();

        return redirect()->back();
    }

    public function showdoctors()
    {
        $data = Doctor::all();
        return view("admin.showdoctors", compact("data"));
    }

    public function deletedoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        $data = Doctor::find($id);

        return view("admin.update_doctor", compact("data"));
    }

    public function editdoctor(Request $request, $id)
    {

        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $image = $request->image;

        if ($image) {

            $imagename = time() . "." . $image->getClientOriginalExtension();
            $request->image->move("docorimage", $imagename);
            $doctor->image = $imagename;

        }

        $doctor->save();
        return redirect()->back()->with("success","Doctor details updated successfully");
    }
}
