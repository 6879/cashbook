<?php

namespace App\Http\Controllers;

use App\ShopAddBankEntry;
use App\ShopEmployeeLoginTimeEntry;
use App\ShopEmployeeEntry;
use App\ShopEmployeeType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopEmployeeLoginTimeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShopEmployeeLoginTimeEntry::with('ShopEmployeeEntry')->orderBy('employeeLoginTimeId','desc')->get();
        return  ['showData' => $data];

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ShopEmployeeEntry::orderBy('shopEmployeeEntryId','desc')->get();
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
            'shopEmployeeEntryId' => 'required',
            'employeeLoginTimeStart' => 'required',
            'employeeLoginTimeEnd' => 'required',
            'employeeLoginOffDay' => 'required',
            'employeeLoginStatus' => 'required',

        ],
        [
            'shopEmployeeEntryId.required' => "Select Employee Name",
            'employeeLoginTimeStart.required' => " Bank Name",
            'employeeLoginTimeEnd.required' => "Enter bankBranch Name",
            'employeeLoginOffDay.required' => "Enter bankAccount Name",
            'employeeLoginStatus.required' => "Enter bankAccount Number",
        ]);

        ShopEmployeeLoginTimeEntry::insert([
//            'employeeLoginTimeId' => $request->employeeLoginTimeId,
            'shopEmployeeEntryId' => $request->shopEmployeeEntryId,
            'employeeLoginTimeStart' => $request->employeeLoginTimeStart,
            'employeeLoginTimeEnd' => $request->employeeLoginTimeEnd,
            'employeeLoginOffDay' => $request->employeeLoginOffDay,
            'employeeLoginStatus' => $request->employeeLoginStatus,
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
        $Status = ShopEmployeeLoginTimeEntry::where('employeeLoginTimeId',$id)->first()->employeeLoginStatus;

        if ($Status == 1 ){
            ShopEmployeeLoginTimeEntry::where('employeeLoginTimeId',$id)->update([
                'employeeLoginStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else
        {
            ShopEmployeeLoginTimeEntry::where('employeeLoginTimeId',$id)->update([
                'employeeLoginStatus' => 1,
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
        $editData = ShopEmployeeLoginTimeEntry::where('employeeLoginTimeId',$id)->first();
        return ['editData' => $editData];
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
            'shopEmployeeEntryId' => 'required',
            'employeeLoginTimeStart' => 'required',
            'employeeLoginTimeEnd' => 'required',
            'employeeLoginOffDay' => 'required',
            'employeeLoginStatus' => 'required',

        ],
        [
            'shopEmployeeEntryId.required' => "Select Employee Name",
            'employeeLoginTimeStart.required' => " Bank Name",
            'employeeLoginTimeEnd.required' => "Enter bankBranch Name",
            'employeeLoginOffDay.required' => "Enter bankAccount Name",
            'employeeLoginStatus.required' => "Enter bankAccount Number",
        ]);

        ShopEmployeeLoginTimeEntry::where('employeeLoginTimeId',$id)->update([
//            'employeeLoginTimeId' => $request->employeeLoginTimeId,
            'shopEmployeeEntryId' => $request->shopEmployeeEntryId,
            'employeeLoginTimeStart' => $request->employeeLoginTimeStart,
            'employeeLoginTimeEnd' => $request->employeeLoginTimeEnd,
            'employeeLoginOffDay' => $request->employeeLoginOffDay,
            'employeeLoginStatus' => $request->employeeLoginStatus,
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
        $delete = ShopEmployeeLoginTimeEntry::where('employeeLoginTimeId',$id)->delete();
    }
}
