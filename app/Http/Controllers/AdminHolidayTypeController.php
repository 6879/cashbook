<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminHolidayType;
use Carbon\Carbon;
use Auth;
class AdminHolidayTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminHolidayType = AdminHolidayType::orderBy('holidayTypeId','desc')->paginate(20);
        return ['AdminHolidayType' => $adminHolidayType];
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
            'holidayTypeName' => 'required',
            'holidayTypeStatus' => 'required',
        ],
        [
          'holidayTypeName.required' => 'Enter Holiday Type Name',
          'holidayTypeStatus.required' => 'Select Holiday Type Status',
        ]);
        if (AdminHolidayType::where('holidayTypeName',$request->holidayTypeName)->exists()){
            return ['changeholidayTypeName'=>'Change Your  holidayTypeName'];
        }
        else {
            AdminHolidayType::insert([
                'holidayTypeName' => $request->holidayTypeName,
                'holidayTypeStatus' => $request->holidayTypeStatus,
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
    public function show($holidayTypeId)
    {
        $holidayTypeStatus =  AdminHolidayType::where('holidayTypeId',$holidayTypeId)->first()->holidayTypeStatus;
          if($holidayTypeStatus == 1){
              AdminHolidayType::where('holidayTypeId',$holidayTypeId)->update([
                'holidayTypeStatus' => 0,
                'updateBy' => Auth::user()->id,
              ]);
          }
          else{
              AdminHolidayType::where('holidayTypeId',$holidayTypeId)->update([
                'holidayTypeStatus' => 1,
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
    public function edit($holidayTypeId)
    {
        $adminHolidayTypeshow = AdminHolidayType::where('holidayTypeId',$holidayTypeId)->first();
        return ['adminHolidayTypeshow' => $adminHolidayTypeshow];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $holidayTypeId)
    {
      $this->validate($request, [
            'holidayTypeName' => 'required',
            'holidayTypeStatus' => 'required',
        ],
        [
            'holidayTypeName.required' => 'Enter Holiday Type Name',
            'holidayTypeStatus.required' => 'Select Holiday Type Status',
        ]);

         if (AdminHolidayType::where('holidayTypeName',$request->holidayTypeName)->where('holidayTypeId','!=',$holidayTypeId)->exists()) {
              return ['changeholidayTypeName' => 'Change Your Holiday Type Name'];
         }
         else {
             AdminHolidayType::where('holidayTypeId',$holidayTypeId)->update([
                 'holidayTypeName' => $request->holidayTypeName,
                 'holidayTypeStatus' => $request->holidayTypeStatus,
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
    public function destroy($holidayTypeId)
    {
          AdminHolidayType::where('holidayTypeId',$holidayTypeId)->delete();
    }
}
