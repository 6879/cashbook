<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\AdminlicenceType;
use Auth;

class AdminlicenceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $AdminlicenceType = AdminlicenceType::orderBy('licenceTypesId','desc')->paginate(20);
      return ['AdminlicenceType' => $AdminlicenceType];
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
            'licenceTypeName' => 'required',
            'licenceTypeStatus' => 'required',
        ],
        [
          'licenceTypeName.required' => 'Enter Licence Type Name',
          'licenceTypeStatus.required' => 'Select Licence Type Status',
        ]);

        if (AdminlicenceType::where('licenceTypeName',$request->licenceTypeName)->exists()){
            return ['changeLicenceTypeName'=>'Change Your Licence Type Name'];
        }
        else {
            AdminlicenceType::insert([
                'licenceTypeName' => $request->licenceTypeName,
                'licenceTypeStatus' => $request->licenceTypeStatus,
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
    public function show($licenceTypesId)
    {
        $licenceTypeStatus =  AdminlicenceType::where('licenceTypesId',$licenceTypesId)->first()->licenceTypeStatus;

         if($licenceTypeStatus == 1){
             AdminlicenceType::where('licenceTypesId',$licenceTypesId)->update([
               'licenceTypeStatus' => 0,
               'updateBy' => Auth::user()->id,
             ]);
         }
         else{
             AdminlicenceType::where('licenceTypesId',$licenceTypesId)->update([
               'licenceTypeStatus' => 1,
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
    public function edit($licenceTypesId)
    {
        $AdminlicenceTypehow = AdminlicenceType::where('licenceTypesId',$licenceTypesId)->first();
        return ['AdminlicenceTypehow' => $AdminlicenceTypehow];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $licenceTypesId)
    {
       $this->validate($request, [
          'licenceTypeName' => 'required',
          'licenceTypeStatus' => 'required',
        ],
        [
          'licenceTypeName.required' => 'Enter Licence Type Name',
          'licenceTypeStatus.required' => 'Select Licence Type Status',
        ]);

        if (AdminlicenceType::where('licenceTypeName',$request->licenceTypeName)->where('licenceTypesId','!=',$licenceTypesId)->exists()){
            return ['changeLicenceTypeName'=>'Change Your Licence Type Name'];
        }
        else {
            AdminlicenceType::where('licenceTypesId',$licenceTypesId)->update([
              'licenceTypeName' => $request->licenceTypeName,
              'licenceTypeStatus' => $request->licenceTypeStatus,
              'updateBy' => Auth::user()->id,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($licenceTypesId)
    {
          AdminlicenceType::where('licenceTypesId',$licenceTypesId)->delete();
    }
}
