<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appoinment;

class homeController extends Controller
{
    public function rederect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 0) {
                $doctor = doctor::all();
                return view('user.home', compact('doctor'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect('home');

        } else {
            $doctor = doctor::all();
            return view('user.home', compact('doctor'));

        }
    }

    public function appoinment(Request $request){

        $data = new Appoinment;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status ='In progress';

        if(Auth::id()){
            $data->user_id =Auth::user()->id;

        }
      
        $data->save();

        return redirect()->back()->with('success', 'Appoinment request successfully. We contact you soon');
    }

    public function myappoinment(){
        if (Auth::id()) {
        return view('user.my_appointent');
        } else {
            return redirect()->back(); 
        }
    }
}
