<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopEmployeeType;
use App\ShopInformation;
use Carbon\Carbon;
use Auth;
class ShopEmployeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if (Auth::User()->role == 1) {
             $employeeTypeList = ShopEmployeeType::orderBy('shopEmployeeTypeId','desc')->where('shopTypeId', 0)->where('createBy',Auth::User()->id)->paginate(20);
             return ['employeeTypeList' => $employeeTypeList];
         }
         else {
             $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
             $employeeTypeList = ShopEmployeeType::orderBy('shopEmployeeTypeId','desc')->where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->paginate(20);
             return ['employeeTypeList' => $employeeTypeList];
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
        $this->validate($request, [
            'shopEmployeeTypeName' => 'required|unique:shop_employee_types,shopEmployeeTypeName',
        ],
        [
            'shopEmployeeTypeName.required' => "Enter Employee Type Name",
        ]);
        if (isset(Auth::User()->shopId)) {
           $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
        }

        if (Auth::User()->role == 1) {
            $shopEmployeeType = new ShopEmployeeType;
            $shopEmployeeType->shopEmployeeTypeName = $request->shopEmployeeTypeName;
            $shopEmployeeType->shopEmployeeTypeStatus = true;
            $shopEmployeeType->shopId = 0;
            $shopEmployeeType->shopTypeId = 0;
            $shopEmployeeType->createBy = Auth::user()->id;
            $shopEmployeeType->created_at = Carbon::now();
            $shopEmployeeType->save();
        }
        else {
            $shopEmployeeType = new ShopEmployeeType;
            $shopEmployeeType->shopEmployeeTypeName = $request->shopEmployeeTypeName;
            $shopEmployeeType->shopEmployeeTypeStatus = true;
            $shopEmployeeType->shopId = Auth::User()->shopId;
            $shopEmployeeType->shopTypeId = $shopTypeId;
            $shopEmployeeType->createBy = Auth::user()->id;
            $shopEmployeeType->created_at = Carbon::now();
            $shopEmployeeType->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($shopEmployeeTypeId)
    {
        $shopEmployeeTypeStatus = ShopEmployeeType::where('shopEmployeeTypeId',$shopEmployeeTypeId)->first()->shopEmployeeTypeStatus;

        if($shopEmployeeTypeStatus == 1){
            ShopEmployeeType::where('shopEmployeeTypeId',$shopEmployeeTypeId)->update([
                'shopEmployeeTypeStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else{
            ShopEmployeeType::where('shopEmployeeTypeId',$shopEmployeeTypeId)->update([
                'shopEmployeeTypeStatus' => 1,
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
    public function edit($shopEmployeeTypeId)
    {
        return ShopEmployeeType::where('shopEmployeeTypeId',$shopEmployeeTypeId)->first();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $shopEmployeeTypeId)
    {
          $this->validate($request, [
              'shopEmployeeTypeName' => 'required',
          ],
          [
              'shopEmployeeTypeName.required' => "Enter Employee Type Name",
          ]);

          if (ShopEmployeeType::where('shopEmployeeTypeName',$request->shopEmployeeTypeName)->where('shopEmployeeTypeId','!=',$shopEmployeeTypeId)->exists()) {
             return ['changeName' => 'Change Your Employee Type Name'];
          }
          else {
              ShopEmployeeType::where('shopEmployeeTypeId',$shopEmployeeTypeId)->update([
                  'shopEmployeeTypeName' => $request->shopEmployeeTypeName,
                  'updateBy'=>  Auth::user()->id,
              ]);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($shopEmployeeTypeId)
    {
        ShopEmployeeType::where('shopEmployeeTypeId',$shopEmployeeTypeId)->delete();

    }
}
