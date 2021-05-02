<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BasicInfo;


class BasicInfoController extends Controller
{
    Public function store(Request $request){


        $this->validate($request, [
            'fullName' => 'required',
            'email' => 'required|numeric',
            'phone' => 'required',
            'religious'=> 'required',
            'image'=> 'required'
        ]);

        BasicInfo::insert([
            'fullName' =>$request->fullName,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'religious' =>$request->religious,
            'image' => $request->image,
         ]);
       

    }
}
