<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BankEntry;
use Carbon\Carbon;
use App\BankTypeEntry;
use Illuminate\Support\Facades\Auth;

class BankEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = BankEntry::with('BankTypeEntry')->orderBy('bankEntryId','desc')->paginate(20);
        return ['show'=>$show];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $BankTypeEntry = BankTypeEntry::orderBy('bankTypeEntryId','desc')->get();
        return ['bankTypeEntry'=> $BankTypeEntry];
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
            'bankTypeEntryId' => 'required',
            'bankName' => 'required',
        ],
        [
          'bankTypeEntryId.required' => 'Select Bank Type Name',
          'bankName.required' => 'Enter Your Bank Name',
        ]);

        if (BankEntry::where('bankName',$request->bankName)->where('bankTypeEntryId',$request->bankTypeEntryId)->exists()){
            return ['changebankName'=>'Change Your Bank Name'];
        }
        else{
            $data = new BankEntry();
            $data->bankName = $request->bankName;
            $data->bankTypeEntryId = $request->bankTypeEntryId;
            $data->createBy = Auth::user()->id;
            $data->created_at = Carbon::now();
            $data->save();
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
        $editData = BankEntry::where('bankEntryId',$id)->first();
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
              'bankTypeEntryId' => 'required',
              'bankName' => 'required',
          ],
          [
            'bankTypeEntryId.required' => 'Select Bank Type Name',
            'bankName.required' => 'Enter Your Bank Name',
          ]);

        if (BankEntry::where('bankTypeEntryId',$request->bankTypeEntryId)->where('bankName',$request->bankName)->where('bankEntryId','!=',$id)->exists()){
            return ['changebankName'=>'Change Your Bank Name'];
        }
        else {
            BankEntry::where('bankEntryId',$id)->update([
              'bankName' => $request->bankName,
              'bankTypeEntryId'=> $request->bankTypeEntryId,
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
    public function destroy($id)
    {
        $dataDelete = BankEntry::where('bankEntryId',$id);
        $dataDelete->delete();
    }
}
