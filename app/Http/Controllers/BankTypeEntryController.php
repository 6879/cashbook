<?php

namespace App\Http\Controllers;

use App\BankTypeEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankTypeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = BankTypeEntry::orderBy('bankTypeEntryId','desc')->paginate(20);
        return ['show'=>$show];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $show = BankTypeEntry::orderBy('bankTypeEntryId','desc')->get();
          return ['show'=>$show];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bankTypeEntryName' => 'required',
            'bankTypeEntryStatus' => 'required',
        ],
        [
          'bankTypeEntryName.required' => 'Enter Your bank Type Name',
          'bankTypeEntryStatus.required' => 'Select Bank Type Status',
        ]);



        if (BankTypeEntry::where('bankTypeEntryName',$request->bankTypeEntryName)->exists()){
            return ['changebankTypeEntryName'=>'Change Your  changebankTypeEntryName'];
        }
        else{
            $data = new BankTypeEntry();
            $data->bankTypeEntryName = $request->bankTypeEntryName;
            $data->bankTypeEntryStatus = $request->bankTypeEntryStatus;
            $data->createBy = Auth::user()->id;
            $data->save();
            $data->created_at = Carbon::now();

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
        $data=BankTypeEntry::where('bankTypeEntryId',$id)->first()->bankTypeEntryStatus;

        if($data == 1){
            BankTypeEntry::where('bankTypeEntryId',$id)->update([
                'bankTypeEntryStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else{
            BankTypeEntry::where('bankTypeEntryId',$id)->update([
                'bankTypeEntryStatus' => 1,
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
        $editData = BankTypeEntry::where('bankTypeEntryId',$id)->first();
        return ['editData'=>$editData];
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
        $request->validate([
            'bankTypeEntryName' => 'required',
            'bankTypeEntryStatus' => 'required',
        ],
        [
          'bankTypeEntryName.required' => 'Enter Your bank Type Name',
          'bankTypeEntryStatus.required' => 'Select Bank Type Status',
        ]);

        if (BankTypeEntry::where('bankTypeEntryName',$request->bankTypeEntryName)->where('bankTypeEntryId','!=',$id)->exists()){
            return ['changeBankName' => 'Change Your Bank Type Name'];
        }
        else {
            BankTypeEntry::where('bankTypeEntryId',$id)->update([
              'bankTypeEntryName' => $request->bankTypeEntryName,
              'bankTypeEntryStatus'=> $request->bankTypeEntryStatus,
              'updateBy'=> Auth::user()->id,
            ]);
            return ['success' => 'ok'];
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
        $dataDelete = BankTypeEntry::where('bankTypeEntryId',$id);
        $dataDelete->delete();
    }
}
