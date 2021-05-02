<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeAttendance;
use App\EmployeeLeaveEntry;
use App\ShopEmployeeEntry;
use App\ShopInformation;
use Carbon\Carbon;
use Auth;

class EmployeeAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
        $attendanceLists = EmployeeAttendance::with('employeeName')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->orderBy('employeeAttendanceId','desc')->paginate(30);

        $employeeInDate = EmployeeAttendance::where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->orderBy('employeeAttendanceId','desc')->first();

        return ['attendanceLists' => $attendanceLists, 'employeeInDate' => $employeeInDate];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
          $employeeNames = ShopEmployeeEntry::select('shopEmployeeEntryId','fullName')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->latest()->get();
          return ['employeeNames' => $employeeNames];
    }
    public function  clickForAttendanceLeave()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
          $EmployeeLeaveLists = EmployeeLeaveEntry::where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->latest()->get();
          $presentdate = Carbon::now()->format('d-m-Y');

          $calenderdate = Carbon::now()->format('Y-m-d');

          foreach ($EmployeeLeaveLists as $EmployeeLeaveList) {
             if ($EmployeeLeaveList->endDate >= $calenderdate) {
                    EmployeeAttendance::insert([
                        'employeEntryId' => $EmployeeLeaveList->employeEntryId,
                        'employeeInDate' => $presentdate,
                        'employeeInTime' => '00:00',
                        'employeeOutTime' => '00:00',
                        'attendanceStatus' => 'L',
                        'shopId' => Auth::User()->shopId,
                        'shopTypeId' => $shopTypeId,
                        'createBy' => Auth::User()->id,
                        'created_at' => Carbon::now(),
                  ]);
             }
          }

    }

    public function clickForAttendanceAbsent()
    {
        $presentdate = Carbon::now()->format('d-m-Y');
        $calenderdate = Carbon::now()->format('Y-m-d');

        $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
        $EmployeeLeaveWithoutId = EmployeeLeaveEntry::where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('endDate','>=',$calenderdate)->where('shopTypeId',$shopTypeId)->latest()->get();


          if (count($EmployeeLeaveWithoutId)  > 0) {
                $employeLeaveEntryIds	=  EmployeeAttendance::where('employeeInDate',$presentdate)->get();
                $employeeNameLists = ShopEmployeeEntry::select('shopEmployeeEntryId','fullName')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();
                  foreach ($employeeNameLists as $employeeNameList) {
                      if (EmployeeAttendance::where('employeEntryId',$employeeNameList->shopEmployeeEntryId)->where('employeeInDate',$presentdate)->exists()) {

                      }
                      else {
                             EmployeeAttendance::insert([
                                 'employeEntryId' => $employeeNameList->shopEmployeeEntryId,
                                 'employeeInDate' => $presentdate,
                                 'employeeInTime' => '00:00',
                                 'attendanceStatus' => 'A',
                                 'shopId' => Auth::User()->shopId,
                                 'shopTypeId' => $shopTypeId,
                                 'createBy' => Auth::User()->id,
                                 'created_at' => Carbon::now(),
                            ]);
                     }
                }
               return ['success' => 'ok'];

           }
            else {
              $employeeNameLists = ShopEmployeeEntry::select('shopEmployeeEntryId','fullName')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->latest()->get();
                 foreach ($employeeNameLists as $employeeNameList) {
                    EmployeeAttendance::insert([
                        'employeEntryId' => $employeeNameList->shopEmployeeEntryId,
                        'employeeInDate' => $presentdate,
                        'employeeInTime' => '00:00',
                        'attendanceStatus' => 'A',
                        'shopId' => Auth::User()->shopId,
                        'shopTypeId' => $shopTypeId,
                        'createBy' => Auth::User()->id,
                        'created_at' => Carbon::now(),
                    ]);
                }
              return ['success' => 'ok'];
            }

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
              'employeEntryId' => 'required',

          ],
          [
             'employeEntryId.required' => 'Select Employee  Name',
          ]);

        $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
        $presentdate = Carbon::now()->format('d-m-Y');
        $presentTime = Carbon::now()->format('h:i:s A');

        if(isset($request->employeeInTime)) {
            EmployeeAttendance::where('employeEntryId',$request->employeEntryId)->where('employeeInDate',$presentdate)->update([
                'employeeInDate' => $presentdate,
                'employeeInTime' => $presentTime,
                'attendanceStatus' => 'P',
                'shopId' => Auth::User()->shopId,
                'shopTypeId' => $shopTypeId,
                'createBy' => Auth::User()->id,
            ]);
            return ['inTime' => "Success"];
        }

        if(isset($request->employeeOutTime)) {
            EmployeeAttendance::where('employeEntryId',$request->employeEntryId)->where('employeeInDate',$presentdate)->update([
                'employeeOutDate' => $presentdate,
                'employeeOutTime' => $presentTime,
                'updateBy' => Auth::User()->id,
            ]);
            return ['outTime' => "Success"];
        }

        if(!isset($request->employeeInTime) || !isset($request->employeeOutDate)) {
           return ['error' => 'Select Employee Name and In Time Or Out Time'];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employeEntryId)
    {
          $endDate = EmployeeLeaveEntry::where('employeEntryId',$employeEntryId)->latest()->first();
          if (isset($endDate->endDate)) {

                $presentDate = Carbon::now()->format('d');
                $entryDate = explode('-',$endDate->endDate)[2];

                $presentMonth = Carbon::now()->format('m');
                $entryMonth = explode('-',$endDate->endDate)[1];

                if ($presentDate <= $entryDate &&  $presentMonth == $entryMonth) {
                     return ['employeeLeave' => 'Employee Leave'];
                }
                else {
                    $employeeDate = EmployeeAttendance::where('employeEntryId',$employeEntryId)->latest()->first();

                    if (isset($employeeDate->employeeInDate) && !isset($employeeDate->employeeOutDate) && $employeeDate->employeeInTime != '00:00') {
                        $entryDateTime =  $employeeDate->employeeInDate;

                        $presentDate = Carbon::now()->format('d');
                        $entryDate = explode('-',$entryDateTime)[0];

                        $presentMonth = Carbon::now()->format('m');
                        $entryMonth = explode('-',$entryDateTime)[1];

                        if ($presentDate == $entryDate  && $presentMonth ==  $entryMonth ) {
                            return ['attendanceTime' => 'The Employee  Attendance'];
                        }

                    }

                    if(isset($employeeDate->employeeInDate) && isset($employeeDate->employeeOutDate) && $employeeDate->employeeInTime != '00:00') {

                          $entryDateTime =  $employeeDate->employeeInDate;

                          $presentDate = Carbon::now()->format('d');
                          $entryDate = explode('-',$entryDateTime)[0];

                          $presentMonth = Carbon::now()->format('m');
                          $entryMonth = explode('-',$entryDateTime)[1];


                          if ($presentDate == $entryDate  && $presentMonth ==  $entryMonth ) {
                              return ['inTimeAndOutTime' => 'In Time And Out Time Entry'];
                          }

                    }

                }

          }
          else {
                $employeeDate = EmployeeAttendance::where('employeEntryId',$employeEntryId)->latest()->first();

                if (isset($employeeDate->employeeInDate) && !isset($employeeDate->employeeOutDate ) && $employeeDate->employeeInTime != '00:00') {
                    $entryDateTime =  $employeeDate->employeeInDate;

                    $presentDate = Carbon::now()->format('d');
                    $entryDate = explode('-',$entryDateTime)[0];

                    $presentMonth = Carbon::now()->format('m');
                    $entryMonth = explode('-',$entryDateTime)[1];

                    if ($presentDate == $entryDate  && $presentMonth ==  $entryMonth ) {
                        return ['attendanceTime' => 'The Employee  Attendance'];
                    }

                }

                if(isset($employeeDate->employeeInDate) && isset($employeeDate->employeeOutDate) && $employeeDate->employeeInTime != '00:00') {

                      $entryDateTime =  $employeeDate->employeeInDate;

                      $presentDate = Carbon::now()->format('d');
                      $entryDate = explode('-',$entryDateTime)[0];

                      $presentMonth = Carbon::now()->format('m');
                      $entryMonth = explode('-',$entryDateTime)[1];


                      if ($presentDate == $entryDate  && $presentMonth ==  $entryMonth ) {
                          return ['inTimeAndOutTime' => 'In Time And Out Time Entry'];
                      }

                }

                else {
                   return ['noEntry' => "In Time And Out Time Not Entry"];
                }
          }

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
        //
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
