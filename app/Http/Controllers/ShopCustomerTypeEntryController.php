<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\ShopCustomerTypeEntry;
use Carbon\Carbon;

class ShopCustomerTypeEntryController extends Controller
{

    public function index()
    {
        $data = ShopCustomerTypeEntry::orderBy('shopCustomerTypeEntryId','desc')->get();
        return  ['data' => $data];
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
         $this->validate($request, [
            'shopCustomerName' => 'required',
            'shopCustomerStatus' => 'required',
          ],
          [
              'shopCustomerName.required' => "Enter  Shop customer Type Name",
              'shopCustomerStatus.required' => "Select customer Type Status",
          ]);
        if (ShopCustomerTypeEntry::where('shopCustomerName',$request->shopCustomerName)->exists()){
            return ['changeShopCustomerType'=> 'Change Customer Type Name'];
        }
        else {
            ShopCustomerTypeEntry::insert([
                'shopCustomerName' => $request->shopCustomerName,
                'shopCustomerStatus' => $request->shopCustomerStatus,
                'createBy' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        }
    }


    public function show($id)
    {
        $data=ShopCustomerTypeEntry::where('shopCustomerTypeEntryId',$id)->first()->shopCustomerStatus;
        if($data == 1){
            ShopCustomerTypeEntry::where('shopCustomerTypeEntryId',$id)->update([
                'shopCustomerStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else{
            ShopCustomerTypeEntry::where('shopCustomerTypeEntryId',$id)->update([
                'shopCustomerStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
    }


    public function edit($id)
    {
        $data = ShopCustomerTypeEntry::where('shopCustomerTypeEntryId',$id)->first();
        return ['data'=>$data];
    }


    public function update(Request $request, $id)
    {
          $this->validate($request, [
             'shopCustomerName' => 'required',
             'shopCustomerStatus' => 'required',
           ],
           [
               'shopCustomerName.required' => "Enter  Shop customer Type Name",
               'shopCustomerStatus.required' => "Select customer Type Status",
           ]);

           if (ShopCustomerTypeEntry::where('shopCustomerName',$request->shopCustomerName)->where('shopCustomerTypeEntryId','!=',$id)->exists()){
               return ['changeCustomerType'=> 'Please Change Shop Customer Type'];
           }
           else {
               ShopCustomerTypeEntry::where('shopCustomerTypeEntryId',$id)->update([
                 'shopCustomerName' => $request->shopCustomerName,
                 'shopCustomerStatus' => $request->shopCustomerStatus,
                 'updateBy' => Auth::user()->id,
               ]);
           }



    }


    public function destroy($id)
    {
        $data = ShopCustomerTypeEntry::where('shopCustomerTypeEntryId',$id);
        $data->delete();
    }
}
