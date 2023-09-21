<?php

namespace App\Http\Controllers\backend\form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public  function  index(){
        return view('backend.form.index');
    }
}
