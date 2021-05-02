<?php

namespace App\Http\Controllers\ShopInformation\BranchInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShopInformation\BranchInformation\BranchInformation;
use App\Http\Resources\ShopInformation\BranchInformation\BranchInformation as BranchInformationResource;
use Illuminate\Support\Facades\Auth;


class BranchInformationController extends Controller
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
        return  BranchInformationResource::collection(BranchInformation::orderBy('id','DESC')->get());
    }


    public function branchInformationByShop(){
        $shopId = Auth::user()->id;
        $data = BranchInformation::where('shopId',$shopId)->get();
        return ['data' => $data];
    }


    public function getBranchCode(){
        
        $shopId = Auth::user()->id;
        if(BranchInformation::where('shopId',$shopId)->orderBy('id','DESC')->first()){
        $select = BranchInformation::where('shopId',$shopId)->orderBy('id','DESC')->first();
        $new_code = (int)$select->branchCode;
        $new_code = ++$new_code;
        }
        else{
            $new_code = 1;
        }

        $branchCode = $new_code;
 
         
        return ['branchCode'=>"$branchCode"];
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
            'branchName' => 'required', 
            'branchCode' => 'required',
            'branchMobileNo' => 'required',
            'branchRepresentativeName' => 'required',
            'branchRepresentativeMobileNo' => 'required',
            'branchAddress' => 'required',
            // 'email' => 'required | unique:admins',
        ],
        [
            'branchName.required' => "Enter Branch Name.", 
            'branchCode.required' => "Enter Branch Code.",
            'branchMobileNo.required' => "Enter Branch Mobile No.",
            'branchRepresentativeName.required' => "Enter Branch Representative Name.",
            'branchRepresentativeMobileNo.required' => "Enter Branch Representative Mobile No.",
            'branchAddress.required' => "Enter Branch Address.",
        ]);


        $BranchInformation = new BranchInformation();

        $branchName = $request->get('branchName'); 
        $branchCode = $request->get('branchCode');
        $branchMobileNo = $request->get('branchMobileNo');
        $branchRepresentativeName = $request->get('branchRepresentativeName');
        $branchRepresentativeMobileNo = $request->get('branchRepresentativeMobileNo');
        $branchAddress = $request->get('branchAddress');

        $shopId = Auth::user()->id;
        $BranchInformation->shopId = $shopId;
        $BranchInformation->branchName = $branchName; 
        $BranchInformation->branchCode = $branchCode;
        $BranchInformation->branchMobileNo = $branchMobileNo;
        $BranchInformation->branchRepresentativeName = $branchRepresentativeName;
        $BranchInformation->branchRepresentativeMobileNo = $branchRepresentativeMobileNo;
        $BranchInformation->branchAddress = $branchAddress;
        $BranchInformation->paymentStatus = 0;
        $BranchInformation->status = 1;
        $BranchInformation->deleteStatus = 1;
        $BranchInformation->createBy = 1;
        
        $insert = $BranchInformation->save();

        return ['data' => $insert];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $select_data = BranchInformation::where('id',$id)->first();
        return ['data'=>$select_data];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BranchInformation::where('id',$id)->first();
        return response()->json($data);
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
            'branchName' => 'required', 
            'branchCode' => 'required',
            'branchMobileNo' => 'required',
            'branchRepresentativeName' => 'required',
            'branchRepresentativeMobileNo' => 'required',
            'branchAddress' => 'required',
            // 'email' => 'required | unique:admins',
        ],
        [
            'branchName.required' => "Enter Branch Name.", 
            'branchCode.required' => "Enter Branch Code.",
            'branchMobileNo.required' => "Enter Branch Mobile No.",
            'branchRepresentativeName.required' => "Enter Branch Representative Name.",
            'branchRepresentativeMobileNo.required' => "Enter Branch Representative Mobile No.",
            'branchAddress.required' => "Enter Branch Address.",
        ]);


        $BranchInformation =  BranchInformation::find($id);

        $branchName = $request->get('branchName'); 
        $branchCode = $request->get('branchCode');
        $branchMobileNo = $request->get('branchMobileNo');
        $branchRepresentativeName = $request->get('branchRepresentativeName');
        $branchRepresentativeMobileNo = $request->get('branchRepresentativeMobileNo');
        $branchAddress = $request->get('branchAddress');


        $BranchInformation->shopId = 1;
        $BranchInformation->branchName = $branchName; 
        $BranchInformation->branchCode = $branchCode;
        $BranchInformation->branchMobileNo = $branchMobileNo;
        $BranchInformation->branchRepresentativeName = $branchRepresentativeName;
        $BranchInformation->branchRepresentativeMobileNo = $branchRepresentativeMobileNo;
        $BranchInformation->branchAddress = $branchAddress;
        $BranchInformation->paymentStatus = 0;
        $BranchInformation->status = 1;
        $BranchInformation->deleteStatus = 1;
        $BranchInformation->createBy = 1;
        
        $update = $BranchInformation->update();

        return ['data' => $update];
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
