<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopInformation;
use App\ShopAssetEntry;
use App\AssetStatus;
use Carbon\Carbon;
use Auth;

class AssetStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (isset(Auth::User()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;

            $shopAssetEntryLists = ShopAssetEntry::with('assetCodeName')->select('shopAssetEntryId','assetProductId')->where('createBy',Auth::user()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->orderBy('shopAssetEntryId','desc')->get();
            return ['shopAssetEntryLists' => $shopAssetEntryLists];

        }
        else {
              $shopAssetEntryLists = 0;
              return ['shopAssetEntryLists' => $shopAssetEntryLists];
        }
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
                'shopAssetEntryId' => 'required',
                'typeSelectId' => 'required',
            ],
            [
                'shopAssetEntryId.required' => 'Select Product Name',
                'typeSelectId.required' => 'Select Type',
                'remark.required' => 'Enter Your Remark',
            ]);

            $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
            $receiveDate = AssetStatus::where('shopAssetEntryId',$request->shopAssetEntryId)->latest()->first();

           if (!isset($receiveDate->receiveDate) && isset($receiveDate->sendDate)) {
                AssetStatus::where('assetStatusId',$receiveDate->assetStatusId)->update([
                    'receiveDate' => Carbon::now()->format('d-m-y h:s:i'),
                    'remarkReceiveTime' => $request->remarkReceiveTime,
                    'updateBy' => Auth::User()->id,
                ]);
                ShopAssetEntry::where('shopAssetEntryId',$request->shopAssetEntryId)->update([
                    'status' => 1,
                ]);
            }
            else {
                $AssetStatus = new AssetStatus();
                $AssetStatus->shopAssetEntryId = $request->shopAssetEntryId;
                $AssetStatus->typeSelectId = $request->typeSelectId;
                if (isset($request->damageId)) {
                    $AssetStatus->typeOptionId = 2;
                    ShopAssetEntry::where('shopAssetEntryId',$request->shopAssetEntryId)->update([
                        'status' => 2,
                    ]);
                }
                if (isset($request->warantyId)) {
                    $AssetStatus->typeOptionId = 3;
                    ShopAssetEntry::where('shopAssetEntryId',$request->shopAssetEntryId)->update([
                        'status' => 3,
                    ]);
                }
                if (isset($request->guaranteeId)) {
                    $AssetStatus->typeOptionId = 4;
                    ShopAssetEntry::where('shopAssetEntryId',$request->shopAssetEntryId)->update([
                        'status' => 4,
                    ]);
                }
                if (isset($request->unusedId)) {
                    $AssetStatus->typeOptionId = 5;
                    ShopAssetEntry::where('shopAssetEntryId',$request->shopAssetEntryId)->update([
                        'status' => 5,
                    ]);
                }
                if (isset($request->theftId)) {
                    $AssetStatus->typeOptionId = 6;
                    ShopAssetEntry::where('shopAssetEntryId',$request->shopAssetEntryId)->update([
                        'status' => 6,
                    ]);
                }
                $AssetStatus->sendDate = Carbon::now()->format('d-m-y h:s:i');
                $AssetStatus->remarkSendTime = $request->remarkSendTime;
                $AssetStatus->shopId = Auth::User()->shopId;
                $AssetStatus->shopTypeId = $shopTypeId;
                $AssetStatus->createBy = Auth::User()->id;
                $AssetStatus->save();
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($shopAssetEntryId)
    {
        $assetSingleData =  ShopAssetEntry::with('assetBrandName','supplierName')->where('shopAssetEntryId',$shopAssetEntryId)->first();
        $dateInfo = AssetStatus::where('shopAssetEntryId',$shopAssetEntryId)->latest()->first();

        if (isset($dateInfo->sendDate) && isset($dateInfo->receiveDate)) {
            return ['assetSingleData' => $assetSingleData, 'dateInfo' => $dateInfo , 'productReceive'=> 'Product Receive'];
        }
        elseif (isset($dateInfo->sendDate)) {
            return ['assetSingleData' => $assetSingleData, 'dateInfo' => $dateInfo ,'productSend'=> 'Product Send'];
        }
        else {

            return ['assetSingleData' => $assetSingleData, 'noEntry' => 'Database No Entry'];
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
