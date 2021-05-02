<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeEducationEntry;
use App\EmployeeProfessionalEntry;
use App\EmployeeSkillEntry;
use App\EmployeeBankingEntry;
use App\ShopEmployeeEntry;
use App\GradeEntry;
use App\JobDepartmentEntry;
use App\AdminHolidaySetup;
use App\SalaryGradeSetup;
use App\ShopEmployeeType;
use App\ShopInformation;
use App\StartSalarySetup;
use App\EmployeeLeaveEntry;
use App\EmployeeAttendance;
use Carbon\Carbon;
use App\User;
use Auth;

class HrReportController extends Controller
{
    public function employeeReport()
    {
        if (isset(Auth::User()->shopId)) {
           $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
           $shopEmployeeList = ShopEmployeeEntry::with('shopEmployeeTypes','JobDepartments')->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->latest()->paginate(20);
           return ['employeeList' => $shopEmployeeList];
        }
        else {
            $shopEmployeeList = ShopEmployeeEntry::with('shopEmployeeTypes','JobDepartments')->where('createBy',Auth::User()->id)->latest()->paginate(20);
            return ['employeeList' => $shopEmployeeList];
        }
    }
    public function employeeReportView($employeeId){

        $singleEmployeeInfo = ShopEmployeeEntry::with('shopEmployeeTypes','JobDepartments')->where('shopEmployeeEntryId',$employeeId)->first();
        $singleEmployeeEducation = EmployeeEducationEntry::with('nameOfInstitute','nameOfDegree','grade')->where('employeEntryId',$employeeId)->get();
        $singleEmployeeProfessional = EmployeeProfessionalEntry::where('employeEntryId',$employeeId)->get();
        $singleEmployeeSkill = EmployeeSkillEntry::with('skillGrade')->where('employeEntryId',$employeeId)->get();
        $singleEmployeeBanking = EmployeeBankingEntry::with('bankTypeEntry','bankEntry')->where('employeEntryId',$employeeId)->get();

        return ['singleEmployeeInfo' => $singleEmployeeInfo, 'singleEmployeeEducation' => $singleEmployeeEducation,
        'singleEmployeeProfessional' => $singleEmployeeProfessional, 'singleEmployeeSkill' => $singleEmployeeSkill,
        'singleEmployeeBanking' => $singleEmployeeBanking];
    }
    public function employeeStatus($shopEmployeeEntryId)
    {
        $status = ShopEmployeeEntry::where('shopEmployeeEntryId',$shopEmployeeEntryId)->first()->status;
        if ($status == 1) {
            ShopEmployeeEntry::where('shopEmployeeEntryId',$shopEmployeeEntryId)->update([
                'status' => 2,
                'updateBy' => Auth::User()->id,
            ]);

            $shopAccessName = User::where('employeeId',$shopEmployeeEntryId)->first()->shopAccessName;
            User::where('employeeId',$shopEmployeeEntryId)->update([
               'shopAccessName' => strrev($shopAccessName),
            ]);
        }
        else {
            ShopEmployeeEntry::where('shopEmployeeEntryId',$shopEmployeeEntryId)->update([
                'status' => 1,
                'updateBy' => Auth::User()->id,
            ]);
            $shopAccessName = User::where('employeeId',$shopEmployeeEntryId)->first()->shopAccessName;
            User::where('employeeId',$shopEmployeeEntryId)->update([
               'shopAccessName' => strrev($shopAccessName),
            ]);
        }
        return ['success' => "ok"];
    }
    public function salarySheetReport()
    {
        if (isset(Auth::user()->shopId)) {
           $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
           $salarySheetReports = StartSalarySetup::with('shopEmployeeName','gradeEntryList','JobDepartments')->orderBy('salarySetupId','desc')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->paginate(30);
           return ['salarySheetReports' => $salarySheetReports];
        }
        else {
            $salarySheetReports = "";
            return ['salarySheetReports' => $salarySheetReports];
        }
    }
    public function serchEmployeeSalary(Request $request)
    {

        if ($request->employeEntryId == 'all' && $request->paymentStatus == 'all' && $request->monthlyPayment == 'all' ) {
            return ['all'=> 'all'];
        }
        else {
          if (isset(Auth::user()->shopId)) {
                $employeEntryId = $request->employeEntryId;
                $paymentStatus = $request->paymentStatus;
                $monthlyPayment = $request->monthlyPayment;

                   $salarySheetReports =  StartSalarySetup::with('shopEmployeeName','gradeEntryList','JobDepartments')
                                     ->where('employeEntryId', 'LIKE', "%$employeEntryId%")
                                     ->where('paymentStatus','LIKE',"%$paymentStatus%")
                                     ->where('monthDate','LIKE',"%$monthlyPayment%")
                                     ->orderBy('salarySetupId','desc')
                                     ->paginate(20);

              if (count($salarySheetReports) > 0) {
                  return ['salarySheetReports' => $salarySheetReports];
              }
              else {
                  return ['noRecode' => 'noRecode'];
              }
          }
       }
    }
    public function salarySheetStatement($employeEntryId)
    {
          $employeeSalaryDetails = StartSalarySetup::with('shopEmployeeName','gradeEntryList','JobDepartments')->where('employeEntryId', $employeEntryId)->get();
          $employeeName = StartSalarySetup::with('shopEmployeeName')->where('employeEntryId', $employeEntryId)->first();
          return ['employeeSalaryDetails' => $employeeSalaryDetails, 'employeeName' =>$employeeName];
    }
    public function salaryGradeReport()
    {
        if (isset(Auth::user()->shopId)) {
           $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
           $gradeLists = GradeEntry::orderBy('gradeEntryId','desc')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->paginate(30);
           return ['gradeLists' => $gradeLists];
        }
        else {
            $gradeLists = GradeEntry::where('createBy',Auth::User()->id)->paginate(30);
            return ['gradeLists' => $gradeLists];
        }
    }
    public function salaryGradeSetupReport()
    {
        if (isset(Auth::user()->shopId)) {
             $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

             $employeeTypeList = ShopEmployeeType::where('shopEmployeeTypeStatus',1)->orderBy('shopEmployeeTypeId','desc')->get();
             $jobDepartmentList = JobDepartmentEntry::orderBy('jobDepartmentEntryId','desc')->get();
             $salaryGradeSetupList = SalaryGradeSetup::with('ShopEmployeeList','GradeList')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->orderBy('salaryGradeSetupId','desc')->paginate(30);
             return ['employeeTypeList' => $employeeTypeList,'jobDepartmentList' => $jobDepartmentList,'salaryGradeSetupList' => $salaryGradeSetupList];
          }
          else {
            $employeeTypeList = ShopEmployeeType::where('shopEmployeeTypeStatus',1)->orderBy('shopEmployeeTypeId','desc')->get();
            $jobDepartmentList = JobDepartmentEntry::orderBy('jobDepartmentEntryId','desc')->get();
            $salaryGradeSetupList = SalaryGradeSetup::with('ShopEmployeeList','GradeList')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->orderBy('salaryGradeSetupId','desc')->paginate(30);
            return ['employeeTypeList' => $employeeTypeList,'jobDepartmentList' => $jobDepartmentList,'salaryGradeSetupList' => $salaryGradeSetupList];
          }
    }
    public function jobDepartmentReport()
    {
        $jobDepartmentOwnerList = JobDepartmentEntry::orderBy('jobDepartmentEntryId','desc')->where('createBy',Auth::User()->id)->paginate(20);
        $jobDepartmentGlobalList = JobDepartmentEntry::orderBy('jobDepartmentEntryId','desc')->where('createBy','!=',Auth::User()->id)->paginate(20);
        return ['jobDepartmentOwnerList'=> $jobDepartmentOwnerList,'jobDepartmentGlobalList' => $jobDepartmentGlobalList];
    }
    public function holidaySetupReport()
    {
        $holidaySetupOWnerList = AdminHolidaySetup::with('adminHolidayTypeRelation')->where('createBy',Auth::User()->id)->paginate(20);
        $holidaySetupGlobalList = AdminHolidaySetup::with('adminHolidayTypeRelation')->where('createBy','!=',Auth::User()->id)->paginate(20);
        return ['holidaySetupOWnerList' => $holidaySetupOWnerList,'holidaySetupGlobalList' => $holidaySetupGlobalList];
     }
    public function leaveReport()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
        $leaveReportLists = EmployeeLeaveEntry::with('employeeName')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->latest()->paginate(20);

        return ['leaveReportLists' => $leaveReportLists];
     }
    public function employeeAttendanceReport()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;

          $employeeNames = ShopEmployeeEntry::select('shopEmployeeEntryId','fullName')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->latest()->get();

          $attendanceReports = EmployeeAttendance::where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->orderBy('employeeAttendanceId','asc')->get();

          return ['employeeNames' => $employeeNames, 'attendanceReports' => $attendanceReports];
     }

}
