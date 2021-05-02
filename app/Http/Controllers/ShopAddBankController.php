<?php

namespace App\Http\Controllers;

use App\BankEntry;
use App\ShopAddBankEntry;
use App\BankTypeEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ShopAddBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = ShopAddBankEntry::with('BankTypeEntry','BankEntry')->orderBy('bankId','desc')->get();
        return  ['showData' => $showData];
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function bankTypeEntryList()
    {
        $show = BankTypeEntry::orderBy('bankTypeEntryId','desc')->get();
        return ['show'=>$show];
    }
    public function bankNameList($bankTypeId)
    {
        $show = BankEntry::where('bankTypeEntryId',$bankTypeId)->orderBy('bankEntryId','desc')->get();
        return ['show'=>$show];
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bankTypeEntryId' => 'required',
            'bankEntryId' => 'required',
            'bankBranch' => 'required',
            'bankAccountName' => 'required',
            'bankAccountNumber' => 'required',
            'status' => 'required',
        ],
        [
            'bankTypeEntryId.required' => "Select Bank Type Name",
            'bankEntryId.required' => "Select Bank Name",
            'bankBranch.required' => "Enter bankBranch Name",
            'bankAccountName.required' => "Enter bankAccount Name",
            'bankAccountNumber.required' => "Enter bankAccount Number",
            'status.required' => "Select Shop Bank Status",
        ]);

        ShopAddBankEntry::insert([
            'bankTypeEntryId' => $request->bankTypeEntryId,
            'bankEntryId' => $request->bankEntryId,
            'bankBranch' => $request->bankBranch,
            'bankAccountName' => $request->bankAccountName,
            'bankAccountNumber' => $request->bankAccountNumber,
            'status' => $request->status,
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
        $shopBankStatus = ShopAddBankEntry::where('bankId',$id)->first()->status;
        if ($shopBankStatus == 1 ){
            ShopAddBankEntry::where('bankId',$id)->update([
                'status' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else
        {
            ShopAddBankEntry::where('bankId',$id)->update([
                'status' => 1,
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
        $editShopBankEntry = ShopAddBankEntry::where('bankId',$id)->first();
        return ['editShopBankEntry' => $editShopBankEntry];
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
            'bankTypeEntryId' => 'required',
            'bankEntryId' => 'required',
            'bankBranch' => 'required',
            'bankAccountName' => 'required',
            'bankAccountNumber' => 'required',
            'status' => 'required',
        ],
        [
            'bankTypeEntryId.required' => "Select Bank Type Name",
            'bankEntryId.required' => "Select Bank Name",
            'bankBranch.required' => "Enter bankBranch Name",
            'bankAccountName.required' => "Enter bankAccount Name",
            'bankAccountNumber.required' => "Enter bankAccount Number",
            'status.required' => "Select Shop Bank Status",
        ]);

        ShopAddBankEntry::where('bankId',$id)->update([
            'bankTypeEntryId' => $request->bankTypeEntryId,
            'bankEntryId' => $request->bankEntryId,
            'bankBranch' => $request->bankBranch,
            'bankAccountName' => $request->bankAccountName,
            'bankAccountNumber' => $request->bankAccountNumber,
            'status' => $request->status,
            'updateBy' => Auth::user()->id,
            'created_at' => Carbon::now(),
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
        $delete = ShopAddBankEntry::where('bankId',$id)->delete();
    }
}
