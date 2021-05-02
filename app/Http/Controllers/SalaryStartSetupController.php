<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobDepartmentEntry;
use App\ShopEmployeeEntry;
use App\SalaryGradeSetup;
use App\StartSalarySetup;
use App\ShopInformation;
use App\GradeEntry;
use Carbon\Carbon;
use Auth;

class SalaryStartSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
          $salarySetupLists = StartSalarySetup::with('shopEmployeeName','gradeEntryList','JobDepartments')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->latest()->paginate(15);
          return ['salarySetupLists' => $salarySetupLists];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function salaryGradeName($employeEntryId)
    {
          $employeeTypeId = ShopEmployeeEntry::where('shopEmployeeEntryId',$employeEntryId)->first();
          $jobDepartmentinfo = JobDepartmentEntry::where('jobDepartmentEntryId',$employeeTypeId->jobDepartmentId)->first();

          $gradeEntryId = SalaryGradeSetup::where('employeEntryId',$employeEntryId)->first();
          $salaryGradeinfo = GradeEntry::where('gradeEntryId',$gradeEntryId->gradeEntryId)->first();

          return ['salaryGradeinfo' => $salaryGradeinfo, 'jobDepartmentinfo' => $jobDepartmentinfo];


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
            'startDate' => 'required',
            'salarySetupStatus' => 'required',
        ],
        [
           'employeEntryId.required' => 'Select Employee  Name',
           'startDate.required' => 'Select Salary Setup Date',
           'salarySetupStatus.required' => 'Select Salary Status',
        ]);

        if (StartSalarySetup::where('employeEntryId',$request->employeEntryId)->exists()) {
           return ['alreadySetup' => 'Already Employee Salary Setup'];
        }
        else {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
            $jobDepartmentinfo = ShopEmployeeEntry::where('shopEmployeeEntryId',$request->employeEntryId)->first()->jobDepartmentId;

            $StartSalarySetup = new StartSalarySetup();
            $StartSalarySetup->employeEntryId = $request->employeEntryId;
            $StartSalarySetup->jobDepartmentId = $jobDepartmentinfo;
            $StartSalarySetup->gradeEntryId = $request->gradeEntryId;
            $StartSalarySetup->startDate = $request->startDate;
            $StartSalarySetup->monthDate = explode('-',$request->startDate)[1];
            $StartSalarySetup->salarySetupStatus = $request->salarySetupStatus;
            $StartSalarySetup->shopId = Auth::User()->shopId;
            $StartSalarySetup->shopTypeId = $shopTypeId;
            $StartSalarySetup->createBy = Auth::User()->id;
            $StartSalarySetup->save();
        }

        return ['success' => 'ok'];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($salarySetupId)
    {
          $salarySetupStatus = StartSalarySetup::where('salarySetupId', $salarySetupId)->first()->salarySetupStatus;

          if ($salarySetupStatus == 1){
              StartSalarySetup::where('salarySetupId', $salarySetupId)->update([
                  'salarySetupStatus' => 0,
                  'updateBy' => Auth::user()->id,
              ]);
          }
          if ($salarySetupStatus == 0){
              StartSalarySetup::where('salarySetupId', $salarySetupId)->update([
                  'salarySetupStatus' => 1,
                  'updateBy' => Auth::user()->id,
              ]);
          }
    }
    public function salaryPaymentStatus($salarySetupId)
    {
          $paymentStatus = StartSalarySetup::where('salarySetupId', $salarySetupId)->first()->paymentStatus;

          if ($paymentStatus == 1){
              StartSalarySetup::where('salarySetupId', $salarySetupId)->update([
                  'paymentStatus' => 0,
                  'updateBy' => Auth::user()->id,
              ]);
          }
          if ($paymentStatus == 0){
              StartSalarySetup::where('salarySetupId', $salarySetupId)->update([
                  'paymentStatus' => 1,
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
    public function edit($salarySetupId)
    {
          $startSalarySetupList = StartSalarySetup::with('gradeEntryList','JobDepartments')->where('salarySetupId',$salarySetupId)->first();
          return ['startSalarySetupList' => $startSalarySetupList];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $salarySetupId)
    {
          $this->validate($request, [
              'employeEntryId' => 'required',
              'startDate' => 'required',
              'salarySetupStatus' => 'required',
          ],
          [
             'employeEntryId.required' => 'Select Employee  Name',
             'startDate.required' => 'Select Salary Setup Date',
             'salarySetupStatus.required' => 'Select Salary Status',
          ]);

          if (StartSalarySetup::where('employeEntryId',$request->employeEntryId)->where('salarySetupId','!=',$salarySetupId)->exists()) {
              return ['alreadySetup' => 'Already Employee Salary Setup'];
          }
          else {
             $jobDepartmentinfo = ShopEmployeeEntry::where('shopEmployeeEntryId',$request->employeEntryId)->first()->jobDepartmentId;

                StartSalarySetup::where('salarySetupId',$salarySetupId)->update([
                      'employeEntryId' => $request->employeEntryId,
                      'jobDepartmentId' => $jobDepartmentinfo,
                      'gradeEntryId' => $request->gradeEntryId,
                      'startDate' => $request->startDate,
                      'salarySetupStatus' => $request->salarySetupStatus,
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
