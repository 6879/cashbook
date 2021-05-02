<?php

namespace App\Http\Controllers;

use App\ShopCustomerTypeEntry;
use App\ShopTypeEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ShopTypeEntry as ShopTypeEntryResource;

class ShopTypeEntryController extends Controller
{
    public function index()
    {
        // $data = ShopTypeEntry::orderBy('shopTypeEntryId','desc')->get();
        $data = ShopTypeEntryResource::collection(ShopTypeEntry::orderBy('shopTypeEntryId','DESC')->get());
        return  ['data' => $data];
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'shopTypeName' => 'required',
            'shopTypeCode' => 'required | unique:shop_type_entries',
            'shopTypeStatus' => 'required',
        ],
        [
            'shopTypeName.required' => "Enter Shop Type Name",
            'shopTypeCode.required' => "Enter Shop Type Code",
            'shopTypeStatus.required' => "Select Shop  Type Status",
        ]);
        if (ShopTypeEntry::where('shopTypeName',$request->shopTypeName)->exists()){
            return ['changeShopTypeName'=> 'Change Shop Type Name'];
        }
        else if (ShopTypeEntry::where('shopTypeCode',$request->shopTypeCode)->exists()){
            return ['changeShopTypeCode'=> 'Change Shop Type Code'];
        }
        else {
            ShopTypeEntry::insert([
                'shopTypeName' => $request->shopTypeName,
                'shopTypeCode' => $request->shopTypeCode,
                'shopTypeStatus' => $request->shopTypeStatus,
                'createBy' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        }
    }


    public function show($id)
    {
        $data=ShopTypeEntry::where('shopTypeEntryId',$id)->first()->shopTypeStatus;
        if($data == 1){
            ShopTypeEntry::where('shopTypeEntryId',$id)->update([
                'shopTypeStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else{
            ShopTypeEntry::where('shopTypeEntryId',$id)->update([
                'shopTypeStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
    }

    public function edit($id)
    {
        $data = ShopTypeEntry::where('shopTypeEntryId',$id)->first();
        return ['data'=>$data];
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'shopTypeName' => 'required',
            'shopTypeCode' => 'required',
            'shopTypeStatus' => 'required',
        ],
        [
            'shopTypeName.required' => "Enter Shop Type Name",
            'shopTypeCode.required' => "Enter Shop Type Code",
            'shopTypeStatus.required' => "Select Shop  Type Status",
        ]);

        if (ShopTypeEntry::where('shopTypeName',$request->shopTypeName)->where('shopTypeEntryId','!=',$id)->exists()){
            return ['changeShopTypeName'=> 'Change Shop Type Name'];
        }

        else if (ShopTypeEntry::where('shopTypeName',$request->shopTypeCode)->where('shopTypeEntryId','!=',$id)->exists()){
            return ['changeShopTypeCode'=> 'Change Shop Type Code'];
        }
        else {
            ShopTypeEntry::where('shopTypeEntryId',$id)->update([
               'shopTypeName' => $request->shopTypeName,
               'shopTypeCode' => $request->shopTypeCode,
               'shopTypeStatus' => $request->shopTypeStatus,
               'updateBy' => Auth::user()->id,
               'updated_at' => Carbon::now(),
             ]);
        }

    }

    public function destroy($id)
    {
        $data = ShopTypeEntry::where('shopTypeEntryId',$id);
        $data->delete();
    }
}
