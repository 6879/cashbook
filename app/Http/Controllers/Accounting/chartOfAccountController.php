<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ChartOfAccount;
use App\AccountGroup;
use App\chartOfAccountGroupType;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class chartOfAccountController extends Controller
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
        $chartOfAccounts = ChartOfAccount::orderBy('headCode','ASC')->get();
        return ['chartOfAccounts' => $chartOfAccounts];
    }



    public function getAccountGroup(){
        $accountGroups = AccountGroup::get();
        return ['accountGroups' => $accountGroups];
    }

    public function chartOfAccountGroupType(){
        $accountGroupTypes = chartOfAccountGroupType::get();
        return ['accountGroupTypes' => $accountGroupTypes];
    }


    public function getUplinkInformation($id){

        if(ChartOfAccount::where('id',$id)->exists()){
         
        $code = ChartOfAccount::where('id',$id)->first()->headCode;
        $lavel = ChartOfAccount::where('id',$id)->first()->headLavel+1;
        if(ChartOfAccount::where('headLavel',$lavel)->where('headCode','like',"$code%")->exists()){
        $newCode = ChartOfAccount::where('headLavel',$lavel)->where('headCode','like',"$code%")->orderBy('headCode','DESC')->first()->headCode+1;
        }
        else{
            $newCode = $code.'01';
        }

        }
        else{
            $lavel = 1;
            if(ChartOfAccount::where('headLavel',1)->orderBy('headCode','DESC')->exists()){
            $newCode = ChartOfAccount::where('headLavel',1)->orderBy('headCode','DESC')->first()->headCode+1;
            }else{
                $newCode = 1;
            }
        }

 
 
        

        return [
            'lavel' => $lavel,
            'code' => $newCode,
        ];
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
            'headCode' => 'required',
            'headName' => 'required',
        ],
        [
          'headCode.required' => 'Enter Head Code',
          'headName.required' => 'Enter Head Name',
        ]);
            
        if(ChartOfAccount::where('id',$request->headUpLink)->exists()){
            $code = ChartOfAccount::where('id',$request->headUpLink)->first()->headCode;
        }else{
            $code = 0;
        }
        ChartOfAccount::insert([
                  'headGroupType' => $request->headGroupType,
                  'headGroupId' => $request->headGroupId,
                  'dr_cr' => $request->dr_cr,
                  'pre_code' => $code,
                  'headCode' => $request->headCode,
                  'headName' => $request->headName,
                  'headLavel' => $request->headLavel,
                  'lastCode' => 0,
                  'status' => 1,
                  'position' => 0,
                  'autoCreate' => 0,
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
        $data = chartOfAccount::where('id',$id)->first();
        return ['data' => $data];
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
        $update = chartOfAccount::where('id',$id)->update([
            
            'headName' => $request->headName,
            'dr_cr' => $request->dr_cr,
            'headGroupId' => $request->headGroupId,
            'headGroupType' => $request->headGroupType
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
        $delete = chartOfAccount::where('id',$id)->delete();
    }



}
