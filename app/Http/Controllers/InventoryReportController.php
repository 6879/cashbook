<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductPriceSetupDetail;
use App\PurchaseProductDetails;
use App\SalesProductPriceEntry;
use App\PurchaseProductEntry;
use App\ProductBrandEntry;
use App\ProductCategory;
use App\ShopInformation;
use App\ProductName;
use App\Category;

use Carbon\Carbon;
use Auth;

class InventoryReportController extends Controller
{
    public function stockSummaryProductReport()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $purchaseProductReports = PurchaseProductEntry::with('productName','brandName','unitName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->paginate(50);
            return ['purchaseProductReports' => $purchaseProductReports];
        }
    }
    public function stockSummaryProductDetails($purchaseProductId)
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
          $purchaseProductDetails = PurchaseProductDetails::where('purchaseProductId',$purchaseProductId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->first();
          return ['purchaseProductDetails' => $purchaseProductDetails];
    }
    public function stockShortageProductReport()
    {
      if (isset(Auth::user()->shopId)) {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $lowQuantityReports = PurchaseProductDetails::with('purchaseProductInfo','productName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->paginate(50);
        return ['lowQuantityReports' => $lowQuantityReports];
      }
    }
    public function inventoryProductNameWithoutPrice()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $productNameList = ProductName::where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->where('priceStatus',1)->latest()->paginate(50);
            return ['productNameList' => $productNameList];
        }
    }
    public function inventoryProductNameWithPrice()
  {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $salesProductPriceReports = SalesProductPriceEntry::with('productName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->paginate(50);
            return ['salesProductPriceReports' => $salesProductPriceReports];
        }
    }
    public function invetoryCategoryWithoutPriceList()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

            $productPriceSetupCategory = ProductPriceSetupDetail::with('categoryName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->distinct()->latest()->paginate(5,['categoryId']);
            $productPriceSetupCategoryProduct = ProductPriceSetupDetail::where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();
            $productPriceSetupProduct = ProductPriceSetupDetail::with('productName','productBrandName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();
            $productName = ProductName::where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();

            return ['productPriceSetupCategoryProduct'=>$productPriceSetupCategoryProduct,'productPriceSetupCategory' => $productPriceSetupCategory,'productPriceSetupProduct'=>$productPriceSetupProduct,'productName' => $productName];
        }
    }
    public function invetoryCategoryWithPriceList()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

            $productPriceSetupCategory = ProductPriceSetupDetail::with('categoryName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->distinct()->latest()->paginate(5,['categoryId']);
            $productPriceSetupProduct = ProductPriceSetupDetail::with('productName','productBrandName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();

            return ['productPriceSetupCategory' => $productPriceSetupCategory,'productPriceSetupProduct'=>$productPriceSetupProduct];
        }
    }
    public function lowQuantityProductList()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $lowQuantityProductList = PurchaseProductEntry::with('productName','unitName')->where('quantity','<=',10)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->paginate(50);

            return ['lowQuantityProductList' => $lowQuantityProductList];
        }

    }
    public function expireDateOverProductList()
    {
       if (isset(Auth::user()->shopId)) {
            $nowData = Carbon::now()->format('Y-m-d');
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $expireDateOverProductLists = PurchaseProductDetails::with('productName')->where('expiryDate','<',$nowData)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->paginate(50);
            return ['expireDateOverProductLists' => $expireDateOverProductLists];
       }
    }
    public function expireDateSoonProductList()
    {
      if (isset(Auth::user()->shopId)) {
          $nowData = Carbon::now()->format('Y-m-d');
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
          $expireDateSoonProductLists = PurchaseProductDetails::with('productName')->where('expiryDate','>',$nowData)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->paginate(50);
          return ['expireDateSoonProductLists' => $expireDateSoonProductLists];
      }
   }
}
