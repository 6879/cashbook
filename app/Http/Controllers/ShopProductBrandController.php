<?php

namespace App\Http\Controllers;

use App\ProductBrandEntry;
use App\ShopInformation;
use App\ShopTypeEntry;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule; 

class ShopProductBrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:,admin');
    }




    public function index()
    {

        $adminProductBrandList = ProductBrandEntry::with('shopTypeName')->orderBy('productBrandEntryId','DESC')->get();
        $shopProductBrandList = ProductBrandEntry::with('shopTypeName')->where('createBy',Auth::user()->id)->orderBy('productBrandEntryId','desc')->get();
        return ['shopProductBrandList' => $shopProductBrandList,'adminProductBrandList' => $adminProductBrandList];

    }

    public function productBrandReport(){
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $shoptypeName = ShopTypeEntry::where('shopTypeEntryId',$shopTypeId)->first()->shopTypeName;

        $globalProductBrandReport = ProductBrandEntry::where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::user()->id)->get()->count();
        $owneProductBrandReport = ProductBrandEntry::where('shopTypeId',$shopTypeId)->where('createBy',Auth::user()->id)->get()->count();

        return ['shoptypeName'=> $shoptypeName,'owneProductBrandReport' => $owneProductBrandReport,'globalProductBrandReport' => $globalProductBrandReport];

    }

    
    public function shopProductBrandReportList($uniqueId){
        
        // owner brand list
        if ($uniqueId == 1) {
            $owneProductBrandReport = ProductBrandEntry::where('createBy',Auth::user()->id)->get();
            return ['owneProductBrandReport' => $owneProductBrandReport];
        }

        // global brand list
        else if ($uniqueId == 2){
           $globalProductBrandReport = ProductBrandEntry::where('createBy','!=', Auth::user()->id)->get();
           return ['globalProductBrandReport' => $globalProductBrandReport];
        }


    }
    
    public function shopcategoryReportList($uniqueId){
        
        // owner category list
        if ($uniqueId == 1) {
            $shopcategoryReportList = Category::where('label',1)->get();
            return ['shopcategoryReportList' => $shopcategoryReportList];
        }

        // global category list
        else if ($uniqueId == 2){
           $categoryReportLists1 = Category::where('createBy','!=', Auth::user()->id)->where('label',1)->get();
           return ['categoryReportLists1' => $categoryReportLists1];
        }


    }

    public function ownSubCategoryReportList($ownGlobal){

        if($ownGlobal == 1){
            $ownSubCategoryReportList = Category::where('label', 2)->get();
            $ownThirdCategoryReportLists = Category::where('label', 3)->get();
            $ownFourthCategoryReportLists = Category::where('label', 4)->get();
            $ownFifthCategoryReportLists = Category::where('label', 5)->get();
            $ownSixCategoryReportLists = Category::where('label', 6)->get();
            $ownSevenCategoryReportLists = Category::where('label', 7)->get();
            $ownEightCategoryReportLists = Category::where('label', 8)->get();
            $ownNineCategoryReportLists = Category::where('label', 9)->get();
            $ownTenCategoryReportLists = Category::where('label', 10)->get();
        
        return [
            'ownSubCategoryReportList' => $ownSubCategoryReportList,
            'ownThirdCategoryReportLists' => $ownThirdCategoryReportLists,
            'ownFourthCategoryReportLists' => $ownFourthCategoryReportLists,
            'ownFifthCategoryReportLists' => $ownFifthCategoryReportLists,
            'ownSixCategoryReportLists' => $ownSixCategoryReportLists,
            'ownSevenCategoryReportLists' => $ownSevenCategoryReportLists,
            'ownEightCategoryReportLists' => $ownEightCategoryReportLists,
            'ownNineCategoryReportLists' => $ownNineCategoryReportLists,
            'ownTenCategoryReportLists' => $ownTenCategoryReportLists,
        ];
    
    }
        if($ownGlobal == 2){
        $globalSubCategoryReportList = Category::where('createBy','!=',Auth::user()->id)->where('label', 2)->get();
        $globalThirdCategoryReportLists = Category::where('createBy','!=',Auth::user()->id)->where('label', 3)->get();
        $globalFourthCategoryReportLists = Category::where('createBy','!=',Auth::user()->id)->where('label', 4)->get();
        $globalFifthCategoryReportLists = Category::where('createBy','!=',Auth::user()->id)->where('label', 5)->get();
        $globalSixCategoryReportLists = Category::where('createBy','!=',Auth::user()->id)->where('label', 6)->get();
        $globalSevenCategoryReportLists = Category::where('createBy','!=',Auth::user()->id)->where('label', 7)->get();
        $globalEightCategoryReportLists = Category::where('createBy','!=',Auth::user()->id)->where('label', 8)->get();
        $globalNineCategoryReportLists = Category::where('createBy','!=',Auth::user()->id)->where('label', 9)->get();
        $globalTenCategoryReportLists = Category::where('createBy','!=',Auth::user()->id)->where('label', 10)->get();
        
        return [
            'globalSubCategoryReportList' => $globalSubCategoryReportList,
            'globalThirdCategoryReportLists' => $globalThirdCategoryReportLists,
            'globalFourthCategoryReportLists' => $globalFourthCategoryReportLists,
            'globalFifthCategoryReportLists' => $globalFifthCategoryReportLists,
            'globalSixCategoryReportLists' => $globalSixCategoryReportLists,
            'globalSevenCategoryReportLists' => $globalSevenCategoryReportLists,
            'globalEightCategoryReportLists' => $globalEightCategoryReportLists,
            'globalNineCategoryReportLists' => $globalNineCategoryReportLists,
            'globalTenCategoryReportLists' => $globalTenCategoryReportLists,
        ];
    } 


    }


    public function shopProductBrandReportListForAdmin($uniqueId){
        //$shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

        if ($uniqueId == 1) {
            $owneProductBrandReport = ProductBrandEntry::where('createBy',Auth::user()->id)->get();
            return ['owneProductBrandReport' => $owneProductBrandReport];
        }
        if ($uniqueId == 2){
           $globalProductBrandReport = ProductBrandEntry::where('createBy','!=', Auth::user()->id)->get();
           return ['globalProductBrandReport' => $globalProductBrandReport];
        }


    }

    public function adminProductBrandPosition($shopTypeId){
        $productBrandcount = ProductBrandEntry::where('shopTypeId',$shopTypeId)->get()->count();
        $productBrandIncrement =  $productBrandcount +1;
        return ['productBrandIncrement' => $productBrandIncrement];
    }


    public function shopProductBrandPosition()
    {
        if (isset(Auth::user()->id)) {

            $shopTypeId = Auth::user()->shopTypeId;

            $productBrandcount = ProductBrandEntry::where('shopTypeId',$shopTypeId)->get()->count();
            $productBrandIncrement =  $productBrandcount +1;
            return ['productBrandIncrement' => $productBrandIncrement];
            
        }
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'productBrandName' => 'required|unique:product_brand_entries,productBrandName',
            'productBrandStatus' => 'required',
        ],
        [
            'productBrandName.required' => "Enter Product Brand Name",
            'productBrandStatus.required' => "Select Product Brand Status",
        ]);



          $ProductBrandEntry = new ProductBrandEntry();
          $ProductBrandEntry->productBrandName = $request->productBrandName;
          $ProductBrandEntry->productBrandPosition = $request->productBrandPosition;
          $ProductBrandEntry->productBrandStatus = $request->productBrandStatus;
          if (Auth::guard() == 'admin') {
             $shopTypeId = Auth::user()->shopTypeId;
          }
          else {
            $shopTypeId = $request->shopTypeId;
          }
          $ProductBrandEntry->shopTypeId = $shopTypeId;
          $ProductBrandEntry->createBy = Auth::user()->id;
          $ProductBrandEntry->created_at = Carbon::now();
          $ProductBrandEntry->save();
          return ['data'=>$request];
    }


    public function show($id)
    {
        $data = ProductBrandEntry::where('productBrandEntryId', $id)->first()->productBrandStatus;

        if ($data == 1) {
            ProductBrandEntry::where('productBrandEntryId', $id)->update([
                'productBrandStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        } else {
            ProductBrandEntry::where('productBrandEntryId', $id)->update([
                'productBrandStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
        
         
            $guard = Auth::getDefaultDriver();
         
       
        return ['data'=>$guard];
    }


    public function edit($id)
    {
        $editProductBrandType = ProductBrandEntry::where('productBrandEntryId', $id)->first();
        return ['editProductBrandType' => $editProductBrandType];
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'productBrandName' => "required|unique:product_brand_entries,productBrandName,$id,productBrandEntryId",
            'productBrandStatus' => 'required',
        ],
        [
            'productBrandName.required' => "Enter Product Brand Name",
            'productBrandStatus.required' => "Select Product Brand Status",
        ]);

        ProductBrandEntry::where('productBrandEntryId', $id)->update([
            'productBrandName' => $request->productBrandName,
            'productBrandStatus' => $request->productBrandStatus,
            'updateBy' => Auth::user()->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductBrandEntry::where('productBrandEntryId', $id)->delete();
    }
}
