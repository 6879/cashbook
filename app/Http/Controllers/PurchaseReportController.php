<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseProductTotalQuantity;
use App\PurchaseProductTotalPrice;
use App\AddProductSupplierEntry;
use App\PurchaseProductDetails;
use App\PurchaseProductEntry;
use App\PurchaseInvoice;
use App\ShopInformation;
use Auth;

class PurchaseReportController extends Controller
{

   
   public function __construct()
   {
       $this->middleware('auth:,admin');
   }



    public function productSupplierReport()
    {
        if (Auth::guard('admin')->check()) {
            $shopTypeId = Auth::user()->shopTypeId;
            $productSupplierReports = AddProductSupplierEntry::where('shopTypeId',$shopTypeId)->where('shopId',Auth::User()->id)->latest()->paginate(20);
            $totalQuantityReports = PurchaseProductTotalQuantity::where('shopTypeId',$shopTypeId)->where('shopId',Auth::User()->id)->latest()->get();
            return [
               'productSupplierReports'=> $productSupplierReports,
               'totalQuantityReports' => $totalQuantityReports
                   ];
        }
    }
    public function supplierInvoiceDetails($productSupplierId)
    {
       if (isset(Auth::user()->shopId)) {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
          $purchaseInvoiceReports = PurchaseInvoice::where('productSupplierId',$productSupplierId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->get();
          return ['purchaseInvoiceReports' => $purchaseInvoiceReports];
       }
    }
    public function purchaseInvoiceReport()
    {
       if (isset(Auth::user()->shopId)) {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
          $purchaseInvoiceReports = PurchaseInvoice::with('productSupplierName','purchaseType')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->paginate(30);
          return ['purchaseInvoiceReports' => $purchaseInvoiceReports];
      }
    }
    public function purchaseProductReport()
    {
       if (isset(Auth::user()->shopId)) {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
          $purchaseProductReports = PurchaseProductTotalPrice::with('productName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->paginate(30);
          return ['purchaseProductReports' => $purchaseProductReports];
       }
    }
    public function purchaseProductReportList($purchaseProductId)
    {
       if (isset(Auth::user()->shopId)) {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
          $purchaseProductReports = PurchaseProductEntry::with('productName','unitName')->where('productId',$purchaseProductId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();
          return ['purchaseProductReports' => $purchaseProductReports];
       }
    }
    public function purchaseProductReportDetails($purchaseProductId)
    {
       if (isset(Auth::user()->shopId)) {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
          $purchaseProductDetails = PurchaseProductDetails::where('purchaseProductId',$purchaseProductId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->first();
          return ['purchaseProductDetails' => $purchaseProductDetails];
       }
    }






}
