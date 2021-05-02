<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminNameOfInstitute;
use App\AdminNameOfDegree;
use App\AdminSkillGrade;
use App\AdminGrade;
use Carbon\Carbon;
use Auth;

class AdminEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituteList = AdminNameOfInstitute::orderBy('nameOfInstituteId','desc')->paginate(20);
        $degreeList = AdminNameOfDegree::orderBy('nameOfDegreeId','desc')->paginate(20);
        $skillGradeList = AdminSkillGrade::orderBy('skillGradeId','desc')->paginate(20);
        $gradeList = AdminGrade::orderBy('gradeId','desc')->paginate(20);

        return ['instituteList' => $instituteList, 'degreeList' => $degreeList, 'skillGradeList' => $skillGradeList, 'gradeList' => $gradeList];
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

        if (isset($request->nameOfInstitute)) {
            if (AdminNameOfInstitute::where('nameOfInstitute',$request->nameOfInstitute)->exists()) {
               return ['changeNameInstitute' => 'Change Your Name Of Institute'];
            }
            else {
                $AdminNameOfInstitute = new AdminNameOfInstitute();
                $AdminNameOfInstitute->nameOfInstitute = $request->nameOfInstitute;
                $AdminNameOfInstitute->instituteStatus = $request->instituteStatus;
                $AdminNameOfInstitute->createBy = Auth::User()->id;
                $AdminNameOfInstitute->created_at = Carbon::now();
                $AdminNameOfInstitute->save();
            }
        }

        if (isset($request->nameOfDegree)) {
            if (AdminNameOfDegree::where('nameOfDegree',$request->nameOfDegree)->exists()) {
               return ['changeNameDegree' => 'Change Your Name Of Degree'];
            }
            else {
                $AdminNameOfDegree = new AdminNameOfDegree();
                $AdminNameOfDegree->nameOfDegree = $request->nameOfDegree;
                $AdminNameOfDegree->degreeStatus = $request->degreeStatus;
                $AdminNameOfDegree->createBy = Auth::User()->id;
                $AdminNameOfDegree->created_at = Carbon::now();
                $AdminNameOfDegree->save();
            }
        }
        if (isset($request->grade)) {
            if (AdminGrade::where('grade',$request->grade)->exists()) {
               return ['changeGrade' => 'Change Your Grade'];
            }
            else {
                $AdminGrade = new AdminGrade();
                $AdminGrade->grade = $request->grade;
                $AdminGrade->gradeStatus = $request->gradeStatus;
                $AdminGrade->createBy = Auth::User()->id;
                $AdminGrade->created_at = Carbon::now();
                $AdminGrade->save();
            }
        }
        if (isset($request->skillGrade)) {
            if (AdminSkillGrade::where('skillGrade',$request->skillGrade)->exists()) {
               return ['changeSkillGrade' => 'Change Your Skill Grade'];
            }
            else {
                $AdminSkillGrade = new  AdminSkillGrade();
                $AdminSkillGrade->skillGrade = $request->skillGrade;
                $AdminSkillGrade->skillGradeStatus = $request->skillGradeStatus;
                $AdminSkillGrade->createBy = Auth::User()->id;
                $AdminSkillGrade->created_at = Carbon::now();
                $AdminSkillGrade->save();
            }
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nameOfInstituteId)
    {
        $instituteStatus = AdminNameOfInstitute::where('nameOfInstituteId',$nameOfInstituteId)->first()->instituteStatus;
        if ($instituteStatus == 1) {
            AdminNameOfInstitute::where('nameOfInstituteId', $nameOfInstituteId)->update([
                'instituteStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else {
            AdminNameOfInstitute::where('nameOfInstituteId', $nameOfInstituteId)->update([
                'instituteStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
    }
    public function degreeChangeStatus($nameOfDegreeId)
    {
        $degreeStatus = AdminNameOfDegree::where('nameOfDegreeId',$nameOfDegreeId)->first()->degreeStatus;
        if ($degreeStatus == 1) {
            AdminNameOfDegree::where('nameOfDegreeId', $nameOfDegreeId)->update([
                'degreeStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else {
            AdminNameOfDegree::where('nameOfDegreeId', $nameOfDegreeId)->update([
                'degreeStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
    }
    public function gradeChangeStatus($gradeId)
    {
        $gradeStatus = AdminGrade::where('gradeId',$gradeId)->first()->gradeStatus;
        if ($gradeStatus == 1) {
            AdminGrade::where('gradeId', $gradeId)->update([
                'gradeStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else {
            AdminGrade::where('gradeId', $gradeId)->update([
                'gradeStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
    }
    public function skillGradeChangeStatus($skillGradeId)
    {
        $skillGradeStatus = AdminSkillGrade::where('skillGradeId',$skillGradeId)->first()->skillGradeStatus;
        if ($skillGradeStatus == 1) {
            AdminSkillGrade::where('skillGradeId', $skillGradeId)->update([
                'skillGradeStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else {
            AdminSkillGrade::where('skillGradeId', $skillGradeId)->update([
                'skillGradeStatus' => 1,
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
    public function edit($nameOfInstituteId)
    {
        $nameOfInstitute = AdminNameOfInstitute::where('nameOfInstituteId',$nameOfInstituteId)->first();
        return ['nameOfInstitute' => $nameOfInstitute];
    }
    public function nameOfDegreeEdit($nameOfDegreeId)
    {
        $nameOfDegree = AdminNameOfDegree::where('nameOfDegreeId',$nameOfDegreeId)->first();
        return ['nameOfDegree' => $nameOfDegree];
    }
    public function gradeEditData($gradeId)
    {
        $grade = AdminGrade::where('gradeId',$gradeId)->first();
        return ['grade' => $grade];
    }
    public function skillGradeEditData($skillGradeId)
    {
        $skillGrade = AdminSkillGrade::where('skillGradeId',$skillGradeId)->first();
        return ['skillGrade' => $skillGrade];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $nameOfInstituteId)
    {
        if (AdminNameOfInstitute::where('nameOfInstitute',$request->nameOfInstitute)->where('nameOfInstituteId','!=',$nameOfInstituteId)->exists()) {
           return ['changeNameInstitute' => 'Change Your Name Of Institute'];
        }
        else {
          AdminNameOfInstitute::where('nameOfInstituteId',$nameOfInstituteId)->update([
              'nameOfInstitute' => $request->nameOfInstitute,
              'instituteStatus' => $request->instituteStatus,
              'updateBy' => Auth::user()->id,
          ]);
        }
    }
   public function nameOfDegreeUpdate(Request $request)
    {
        if (AdminNameOfDegree::where('nameOfDegree',$request->nameOfDegree)->where('nameOfDegreeId','!=',$request->nameOfDegreeId)->exists()) {
           return ['changeNameDegree' => 'Change Your Name Of Degree'];
        }
        else {
          AdminNameOfDegree::where('nameOfDegreeId',$request->nameOfDegreeId)->update([
              'nameOfDegree' => $request->nameOfDegree,
              'degreeStatus' => $request->degreeStatus,
              'updateBy' => Auth::user()->id,
          ]);
        }
    }
   public function gradeUpdate(Request $request)
    {
        if (AdminGrade::where('grade',$request->grade)->where('gradeId','!=',$request->gradeId)->exists()) {
           return ['changeGrade' => 'Change Your Grade'];
        }
        else {
          AdminGrade::where('gradeId',$request->gradeId)->update([
              'grade' => $request->grade,
              'gradeStatus' => $request->gradeStatus,
              'updateBy' => Auth::user()->id,
          ]);
        }
    }
   public function skillGradeUpdate(Request $request)
    {
        if (AdminSkillGrade::where('skillGrade',$request->skillGrade)->where('skillGradeId','!=',$request->skillGradeId)->exists()) {
           return ['changeSkillGrade' => 'Change Your Skill Grade'];
        }
        else {
          AdminSkillGrade::where('skillGradeId',$request->skillGradeId)->update([
              'skillGrade' => $request->skillGrade,
              'skillGradeStatus' => $request->skillGradeStatus,
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
    public function destroy($nameOfInstituteId)
    {
        AdminNameOfInstitute::where('nameOfInstituteId',$nameOfInstituteId)->delete();
    }
    public function degreeDistroy($nameOfDegreeId)
    {
        AdminNameOfDegree::where('nameOfDegreeId',$nameOfDegreeId)->delete();
    }
    public function gradeDistroy($gradeId)
    {
        AdminGrade::where('gradeId',$gradeId)->delete();
    }
    public function skillGradeDistroy($skillGradeId)
    {
        AdminSkillGrade::where('skillGradeId',$skillGradeId)->delete();
    }
}
