<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\AccountSetup;
use App\AccountSetupHeadList;
use App\AccountSetupPlacementList;

class accountSetupController extends Controller
{

    
    
    public function __construct()
    {
        $this->middleware('auth:,admin');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AccountSetup::get();
        $accountSetupHeadNameList = AccountSetupHeadList::get();
        return [
            'accountSetup' => $data,
            'viewAccountSetupHeadNameList' => $accountSetupHeadNameList,
        ];
    }



    public function placementTypeList(){
        
        $placementTypeList = AccountSetupPlacementList::get();
        return ['placementTypeList' => $placementTypeList];

    }

    public function accountSetupHeadNameList($id){
        
        $accountSetupHeadNameList = AccountSetupHeadList::where('placementId',$id)->get();
        return ['accountSetupHeadNameList' => $accountSetupHeadNameList];

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
            'placementType' => 'required',
            'headName' => 'required',
            'headCode' => 'required',
        ],
        [
          'placementType.required' => 'Select Placement Type',
          'headCode.required' => 'Enter Head Code',
          'headName.required' => 'Enter Head Name',
        ]);
            
         
        AccountSetup::insert([
                  'placementType' => $request->placementType,
                  'headCode' => $request->headCode,
                  'headName' => $request->headName,
                  'createBy' => Auth::user()->id,
                  'created_at' => Carbon::now(),
              ]);
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
        $data = AccountSetup::where('id',$id)->first();
        $placementType = AccountSetup::where('id',$id)->first()->placementType;
        $accountSetupHeadNameList = AccountSetupHeadList::where('placementId',$placementType)->get();
        return [
                'data' => $data,
                'accountSetupHeadNameList' => $accountSetupHeadNameList,
               ];
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
       
        $this->validate($request, [
            'placementType' => 'required',
            'headName' => 'required',
            'headCode' => 'required',
        ],
        [
          'placementType.required' => 'Select Placement Type',
          'headCode.required' => 'Enter Head Code',
          'headName.required' => 'Enter Head Name',
        ]);
            
         
        AccountSetup::where('id',$id)->update([
                  'placementType' => $request->placementType,
                  'headCode' => $request->headCode,
                  'headName' => $request->headName,
                  'updateBy' => Auth::user()->id
              ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AccountSetup::where('id',$id)->delete();
    }
}
