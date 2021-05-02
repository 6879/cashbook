<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\ProductName;
use App\Category;
use Carbon\Carbon;
use Auth;

class ProductNameController extends Controller
{


      
    public function __construct()
    {
        $this->middleware('auth:,admin');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $shopTypeId = Auth::user()->shopTypeId;
        $productNameList = ProductName::with('shopTypeName','productCategory','categoryName')->where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->id)->where('createBy',Auth::User()->id)->get();

        $categoryLists =  Category::where('shopTypeId',$shopTypeId)->get();
        $productCode = ProductName::where('shopId',Auth::user()->id)->where('shopTypeId',$shopTypeId)->get()->count();
        $productCodeIncre = $productCode  + 1;
        return ['productNameList' => $productNameList, 'categoryLists' => $categoryLists,'productCodeCountIncre' => $productCodeIncre];
    }

    public function productCateorySelectList()
    {
          $shopTypeId = Auth::user()->shopTypeId;
          $categoryList =  Category::where('label',1)->where('shopTypeId',$shopTypeId)->get();
          return ['categoryList' => $categoryList];
    }
    public function productCategoryId($categoryId)
    {
          $subCategoryList =  Category::where('label',2)->where('previousId',$categoryId)->get();

          return ['subCategoryList' => $subCategoryList];

    }
    public function productSubCategoryId($subCategoryId)
    {
          $thirdCategoryList =  Category::where('label',3)->where('previousId',$subCategoryId)->get();
          return ['thirdCategoryList' => $thirdCategoryList];
    }
    public function productThirdCategoryId($thirdCategoryId)
    {
          $fourCategoryList =  Category::where('label',4)->where('previousId',$thirdCategoryId)->get();
          return ['fourCategoryList' => $fourCategoryList];
    }
    public function productFourCategoryId($fourCategoryId)
    {
          $fiveCategoryList =  Category::where('label',5)->where('previousId',$fourCategoryId)->get();
          return ['fiveCategoryList' => $fiveCategoryList];
    }
    public function productFiveCategoryId($fiveCategoryId)
    {
          $sixCategoryList =  Category::where('label',6)->where('previousId',$fiveCategoryId)->get();
          return ['sixCategoryList' => $sixCategoryList];
    }
    public function productSixCategoryId($sixCategoryId)
    {
          $sevenCategoryList =  Category::where('label',7)->where('previousId',$sixCategoryId)->get();
          return ['sevenCategoryList' => $sevenCategoryList];
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
              'category' => 'required',
              'productName' => 'required|unique:product_names,productName',
          ],
          [
             'category.required' => 'Select Category  Name',
             'productName.required' => 'Enter Your Product Name',
          ]);

           $shopTypeId = Auth::user()->shopTypeId;

            if (isset($request->productQRNumber)) {
              if (ProductName::where('productQRNumber',$request->productQRNumber)->exists()) {
                    return ['changeProductQR' => 'Change product QR Number'];
               }
            }

            $productId = ProductName::insertGetId([
              'productName' => $request->productName,
              'productCode' => $request->productCode,
              'productQRNumber' => $request->productQRNumber,
              'shopId' => Auth::user()->id,
              'shopTypeId' => $shopTypeId,
              'createBy' => Auth::User()->id,
              'created_at' => Carbon::now(),
            ]);


          if (isset($request->category)) {
                $ProductCategory = new ProductCategory();
                $ProductCategory->productNameId = $productId;
                $ProductCategory->categoryId = $request->category;
                $ProductCategory->label = 1;
                $ProductCategory->shopId = Auth::user()->id;
                $ProductCategory->shopTypeId = $shopTypeId;
                $ProductCategory->createBy = Auth::User()->id;
                $ProductCategory->created_at = Carbon::now();
                $ProductCategory->save();
          }
          if (isset($request->subCategory)) {
                $ProductCategory = new ProductCategory();
                $ProductCategory->productNameId = $productId;
                $ProductCategory->categoryId = $request->subCategory;
                $ProductCategory->label = 2;
                $ProductCategory->shopId = Auth::user()->id;
                $ProductCategory->shopTypeId = $shopTypeId;
                $ProductCategory->createBy = Auth::User()->id;
                $ProductCategory->created_at = Carbon::now();
                $ProductCategory->save();
           }
          if (isset($request->thirdCategory)) {
                $ProductCategory = new ProductCategory();
                $ProductCategory->productNameId = $productId;
                $ProductCategory->categoryId = $request->thirdCategory;
                $ProductCategory->label = 3;
                $ProductCategory->shopId = Auth::user()->id;
                $ProductCategory->shopTypeId = $shopTypeId;
                $ProductCategory->createBy = Auth::User()->id;
                $ProductCategory->created_at = Carbon::now();
                $ProductCategory->save();
           }
          if (isset($request->fourCategory)) {
                $ProductCategory = new ProductCategory();
                $ProductCategory->productNameId = $productId;
                $ProductCategory->categoryId = $request->fourCategory;
                $ProductCategory->label = 4;
                $ProductCategory->shopId = Auth::user()->id;
                $ProductCategory->shopTypeId = $shopTypeId;
                $ProductCategory->createBy = Auth::User()->id;
                $ProductCategory->created_at = Carbon::now();
                $ProductCategory->save();
           }
          if (isset($request->fiveCategory)) {
                $ProductCategory = new ProductCategory();
                $ProductCategory->productNameId = $productId;
                $ProductCategory->categoryId = $request->fiveCategory;
                $ProductCategory->label = 5;
                $ProductCategory->shopId = Auth::user()->id;
                $ProductCategory->shopTypeId = $shopTypeId;
                $ProductCategory->createBy = Auth::User()->id;
                $ProductCategory->created_at = Carbon::now();
                $ProductCategory->save();
           }
          if (isset($request->sixCategory)) {
                $ProductCategory = new ProductCategory();
                $ProductCategory->productNameId = $productId;
                $ProductCategory->categoryId = $request->sixCategory;
                $ProductCategory->label = 6;
                $ProductCategory->shopId = Auth::user()->id;
                $ProductCategory->shopTypeId = $shopTypeId;
                $ProductCategory->createBy = Auth::User()->id;
                $ProductCategory->created_at = Carbon::now();
                $ProductCategory->save();
           }
          if (isset($request->sevenCategory)) {
                $ProductCategory = new ProductCategory();
                $ProductCategory->productNameId = $productId;
                $ProductCategory->categoryId = $request->sevenCategory;
                $ProductCategory->label = 7;
                $ProductCategory->shopId = Auth::user()->id;
                $ProductCategory->shopTypeId = $shopTypeId;
                $ProductCategory->createBy = Auth::User()->id;
                $ProductCategory->created_at = Carbon::now();
                $ProductCategory->save();
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
    public function destroy($productNameId)
    {
         ProductName::where('productNameId',$productNameId)->delete();
         $productNameIds = ProductCategory::where('productNameId',$productNameId)->get();
         foreach ($productNameIds as $productNameId) {
             ProductCategory::where('productNameId',$productNameId->productNameId)->delete();
         }
    }
}
