<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;

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
}
