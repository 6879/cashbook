<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\ProductBrandEntry;
use App\ProductCategory;
use App\ShopInformation;
use App\ProductPriceSetupDetail;
use App\PurchaseProductEntry;
use Carbon\Carbon;
use Auth;
class ProductPriceSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
       $productPriceSetupList = ProductPriceSetupDetail::with('categoryName','productName','productBrandName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->paginate(20);
       return['productPriceSetupList' => $productPriceSetupList];
    }
    public function productCategoryLists()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $categoryLists = Category::where('label',1)->latest()->get();
        $shopProductBrandList = ProductBrandEntry::with('shopTypeName')->where('shopTypeId',$shopTypeId)->orderBy('productBrandEntryId','desc')->get();

        return ['categoryLists' => $categoryLists,'shopProductBrandList' => $shopProductBrandList];
    }
    public function productCategoryIdCatch($categoryId)
    {
        $categoryWishProductList = ProductCategory::with('productName')->where('categoryId',$categoryId)->distinct()->get(['categoryId','productNameId']);
        return ['categoryWishProductList' => $categoryWishProductList];
    }
    public function productNameIdCatch($productNameId)
    {
          if (PurchaseProductEntry::where('productId',$productNameId)->exists()) {
              $productEntryUnitPrice = PurchaseProductEntry::where('productId',$productNameId)->first()->unitPrice;
              return ['productEntryUnitPrice' => $productEntryUnitPrice];
          }
          else {
               $productEntryunitPrice = 0;
               return ['productEntryUnitPrice' => $productEntryunitPrice];
          }
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
        $this->validate($request, [
            'categoryId' => 'required',
            'productNameId' => 'required',
            'productBrandId' => 'required',
            'notification' => 'required',
            'mrp' => 'required|numeric',
            'salesPrice' => 'required|numeric',
            'holeSalesPrice' => 'required|numeric',
            'relativePrice' => 'required|numeric',
            'condition' => 'required',
            'advantage' => 'required',
            'detail' => 'required',
            'useSystem' => 'required',
          ]);
         $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          if (ProductPriceSetupDetail::where('categoryId',$request->categoryId)->where('productNameId',$request->productNameId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->exists()) {
                return['productAdd' => 'The product price setup has already been taken'];
          }
          else {
              ProductPriceSetupDetail::insert([
                   'categoryId' => $request->categoryId,
                   'productNameId' => $request->productNameId,
                   'productBrandId' => $request->productBrandId,
                   'batchNo' => $request->batchNo,
                   'mfgDate' => $request->mfgDate,
                   'expDate' => $request->expDate,
                   'modelNo' => $request->modelNo,
                   'warranty' => $request->warranty,
                   'guranty' => $request->guranty,
                   'notification' => $request->notification,
                   'mrp' => $request->mrp,
                   'salesPrice' => $request->salesPrice,
                   'holeSalesPrice' => $request->holeSalesPrice,
                   'relativePrice' => $request->relativePrice,
                   'condition' => strip_tags($request->condition),
                   'advantage' => strip_tags($request->advantage),
                   'detail' => strip_tags($request->detail),
                   'useSystem' => strip_tags($request->useSystem),
                   'shopId' => Auth::user()->shopId,
                   'shopUserId' => Auth::user()->shopId,
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
    public function destroy($productPriceSetupid)
    {
        ProductPriceSetupDetail::where('productPriceSetupid',$productPriceSetupid)->delete();
    }
}
