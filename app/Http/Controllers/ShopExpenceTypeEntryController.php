<?php

namespace App\Http\Controllers;

use App\ShopExpenceTypeEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopExpenceTypeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShopExpenceTypeEntry::orderBy('shopExpenceTypeId','desc')->where('createBy',Auth::User()->id)->get();
        $value= Auth::user();
        return  ['show' => $data,'value' => $value];
    }

    public function shopExpenceTypeReport()
    {
        $shopExpenceTypeOwnerReport = ShopExpenceTypeEntry::orderBy('shopExpenceTypeId','desc')->where('createBy',Auth::User()->id)->paginate(20);
        $shopExpenceTypeGlobalReport = ShopExpenceTypeEntry::orderBy('shopExpenceTypeId','desc')->where('createBy','!=',Auth::User()->id)->paginate(20);

        return  ['shopExpenceTypeOwnerReport' => $shopExpenceTypeOwnerReport,'shopExpenceTypeGlobalReport' => $shopExpenceTypeGlobalReport];
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
            'shopExpenceTypeName' => 'required',
            'shopExpenceTypeStatus' => 'required',
        ],
        [
            'shopExpenceTypeName.required' => "Enter Shop Expence Type  Name",
            'shopExpenceTypeStatus.required' => "Select Shop Expence Type  Status",
        ]);

        if (ShopExpenceTypeEntry::where('shopExpenceTypeName',$request->shopExpenceTypeName)->exists()) {
            return ['changeExpenceType' => "Change Expence Type Name"] ;
        }
        else {
            ShopExpenceTypeEntry::insert([
              'shopExpenceTypeName' => $request->shopExpenceTypeName,
              'shopExpenceTypeStatus' => $request->shopExpenceTypeStatus,
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
        $data = ShopExpenceTypeEntry::where('shopExpenceTypeId', $id)->first()->shopExpenceTypeStatus;
        if ($data == 1) {
            ShopExpenceTypeEntry::where('shopExpenceTypeId', $id)->update([
                'shopExpenceTypeStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        } else {
            ShopExpenceTypeEntry::where('shopExpenceTypeId', $id)->update([
                'shopExpenceTypeStatus' => 1,
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
        $data = ShopExpenceTypeEntry::where('shopExpenceTypeId',$id)->first();
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
            'shopExpenceTypeName' => 'required',
            'shopExpenceTypeStatus' => 'required',
        ],
        [
            'shopExpenceTypeName.required' => "Enter Shop Expence Type  Name",
            'shopExpenceTypeStatus.required' => "Select Shop Expence Type  Status",
        ]);
        if (ShopExpenceTypeEntry::where('shopExpenceTypeName',$request->shopExpenceTypeName)->where('shopExpenceTypeId','!=',$id)->exists()) {
            return ['changeExpenceType' => "Change Expence Type Name"] ;
        }
        else {
            ShopExpenceTypeEntry::where('shopExpenceTypeId',$id)->update([
              'shopExpenceTypeName' => $request->shopExpenceTypeName,
              'shopExpenceTypeStatus' => $request->shopExpenceTypeStatus,
              'updateBy' => Auth::user()->id,
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
        $delete = ShopExpenceTypeEntry::where('shopExpenceTypeId',$id)->delete();
    }
}
