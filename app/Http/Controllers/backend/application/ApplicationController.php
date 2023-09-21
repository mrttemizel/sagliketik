<?php

namespace App\Http\Controllers\backend\application;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public  function  index(){
        return view('backend.application.index');
    }

    public  function  create(){
        return view('backend.application.create');
    }

    public  function  store(Request $request)
    {

        $data = new Application();
        $basvuru_id = IdGenerator::generate(['table' => 'applications',   'field' => 'basvuru_id', 'length' => 10, 'prefix' =>'BSV-']);
        $data -> basvuru_id = $basvuru_id;
        $data -> user_id = Auth::user()->id;
        $data->save();
    }
}
