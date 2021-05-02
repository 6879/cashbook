<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesProductDiscountPriceEntry;
use App\SalesProductPriceEntry;
use App\PurchaseProductEntry;
use App\ShopInformation;
use Carbon\Carbon;
use Auth;

class SalesProductDiscountPriceEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          $salesProductDiscountPriceLists = SalesProductDiscountPriceEntry::with('productName')->where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->where('createBy',Auth::User()->id)->latest()->paginate(20);
          return ['salesProductDiscountPriceLists' => $salesProductDiscountPriceLists];
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productPriceEntryInfo($purchaseProductId)
    {
        $productUnitePrice = PurchaseProductEntry::with('productName')->select('purchaseProductId','productId','unitPrice')->where('purchaseProductId',$purchaseProductId)->where('shopId',Auth::user()->shopId)->latest()->first();
        $salesProductPrice = SalesProductPriceEntry::where('purchaseProductId',$purchaseProductId)->where('shopId',Auth::user()->shopId)->latest()->first();

        return ['productUnitePrice' =>$productUnitePrice, 'salesProductPrice' => $salesProductPrice];

    }
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
         $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;


          $mrpStartDatePosition = strpos($request->mrpStartDate, 'T');
          $mrpStartDate = substr($request->mrpStartDate, 0, $mrpStartDatePosition);
          $mrpExpiredDatePosition = strpos($request->mrpExpiredDate, 'T');
          $mrpExpiredDate = substr($request->mrpExpiredDate, 0, $mrpExpiredDatePosition);

          $salesStartDatePosition = strpos($request->salesStartDate, 'T');
          $salesStartDate = substr($request->salesStartDate, 0, $salesStartDatePosition);
          $salesExpiredDatePosition = strpos($request->salesExpiredDate, 'T');
          $salesExpiredDate = substr($request->salesExpiredDate, 0, $salesExpiredDatePosition);

          $wholesaleStartDatePosition = strpos($request->wholesaleStartDate, 'T');
          $wholesaleStartDate = substr($request->wholesaleStartDate, 0, $wholesaleStartDatePosition);
          $wholesaleExpiredDatePosition = strpos($request->wholesaleExpiredDate, 'T');
          $wholesaleExpiredDate = substr($request->wholesaleExpiredDate, 0, $wholesaleExpiredDatePosition);

          $specialStartDatePosition = strpos($request->specialStartDate, 'T');
          $specialStartDate = substr($request->specialStartDate, 0, $specialStartDatePosition);
          $specialExpiredDatePosition = strpos($request->specialExpiredDate, 'T');
          $specialExpiredDate = substr($request->specialExpiredDate, 0, $specialExpiredDatePosition);

          $eCommerceStartDatePosition = strpos($request->eCommerceStartDate, 'T');
          $eCommerceStartDate = substr($request->eCommerceStartDate, 0, $eCommerceStartDatePosition);
          $eCommerceExpiredDatePosition = strpos($request->eCommerceExpiredDate, 'T');
          $eCommerceExpiredDate = substr($request->eCommerceExpiredDate, 0, $eCommerceExpiredDatePosition);

          $currentDate = Carbon::now()->format('Y-m-d');

         if (SalesProductDiscountPriceEntry::where('purchaseProductId',$request->purchaseProductId)->where('mrpExpiredDate','>=',$currentDate)->exists()) {
              return ['alReadyEntry' => 'Already Sales Product Price Entry'];
         }
         elseif (SalesProductDiscountPriceEntry::where('purchaseProductId',$request->purchaseProductId)->where('salesExpiredDate','>=',$currentDate)->exists()) {
              return ['alReadyEntry' => 'Already Sales Product Price Entry'];
         }
         elseif (SalesProductDiscountPriceEntry::where('purchaseProductId',$request->purchaseProductId)->where('wholesaleExpiredDate','>=',$currentDate)->exists()) {
              return ['alReadyEntry' => 'Already Sales Product Price Entry'];
         }
         elseif (SalesProductDiscountPriceEntry::where('purchaseProductId',$request->purchaseProductId)->where('specialExpiredDate','>=',$currentDate)->exists()) {
              return ['alReadyEntry' => 'Already Sales Product Price Entry'];
         }
         elseif (SalesProductDiscountPriceEntry::where('purchaseProductId',$request->purchaseProductId)->where('eCommerceExpiredDate','>=',$currentDate)->exists()) {
              return ['alReadyEntry' => 'Already Sales Product Price Entry'];
         }
         else {
             SalesProductDiscountPriceEntry::insert([
                  'purchaseProductId' => $request->purchaseProductId,
                  'productId' => $request->productId,
                  'mrpDiscountAmount' => $request->mrpDiscountAmount,
                  'mrpDiscountType' => $request->mrpDiscountType,
                  'mrpStartDate' => $mrpStartDate,
                  'mrpExpiredDate' => $mrpExpiredDate,
                  'mrpPrice' => $request->mrpPrice,
                  'salesDiscountAmount' => $request->salesDiscountAmount,
                  'salesDiscountType' => $request->salesDiscountType,
                  'salesStartDate' => $salesStartDate,
                  'salesExpiredDate' => $salesExpiredDate,
                  'salesPrice' => $request->salesPrice,
                  'wholesaleDiscountAmount' => $request->wholesaleDiscountAmount,
                  'wholesaleDiscountType' => $request->wholesaleDiscountType,
                  'wholesaleStartDate' => $wholesaleStartDate,
                  'wholesaleExpiredDate' => $wholesaleExpiredDate,
                  'wholesalePrice' => $request->wholesalePrice,
                  'specialDiscountAmount' => $request->specialDiscountAmount,
                  'specialDiscountType' => $request->specialDiscountType,
                  'specialStartDate' => $specialStartDate,
                  'specialExpiredDate' => $specialExpiredDate,
                  'specialPrice' => $request->specialPrice,
                  'eCommerceDiscountAmount' => $request->eCommerceDiscountAmount,
                  'eCommerceDiscountType' => $request->eCommerceDiscountType,
                  'eCommerceStartDate' => $eCommerceStartDate,
                  'eCommerceExpiredDate' => $eCommerceExpiredDate,
                  'eCommercePrice' => $request->eCommercePrice,
                  'shopId' => Auth::User()->shopId,
                  'shopTypeId' => $shopTypeId,
                  'createBy' => Auth::User()->id,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($salesProductDiscountPriceId)
    {
         $productDiscountPrice = SalesProductDiscountPriceEntry::with('productName')->where('salesProductDiscountPriceId',$salesProductDiscountPriceId)->latest()->first();
         $productUnitePrice = PurchaseProductEntry::with('productName')->select('purchaseProductId','unitPrice')->where('purchaseProductId',$productDiscountPrice->purchaseProductId)->where('shopId',Auth::user()->shopId)->latest()->first();


        return ['productDiscountPrice' => $productDiscountPrice, 'productUnitePrice' => $productUnitePrice];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $salesProductDiscountPriceId)
    {
          if (SalesProductDiscountPriceEntry::where('salesProductDiscountPriceId', '!=', $salesProductDiscountPriceId)->where('purchaseProductId',$request->purchaseProductId)->exists()) {
               return ['alReadyEntry' => 'Already Sales Product Price Entry'];
          }
          else {
                $mrpStartDatePosition = strpos($request->mrpStartDate, 'T');
                $mrpStartDate = substr($request->mrpStartDate, 0, $mrpStartDatePosition);
                $mrpExpiredDatePosition = strpos($request->mrpExpiredDate, 'T');
                $mrpExpiredDate = substr($request->mrpExpiredDate, 0, $mrpExpiredDatePosition);

                $salesStartDatePosition = strpos($request->salesStartDate, 'T');
                $salesStartDate = substr($request->salesStartDate, 0, $salesStartDatePosition);
                $salesExpiredDatePosition = strpos($request->salesExpiredDate, 'T');
                $salesExpiredDate = substr($request->salesExpiredDate, 0, $salesExpiredDatePosition);

                $wholesaleStartDatePosition = strpos($request->wholesaleStartDate, 'T');
                $wholesaleStartDate = substr($request->wholesaleStartDate, 0, $wholesaleStartDatePosition);
                $wholesaleExpiredDatePosition = strpos($request->wholesaleExpiredDate, 'T');
                $wholesaleExpiredDate = substr($request->wholesaleExpiredDate, 0, $wholesaleExpiredDatePosition);

                $specialStartDatePosition = strpos($request->specialStartDate, 'T');
                $specialStartDate = substr($request->specialStartDate, 0, $specialStartDatePosition);
                $specialExpiredDatePosition = strpos($request->specialExpiredDate, 'T');
                $specialExpiredDate = substr($request->specialExpiredDate, 0, $specialExpiredDatePosition);

                $eCommerceStartDatePosition = strpos($request->eCommerceStartDate, 'T');
                $eCommerceStartDate = substr($request->eCommerceStartDate, 0, $eCommerceStartDatePosition);
                $eCommerceExpiredDatePosition = strpos($request->eCommerceExpiredDate, 'T');
                $eCommerceExpiredDate = substr($request->eCommerceExpiredDate, 0, $eCommerceExpiredDatePosition);

                SalesProductDiscountPriceEntry::where('salesProductDiscountPriceId', $salesProductDiscountPriceId)->update([
                  'mrpDiscountAmount' => $request->mrpDiscountAmount,
                  'mrpDiscountType' => $request->mrpDiscountType,
                  'mrpStartDate' => $mrpStartDate,
                  'mrpExpiredDate' => $mrpExpiredDate,
                  'mrpPrice' => $request->mrpPrice,
                  'salesDiscountAmount' => $request->salesDiscountAmount,
                  'salesDiscountType' => $request->salesDiscountType,
                  'salesStartDate' => $salesStartDate,
                  'salesExpiredDate' => $salesExpiredDate,
                  'salesPrice' => $request->salesPrice,
                  'wholesaleDiscountAmount' => $request->wholesaleDiscountAmount,
                  'wholesaleDiscountType' => $request->wholesaleDiscountType,
                  'wholesaleStartDate' => $wholesaleStartDate,
                  'wholesaleExpiredDate' => $wholesaleExpiredDate,
                  'wholesalePrice' => $request->wholesalePrice,
                  'specialDiscountAmount' => $request->specialDiscountAmount,
                  'specialDiscountType' => $request->specialDiscountType,
                  'specialStartDate' => $specialStartDate,
                  'specialExpiredDate' => $specialExpiredDate,
                  'specialPrice' => $request->specialPrice,
                  'eCommerceDiscountAmount' => $request->eCommerceDiscountAmount,
                  'eCommerceDiscountType' => $request->eCommerceDiscountType,
                  'eCommerceStartDate' => $eCommerceStartDate,
                  'eCommerceExpiredDate' => $eCommerceExpiredDate,
                  'eCommercePrice' => $request->eCommercePrice,
                  'updateBy' => Auth::User()->id,
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
        //
    }
}
