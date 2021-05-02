<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GradeEntry;
use App\ShopInformation;
use Carbon\Carbon;
use Auth;

class SalaryGradeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(Auth::user()->shopId)) {
           $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
           $gradeLists = GradeEntry::where('createBy',Auth::User()->id)->orderBy('gradeEntryId','desc')->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->paginate(30);
           return ['gradeLists' => $gradeLists];
        }
        else {
            $gradeLists = GradeEntry::where('createBy',Auth::User()->id)->orderBy('gradeEntryId','desc')->paginate(30);
            return ['gradeLists' => $gradeLists];
        }
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
        $request->validate([
            'gradeName' => 'required|unique:grade_entries,gradeName',
            'gradeAmount' => 'required|numeric',
            'gradeStatus' => 'required',
        ],
        [
            'gradeName.required' => 'Enter Grade Name',
            'gradeAmount.required' => 'Enter Grade Amount',
            'gradeStatus.required' => 'Select Grade Status',
        ]);

        if (isset(Auth::user()->shopId)) {
           $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
        }

        $GradeEntry = new GradeEntry();
        $GradeEntry->gradeName = $request->gradeName;
        $GradeEntry->gradeAmount = $request->gradeAmount;
        $GradeEntry->gradeStatus = $request->gradeStatus;
        $GradeEntry->shopId = Auth::User()->shopId;
        $GradeEntry->shopTypeId = $shopTypeId;
        $GradeEntry->createBy = Auth::User()->id;
        $GradeEntry->created_at = Carbon::now();
        $GradeEntry->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($gradeEntryId)
    {
        $gradeStatus = GradeEntry::where('gradeEntryId', $gradeEntryId)->first()->gradeStatus;

        if ($gradeStatus == 0){
            GradeEntry::where('gradeEntryId', $gradeEntryId)->update([
                'gradeStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
        if ($gradeStatus == 1){
            GradeEntry::where('gradeEntryId', $gradeEntryId)->update([
                'gradeStatus' => 0,
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
    public function edit($gradeEntryId)
    {
        $gradeSingleShow = GradeEntry::where('gradeEntryId', $gradeEntryId)->first();
        return ['gradeSingleShow' => $gradeSingleShow];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gradeEntryId)
    {
        $request->validate([
            'gradeName' => 'required',
            'gradeAmount' => 'required|numeric',
            'gradeStatus' => 'required',
        ],
        [
            'gradeName.required' => 'Enter Grade Name',
            'gradeAmount.required' => 'Enter Grade Amount',
            'gradeStatus.required' => 'Select Grade Status',
        ]);

        if (GradeEntry::where('gradeName',$request->gradeName)->where('gradeEntryId','!=',$gradeEntryId)->exists()) {
           return ['changeName' => 'Change Your Grade Name'];
        }
        else {
            GradeEntry::where('gradeEntryId',$gradeEntryId)->update([
                'gradeName' => $request->gradeName,
                'gradeAmount'=> $request->gradeAmount,
                'gradeStatus'=> $request->gradeStatus,
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
