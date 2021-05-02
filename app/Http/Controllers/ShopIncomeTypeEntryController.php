<?php

namespace App\Http\Controllers;

use App\ShopExpenceTypeEntry;
use App\ShopIncomeTypeEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopIncomeTypeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShopIncomeTypeEntry::orderBy('shopIncomeTypeId','desc')->get();
        $value = Auth::user();
        return  ['show' => $data, 'value'=>$value];
    }


    public function shopIncomeTypeReport()
    {
        $shopIncomeTypeOwnerReport = ShopIncomeTypeEntry::orderBy('shopIncomeTypeId','desc')->where('createBy',Auth::User()->id)->paginate(20);
        $shopIncomeTypeGlobalReport = ShopIncomeTypeEntry::orderBy('shopIncomeTypeId','desc')->where('createBy','!=',Auth::User()->id)->paginate(20);
        return  ['shopIncomeTypeOwnerReport' => $shopIncomeTypeOwnerReport,'shopIncomeTypeGlobalReport' => $shopIncomeTypeGlobalReport];
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
        $this->validate($request,[
            'shopIncomeTypeName' => 'required',
            'shopIncomeTypeStatus' => 'required',
        ],
        [
            'shopExpenceTypeName.required' => "Enter Shop Expence Type  Name",
            'shopIncomeTypeStatus.required' => "Select Shop Expence Type  Status",
        ]);

        if (ShopIncomeTypeEntry::where('shopIncomeTypeName',$request->shopIncomeTypeName)->exists()) {
             return ['changeIncomeType' => "Change Income Type Name"];
        }
        else {
            ShopIncomeTypeEntry::insert([
              'shopIncomeTypeName' => $request->shopIncomeTypeName,
              'shopIncomeTypeStatus' => $request->shopIncomeTypeStatus,
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
        $data = ShopIncomeTypeEntry::where('shopIncomeTypeId', $id)->first()->shopIncomeTypeStatus;
        if ($data == 1) {
            ShopIncomeTypeEntry::where('shopIncomeTypeId', $id)->update([
                'shopIncomeTypeStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        } else {
            ShopIncomeTypeEntry::where('shopIncomeTypeId', $id)->update([
                'shopIncomeTypeStatus' => 1,
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
    public function edit($id)
    {
        $data = ShopIncomeTypeEntry::where('shopIncomeTypeId',$id)->first();
        return ['editData'=>$data];
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
        $this->validate($request,[
            'shopIncomeTypeName' => 'required',
            'shopIncomeTypeStatus' => 'required',
        ],
        [
            'shopExpenceTypeName.required' => "Enter Shop Expence Type  Name",
            'shopIncomeTypeStatus.required' => "Select Shop Expence Type  Status",
        ]);
        if (ShopIncomeTypeEntry::where('shopIncomeTypeName',$request->shopIncomeTypeName)->where('shopIncomeTypeId','!=',$id)->exists()) {
             return ['changeIncomeType' => "Change Income Type Name"];
        }
        else {
            ShopIncomeTypeEntry::where('shopIncomeTypeId',$id)->update([
              'shopIncomeTypeName' => $request->shopIncomeTypeName,
              'shopIncomeTypeStatus' => $request->shopIncomeTypeStatus,
              'createBy' => Auth::user()->id,
              'created_at' => Carbon::now(),
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
        $delete = ShopIncomeTypeEntry::where('shopIncomeTypeId',$id)->delete();
    }
}
