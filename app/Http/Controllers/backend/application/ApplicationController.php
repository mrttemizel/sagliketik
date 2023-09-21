<?php

namespace App\Http\Controllers\backend\application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public  function  index(){
        return view('backend.application.index');
    }

    public  function  create(){
        return view('backend.application.create');
    }
}
