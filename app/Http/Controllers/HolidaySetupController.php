<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminHolidayType;
use App\AdminHolidaySetup;
use Carbon\Carbon;
use Auth;
class HolidaySetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminHolidaySetup = AdminHolidaySetup::with('adminHolidayTypeRelation')->orderBy('holidaySetupId','desc')->paginate(20);
        return ['adminHolidaySetup' => $adminHolidaySetup];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adminHolidayType = AdminHolidayType::where('holidayTypeStatus',1)->orderBy('holidayTypeId','desc')->get();
        return ['AdminHolidayType' => $adminHolidayType];
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
            'holidayTypeId' => 'required',
            'holidayStartDate' => 'required',
            'holidayEndDate' => 'required',
            'holidaySetupStatus' => 'required',
         ],
          [
            'holidayTypeId.required' => 'Enter Holiday Type Name',
            'holidayStartDate.required' => 'Enter Holiday Start Date',
            'holidayEndDate.required' => 'Enter Holiday End Date',
            'holidaySetupStatus.required' => 'Select Holiday Setup Status',
          ]);

          if (AdminHolidaySetup::where('holidayTypeId',$request->holidayTypeId)->exists()){
              return ['changeholidayTypeName'=>'Change Your  holidayTypeName'];
          }
          else{
          AdminHolidaySetup::insert([
            'holidayTypeId' => $request->holidayTypeId,
            'holidayStartDate' => $request->holidayStartDate,
            'holidayEndDate' => $request->holidayEndDate,
            'holidaySetupStatus' => $request->holidaySetupStatus,
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
    public function show($holidaySetupId)
    {
      $holidaySetupStatus =  AdminHolidaySetup::where('holidaySetupId',$holidaySetupId)->first()->holidaySetupStatus;
        if($holidaySetupStatus == 1){
            AdminHolidaySetup::where('holidaySetupId',$holidaySetupId)->update([
              'holidaySetupStatus' => 0,
              'updateBy' => Auth::user()->id,
            ]);
        }
        else{
            AdminHolidaySetup::where('holidaySetupId',$holidaySetupId)->update([
              'holidaySetupStatus' => 1,
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
    public function edit($holidaySetupId)
    {
        $adminHolidaySetup = AdminHolidaySetup::where('holidaySetupId',$holidaySetupId)->first();
        return ['adminHolidaySetup' => $adminHolidaySetup];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $holidaySetupId)
    {
        $this->validate($request, [
            'holidayTypeId' => 'required',
            'holidayStartDate' => 'required',
            'holidayEndDate' => 'required',
            'holidaySetupStatus' => 'required',
         ],
         [
          'holidayTypeId.required' => 'Enter Holiday Type Name',
          'holidayStartDate.required' => 'Enter Holiday Start Date',
          'holidayEndDate.required' => 'Enter Holiday End Date',
          'holidaySetupStatus.required' => 'Select Holiday Setup Status',
        ]);

        if (AdminHolidaySetup::where('holidayTypeId',$request->holidayTypeId)->where('holidaySetupId','!=',$holidaySetupId)->exists()) {
            return ['changeholidayTypeName'=>'Change Your  holidayTypeName'];
        }
        else {
            AdminHolidaySetup::where('holidaySetupId',$holidaySetupId)->update([
                'holidayTypeId' => $request->holidayTypeId,
                'holidayStartDate' => $request->holidayStartDate,
                'holidayEndDate' => $request->holidayEndDate,
                'holidaySetupStatus' => $request->holidaySetupStatus,
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
    public function destroy($holidaySetupId)
    {
        AdminHolidaySetup::where('holidaySetupId',$holidaySetupId)->delete();
    }
}
