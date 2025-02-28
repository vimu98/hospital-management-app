<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class homeController extends Controller
{
    public function rederect()
    {
        if(Auth:: id()){
            if(Auth::user()->usertype == 0){
                return view('home');
            }else{
                return view('admin.home');
            }
        }else{
            return redirect()->back();
        }
    }
}
