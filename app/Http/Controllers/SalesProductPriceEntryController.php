<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseProductDetails;
use App\SalesProductPriceEntry;
use App\PurchaseProductEntry;
use App\ShopInformation;
use App\ProductCategory;
use App\ProductName;
use Carbon\Carbon;
use App\Category;
use Auth;

class SalesProductPriceEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          $salesProductPriceLists = SalesProductPriceEntry::with('productName')->where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->where('createBy',Auth::User()->id)->latest()->paginate(30);
          return ['salesProductPriceLists' => $salesProductPriceLists];
    }
    public function salesProductNameShow()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          $purchaseProductLists         = PurchaseProductEntry::with('productName')->where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->get();

          return ['purchaseProductLists'  => $purchaseProductLists];

    }
    public function productUnitePrice($purchaseProductId)
    {
          $productUnitePrice = PurchaseProductEntry::with('productName')->select('purchaseProductId','productId','unitPrice')->where('purchaseProductId',$purchaseProductId)->where('shopId',Auth::user()->shopId)->latest()->first();
          return ['productUnitePrice' =>$productUnitePrice ];
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
         $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

         if (SalesProductPriceEntry::where('purchaseProductId',$request->purchaseProductId)->exists()) {
              return ['alReadyEntry' => 'Already Sales Product Price Entry'];
         }
         else {
             $productQuantity = PurchaseProductEntry::where('purchaseProductId',$request->purchaseProductId)->first();
             $alertQuantity = PurchaseProductDetails::where('purchaseProductId',$request->purchaseProductId)->first();

             $lastInsertId = SalesProductPriceEntry::insertGetId([
                  'purchaseProductId' => $request->purchaseProductId,
                  'productId' => $request->productId,
                  'mrpPrice' => $request->mrpPrice,
                  'salesPrice' => $request->salesPrice,
                  'wholesalePrice' => $request->wholesalePrice,
                  'specialPrice' => $request->specialPrice,
                  'eCommercePrice' => $request->eCommercePrice,
                  'quantity' => $productQuantity->quantity,
                  'shopId' => Auth::User()->shopId,
                  'shopTypeId' => $shopTypeId,
                  'createBy' => Auth::User()->id,
                  'created_at' => Carbon::now(),
             ]);

             if (isset($alertQuantity->quantityNoti)) {
               SalesProductPriceEntry::where('salesProductPriceEntryId',$lastInsertId)->update([
                   'alertQuantity' => $alertQuantity->quantityNoti,
               ]);
             }

             ProductName::where('productNameId',$request->productId)->update([
                 'priceStatus' => 2,
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
    public function edit($salesProductPriceEntryId)
    {
        return SalesProductPriceEntry::where('salesProductPriceEntryId',$salesProductPriceEntryId)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $salesProductPriceEntryId)
    {
          if (SalesProductPriceEntry::where('salesProductPriceEntryId','!=',$salesProductPriceEntryId)->where('purchaseProductId',$request->purchaseProductId)->exists()) {
               return ['alReadyEntry' => 'Already Sales Product Price Entry'];
          }
          else {
                SalesProductPriceEntry::where('salesProductPriceEntryId',$salesProductPriceEntryId)->update([
                     'purchaseProductId' => $request->purchaseProductId,
                     'productId' => $request->productId,
                     'mrpPrice' => $request->mrpPrice,
                     'salesPrice' => $request->salesPrice,
                     'wholesalePrice' => $request->wholesalePrice,
                     'specialPrice' => $request->specialPrice,
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
