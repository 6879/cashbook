<?php

namespace App\Http\Controllers;

use Cassandra\Custom;
use Illuminate\Http\Request;
use App\Category;
use App\ShopTypeEntry;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{


  
  public function __construct()
  {
      $this->middleware('auth:,admin');
  }

  

    public function index()
    {
          $adminCategoryLists = Category::with('shopTypeName')->where('createBy',Auth::user()->id)->paginate(20);
          $shopCategoryLists = Category::with('shopTypeName')->where('createBy',Auth::user()->id)->paginate(20);
          return ['adminCategoryLists' => $adminCategoryLists,'shopCategoryLists' => $shopCategoryLists];
    }


    public function create()
    {
          $role = Auth::User();
          $shopTypeNames = ShopTypeEntry::orderBy('shopTypeEntryId','desc')->get();

          return ['shopTypeNames' => $shopTypeNames,'role' => $role ];

    }

    public function cateorySelectList()
    {
        if (Auth::guard('admin')->check()) {
            $shopTypeId = Auth::user()->shopTypeId;
            $categoryList =  Category::where('label',1)->where('shopTypeId',$shopTypeId)->get();

            $categorylabel = Category::where('label',1)->where('shopTypeId',$shopTypeId)->get()->count();
            $categoryPositionIncre = $categorylabel +1;
            return ['categoryList' => $categoryList,'categoryPositionIncre' => $categoryPositionIncre];
        }
    }
    public function adminShopTypeIdSelect($shopTypeId)
    {
          $categoryList =  Category::where('label',1)->where('shopTypeId',$shopTypeId)->get();

          $categorylabel = Category::where('label',1)->where('shopTypeId',$shopTypeId)->get()->count();
          $categoryPositionIncre = $categorylabel +1;
          return ['categoryList' => $categoryList,'categoryPositionIncre' => $categoryPositionIncre];
    }

    public function  categoryId($categoryId)
    {
          $subCategoryList =  Category::where('label',2)->where('previousId',$categoryId)->get();

          $categorylabel = Category::where('categoryId',$categoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$categoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['subCategoryList' => $subCategoryList,'categoryPositionIncre' => $categoryPositionIncre];

    }
    public function  subCategoryId($subCategoryId)
    {
          $thirdCategoryList =  Category::where('label',3)->where('previousId',$subCategoryId)->get();

          $categorylabel = Category::where('categoryId',$subCategoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$subCategoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['thirdCategoryList' => $thirdCategoryList,'categoryPositionIncre' => $categoryPositionIncre];
    }
    public function  thirdCategoryId($thirdCategoryId)
    {
          $fourCategoryList =  Category::where('label',4)->where('previousId',$thirdCategoryId)->get();

          $categorylabel = Category::where('categoryId',$thirdCategoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$thirdCategoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['fourCategoryList' => $fourCategoryList,'categoryPositionIncre' => $categoryPositionIncre];
    }
    public function  fourCategoryId($fourCategoryId)
    {
          $fiveCategoryList =  Category::where('label',5)->where('previousId',$fourCategoryId)->get();

          $categorylabel = Category::where('categoryId',$fourCategoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$fourCategoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['fiveCategoryList' => $fiveCategoryList,'categoryPositionIncre' => $categoryPositionIncre];
    }
    public function fiveCategoryId($fiveCategoryId)
    {
          $sixCategoryList =  Category::where('label',6)->where('previousId',$fiveCategoryId)->get();

          $categorylabel = Category::where('categoryId',$fiveCategoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$fiveCategoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['sixCategoryList' => $sixCategoryList,'categoryPositionIncre' => $categoryPositionIncre];
    }
    public function  sixCategoryId($sixCategoryId)
    {
          $sevenCategoryList =  Category::where('label',7)->where('previousId',$sixCategoryId)->get();

          $categorylabel = Category::where('categoryId',$sixCategoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$sixCategoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['sevenCategoryList' => $sevenCategoryList,'categoryPositionIncre' => $categoryPositionIncre];
    }
    public function  sevenCategoryId($sevenCategoryId)
    {
          $categorylabel = Category::where('categoryId',$sevenCategoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$sevenCategoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['categoryPositionIncre' => $categoryPositionIncre];
    }



    public function store(Request $request)
    {
          $this->validate($request, [
              'categoryName' => 'required',
              'categoryStatus' => 'required',
          ],
          [
             'categoryName.required' => 'Enter Category  Name',
             'categoryStatus.required' => 'Select Category Status',
          ]);

          if (isset($request->shopTypeId)) {

              if (Category::where('shopTypeId',$request->shopTypeId)->where('categoryName',$request->categoryName)->exists()) {
                   return ['changeCategoryName'=>'Change Your Category Name'];
              }
              else {

                if (isset($request->sevenCategory)) {
                  $Category = new Category();
                  $Category->categoryName = $request->categoryName;
                  $Category->categoryPosition = $request->categoryPosition;
                  $Category->categoryStatus = $request->categoryStatus;
                  if (isset($request->subCategoryStatus)){
                    $Category->subCategoryStatus =  true;
                  }
                  else {
                    $Category->subCategoryStatus = false;
                  }
                  if (isset($request->sevenCategory)) {
                    $Category->previousId = $request->sevenCategory;
                  }
                  if (isset($request->sevenCategory)) {
                    $label = Category::where('categoryId',$request->sevenCategory)->first()->label;
                    $incrementLabel = $label+1;
                    $Category->label = $incrementLabel;
                  }
                  $Category->shopTypeId = $request->shopTypeId;
                  $Category->createBy = Auth::User()->id;
                  $Category->created_at = Carbon::now();
                  $Category->save();
                  return ;
                }

                if (isset($request->sixCategory)) {
                    $Category = new Category();
                    $Category->categoryName = $request->categoryName;
                    $Category->categoryPosition = $request->categoryPosition;
                    $Category->categoryStatus = $request->categoryStatus;
                    if (isset($request->subCategoryStatus)){
                      $Category->subCategoryStatus =  true;
                    }
                    else {
                      $Category->subCategoryStatus = false;
                    }
                    if (isset($request->sixCategory)) {
                      $Category->previousId = $request->sixCategory;
                    }
                    if (isset($request->sixCategory)) {
                      $label = Category::where('categoryId',$request->sixCategory)->first()->label;
                      $incrementLabel = $label+1;
                      $Category->label = $incrementLabel;
                    }
                    $Category->shopTypeId = $request->shopTypeId;
                    $Category->createBy = Auth::User()->id;
                    $Category->created_at = Carbon::now();
                    $Category->save();
                    return ;
                 }

                 if (isset($request->fiveCategory)) {
                   $Category = new Category();
                   $Category->categoryName = $request->categoryName;
                   $Category->categoryPosition = $request->categoryPosition;
                   $Category->categoryStatus = $request->categoryStatus;
                   if (isset($request->subCategoryStatus)){
                     $Category->subCategoryStatus =  true;
                   }
                   else {
                     $Category->subCategoryStatus = false;
                   }
                   if (isset($request->fiveCategory)) {
                     $Category->previousId = $request->fiveCategory;
                   }
                   if (isset($request->fiveCategory)) {
                     $label = Category::where('categoryId',$request->fiveCategory)->first()->label;
                     $incrementLabel = $label+1;
                     $Category->label = $incrementLabel;
                   }
                   $Category->shopTypeId = $request->shopTypeId;
                   $Category->createBy = Auth::User()->id;
                   $Category->created_at = Carbon::now();
                   $Category->save();
                   return ;
                 }

               if (isset($request->fourCategory)) {
                   $Category = new Category();
                   $Category->categoryName = $request->categoryName;
                   $Category->categoryPosition = $request->categoryPosition;
                   $Category->categoryStatus = $request->categoryStatus;
                   if (isset($request->subCategoryStatus)){
                     $Category->subCategoryStatus =  true;
                   }
                   else {
                     $Category->subCategoryStatus = false;
                   }
                   if (isset($request->fourCategory)) {
                     $Category->previousId = $request->fourCategory;
                   }
                   if (isset($request->fourCategory)) {
                     $label = Category::where('categoryId',$request->fourCategory)->first()->label;
                     $incrementLabel = $label+1;
                     $Category->label = $incrementLabel;
                   }
                   $Category->shopTypeId = $request->shopTypeId;
                   $Category->createBy = Auth::User()->id;
                   $Category->created_at = Carbon::now();
                   $Category->save();
                   return ;
                }


               if (isset($request->thirdCategory)) {
                     $Category = new Category();
                     $Category->categoryName = $request->categoryName;
                     $Category->categoryPosition = $request->categoryPosition;
                     $Category->categoryStatus = $request->categoryStatus;
                     if (isset($request->subCategoryStatus)){
                       $Category->subCategoryStatus =  true;
                     }
                     else {
                       $Category->subCategoryStatus = false;
                     }
                     if (isset($request->thirdCategory)) {
                       $Category->previousId = $request->thirdCategory;
                     }
                     if (isset($request->thirdCategory)) {
                       $label = Category::where('categoryId',$request->thirdCategory)->first()->label;
                       $incrementLabel = $label+1;
                       $Category->label = $incrementLabel;
                     }
                     $Category->shopTypeId = $request->shopTypeId;
                     $Category->createBy = Auth::User()->id;
                     $Category->created_at = Carbon::now();
                     $Category->save();
                     return ;
                }

               if (isset($request->subCategory)) {
                 $Category = new Category();
                 $Category->categoryName = $request->categoryName;
                 $Category->categoryPosition = $request->categoryPosition;
                 $Category->categoryStatus = $request->categoryStatus;
                 if (isset($request->subCategoryStatus)){
                   $Category->subCategoryStatus =  true;
                 }
                 else {
                   $Category->subCategoryStatus = false;
                 }
                 if (isset($request->category)) {
                   $Category->previousId = $request->subCategory;
                 }
                 if (isset($request->subCategory)) {
                   $label = Category::where('categoryId',$request->subCategory)->first()->label;
                   $incrementLabel = $label+1;
                   $Category->label = $incrementLabel;
                 }
                 $Category->shopTypeId = $request->shopTypeId;
                 $Category->createBy = Auth::User()->id;
                 $Category->created_at = Carbon::now();
                 $Category->save();
                 return ;
               }


               if (isset($request->category)) {
                   $Category = new Category();
                   $Category->categoryName = $request->categoryName;
                   $Category->categoryPosition = $request->categoryPosition;
                   $Category->categoryStatus = $request->categoryStatus;
                   if (isset($request->subCategoryStatus)){
                     $Category->subCategoryStatus =  true;
                   }
                   else {
                     $Category->subCategoryStatus = false;
                   }
                   if (isset($request->category)) {
                       $Category->previousId = $request->category;
                   }
                   if (isset($request->category)) {
                       $label = Category::where('categoryId',$request->category)->first()->label;
                       $incrementLabel = $label+1;
                       $Category->label = $incrementLabel;
                   }
                   $Category->shopTypeId = $request->shopTypeId;
                   $Category->createBy = Auth::User()->id;
                   $Category->created_at = Carbon::now();
                   $Category->save();
                   return ;
               }

               $Category = new Category();
               $Category->categoryName = $request->categoryName;
               $Category->categoryPosition = $request->categoryPosition;
               $Category->categoryStatus = $request->categoryStatus;
               if (isset($request->subCategoryStatus)){
                 $Category->subCategoryStatus =  true;
               }
               else {
                 $Category->subCategoryStatus = false;
               }
               $Category->shopTypeId = $request->shopTypeId;
               $Category->createBy = Auth::User()->id;
               $Category->created_at = Carbon::now();
               $Category->save();

             }
         }

        else {
          $shopTypeId = Auth::user()->shopTypeId;

          if (Category::where('shopTypeId',$shopTypeId)->where('categoryName',$request->categoryName)->exists()) {
               return ['changeCategoryName'=>'Change Your Category Name'];
          }
          else {
                if (isset($request->sevenCategory)) {
                  $Category = new Category();
                  $Category->categoryName = $request->categoryName;
                  $Category->categoryPosition = $request->categoryPosition;
                  $Category->categoryStatus = $request->categoryStatus;
                  if (isset($request->subCategoryStatus)){
                    $Category->subCategoryStatus =  true;
                  }
                  else {
                    $Category->subCategoryStatus = false;
                  }
                  if (isset($request->sevenCategory)) {
                    $Category->previousId = $request->sevenCategory;
                  }
                  if (isset($request->sevenCategory)) {
                    $label = Category::where('categoryId',$request->sevenCategory)->first()->label;
                    $incrementLabel = $label+1;
                    $Category->label = $incrementLabel;
                  }
                  $Category->shopTypeId = $shopTypeId;
                  $Category->createBy = Auth::User()->id;
                  $Category->created_at = Carbon::now();
                  $Category->save();
                  return ;
                }

                if (isset($request->sixCategory)) {
                    $Category = new Category();
                    $Category->categoryName = $request->categoryName;
                    $Category->categoryPosition = $request->categoryPosition;
                    $Category->categoryStatus = $request->categoryStatus;
                    if (isset($request->subCategoryStatus)){
                      $Category->subCategoryStatus =  true;
                    }
                    else {
                      $Category->subCategoryStatus = false;
                    }
                    if (isset($request->sixCategory)) {
                      $Category->previousId = $request->sixCategory;
                    }
                    if (isset($request->sixCategory)) {
                      $label = Category::where('categoryId',$request->sixCategory)->first()->label;
                      $incrementLabel = $label+1;
                      $Category->label = $incrementLabel;
                    }
                    $Category->shopTypeId = $shopTypeId;
                    $Category->createBy = Auth::User()->id;
                    $Category->created_at = Carbon::now();
                    $Category->save();
                    return ;
                 }

                 if (isset($request->fiveCategory)) {
                   $Category = new Category();
                   $Category->categoryName = $request->categoryName;
                   $Category->categoryPosition = $request->categoryPosition;
                   $Category->categoryStatus = $request->categoryStatus;
                   if (isset($request->subCategoryStatus)){
                     $Category->subCategoryStatus =  true;
                   }
                   else {
                     $Category->subCategoryStatus = false;
                   }
                   if (isset($request->fiveCategory)) {
                     $Category->previousId = $request->fiveCategory;
                   }
                   if (isset($request->fiveCategory)) {
                     $label = Category::where('categoryId',$request->fiveCategory)->first()->label;
                     $incrementLabel = $label+1;
                     $Category->label = $incrementLabel;
                   }
                   $Category->shopTypeId = $shopTypeId;
                   $Category->createBy = Auth::User()->id;
                   $Category->created_at = Carbon::now();
                   $Category->save();
                   return ;
                 }

               if (isset($request->fourCategory)) {
                   $Category = new Category();
                   $Category->categoryName = $request->categoryName;
                   $Category->categoryPosition = $request->categoryPosition;
                   $Category->categoryStatus = $request->categoryStatus;
                   if (isset($request->subCategoryStatus)){
                     $Category->subCategoryStatus =  true;
                   }
                   else {
                     $Category->subCategoryStatus = false;
                   }
                   if (isset($request->fourCategory)) {
                     $Category->previousId = $request->fourCategory;
                   }
                   if (isset($request->fourCategory)) {
                     $label = Category::where('categoryId',$request->fourCategory)->first()->label;
                     $incrementLabel = $label+1;
                     $Category->label = $incrementLabel;
                   }
                   $Category->shopTypeId = $shopTypeId;
                   $Category->createBy = Auth::User()->id;
                   $Category->created_at = Carbon::now();
                   $Category->save();
                   return ;
                }


               if (isset($request->thirdCategory)) {
                     $Category = new Category();
                     $Category->categoryName = $request->categoryName;
                     $Category->categoryPosition = $request->categoryPosition;
                     $Category->categoryStatus = $request->categoryStatus;
                     if (isset($request->subCategoryStatus)){
                       $Category->subCategoryStatus =  true;
                     }
                     else {
                       $Category->subCategoryStatus = false;
                     }
                     if (isset($request->thirdCategory)) {
                       $Category->previousId = $request->thirdCategory;
                     }
                     if (isset($request->thirdCategory)) {
                       $label = Category::where('categoryId',$request->thirdCategory)->first()->label;
                       $incrementLabel = $label+1;
                       $Category->label = $incrementLabel;
                     }
                     $Category->shopTypeId = $shopTypeId;
                     $Category->createBy = Auth::User()->id;
                     $Category->created_at = Carbon::now();
                     $Category->save();
                     return ;
                }

               if (isset($request->subCategory)) {
                 $Category = new Category();
                 $Category->categoryName = $request->categoryName;
                 $Category->categoryPosition = $request->categoryPosition;
                 $Category->categoryStatus = $request->categoryStatus;
                 if (isset($request->subCategoryStatus)){
                   $Category->subCategoryStatus =  true;
                 }
                 else {
                   $Category->subCategoryStatus = false;
                 }
                 if (isset($request->category)) {
                   $Category->previousId = $request->subCategory;
                 }
                 if (isset($request->subCategory)) {
                   $label = Category::where('categoryId',$request->subCategory)->first()->label;
                   $incrementLabel = $label+1;
                   $Category->label = $incrementLabel;
                 }
                 $Category->shopTypeId = $shopTypeId;
                 $Category->createBy = Auth::User()->id;
                 $Category->created_at = Carbon::now();
                 $Category->save();
                 return ;
               }


               if (isset($request->category)) {
                   $Category = new Category();
                   $Category->categoryName = $request->categoryName;
                   $Category->categoryPosition = $request->categoryPosition;
                   $Category->categoryStatus = $request->categoryStatus;
                   if (isset($request->subCategoryStatus)){
                     $Category->subCategoryStatus =  true;
                   }
                   else {
                     $Category->subCategoryStatus = false;
                   }
                   if (isset($request->category)) {
                       $Category->previousId = $request->category;
                   }
                   if (isset($request->category)) {
                       $label = Category::where('categoryId',$request->category)->first()->label;
                       $incrementLabel = $label+1;
                       $Category->label = $incrementLabel;
                   }
                   $Category->shopTypeId = $shopTypeId;
                   $Category->createBy = Auth::User()->id;
                   $Category->created_at = Carbon::now();
                   $Category->save();
                   return ;
               }

               $Category = new Category();
               $Category->categoryName = $request->categoryName;
               $Category->categoryPosition = $request->categoryPosition;
               $Category->categoryStatus = $request->categoryStatus;
               if (isset($request->subCategoryStatus)){
                 $Category->subCategoryStatus =  true;
               }
               else {
                 $Category->subCategoryStatus = false;
               }
               $Category->shopTypeId = $shopTypeId;
               $Category->createBy = Auth::User()->id;
               $Category->created_at = Carbon::now();
               $Category->save();
           }
        }
    }

    public function categoryEditallCategory()
    {
          $role = Auth::User();
          $shopTypeNames = ShopTypeEntry::orderBy('shopTypeEntryId','desc')->get();
          $shopTypeId = Auth::User()->shopTypeId;

          $assetCategoryLists      =   Category::where('label',1)->where('shopTypeId',$shopTypeId)->get();
          $assetSubCategoryLists   =   Category::where('label',2)->where('shopTypeId',$shopTypeId)->get();
          $assetThirdCategoryLists =   Category::where('label',3)->where('shopTypeId',$shopTypeId)->get();
          $assetFourCategoryLists  =   Category::where('label',4)->where('shopTypeId',$shopTypeId)->get();
          $assetFiveCategoryLists  =   Category::where('label',5)->where('shopTypeId',$shopTypeId)->get();
          $assetSixCategoryLists   =   Category::where('label',6)->where('shopTypeId',$shopTypeId)->get();
          $assetSevenCategoryLists =   Category::where('label',7)->where('shopTypeId',$shopTypeId)->get();

          return [
            'assetCategoryLists' => $assetCategoryLists, 'assetSubCategoryLists' => $assetSubCategoryLists,
            'assetThirdCategoryLists' => $assetThirdCategoryLists, 'assetFourCategoryLists' => $assetFourCategoryLists,
            'assetFiveCategoryLists' => $assetFiveCategoryLists, 'assetSixCategoryLists' => $assetSixCategoryLists,
            'assetSevenCategoryLists' => $assetSevenCategoryLists,'shopTypeNames' => $shopTypeNames,'role' => $role
        ];

    }

    public function show($id)
    {
        //
    }


    public function edit($categoryId)
    {


          $shopTypeId = Auth::User()->shopTypeId;

          $categorySingleInfo = Category::where('categoryId',$categoryId)->first();

          $categoryInfo = Category::where('categoryId',$categorySingleInfo->categoryId)->first();

          if ($categoryInfo->label == 8 ) {

              $sevenCategoryName  = Category::where('categoryId', $categoryInfo->previousId)->first();
              $sixCategoryName    = Category::where('categoryId', $sevenCategoryName->previousId)->first();
              $fiveCategoryName   = Category::where('categoryId', $sixCategoryName->previousId)->first();
              $fourCategoryName   = Category::where('categoryId', $fiveCategoryName->previousId)->first();
              $thirdCategoryName  = Category::where('categoryId', $fourCategoryName->previousId)->first();
              $subCategoryName    = Category::where('categoryId', $thirdCategoryName->previousId)->first();
              $categoryName       = Category::where('categoryId', $subCategoryName->previousId)->first();

              return [
                  'categorySingleInfo' => $categorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'thirdCategoryName'=> $thirdCategoryName,'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
                  'fourCategoryName' => $fourCategoryName,'fiveCategoryName'=> $fiveCategoryName, 'sixCategoryName' => $sixCategoryName,
                  'sevenCategoryName' => $sevenCategoryName,
              ];
          }
          else if ($categoryInfo->label == 7 ) {

              $sixCategoryName = Category::where('categoryId',$categoryInfo->previousId)->first();
              $fiveCategoryName = Category::where('categoryId',$sixCategoryName->previousId)->first();
              $fourCategoryName = Category::where('categoryId',$fiveCategoryName->previousId)->first();
              $thirdCategoryName = Category::where('categoryId',$fourCategoryName->previousId)->first();
              $subCategoryName = Category::where('categoryId',$thirdCategoryName->previousId)->first();
              $categoryName    = Category::where('categoryId',$subCategoryName->previousId)->first();

              return [
                  'categorySingleInfo' => $categorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'thirdCategoryName'=> $thirdCategoryName,'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
                  'fourCategoryName' => $fourCategoryName,'fiveCategoryName'=> $fiveCategoryName, 'sixCategoryName' => $sixCategoryName,
              ];
          }
          else if ($categoryInfo->label == 6 ) {

              $fiveCategoryName = Category::where('categoryId',$categoryInfo->previousId)->first();
              $fourCategoryName = Category::where('categoryId',$fiveCategoryName->previousId)->first();
              $thirdCategoryName = Category::where('categoryId',$fourCategoryName->previousId)->first();
              $subCategoryName = Category::where('categoryId',$thirdCategoryName->previousId)->first();
              $categoryName = Category::where('categoryId',$subCategoryName->previousId)->first();

              return [
                  'categorySingleInfo' => $categorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'thirdCategoryName'=> $thirdCategoryName,'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
                  'fourCategoryName' => $fourCategoryName,'fiveCategoryName'=> $fiveCategoryName,
              ];
          }
          else if ($categoryInfo->label == 5 ) {

              $fourCategoryName = Category::where('categoryId',$categoryInfo->previousId)->first();
              $thirdCategoryName = Category::where('categoryId',$fourCategoryName->previousId)->first();
              $subCategoryName = Category::where('categoryId',$thirdCategoryName->previousId)->first();
              $categoryName = Category::where('categoryId',$subCategoryName->previousId)->first();

              return [
                  'categorySingleInfo' => $categorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'thirdCategoryName'=> $thirdCategoryName,'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
                  'fourCategoryName' => $fourCategoryName,
              ];
          }
          else if ($categoryInfo->label == 4 ) {

              $thirdCategoryName = Category::where('categoryId',$categoryInfo->previousId)->first();
              $subCategoryName = Category::where('categoryId',$thirdCategoryName->previousId)->first();
              $categoryName = Category::where('categoryId',$subCategoryName->previousId)->first();

              return [
                  'categorySingleInfo' => $categorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'thirdCategoryName'=> $thirdCategoryName,'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
              ];
          }
          else if ($categoryInfo->label == 3 ) {

              $subCategoryName = Category::where('categoryId',$categoryInfo->previousId)->first();
              $categoryName = Category::where('categoryId',$subCategoryName->previousId)->first();

              return [
                  'categorySingleInfo' => $categorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
              ];
          }

          else if ($categoryInfo->label == 2 ) {

              $categoryName = Category::where('categoryId',$categoryInfo->previousId)->first();

              return [
                  'categorySingleInfo' => $categorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'categoryName' => $categoryName,
              ];
          }
          else if ($categoryInfo->label == 1 ) {

              return [
                  'categorySingleInfo' => $categorySingleInfo, 'categoryInfo' => $categoryInfo,
              ];
          }

          return ['categorySingleInfo' => $categorySingleInfo,];
    }


    public function update(Request $request, $categoryId)
    {
            $this->validate($request, [
                'categoryName' => 'required',
                'categoryStatus' => 'required',
            ],
            [
                'categoryName.required' => 'Enter Category  Name',
                'categoryStatus.required' => 'Select Category Status',
            ]);


            if (isset($request->shopTypeId)) {
                if (Category::where('shopTypeId',$request->shopTypeId)->where('categoryId','!=',$categoryId)->where('categoryName',$request->categoryName)->exists()) {
                    return ['changeCategoryName'=>'Change Your Category Name'];
                }
                else {
                    if (isset($request->sevenCategory)) {
                        Category::where('categoryId',$categoryId)->update([
                              'categoryName' => $request->categoryName,
                              'categoryPosition' => $request->categoryPosition,
                              'categoryStatus' => $request->categoryStatus,
                              'shopTypeId' => $request->shopTypeId,
                              'previousId' => $request->sevenCategory,
                              'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                    }
                    if (isset($request->sixCategory)) {
                        Category::where('categoryId',$categoryId)->update([
                              'categoryName' => $request->categoryName,
                              'categoryPosition' => $request->categoryPosition,
                              'categoryStatus' => $request->categoryStatus,
                              'shopTypeId' => $request->shopTypeId,
                              'previousId' => $request->sixCategory,
                              'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                    }
                    if (isset($request->fiveCategory)) {
                        Category::where('categoryId',$categoryId)->update([
                              'categoryName' => $request->categoryName,
                              'categoryPosition' => $request->categoryPosition,
                              'categoryStatus' => $request->categoryStatus,
                              'shopTypeId' => $request->shopTypeId,
                              'previousId' => $request->fiveCategory,
                              'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                    }
                    if (isset($request->fourCategory)) {
                        Category::where('categoryId',$categoryId)->update([
                              'categoryName' => $request->categoryName,
                              'categoryPosition' => $request->categoryPosition,
                              'categoryStatus' => $request->categoryStatus,
                              'shopTypeId' => $request->shopTypeId,
                              'previousId' => $request->fourCategory,
                              'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                    }
                    if (isset($request->thirdCategory)) {
                        Category::where('categoryId',$categoryId)->update([
                              'categoryName' => $request->categoryName,
                              'categoryPosition' => $request->categoryPosition,
                              'categoryStatus' => $request->categoryStatus,
                              'shopTypeId' => $request->shopTypeId,
                              'previousId' => $request->thirdCategory,
                              'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                    }
                    if (isset($request->subCategory)) {
                        Category::where('categoryId',$categoryId)->update([
                              'categoryName' => $request->categoryName,
                              'categoryPosition' => $request->categoryPosition,
                              'categoryStatus' => $request->categoryStatus,
                              'shopTypeId' => $request->shopTypeId,
                              'previousId' => $request->subCategory,
                              'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                    }
                    if (isset($request->category)) {
                        Category::where('categoryId',$categoryId)->update([
                             'categoryName' => $request->categoryName,
                             'categoryPosition' => $request->categoryPosition,
                             'categoryStatus' => $request->categoryStatus,
                             'shopTypeId' => $request->shopTypeId,
                             'previousId' => $request->category,
                             'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                     }
                     Category::where('categoryId',$categoryId)->update([
                        'categoryName' => $request->categoryName,
                        'categoryPosition' => $request->categoryPosition,
                        'categoryStatus' => $request->categoryStatus,
                        'shopTypeId' => $request->shopTypeId,
                        'updateBy' => Auth::User()->id,
                    ]);
               }
            }
            else {
                $shopTypeId = Auth::user()->shopTypeId;

                if (Category::where('categoryId','!=',$categoryId)->where('categoryName',$request->categoryName)->exists()) {
                    return ['changeCategoryName'=>'Change Your Category Name'];
                }
                else {
                    if (isset($request->sevenCategory)) {
                        Category::where('categoryId',$categoryId)->update([
                              'categoryName' => $request->categoryName,
                              'categoryPosition' => $request->categoryPosition,
                              'categoryStatus' => $request->categoryStatus,
                              'shopTypeId' => $shopTypeId,
                              'previousId' => $request->sevenCategory,
                              'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                    }
                    if (isset($request->sixCategory)) {
                        Category::where('categoryId',$categoryId)->update([
                              'categoryName' => $request->categoryName,
                              'categoryPosition' => $request->categoryPosition,
                              'categoryStatus' => $request->categoryStatus,
                              'shopTypeId' => $shopTypeId,
                              'previousId' => $request->sixCategory,
                              'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                    }
                    if (isset($request->fiveCategory)) {
                        Category::where('categoryId',$categoryId)->update([
                              'categoryName' => $request->categoryName,
                              'categoryPosition' => $request->categoryPosition,
                              'categoryStatus' => $request->categoryStatus,
                              'shopTypeId' => $shopTypeId,
                              'previousId' => $request->fiveCategory,
                              'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                    }
                    if (isset($request->fourCategory)) {
                        Category::where('categoryId',$categoryId)->update([
                              'categoryName' => $request->categoryName,
                              'categoryPosition' => $request->categoryPosition,
                              'categoryStatus' => $request->categoryStatus,
                              'shopTypeId' => $shopTypeId,
                              'previousId' => $request->fourCategory,
                              'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                    }
                    if (isset($request->thirdCategory)) {
                        Category::where('categoryId',$categoryId)->update([
                              'categoryName' => $request->categoryName,
                              'categoryPosition' => $request->categoryPosition,
                              'categoryStatus' => $request->categoryStatus,
                              'shopTypeId' => $shopTypeId,
                              'previousId' => $request->thirdCategory,
                              'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                    }
                    if (isset($request->subCategory)) {
                        Category::where('categoryId',$categoryId)->update([
                              'categoryName' => $request->categoryName,
                              'categoryPosition' => $request->categoryPosition,
                              'categoryStatus' => $request->categoryStatus,
                              'shopTypeId' => $shopTypeId,
                              'previousId' => $request->subCategory,
                              'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                    }
                    if (isset($request->category)) {
                        Category::where('categoryId',$categoryId)->update([
                             'categoryName' => $request->categoryName,
                             'categoryPosition' => $request->categoryPosition,
                             'categoryStatus' => $request->categoryStatus,
                             'shopTypeId' => $shopTypeId,
                             'previousId' => $request->category,
                             'updateBy' => Auth::User()->id,
                        ]);
                        return ;
                     }
                     Category::where('categoryId',$categoryId)->update([
                        'categoryName' => $request->categoryName,
                        'categoryPosition' => $request->categoryPosition,
                        'categoryStatus' => $request->categoryStatus,
                        'shopTypeId' => $shopTypeId,
                        'updateBy' => Auth::User()->id,
                    ]);
               }

          }


    }

    public function destroy($categoryId)
    {
         Category::where('categoryId',$categoryId)->delete();
    }
}
