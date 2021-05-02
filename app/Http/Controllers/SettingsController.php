<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\AdminEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            if (Auth::user()->adminId){
                $settingProfile = AdminEntry::where('adminId',Auth::user()->adminId)->first();
                return  ['settingProfile' => $settingProfile];
            }
            else{
                $adminProfile = User::find(Auth::id());
                return  ['settingProfile' => $adminProfile];
            }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->adminId){
             AdminEntry::where('adminId',Auth::user()->adminId)->update([
               'name' => $request->name,
               'email' => $request->email,
               'phone' => $request->phone,
               'address' => $request->address,
               'updateBy' => Auth::user()->id,
             ]);

             User::where('adminId',Auth::user()->adminId)->update([
                 'name' => $request->name,
                 'email' => $request->email,
                 'phone' => $request->phone,
                 'address' => $request->address,
                 'updateBy' => Auth::user()->id,
             ]);


        }
        else{
             User::where('id',Auth::user()->id)->update([
                 'name' => $request->name,
                 'email' => $request->email,
                 'phone' => $request->phone,
                 'address' => $request->address,
                 'updateBy' => Auth::user()->id,
             ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
