<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopEmployeeEntry;
use App\ShopEmployeeType;
use App\JobDepartmentEntry;
use App\ShopInformation;
use App\AdminNameOfInstitute;
use App\AdminNameOfDegree;
use App\AdminSkillGrade;
use App\AdminGrade;
use App\EmployeeEducationEntry;
use App\EmployeeProfessionalEntry;
use App\EmployeeSkillEntry;
use App\EmployeeBankingEntry;
use App\BankEntry;
use App\User;
use Carbon\Carbon;
use Auth;

class ShopEmployeeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    public function employeeNameList()
    {
        if (isset(Auth::User()->shopId)) {
           $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
           $employeeName = ShopEmployeeEntry::with('shopEmployeeTypes','JobDepartments')->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->latest()->get();
           return ['employeeName' => $employeeName];
        }
        else {
            $employeeName = ShopEmployeeEntry::with('shopEmployeeTypes','JobDepartments')->where('createBy',Auth::User()->id)->latest()->latest()->get();
            return ['employeeName' => $employeeName];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeTypeList = JobDepartmentEntry::with('employeeTypeName')->orderBy('jobDepartmentEntryId','desc')->distinct()->get('employeeTypeId');
        return ['employeeTypeList' => $employeeTypeList];
    }
    public function bankTypeList()
    {
          $bankTypeList = BankEntry::with('BankTypeEntry')->orderBy('bankEntryId','desc')->distinct()->get('bankTypeEntryId');
          return ['bankTypeList'=> $bankTypeList];
    }
    public function bankNameList($bankTypeId)
    {
          $bankNameList = BankEntry::where('bankTypeEntryId',$bankTypeId)->orderBy('bankEntryId','desc')->get();
          return ['bankNameList'=> $bankNameList];
    }
    public function educationInformation()
    {
        $instituteList = AdminNameOfInstitute::orderBy('nameOfInstituteId','desc')->get();
        $degreeList = AdminNameOfDegree::orderBy('nameOfDegreeId','desc')->get();
        $skillGradeList = AdminSkillGrade::orderBy('skillGradeId','desc')->get();
        $gradeList = AdminGrade::orderBy('gradeId','desc')->get();

        return ['instituteList' => $instituteList, 'degreeList' => $degreeList, 'skillGradeList' => $skillGradeList, 'gradeList' => $gradeList];
    }

    public function educationEntry(Request $request)
    {
        $this->validate($request, [
             'employeEntryId' => 'required',
             'nameOfInstituteId' => 'required',
             'nameOfDegreeId' => 'required',
             'gradeId' => 'required',
         ]);
         if (isset(Auth::User()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
         }
         if (EmployeeEducationEntry::where('employeEntryId',$request->employeEntryId)->where('nameOfInstituteId',$request->nameOfInstituteId)->where('nameOfDegreeId',$request->nameOfDegreeId)->where('gradeId',$request->gradeId)->exists()) {
            return ['employeeAlreadyEntry' => 'Already Employee Education Information Entry'];
         }
         else {
             $EmployeeEducationEntry = new EmployeeEducationEntry ();
             $EmployeeEducationEntry->employeEntryId = $request->employeEntryId;
             $EmployeeEducationEntry->nameOfInstituteId = $request->nameOfInstituteId;
             $EmployeeEducationEntry->nameOfDegreeId = $request->nameOfDegreeId;
             $EmployeeEducationEntry->gradeId = $request->gradeId;
             $EmployeeEducationEntry->shopId = Auth::User()->shopId;
             $EmployeeEducationEntry->shopTypeId = $shopTypeId;
             $EmployeeEducationEntry->createBy = Auth::User()->id;
             $EmployeeEducationEntry->created_at = Carbon::now();
             $EmployeeEducationEntry->save();
         }

    }
    public function professionalEntry(Request $request)
    {
        $this->validate($request, [
             'employeEntryId' => 'required',
             'organizationName' => 'required',
             'designation' => 'required',
             'yearOfExprience' => 'required',
             'address' => 'required',
         ]);
         if (isset(Auth::User()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
         }
         if (EmployeeProfessionalEntry::where('employeEntryId',$request->employeEntryId)->where('organizationName',$request->organizationName)->where('designation',$request->designation)->where('yearOfExprience',$request->yearOfExprience)->exists()) {
            return ['employeeAlreadyEntry' => 'Already Employee Professional Information Entry'];
         }
         else {
             $EmployeeProfessionalEntry = new EmployeeProfessionalEntry ();
             $EmployeeProfessionalEntry->employeEntryId = $request->employeEntryId;
             $EmployeeProfessionalEntry->organizationName = $request->organizationName;
             $EmployeeProfessionalEntry->designation = $request->designation;
             $EmployeeProfessionalEntry->yearOfExprience = $request->yearOfExprience;
             $EmployeeProfessionalEntry->address = $request->address;
             $EmployeeProfessionalEntry->shopId = Auth::User()->shopId;
             $EmployeeProfessionalEntry->shopTypeId = $shopTypeId;
             $EmployeeProfessionalEntry->createBy = Auth::User()->id;
             $EmployeeProfessionalEntry->created_at = Carbon::now();
             $EmployeeProfessionalEntry->save();
         }

    }
    public function skillEntry(Request $request)
    {
        $this->validate($request, [
             'employeEntryId' => 'required',
             'skillType' => 'required',
             'nameOfInstitute' => 'required',
             'durationOfSkill' => 'required',
             'skillGradeId' => 'required',
         ]);
         if (isset(Auth::User()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
         }
         if (EmployeeSkillEntry::where('employeEntryId',$request->employeEntryId)->where('skillType',$request->skillType)->where('nameOfInstitute',$request->nameOfInstitute)->where('durationOfSkill',$request->durationOfSkill)->where('skillGradeId',$request->skillGradeId)->exists()) {
            return ['employeeAlreadyEntry' => 'Already Employee Professional Information Entry'];
         }
         else {
             $EmployeeSkillEntry = new EmployeeSkillEntry ();
             $EmployeeSkillEntry->employeEntryId = $request->employeEntryId;
             $EmployeeSkillEntry->skillType = $request->skillType;
             $EmployeeSkillEntry->nameOfInstitute = $request->nameOfInstitute;
             $EmployeeSkillEntry->durationOfSkill = $request->durationOfSkill;
             $EmployeeSkillEntry->skillGradeId = $request->skillGradeId;
             $EmployeeSkillEntry->shopId = Auth::User()->shopId;
             $EmployeeSkillEntry->shopTypeId = $shopTypeId;
             $EmployeeSkillEntry->createBy = Auth::User()->id;
             $EmployeeSkillEntry->created_at = Carbon::now();
             $EmployeeSkillEntry->save();
         }

    }
    public function bankingEntry(Request $request)
    {
        $this->validate($request, [
             'employeEntryId' => 'required',
             'bankTypeId' => 'required',
             'bankNameId' => 'required',
             'accountName' => 'required',
             'accountNumber' => 'required',
         ]);
         if (isset(Auth::User()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
         }
         if (EmployeeBankingEntry::where('employeEntryId',$request->employeEntryId)->where('bankTypeId',$request->bankTypeId)->where('bankNameId',$request->bankNameId)->where('accountName',$request->accountName)->where('accountNumber',$request->accountNumber)->exists()) {
            return ['employeeAlreadyEntry' => 'Already Employee Banking Information Entry'];
         }
         else {
             $EmployeeBankingEntry = new EmployeeBankingEntry ();
             $EmployeeBankingEntry->employeEntryId = $request->employeEntryId;
             $EmployeeBankingEntry->bankTypeId = $request->bankTypeId;
             $EmployeeBankingEntry->bankNameId = $request->bankNameId;
             $EmployeeBankingEntry->accountName = $request->accountName;
             $EmployeeBankingEntry->accountNumber = $request->accountNumber;
             $EmployeeBankingEntry->shopId = Auth::User()->shopId;
             $EmployeeBankingEntry->shopTypeId = $shopTypeId;
             $EmployeeBankingEntry->createBy = Auth::User()->id;
             $EmployeeBankingEntry->created_at = Carbon::now();
             $EmployeeBankingEntry->save();
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
           'employeeTypeId' => 'required',
           'jobDepartmentId' => 'required',
           'userName' => 'required|unique:shop_employee_entries,userName',
           'password' => 'required',
           'fullName' => 'required',
           'fatherName' => 'required',
           'motherName' => 'required',
           'dateOfBirth' => 'required',
           'phoneNumber' => 'required',
           'religion' => 'required',
           'sex' => 'required',
           'maritalStatus' => 'required',
           'nidNumber' => 'required',
           'nationality' => 'required',
           'presentAddress' => 'required',
           'permanentAddress' => 'required',
       ]);

        if (isset(Auth::User()->shopId)) {
           $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
        }
        $shopEmployeeEntryId = ShopEmployeeEntry::insertGetId([
            'employeeTypeId' => $request->employeeTypeId,
            'jobDepartmentId' => $request->jobDepartmentId,
            'userName' => $request->userName,
            'password' => $request->password,
            'fullName' => $request->fullName,
            'fatherName' => $request->fatherName,
            'motherName' => $request->motherName,
            'dateOfBirth' => $request->dateOfBirth,
            'phoneNumber' => $request->phoneNumber,
            'religion' => $request->religion,
            'sex' => $request->sex,
            'maritalStatus' => $request->maritalStatus,
            'nidNumber' => $request->nidNumber,
            'nationality' => $request->nationality,
            'presentAddress' => $request->presentAddress,
            'permanentAddress' => $request->permanentAddress,
            'shopId' => Auth::User()->shopId,
            'shopTypeId' => $shopTypeId,
            'createBy' => Auth::User()->id,
            'created_at' => Carbon::now(),
        ]);
        User::insert([
            'name' => $request->fullName,
            'phone' => $request->phoneNumber,
            'employeeId' => $shopEmployeeEntryId,
            'shopAccessName' => $request->userName,
            'password' => bcrypt($request->password),
            'address' => $request->presentAddress,
            'role' => 4,
            'createBy' => Auth::User()->id,
            'created_at' => Carbon::now(),
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employeeTypeId)
    {
        $jobDepartmentList = JobDepartmentEntry::where('employeeTypeId',$employeeTypeId)->get();
        return ['jobDepartmentList' => $jobDepartmentList];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($shopEmployeeEntryId)
    {
        $singleShopEmployeeInfo = ShopEmployeeEntry::where('shopEmployeeEntryId',$shopEmployeeEntryId)->first();
        $jobDepartmentList = JobDepartmentEntry::where('employeeTypeId',$singleShopEmployeeInfo->employeeTypeId)->get();
        return ['singleShopEmployeeInfo' => $singleShopEmployeeInfo,'jobDepartmentList' => $jobDepartmentList];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $shopEmployeeEntryId)
    {
          $this->validate($request, [
               'employeeTypeId' => 'required',
               'jobDepartmentId' => 'required',
               'userName' => 'required',
               'password' => 'required',
               'fullName' => 'required',
               'fatherName' => 'required',
               'motherName' => 'required',
               'dateOfBirth' => 'required',
               'phoneNumber' => 'required',
               'religion' => 'required',
               'sex' => 'required',
               'maritalStatus' => 'required',
               'nidNumber' => 'required',
               'nationality' => 'required',
               'presentAddress' => 'required',
               'permanentAddress' => 'required',
           ]);
          if (ShopEmployeeEntry::where('userName',$request->userName)->where('shopEmployeeEntryId','!=',$shopEmployeeEntryId)->exists()) {
              return ['userName' => "Please Change Employee User Name"];
          }
          else {
                  ShopEmployeeEntry::where('shopEmployeeEntryId',$shopEmployeeEntryId)->update([
                      'employeeTypeId' => $request->employeeTypeId,
                      'jobDepartmentId' => $request->jobDepartmentId,
                      'userName' => $request->userName,
                      'password' => $request->password,
                      'fullName' => $request->fullName,
                      'fatherName' => $request->fatherName,
                      'motherName' => $request->motherName,
                      'dateOfBirth' => $request->dateOfBirth,
                      'phoneNumber' => $request->phoneNumber,
                      'religion' => $request->religion,
                      'sex' => $request->sex,
                      'maritalStatus' => $request->maritalStatus,
                      'nidNumber' => $request->nidNumber,
                      'nationality' => $request->nationality,
                      'presentAddress' => $request->presentAddress,
                      'permanentAddress' => $request->permanentAddress,
                      'updateBy' => Auth::User()->id,
                  ]);

                User::where('employeeId',$shopEmployeeEntryId)->update([
                    'name' => $request->fullName,
                    'phone' => $request->phoneNumber,
                    'shopAccessName' => $request->userName,
                    'password' => bcrypt($request->password),
                    'address' => $request->presentAddress,
                    'updateBy' => Auth::User()->id,
                ]);

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
