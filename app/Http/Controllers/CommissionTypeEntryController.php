<?php

namespace App\Http\Controllers;


use App\CommissionTypeEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommissionTypeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CommissionTypeEntry::orderBy('commissionTypeEntryId','desc')->paginate(20);
        return  ['data' => $data];
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


    public function store(Request $request)
    {
        $this->validate($request,[
                'commissionTypeEntryName' => 'required',
                'commissionTypeEntryStatus' => 'required',
        ],
        [
            'commissionTypeEntryName.required' => "Enter Commission Type  Name",
            'commissionTypeEntryStatus.required' => "Select Commission Type  Status",
        ]);

        if (CommissionTypeEntry::where('commissionTypeEntryName',$request->commissionTypeEntryName)->exists()){
            return ['changecommissionTypeEntryName'=>'Change Your  commissionTypeEntryName'];
        }
        else{
            CommissionTypeEntry::insert([
                'commissionTypeEntryName' => $request->commissionTypeEntryName,
                'commissionTypeEntryStatus' => $request->commissionTypeEntryStatus,
                'createBy' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        }

    }


    public function show($id)
    {

        $data=CommissionTypeEntry::where('commissionTypeEntryId',$id)->first()->commissionTypeEntryStatus;
        if($data == 1){
            CommissionTypeEntry::where('commissionTypeEntryId',$id)->update([
                'commissionTypeEntryStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else{
            CommissionTypeEntry::where('commissionTypeEntryId',$id)->update([
                'commissionTypeEntryStatus' => 1,
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
        $data = CommissionTypeEntry::where('commissionTypeEntryId',$id)->first();
        return ['data'=>$data];
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
                'commissionTypeEntryName' => 'required',
                'commissionTypeEntryStatus' => 'required',
        ],
        [
            'commissionTypeEntryName.required' => "Enter Commission Type  Name",
            'commissionTypeEntryStatus.required' => "Select Commission Type  Status",
        ]);

        if (CommissionTypeEntry::where('commissionTypeEntryName',$request->commissionTypeEntryName)->where('commissionTypeEntryId','!=',$id)->exists()){
            return ['changeCommissionType'=>'Change Your Commission Type'];
        }
        else {
            CommissionTypeEntry::where('commissionTypeEntryId',$id)->update([
              'commissionTypeEntryName' => $request->commissionTypeEntryName,
              'commissionTypeEntryStatus' => $request->commissionTypeEntryStatus,
              'updateBy' => Auth::user()->id,
              'updated_at' => Carbon::now(),
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
        $data = CommissionTypeEntry::where('commissionTypeEntryId',$id);
        $data->delete();
    }
}
