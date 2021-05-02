<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminBussinessType;
use Carbon\Carbon;
use Auth;
class AdminBussinessTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $AdminBussinessTypeShow = AdminBussinessType::orderBy('bussinessTypeId','desc')->paginate(20);
          return ['AdminBussinessTypeShow' => $AdminBussinessTypeShow];
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
        $this->validate($request, [
            'bussinessTypeName' => 'required',
            'bussinessTypeStatus' => 'required',
        ],
        [
          'bussinessTypeName.required' => 'Enter Bussiness Type Name',
          'bussinessTypeStatus.required' => 'Select Bussiness Type Status',
        ]);

        if (AdminBussinessType::where('bussinessTypeName',$request->bussinessTypeName)->exists()){
            return ['changebussinessTypeName'=>'Change Your Bussiness Type Name'];
        }
        else{
            AdminBussinessType::insert([
              'bussinessTypeName' => $request->bussinessTypeName,
              'bussinessTypeStatus' => $request->bussinessTypeStatus,
              'createBy' => Auth::user()->id,
              'created_at' => Carbon::now(),
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bussinessTypeId)
    {
      $bussinessTypeStatus = AdminBussinessType::where('bussinessTypeId',$bussinessTypeId)->first()->bussinessTypeStatus;
       if ($bussinessTypeStatus == 1) {
           AdminBussinessType::where('bussinessTypeId',$bussinessTypeId)->update([
             'bussinessTypeStatus' => 0,
             'updateBy' => Auth::user()->id,
           ]);
       }
       else {
         AdminBussinessType::where('bussinessTypeId',$bussinessTypeId)->update([
           'bussinessTypeStatus' => 1,
           'updateBy' => Auth::user()->id,
         ]);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($bussinessTypeId)
    {
        $adminBussinessInfo = AdminBussinessType::where('bussinessTypeId',$bussinessTypeId)->first();
        return ['adminBussinessInfo' => $adminBussinessInfo];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bussinessTypeId)
    {
        $this->validate($request, [
            'bussinessTypeName' => 'required',
            'bussinessTypeStatus' => 'required',
        ],
        [
          'bussinessTypeName.required' => 'Enter Bussiness Type Name',
          'bussinessTypeStatus.required' => 'Select Bussiness Type Status',
        ]);
        if (AdminBussinessType::where('bussinessTypeName',$request->bussinessTypeName)->where('bussinessTypeId','!=',$bussinessTypeId)->exists()){
            return ['changeBussinessTypeName'=>'Change Your Bussiness Type Name'];
        }
        else {
            AdminBussinessType::where('bussinessTypeId',$bussinessTypeId)->update([
              'bussinessTypeName' => $request->bussinessTypeName,
              'bussinessTypeStatus' => $request->bussinessTypeStatus,
              'createBy' => Auth::user()->id,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bussinessTypeId)
    {
       AdminBussinessType::where('bussinessTypeId',$bussinessTypeId)->delete();
    }
}
