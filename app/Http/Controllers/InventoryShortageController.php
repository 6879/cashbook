<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseProductEntry;
use App\ShopInformation;
use Auth;

class InventoryShortageController extends Controller
{
    public function brandWithProductShortage()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $purchaseBrandLists = PurchaseProductEntry::select('brandId')->with('brandName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->distinct()->paginate(15,['brandId']);
        $purchaseProductLists = PurchaseProductEntry::with('productName','brandName','unitName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->get();
        return ['purchaseBrandLists' => $purchaseBrandLists, 'purchaseProductLists' => $purchaseProductLists];
    }
    public function supplierWithProductShortage()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $purchaseSupplierLists = PurchaseProductEntry::select('productSupplierId')->with('productSupplierName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->distinct()->paginate(15,['productSupplierId']);
        $purchaseProductLists = PurchaseProductEntry::with('productName','brandName','unitName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->get();
        return ['purchaseSupplierLists' => $purchaseSupplierLists, 'purchaseProductLists' => $purchaseProductLists];
    }






}
