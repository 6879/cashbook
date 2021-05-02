<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesProductDiscountPriceEntry;
use App\SalesProductPriceEntry;
use App\ShopCustomerTypeEntry;
use App\SalesCustomerEntry;
use App\ShopInformation;
use Auth;

class SalesProductReportController extends Controller
{
    public function salesProductPriceReport()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          $salesProductPriceReports = SalesProductPriceEntry::with('productName')->where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->where('createBy',Auth::User()->id)->latest()->paginate(30);
          return ['salesProductPriceReports' => $salesProductPriceReports];
    }

    public function salesProductDiscountPriceReport()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          $salesProductDiscountPriceReports = SalesProductDiscountPriceEntry::with('productName')->where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->where('createBy',Auth::User()->id)->latest()->paginate(20);
          return ['salesProductDiscountPriceReports' => $salesProductDiscountPriceReports];
    }
    public function salesCustomerListReport()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $customerTypeLists = ShopCustomerTypeEntry::select('shopCustomerTypeEntryId','shopCustomerName')->where('shopCustomerStatus',1)->orderBy('shopCustomerTypeEntryId','desc')->get();
        $customerPhoneLists = SalesCustomerEntry::select('salesCustomerEntryId','customerPhone')->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->latest()->get();
        $customerReports = SalesCustomerEntry::with('shopCustomerTypeName')->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->latest()->get();
        return ['customerTypeLists' => $customerTypeLists,'customerPhoneLists' => $customerPhoneLists, 'customerReports' => $customerReports];
    }
    public function serchCustomerInfo(Request $request)
    {
        if (isset($request->customerTypeId)) {
            foreach ($request->customerTypeId as $customerTypeId) {
              $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
              $customerReports = SalesCustomerEntry::with('shopCustomerTypeName')->where('customerTypeId',$customerTypeId)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->latest()->get();
              return ['customerReports' => $customerReports];
            }
        }
        else {
            foreach ($request->customerPhoneNumber as $salesCustomerEntryId) {
              $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
              $customerReports = SalesCustomerEntry::with('shopCustomerTypeName')->where('salesCustomerEntryId',$salesCustomerEntryId)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->latest()->get();
              return ['customerReports' => $customerReports];
            }
        }
    }


}
