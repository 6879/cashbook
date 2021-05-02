<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AdminSetup;
use App\AdminEntry;
use App\AdminType;
use Carbon\Carbon;
use Auth;

class AdminSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $adminSetup = AdminSetup::with('adminTypeRelation','adminEntryRelation')->orderBy('adminSetupId','desc')->paginate(20);
          return  ['adminSetup' => $adminSetup];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adminEntry = AdminEntry::orderBy('adminId','desc')->get();
        return  ['adminEntry' => $adminEntry];
    }
    public function admintypename()
    {
        $adminTypeName = AdminType::orderBy('adminTypeId','asc')->get();
        return  ['adminTypeName' => $adminTypeName];
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
          'adminId' => 'required',
          'adminTypeId' => 'required',
      ],
      [
        'adminId.required' => 'Enter Admin Name',
        'adminTypeId.required' => 'Enter Type Name',
      ]);

        if (AdminSetup::where('adminTypeId',$request->adminTypeId)->where('adminId',$request->adminId)->exists()){
            return ['changeAdminType'=>'Change Your Admin Type'];
        }
        else{
            AdminSetup::insert([
                'adminId' => $request->adminId,
                'adminTypeId' => $request->adminTypeId,
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
        $data = AdminSetup::where('adminSetupId',$id);
        $data->delete();
    }
}
