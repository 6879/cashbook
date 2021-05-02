<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopEmployeeEntry;
use App\GradeEntry;
use App\ShopInformation;
use App\SalaryGradeSetup;
use Carbon\Carbon;
use Auth;
class SalaryGradeSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(Auth::user()->shopId)) {
             $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

             $salaryGradeSetupList = SalaryGradeSetup::with('ShopEmployeeList','GradeList')->where('createBy',Auth::User()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->orderBy('salaryGradeSetupId','desc')->paginate(30);
             return ['salaryGradeSetupList' => $salaryGradeSetupList];
          }
          else {
              $salaryGradeSetupList = SalaryGradeSetup::where('createBy',Auth::User()->id)->orderBy('salaryGradeSetupId','desc')->paginate(30);
              return ['salaryGradeSetupList' => $salaryGradeSetupList];
          }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $employeeName = ShopEmployeeEntry::orderBy('shopEmployeeEntryId','desc')->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();
            $salaryGradeList = GradeEntry::orderBy('gradeEntryId','desc')->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();
            return ['salaryGradeList' => $salaryGradeList,'employeeName' => $employeeName];
         }
    }
    public function employeeName()
    {   if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $employeeName = ShopEmployeeEntry::orderBy('shopEmployeeEntryId','desc')->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();
            return ['employeeName' => $employeeName];
         }
    }
    public function salaryGradeList()
    {   if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $salaryGradeList = GradeEntry::orderBy('gradeEntryId','desc')->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();
            return ['salaryGradeList' => $salaryGradeList];
         }
    }
    public function salaryGradeAmount($gradeEntryId)
    {
        $salaryGradeAmount = GradeEntry::where('gradeEntryId',$gradeEntryId)->first()->gradeAmount;
        return ['salaryGradeAmount' => $salaryGradeAmount];
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
              'gradeEntryId' => 'required',
              'salaryGradeSetupStatus' => 'required',
          ],
          [
             'employeEntryId.required' => 'Select Employee  Name',
             'gradeEntryId.required' => 'Select Salary Grade  Name',
             'salaryGradeSetupStatus.required' => 'Select Grade Setup Status',
          ]);

          if (isset(Auth::User()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
          }

          if (SalaryGradeSetup::where('employeEntryId',$request->employeEntryId)->where('gradeEntryId',$request->gradeEntryId)->exists()) {
            return ['gradeSetup' => 'Already Salary Grade Setup'];
          }
          else {
            $SalaryGradeSetup = new SalaryGradeSetup ();
            $SalaryGradeSetup->employeEntryId = $request->employeEntryId;
            $SalaryGradeSetup->gradeEntryId = $request->gradeEntryId;
            $SalaryGradeSetup->salaryGradeSetupStatus = $request->salaryGradeSetupStatus;
            $SalaryGradeSetup->shopId = Auth::User()->shopId;
            $SalaryGradeSetup->shopTypeId = $shopTypeId;
            $SalaryGradeSetup->createBy = Auth::User()->id;
            $SalaryGradeSetup->created_at = Carbon::now();
            $SalaryGradeSetup->save();
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($salaryGradeSetupId)
    {
        $salaryGradeSetupStatus = SalaryGradeSetup::where('salaryGradeSetupId', $salaryGradeSetupId)->first()->salaryGradeSetupStatus;

        if ($salaryGradeSetupStatus == 0){
            SalaryGradeSetup::where('salaryGradeSetupId', $salaryGradeSetupId)->update([
                'salaryGradeSetupStatus' => 1,
                'updateBy' => Auth::User()->id,
            ]);
        }
        else {
            SalaryGradeSetup::where('salaryGradeSetupId', $salaryGradeSetupId)->update([
              'salaryGradeSetupStatus' => 0,
              'updateBy' => Auth::User()->id,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($salaryGradeSetupId)
    {
       $salaryGradeSetupData = SalaryGradeSetup::where('salaryGradeSetupId', $salaryGradeSetupId)->first();

       $gradeAmount = GradeEntry::where('gradeEntryId', $salaryGradeSetupData->gradeEntryId)->first()->gradeAmount;
       return ['salaryGradeSetupData' => $salaryGradeSetupData, 'gradeAmount' => $gradeAmount];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $salaryGradeSetupId)
    {
        $this->validate($request, [
            'employeEntryId' => 'required',
            'gradeEntryId' => 'required',
            'salaryGradeSetupStatus' => 'required',
        ],
        [
           'employeEntryId.required' => 'Select Employee  Name',
           'gradeEntryId.required' => 'Select Salary Grade  Name',
           'salaryGradeSetupStatus.required' => 'Select Grade Setup Status',
        ]);

        if (SalaryGradeSetup::where('employeEntryId',$request->employeEntryId)->where('gradeEntryId',$request->gradeEntryId)->where('salaryGradeSetupId','!=',$salaryGradeSetupId)->exists()) {
           return ['changeName' => 'Change Your Grade Name'];
        }
        else {
            SalaryGradeSetup::where('salaryGradeSetupId',$salaryGradeSetupId)->update([
                'employeEntryId' => $request->employeEntryId,
                'gradeEntryId'=> $request->gradeEntryId,
                'salaryGradeSetupStatus'=> $request->salaryGradeSetupStatus,
                'updateBy'=> Auth::user()->id,
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
