<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesProductDiscountPriceEntry;
use App\SalesProductPriceEntry;
use App\ShopCustomerTypeEntry;
use App\PurchaseProductEntry;
use App\SalesCustomerEntry;
use App\SalesProductEntry;
use App\ShopInformation;
use App\SalesInvoice;
use App\UniteEntry;
use App\BrandEntry;
use Carbon\Carbon;
use Auth;

class SalesProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $salesProductLists = SalesProductEntry::with('productName','brandName','unitName')->where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->get();
        $discountPriceLists = SalesProductDiscountPriceEntry::where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->get();
        return ['salesProductLists' => $salesProductLists,'discountPriceLists' => $discountPriceLists];
    }
    public function salesTotalBalance($salesInvoiceNo)
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $salesTotalBalances = SalesProductEntry::where('salesInvoiceNo',$salesInvoiceNo)->where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->get();

        return ['salesTotalBalances' => $salesTotalBalances];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          $uniteLists = UniteEntry::select('uniteEntryId','uniteEntryName')->orderBy('uniteEntryId','desc')->get();
          $brandLists = BrandEntry::select('brandId','brandName')->orderBy('brandId','desc')->where('createBy',Auth::User()->id)->get();
          $customerTypeLists = ShopCustomerTypeEntry::select('shopCustomerTypeEntryId','shopCustomerName')->where('shopCustomerStatus',1)->orderBy('shopCustomerTypeEntryId','desc')->get();
          $productPriceLists = SalesProductPriceEntry::with('productName')->select('purchaseProductId','productId')->where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->latest()->get();
          return  ['customerTypeLists' => $customerTypeLists,'uniteLists' => $uniteLists, 'brandLists' => $brandLists, 'productPriceLists' => $productPriceLists];
    }
    public function customerInformationEntry(Request $request)
    {
          $this->validate($request, [
              'customerTypeId' => 'required',
              'customerName' => 'required',
              'customerEmail' => 'required|email|unique:sales_customer_entries,customerEmail',
              'customerPhone' => 'required|numeric|unique:sales_customer_entries,customerPhone',
              'customerAddress' => 'required',
          ]);

          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          SalesCustomerEntry::insert([
              'customerTypeId' => $request->customerTypeId,
              'customerName' => $request->customerName,
              'customerEmail' => $request->customerEmail,
              'customerPhone' => $request->customerPhone,
              'customerImoNumber' => $request->customerImoNumber,
              'customerFacebookID' => $request->customerFacebookID,
              'customerAddress' => $request->customerAddress,
              'referenceName' => $request->referenceName,
              'referenceEmail' => $request->referenceEmail,
              'referencePhone' => $request->referencePhone,
              'shopId' => Auth::User()->shopId,
              'shopTypeId' => $shopTypeId,
              'createBy' => Auth::User()->id,
          ]);

    }

    function salesStackProductWithPrice()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

        $salesProductPriceLists = SalesProductPriceEntry::with('productName')->where('quantity','>',0)->where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->where('createBy',Auth::User()->id)->latest()->paginate(20);
        $alertQuantityProductLists = SalesProductPriceEntry::with('productName')->where('alertQuantity','!=',"")->where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->where('createBy',Auth::User()->id)->latest()->paginate(20);

        return ['salesProductPriceLists' => $salesProductPriceLists, 'alertQuantityProductLists' => $alertQuantityProductLists];
    }
    function customerTypeIdCatch($customerTypeId)
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $salesCustomerLists = SalesCustomerEntry::select('salesCustomerEntryId','customerName','customerTypeId')->where('customerTypeId',$customerTypeId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();

        return ['salesCustomerLists' => $salesCustomerLists];
    }
    function customerIdCatch($customerId)
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $customerPreviousDue = SalesInvoice::select('salesInvoiceId','salesCustomerId','previousDue')->where('salesCustomerId',$customerId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->first();
        if (isset($customerPreviousDue->previousDue)) {
           return ['customerPreviousDue' => $customerPreviousDue->previousDue];
        }
        else {
           $customerPreviousDue = '';
           return ['customerPreviousDue' => $customerPreviousDue];
        }
    }
    function purchaseProductIdCatch($purchaseProductId,$priceType)
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

        if ($priceType == 1) {
            $singleProudctPriceInfo = SalesProductPriceEntry::where('purchaseProductId',$purchaseProductId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->first();
            $discountMrpPrice = SalesProductDiscountPriceEntry::where('purchaseProductId',$purchaseProductId)->where('mrpExpiredDate', '>=', $currentDate)->where('shopTypeId',$shopTypeId)->first();
            if (isset($discountMrpPrice->mrpPrice)) {
                return ['price' => $singleProudctPriceInfo->mrpPrice,'discountPrice' => $discountMrpPrice->mrpPrice];
            }
            else {
               return ['price' => $singleProudctPriceInfo->mrpPrice,'discountPrice' => ''];
            }
        }
        elseif ($priceType == 2) {
            $singleProudctPriceInfo = SalesProductPriceEntry::where('purchaseProductId',$purchaseProductId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->first();
            $discountSalesPrice = SalesProductDiscountPriceEntry::where('purchaseProductId',$purchaseProductId)->where('salesExpiredDate', '>=', $currentDate)->where('shopTypeId',$shopTypeId)->first();
            if (isset($discountSalesPrice->salesPrice)) {
                return ['price' => $singleProudctPriceInfo->salesPrice,'discountPrice' => $discountSalesPrice->salesPrice];
            }
            else {
                return ['price' => $singleProudctPriceInfo->salesPrice,'discountPrice' => ''];
            }
        }
        elseif ($priceType == 3) {
           $singleProudctPriceInfo = SalesProductPriceEntry::where('purchaseProductId',$purchaseProductId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->first();
           $discountWholesalePrice = SalesProductDiscountPriceEntry::where('purchaseProductId',$purchaseProductId)->where('wholesaleExpiredDate', '>=', $currentDate)->where('shopTypeId',$shopTypeId)->first();
           if (isset($discountWholesalePrice->wholesalePrice)) {
               return ['price' => $singleProudctPriceInfo->wholesalePrice, 'discountPrice' => $discountWholesalePrice->wholesalePrice];
           }
           else {
               return ['price' => $singleProudctPriceInfo->wholesalePrice, 'discountPrice' => ''];
           }
        }
        elseif ($priceType == 4) {
           $singleProudctPriceInfo = SalesProductPriceEntry::where('purchaseProductId',$purchaseProductId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->first();
           $discountSpecialPrice = SalesProductDiscountPriceEntry::where('purchaseProductId',$purchaseProductId)->where('specialExpiredDate', '>=', $currentDate)->where('shopTypeId',$shopTypeId)->first();
           if (isset($discountSpecialPrice->specialPrice)) {
               return ['price' => $singleProudctPriceInfo->specialPrice, 'discountSpecialPrice' => $discountSpecialPrice->specialPrice];
           }
           else {
              return ['price' => $singleProudctPriceInfo->specialPrice, 'discountSpecialPrice' => ''];
           }
        }
        elseif ($priceType == 5) {
           $singleProudctPriceInfo = SalesProductPriceEntry::where('purchaseProductId',$purchaseProductId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->first();
           $discountECommercePrice = SalesProductDiscountPriceEntry::where('purchaseProductId',$purchaseProductId)->where('	eCommerceExpiredDate', '>=', $currentDate)->where('shopTypeId',$shopTypeId)->first();
           if (isset($discountSpecialPrice->specialPrice)) {
               return ['price' => $singleProudctPriceInfo->eCommercePrice, 'discountSpecialPrice' => $discountECommercePrice->eCommercePrice];
           }
           else {
              return ['price' => $singleProudctPriceInfo->eCommercePrice, 'discountSpecialPrice' => ''];
           }
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

       $request->validate([
            'quantity' => 'required|numeric',
            'unitPrice' => 'required',
       ],
       [
            'quantity.required' => 'Enter Quantity',
            'unitPrice.required' => 'Enter Price',
       ]);


       $implodeSalesCustomerId = implode(',', array_column($request->salesCustomerEntryId,$request->id));
       $salesCustomerId = explode(',',$implodeSalesCustomerId)[0];

       $implodePriceType = implode(',', array_column($request->priceType,$request->id));
       $priceType = explode(',',$implodePriceType)[0];

       $implodeBrandId = implode(',', array_column($request->brandId,$request->id));
       $brandId = explode(',',$implodeBrandId)[0];

       $implodeUnitId = implode(',', array_column($request->unitId,$request->id));
       $unitId = explode(',',$implodeUnitId)[0];

       $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

       $salesDatePosition = strpos($request->salesDate, 'T');
       $salesDate = substr($request->salesDate, 0, $salesDatePosition);

        foreach ($request->purchaseProductId as $purchaseProductId) {
          $productId = PurchaseProductEntry::where('purchaseProductId',$purchaseProductId)->first()->productId;
          if (SalesProductEntry::where('purchaseProductId',$purchaseProductId)->where('salesInvoiceNo',$request->salesInvoiceNo)->where('shopId',Auth::user()->shopId)->exists()) {
              return ['alReadyEntry' => 'Already Product Entry'];
          }
          else {
                SalesProductEntry::insert([
                   'salesInvoiceNo' => $request->salesInvoiceNo,
                   'salesDate'      => $salesDate,
                   'salesCustomerId' => $salesCustomerId,
                   'purchaseProductId' => $purchaseProductId,
                   'productId'      => $productId,
                   'brandId'        => $brandId,
                   'unitId'         => $unitId,
                   'quantity'       => $request->quantity,
                   'unitPrice'      => $request->unitPrice,
                   'totalPrice'     => $request->totalPrice,
                   'discountPrice'  => $request->discountPriceHidden,
                   'priceType'      => $priceType,
                   'shopId'         => Auth::User()->shopId,
                   'shopTypeId'     => $shopTypeId,
                   'createBy'       => Auth::User()->id,
                   'created_at'     => Carbon::now(),
                ]);
                return ['success' => 'ok'];
           }
       }
    }
    public function salesProductQuantityUpdate(Request $request)
    {
        foreach ($request->purchaseProductId as $purchaseProductId) {
            SalesProductEntry::where('purchaseProductId',$purchaseProductId)->where('salesInvoiceNo',$request->salesInvoiceNo)->update([
                'quantity' => $request->quantity,
                'unitPrice' => $request->unitPrice,
                'totalPrice' => $request->totalPrice,
            ]);
            return ;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($salesCustomerEntryId)
    {
        $customerStatus = SalesCustomerEntry::where('salesCustomerEntryId', $salesCustomerEntryId)->first()->customerStatus;

        if ($customerStatus == 0){
            SalesCustomerEntry::where('salesCustomerEntryId', $salesCustomerEntryId)->update([
                'customerStatus' => 1,
                'updateBy'=>  Auth::user()->id,
            ]);

        }
        else {
            SalesCustomerEntry::where('salesCustomerEntryId', $salesCustomerEntryId)->update([
                'customerStatus' => 0,
                'updateBy'=>  Auth::user()->id,
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
    public function destroy($salesProdcutId)
    {
          SalesProductEntry::where('salesProductEntryId',$salesProdcutId)->delete();
    }
}
