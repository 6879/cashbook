<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminPurchaseType;
use Carbon\Carbon;
use Auth;

class AdminPurchaseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminPurchaseType = AdminPurchaseType::orderBY('purchaseTypeId','desc')->paginate(2);
        return ['adminPurchaseType' => $adminPurchaseType];
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
        $request->validate([
            'purchaseTypeName' => 'required',
            'purchaseTypeStatus' => 'required',
        ],
        [
          'purchaseTypeName.required' => 'Enter Purchase Type Name',
          'purchaseTypeStatus.required' => 'Select Purchase Type Status',
        ]);

        if (AdminPurchaseType::where('purchaseTypeName',$request->purchaseTypeName)->exists()){
            return ['changePurchaseType'=>'Change Your Purchase Type Name'];
        }
        else {
            $data = new AdminPurchaseType();
            $data->purchaseTypeName = $request->purchaseTypeName;
            $data->purchaseTypeStatus = $request->purchaseTypeStatus;
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
    public function show($purchaseTypeId)
    {
        $purchaseTypeStatus = AdminPurchaseType::where('purchaseTypeId',$purchaseTypeId)->first()->purchaseTypeStatus;

        if($purchaseTypeStatus == 1){
            AdminPurchaseType::where('purchaseTypeId',$purchaseTypeId)->update([
                'purchaseTypeStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else{
            AdminPurchaseType::where('purchaseTypeId',$purchaseTypeId)->update([
                'purchaseTypeStatus' => 1,
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
    public function edit($purchaseTypeId)
    {
        $editPurchaseType = AdminPurchaseType::where('purchaseTypeId',$purchaseTypeId)->first();
        return ['editPurchaseType' => $editPurchaseType];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $purchaseTypeId)
    {
          $request->validate([
              'purchaseTypeName' => 'required',
              'purchaseTypeStatus' => 'required',
          ],
          [
            'purchaseTypeName.required' => 'Enter Purchase Type Name',
            'purchaseTypeStatus.required' => 'Select Purchase Type Status',
          ]);

          if (AdminPurchaseType::where('purchaseTypeName',$request->purchaseTypeName)->where('purchaseTypeId','!=',$purchaseTypeId)->exists()){
              return ['changePurchaseType'=>'Change Your Purchase Type Name'];
          }
          else {
              AdminPurchaseType::where('purchaseTypeId',$purchaseTypeId)->update([
                  'purchaseTypeName' => $request->purchaseTypeName,
                  'purchaseTypeStatus' => $request->purchaseTypeStatus,
                  'updateBy' => Auth::user()->id, 
              ]);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($purchaseTypeId)
    {
         AdminPurchaseType::where('purchaseTypeId',$purchaseTypeId)->delete();
    }
}
