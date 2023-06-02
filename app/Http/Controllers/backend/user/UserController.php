<?php

namespace App\Http\Controllers\backend\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public  function profile(){
        $data = User::where('id', Auth::user()->id)->first();
        return view('backend.user.profil',compact('data'));
    }
}
