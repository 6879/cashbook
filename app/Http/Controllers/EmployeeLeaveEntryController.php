<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeLeaveEntry;
use App\ShopEmployeeEntry;
use App\ShopInformation;
use Carbon\Carbon;
use Auth;

class EmployeeLeaveEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
          $leaveEntryLists = EmployeeLeaveEntry::with('employeeName')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->orderBy('employeeLeaveId','desc')->paginate(15);

          return ['leaveEntryLists' => $leaveEntryLists];
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [
              'employeEntryId' => 'required|unique:employee_leave_entries,employeEntryId',
              'startDate' => 'required',
              'endDate' => 'required',
              'commitment' => 'required',
          ],
          [
             'employeEntryId.required' => 'Select Employee  Name',
             'employeEntryId.unique' => 'The employee name has already been taken.',
             'startDate.required' => 'Select Leave Start Date',
             'endDate.required' => 'Select Leave End Date',
             'commitment.required' => 'Enter Your Commitment',
          ]);

          $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;

          $EmployeeLeaveEntry = new EmployeeLeaveEntry();
          $EmployeeLeaveEntry->employeEntryId = $request->employeEntryId;
          $EmployeeLeaveEntry->startDate = $request->startDate;
          $EmployeeLeaveEntry->endDate = $request->endDate;
          $EmployeeLeaveEntry->commitment = $request->commitment;
          $EmployeeLeaveEntry->shopId = Auth::User()->shopId;
          $EmployeeLeaveEntry->shopTypeId = $shopTypeId;
          $EmployeeLeaveEntry->createBy = Auth::User()->id;
          $EmployeeLeaveEntry->save();

          return ['success' => 'ok'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($leaveEntryId)
    {
        return EmployeeLeaveEntry::where('employeeLeaveId',$leaveEntryId)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $leaveEntryId)
    {
          $this->validate($request, [
              'employeEntryId' => 'required',
              'startDate' => 'required',
              'endDate' => 'required',
              'commitment' => 'required',
          ],
          [
             'employeEntryId.required' => 'Select Employee  Name',
             'employeEntryId.unique' => 'The employee name has already been taken.',
             'startDate.required' => 'Select Leave Start Date',
             'endDate.required' => 'Select Leave End Date',
             'commitment.required' => 'Enter Your Commitment',
          ]);

          if (EmployeeLeaveEntry::where('employeEntryId',$request->employeEntryId)->where('employeeLeaveId','!=',$leaveEntryId)->exists()) {
              return ['alreadyEntry' => 'Already Employee Leave Entry'];
          }
          else {

                EmployeeLeaveEntry::where('employeeLeaveId',$leaveEntryId)->update([
                      'employeEntryId' => $request->employeEntryId,
                      'startDate' => $request->startDate,
                      'endDate' => $request->endDate,
                      'commitment' => $request->commitment,
                      'updateBy' => Auth::User()->id,
                ]);

                return ['success' => 'ok'];
          }
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
