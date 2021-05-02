<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopInformation;
use App\ShopAssetCategory;
use Carbon\Carbon;
use Auth;

class ShopAssetCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;

        $shopAssetCategoryLists = ShopAssetCategory::where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->where('createBy',Auth::user()->id)->paginate(30);
        return ['shopAssetCategoryLists' => $shopAssetCategoryLists];
    }

    public function assetCateorySelectList()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;

          $shopAssetCategoryList =  ShopAssetCategory::where('label',1)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();

          $assetCategoryPosition = ShopAssetCategory::where('label',1)->get()->count();
          $assetCategoryPositionIncre = $assetCategoryPosition + 1;
          return ['shopAssetCategoryList' => $shopAssetCategoryList,'assetCategoryPositionIncre' => $assetCategoryPositionIncre];
    }
    public function assetCategoryId($assetCategoryId)
    {
          $assetSubCategoryList =  ShopAssetCategory::where('label',2)->where('previousId',$assetCategoryId)->get();

          $assetCategorylabel = ShopAssetCategory::where('assetCategoryId',$assetCategoryId)->first()->label;
          $incrementLabel = $assetCategorylabel +1;
          $assetCategorylabel = ShopAssetCategory::where('previousId',$assetCategoryId)->where('label',$incrementLabel)->count();
          $assetCategoryPositionIncre = $assetCategorylabel + 1;

          return ['assetSubCategoryList' => $assetSubCategoryList,'assetCategoryPositionIncre' => $assetCategoryPositionIncre];
    }
    public function assetSubCategoryId($assetSubCategoryId)
    {
          $assetThirdCategoryList =  ShopAssetCategory::where('label',3)->where('previousId',$assetSubCategoryId)->get();

          $assetCategorylabel = ShopAssetCategory::where('assetCategoryId',$assetSubCategoryId)->first()->label;
          $incrementLabel = $assetCategorylabel +1;
          $assetCategorylabel = ShopAssetCategory::where('previousId',$assetSubCategoryId)->where('label',$incrementLabel)->count();
          $assetCategoryPositionIncre = $assetCategorylabel + 1;

          return ['assetThirdCategoryList' => $assetThirdCategoryList,'assetCategoryPositionIncre' => $assetCategoryPositionIncre];
    }
    public function assetThirdCategoryId($assetThirdCategoryId)
    {
          $assetFourCategoryList =  ShopAssetCategory::where('label',4)->where('previousId',$assetThirdCategoryId)->get();

          $assetCategorylabel = ShopAssetCategory::where('assetCategoryId',$assetThirdCategoryId)->first()->label;
          $incrementLabel = $assetCategorylabel +1;
          $assetCategorylabel = ShopAssetCategory::where('previousId',$assetThirdCategoryId)->where('label',$incrementLabel)->count();
          $assetCategoryPositionIncre = $assetCategorylabel + 1;

          return ['assetFourCategoryList' => $assetFourCategoryList,'assetCategoryPositionIncre' => $assetCategoryPositionIncre];
    }
    public function assetFourCategoryId($assetFourCategoryId)
    {
          $assetFiveCategoryList =  ShopAssetCategory::where('label',5)->where('previousId',$assetFourCategoryId)->get();

          $assetCategorylabel = ShopAssetCategory::where('assetCategoryId',$assetFourCategoryId)->first()->label;
          $incrementLabel = $assetCategorylabel +1;
          $assetCategorylabel = ShopAssetCategory::where('previousId',$assetFourCategoryId)->where('label',$incrementLabel)->count();
          $assetCategoryPositionIncre = $assetCategorylabel + 1;

          return ['assetFiveCategoryList' => $assetFiveCategoryList,'assetCategoryPositionIncre' => $assetCategoryPositionIncre];
    }
    public function assetFiveCategoryId($assetFiveCategoryId)
    {
          $assetSixCategoryList =  ShopAssetCategory::where('label',6)->where('previousId',$assetFiveCategoryId)->get();

          $assetCategorylabel = ShopAssetCategory::where('assetCategoryId',$assetFiveCategoryId)->first()->label;
          $incrementLabel = $assetCategorylabel +1;
          $assetCategorylabel = ShopAssetCategory::where('previousId',$assetFiveCategoryId)->where('label',$incrementLabel)->count();
          $assetCategoryPositionIncre = $assetCategorylabel + 1;

          return ['assetSixCategoryList' => $assetSixCategoryList,'assetCategoryPositionIncre' => $assetCategoryPositionIncre];
    }
    public function assetSixCategoryId($assetSixCategoryId)
    {
          $assetSevenCategoryList =  ShopAssetCategory::where('label',7)->where('previousId',$assetSixCategoryId)->get();

          $assetCategorylabel = ShopAssetCategory::where('assetCategoryId',$assetSixCategoryId)->first()->label;
          $incrementLabel = $assetCategorylabel +1;
          $assetCategorylabel = ShopAssetCategory::where('previousId',$assetSixCategoryId)->where('label',$incrementLabel)->count();
          $assetCategoryPositionIncre = $assetCategorylabel + 1;

          return ['assetSevenCategoryList' => $assetSevenCategoryList,'assetCategoryPositionIncre' => $assetCategoryPositionIncre];
    }
    public function assetSevenCategoryId($assetSevenCategoryId)
    {

          $assetCategorylabel = ShopAssetCategory::where('assetCategoryId',$assetSevenCategoryId)->first()->label;
          $incrementLabel = $assetCategorylabel +1;
          $assetCategorylabel = ShopAssetCategory::where('previousId',$assetSevenCategoryId)->where('label',$incrementLabel)->count();
          $assetCategoryPositionIncre = $assetCategorylabel + 1;

          return ['assetCategoryPositionIncre' => $assetCategoryPositionIncre];
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;

          $assetCategoryLists      =   ShopAssetCategory::where('label',1)->where('createBy',Auth::user()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();
          $assetSubCategoryLists   =   ShopAssetCategory::where('label',2)->where('createBy',Auth::user()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();
          $assetThirdCategoryLists =   ShopAssetCategory::where('label',3)->where('createBy',Auth::user()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();
          $assetFourCategoryLists  =   ShopAssetCategory::where('label',4)->where('createBy',Auth::user()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();
          $assetFiveCategoryLists  =   ShopAssetCategory::where('label',5)->where('createBy',Auth::user()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();
          $assetSixCategoryLists   =   ShopAssetCategory::where('label',6)->where('createBy',Auth::user()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();
          $assetSevenCategoryLists =   ShopAssetCategory::where('label',7)->where('createBy',Auth::user()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->get();

          return [
            'assetCategoryLists' => $assetCategoryLists, 'assetSubCategoryLists' => $assetSubCategoryLists,
            'assetThirdCategoryLists' => $assetThirdCategoryLists, 'assetFourCategoryLists' => $assetFourCategoryLists,
            'assetFiveCategoryLists' => $assetFiveCategoryLists, 'assetSixCategoryLists' => $assetSixCategoryLists,
            'assetSevenCategoryLists' => $assetSevenCategoryLists,
        ];

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
              'assetCategoryName' => 'required',
              'assetCategoryStatus' => 'required',
          ],
          [
             'assetCategoryName.required' => 'Enter Asset Category  Name',
             'assetCategoryStatus.required' => 'Select Asset Category Status',
          ]);

          $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;

          if (ShopAssetCategory::where('assetCategoryName',$request->assetCategoryName)->exists()) {
              return ['changeAssetName' => 'Change Asset Category Name'];
          }
          else {
            if (isset($request->assetSevenCategory)) {
                $ShopAssetCategory = new ShopAssetCategory();
                $ShopAssetCategory->assetCategoryName = $request->assetCategoryName;
                $ShopAssetCategory->assetCategoryPosition = $request->assetCategoryPosition;
                $ShopAssetCategory->assetCategoryStatus = $request->assetCategoryStatus;
                if (isset($request->assetSubCategoryStatus)){
                  $ShopAssetCategory->assetSubCategoryStatus =  true;
                }
                else {
                  $ShopAssetCategory->assetSubCategoryStatus = false;
                }

                if (isset($request->assetSevenCategory)) {
                  $ShopAssetCategory->previousId = $request->assetSevenCategory;
                }
                if (isset($request->assetSevenCategory)) {
                  $label = ShopAssetCategory::where('assetCategoryId',$request->assetSevenCategory)->first()->label;
                  $incrementLabel = $label+1;
                  $ShopAssetCategory->label = $incrementLabel;
                }
                $ShopAssetCategory->shopId = Auth::User()->shopId;
                $ShopAssetCategory->shopTypeId = $shopTypeId;
                $ShopAssetCategory->createBy = Auth::User()->id;
                $ShopAssetCategory->created_at = Carbon::now();
                $ShopAssetCategory->save();
                return ;
            }

            if (isset($request->assetSixCategory)) {
                $ShopAssetCategory = new ShopAssetCategory();
                $ShopAssetCategory->assetCategoryName = $request->assetCategoryName;
                $ShopAssetCategory->assetCategoryPosition = $request->assetCategoryPosition;
                $ShopAssetCategory->assetCategoryStatus = $request->assetCategoryStatus;
                if (isset($request->assetSubCategoryStatus)){
                  $ShopAssetCategory->assetSubCategoryStatus =  true;
                }
                else {
                  $ShopAssetCategory->assetSubCategoryStatus = false;
                }

                if (isset($request->assetSixCategory)) {
                  $ShopAssetCategory->previousId = $request->assetSixCategory;
                }
                if (isset($request->assetSixCategory)) {
                  $label = ShopAssetCategory::where('assetCategoryId',$request->assetSixCategory)->first()->label;
                  $incrementLabel = $label+1;
                  $ShopAssetCategory->label = $incrementLabel;
                }
                $ShopAssetCategory->shopId = Auth::User()->shopId;
                $ShopAssetCategory->shopTypeId = $shopTypeId;
                $ShopAssetCategory->createBy = Auth::User()->id;
                $ShopAssetCategory->created_at = Carbon::now();
                $ShopAssetCategory->save();
                return ;
            }
            if (isset($request->assetFiveCategory)) {
                $ShopAssetCategory = new ShopAssetCategory();
                $ShopAssetCategory->assetCategoryName = $request->assetCategoryName;
                $ShopAssetCategory->assetCategoryPosition = $request->assetCategoryPosition;
                $ShopAssetCategory->assetCategoryStatus = $request->assetCategoryStatus;
                if (isset($request->assetSubCategoryStatus)){
                  $ShopAssetCategory->assetSubCategoryStatus =  true;
                }
                else {
                  $ShopAssetCategory->assetSubCategoryStatus = false;
                }

                if (isset($request->assetFiveCategory)) {
                  $ShopAssetCategory->previousId = $request->assetFiveCategory;
                }
                if (isset($request->assetFiveCategory)) {
                  $label = ShopAssetCategory::where('assetCategoryId',$request->assetFiveCategory)->first()->label;
                  $incrementLabel = $label+1;
                  $ShopAssetCategory->label = $incrementLabel;
                }
                $ShopAssetCategory->shopId = Auth::User()->shopId;
                $ShopAssetCategory->shopTypeId = $shopTypeId;
                $ShopAssetCategory->createBy = Auth::User()->id;
                $ShopAssetCategory->created_at = Carbon::now();
                $ShopAssetCategory->save();
                return ;
            }

            if (isset($request->assetFourCategory)) {
              $ShopAssetCategory = new ShopAssetCategory();
              $ShopAssetCategory->assetCategoryName = $request->assetCategoryName;
              $ShopAssetCategory->assetCategoryPosition = $request->assetCategoryPosition;
              $ShopAssetCategory->assetCategoryStatus = $request->assetCategoryStatus;
              if (isset($request->assetSubCategoryStatus)){
                $ShopAssetCategory->assetSubCategoryStatus =  true;
              }
              else {
                $ShopAssetCategory->assetSubCategoryStatus = false;
              }

              if (isset($request->assetFourCategory)) {
                $ShopAssetCategory->previousId = $request->assetFourCategory;
              }
              if (isset($request->assetFourCategory)) {
                $label = ShopAssetCategory::where('assetCategoryId',$request->assetFourCategory)->first()->label;
                $incrementLabel = $label+1;
                $ShopAssetCategory->label = $incrementLabel;
              }
              $ShopAssetCategory->shopId = Auth::User()->shopId;
              $ShopAssetCategory->shopTypeId = $shopTypeId;
              $ShopAssetCategory->createBy = Auth::User()->id;
              $ShopAssetCategory->created_at = Carbon::now();
              $ShopAssetCategory->save();
              return ;
            }

            if (isset($request->assetThirdCategory)) {
              $ShopAssetCategory = new ShopAssetCategory();
              $ShopAssetCategory->assetCategoryName = $request->assetCategoryName;
              $ShopAssetCategory->assetCategoryPosition = $request->assetCategoryPosition;
              $ShopAssetCategory->assetCategoryStatus = $request->assetCategoryStatus;
              if (isset($request->assetSubCategoryStatus)){
                $ShopAssetCategory->assetSubCategoryStatus =  true;
              }
              else {
                $ShopAssetCategory->assetSubCategoryStatus = false;
              }

              if (isset($request->assetThirdCategory)) {
                $ShopAssetCategory->previousId = $request->assetThirdCategory;
              }
              if (isset($request->assetThirdCategory)) {
                $label = ShopAssetCategory::where('assetCategoryId',$request->assetThirdCategory)->first()->label;
                $incrementLabel = $label+1;
                $ShopAssetCategory->label = $incrementLabel;
              }
              $ShopAssetCategory->shopId = Auth::User()->shopId;
              $ShopAssetCategory->shopTypeId = $shopTypeId;
              $ShopAssetCategory->createBy = Auth::User()->id;
              $ShopAssetCategory->created_at = Carbon::now();
              $ShopAssetCategory->save();
              return ;
            }

            if (isset($request->assetSubCategory)) {
              $ShopAssetCategory = new ShopAssetCategory();
              $ShopAssetCategory->assetCategoryName = $request->assetCategoryName;
              $ShopAssetCategory->assetCategoryPosition = $request->assetCategoryPosition;
              $ShopAssetCategory->assetCategoryStatus = $request->assetCategoryStatus;
              if (isset($request->assetSubCategoryStatus)){
                $ShopAssetCategory->assetSubCategoryStatus =  true;
              }
              else {
                $ShopAssetCategory->assetSubCategoryStatus = false;
              }

              if (isset($request->assetSubCategory)) {
                $ShopAssetCategory->previousId = $request->assetSubCategory;
              }
              if (isset($request->assetSubCategory)) {
                $label = ShopAssetCategory::where('assetCategoryId',$request->assetSubCategory)->first()->label;
                $incrementLabel = $label+1;
                $ShopAssetCategory->label = $incrementLabel;
              }
              $ShopAssetCategory->shopId = Auth::User()->shopId;
              $ShopAssetCategory->shopTypeId = $shopTypeId;
              $ShopAssetCategory->createBy = Auth::User()->id;
              $ShopAssetCategory->created_at = Carbon::now();
              $ShopAssetCategory->save();
              return ;
            }

            if (isset($request->assetCategory)) {
                $ShopAssetCategory = new ShopAssetCategory();
                $ShopAssetCategory->assetCategoryName = $request->assetCategoryName;
                $ShopAssetCategory->assetCategoryPosition = $request->assetCategoryPosition;
                $ShopAssetCategory->assetCategoryStatus = $request->assetCategoryStatus;
                if (isset($request->assetSubCategoryStatus)){
                  $ShopAssetCategory->assetSubCategoryStatus =  true;
                }
                else {
                  $ShopAssetCategory->assetSubCategoryStatus = false;
                }
                if (isset($request->assetCategory)) {
                    $ShopAssetCategory->previousId = $request->assetCategory;
                }
                if (isset($request->assetCategory)) {
                    $label = ShopAssetCategory::where('assetCategoryId',$request->assetCategory)->first()->label;
                    $incrementLabel = $label+1;
                    $ShopAssetCategory->label = $incrementLabel;
                }
                $ShopAssetCategory->shopId = Auth::User()->shopId;
                $ShopAssetCategory->shopTypeId = $shopTypeId;
                $ShopAssetCategory->createBy = Auth::User()->id;
                $ShopAssetCategory->created_at = Carbon::now();
                $ShopAssetCategory->save();
                return ;
            }

              $ShopAssetCategory = new ShopAssetCategory();
              $ShopAssetCategory->assetCategoryName = $request->assetCategoryName;
              $ShopAssetCategory->assetCategoryPosition = $request->assetCategoryPosition;
              $ShopAssetCategory->assetCategoryStatus = $request->assetCategoryStatus;
              if (isset($request->assetSubCategoryStatus)){
                $ShopAssetCategory->assetSubCategoryStatus =  true;
              }
              else {
                $ShopAssetCategory->assetSubCategoryStatus = false;
              }
              $ShopAssetCategory->shopId = Auth::User()->shopId;
              $ShopAssetCategory->shopTypeId = $shopTypeId;
              $ShopAssetCategory->createBy = Auth::User()->id;
              $ShopAssetCategory->created_at = Carbon::now();
              $ShopAssetCategory->save();

          }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($assetCategoryId)
    {
        $assetCategoryStatus = ShopAssetCategory::where('assetCategoryId', $assetCategoryId)->first()->assetCategoryStatus;

        if ($assetCategoryStatus == 0){
            ShopAssetCategory::where('assetCategoryId', $assetCategoryId)->update([
                'assetCategoryStatus' => 1,
                'updateBy'=>  Auth::user()->id,
            ]);

        }
        else {
            ShopAssetCategory::where('assetCategoryId', $assetCategoryId)->update([
                'assetCategoryStatus' => 0,
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
    public function edit($assetCategoryId)
    {

          $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;

          $assetCategorySingleInfo = ShopAssetCategory::where('assetCategoryId',$assetCategoryId)->first();

          $categoryInfo = ShopAssetCategory::where('assetCategoryId',$assetCategorySingleInfo->assetCategoryId)->first();

          if ($categoryInfo->label == 8 ) {

              $sevenCategoryName = ShopAssetCategory::where('assetCategoryId',$categoryInfo->previousId)->first();
              $sixCategoryName = ShopAssetCategory::where('assetCategoryId',  $sevenCategoryName->previousId)->first();
              $fiveCategoryName = ShopAssetCategory::where('assetCategoryId', $sixCategoryName->previousId)->first();
              $fourCategoryName = ShopAssetCategory::where('assetCategoryId', $fiveCategoryName->previousId)->first();
              $thirdCategoryName = ShopAssetCategory::where('assetCategoryId',$fourCategoryName->previousId)->first();
              $subCategoryName = ShopAssetCategory::where('assetCategoryId',  $thirdCategoryName->previousId)->first();
              $categoryName = ShopAssetCategory::where('assetCategoryId',     $subCategoryName->previousId)->first();

              return [
                  'assetCategorySingleInfo' => $assetCategorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'thirdCategoryName'=> $thirdCategoryName,'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
                  'fourCategoryName' => $fourCategoryName,'fiveCategoryName'=> $fiveCategoryName, 'sixCategoryName' => $sixCategoryName,
                  'sevenCategoryName' => $sevenCategoryName,
              ];
          }
          if ($categoryInfo->label == 7 ) {

              $sixCategoryName = ShopAssetCategory::where('assetCategoryId',$categoryInfo->previousId)->first();
              $fiveCategoryName = ShopAssetCategory::where('assetCategoryId',$sixCategoryName->previousId)->first();
              $fourCategoryName = ShopAssetCategory::where('assetCategoryId',$fiveCategoryName->previousId)->first();
              $thirdCategoryName = ShopAssetCategory::where('assetCategoryId',$fourCategoryName->previousId)->first();
              $subCategoryName = ShopAssetCategory::where('assetCategoryId',$thirdCategoryName->previousId)->first();
              $categoryName = ShopAssetCategory::where('assetCategoryId',$subCategoryName->previousId)->first();

              return [
                  'assetCategorySingleInfo' => $assetCategorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'thirdCategoryName'=> $thirdCategoryName,'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
                  'fourCategoryName' => $fourCategoryName,'fiveCategoryName'=> $fiveCategoryName, 'sixCategoryName' => $sixCategoryName,
              ];
          }
          if ($categoryInfo->label == 6 ) {

              $fiveCategoryName = ShopAssetCategory::where('assetCategoryId',$categoryInfo->previousId)->first();
              $fourCategoryName = ShopAssetCategory::where('assetCategoryId',$fiveCategoryName->previousId)->first();
              $thirdCategoryName = ShopAssetCategory::where('assetCategoryId',$fourCategoryName->previousId)->first();
              $subCategoryName = ShopAssetCategory::where('assetCategoryId',$thirdCategoryName->previousId)->first();
              $categoryName = ShopAssetCategory::where('assetCategoryId',$subCategoryName->previousId)->first();

              return [
                  'assetCategorySingleInfo' => $assetCategorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'thirdCategoryName'=> $thirdCategoryName,'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
                  'fourCategoryName' => $fourCategoryName,'fiveCategoryName'=> $fiveCategoryName,
              ];
          }
          if ($categoryInfo->label == 5 ) {

              $fourCategoryName = ShopAssetCategory::where('assetCategoryId',$categoryInfo->previousId)->first();
              $thirdCategoryName = ShopAssetCategory::where('assetCategoryId',$fourCategoryName->previousId)->first();
              $subCategoryName = ShopAssetCategory::where('assetCategoryId',$thirdCategoryName->previousId)->first();
              $categoryName = ShopAssetCategory::where('assetCategoryId',$subCategoryName->previousId)->first();

              return [
                  'assetCategorySingleInfo' => $assetCategorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'thirdCategoryName'=> $thirdCategoryName,'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
                  'fourCategoryName' => $fourCategoryName,
              ];
          }
          if ($categoryInfo->label == 4 ) {

              $thirdCategoryName = ShopAssetCategory::where('assetCategoryId',$categoryInfo->previousId)->first();
              $subCategoryName = ShopAssetCategory::where('assetCategoryId',$thirdCategoryName->previousId)->first();
              $categoryName = ShopAssetCategory::where('assetCategoryId',$subCategoryName->previousId)->first();

              return [
                  'assetCategorySingleInfo' => $assetCategorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'thirdCategoryName'=> $thirdCategoryName,'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
              ];
          }
          if ($categoryInfo->label == 3 ) {

              $subCategoryName = ShopAssetCategory::where('assetCategoryId',$categoryInfo->previousId)->first();
              $categoryName = ShopAssetCategory::where('assetCategoryId',$subCategoryName->previousId)->first();

              return [
                  'assetCategorySingleInfo' => $assetCategorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
              ];
          }

          if ($categoryInfo->label == 2 ) {

              $categoryName = ShopAssetCategory::where('assetCategoryId',$categoryInfo->previousId)->first();

              return [
                  'assetCategorySingleInfo' => $assetCategorySingleInfo, 'categoryInfo' => $categoryInfo,
                  'categoryName' => $categoryName,
              ];
          }
          if ($categoryInfo->label == 1 ) {

              return [
                  'assetCategorySingleInfo' => $assetCategorySingleInfo, 'categoryInfo' => $categoryInfo,
              ];
          }

          return ['assetCategorySingleInfo' => $assetCategorySingleInfo];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $assetCategoryId)
    {
          $this->validate($request, [
              'assetCategoryName' => 'required',
              'assetCategoryStatus' => 'required',
          ],
          [
             'assetCategoryName.required' => 'Enter Asset Category  Name',
             'assetCategoryStatus.required' => 'Select Asset Category Status',
          ]);

          $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;

          if (ShopAssetCategory::where('assetCategoryId','!=',$assetCategoryId)->where('assetCategoryName',$request->assetCategoryName)->exists()) {
              return ['changeAssetName' => 'Change Asset Category Name'];
          }
          else {
              if (isset($request->assetSevenCategory)) {
                  ShopAssetCategory::where('assetCategoryId',$assetCategoryId)->update([
                       'assetCategoryName' => $request->assetCategoryName,
                       'assetCategoryPosition' => $request->assetCategoryPosition,
                       'assetCategoryStatus' => $request->assetCategoryStatus,
                       'previousId' => $request->assetSevenCategory,
                       'updateBy' => Auth::User()->id,
                  ]);
                  return ;
               }
              if (isset($request->assetSixCategory)) {
                  ShopAssetCategory::where('assetCategoryId',$assetCategoryId)->update([
                       'assetCategoryName' => $request->assetCategoryName,
                       'assetCategoryPosition' => $request->assetCategoryPosition,
                       'assetCategoryStatus' => $request->assetCategoryStatus,
                       'previousId' => $request->assetSixCategory,
                       'updateBy' => Auth::User()->id,
                  ]);
                  return ;
               }
              if (isset($request->assetFiveCategory)) {
                  ShopAssetCategory::where('assetCategoryId',$assetCategoryId)->update([
                       'assetCategoryName' => $request->assetCategoryName,
                       'assetCategoryPosition' => $request->assetCategoryPosition,
                       'assetCategoryStatus' => $request->assetCategoryStatus,
                       'previousId' => $request->assetFiveCategory,
                       'updateBy' => Auth::User()->id,
                  ]);
                  return ;
               }
              if (isset($request->assetFourCategory)) {
                  ShopAssetCategory::where('assetCategoryId',$assetCategoryId)->update([
                       'assetCategoryName' => $request->assetCategoryName,
                       'assetCategoryPosition' => $request->assetCategoryPosition,
                       'assetCategoryStatus' => $request->assetCategoryStatus,
                       'previousId' => $request->assetFourCategory,
                       'updateBy' => Auth::User()->id,
                  ]);
                  return ;
               }
              if (isset($request->assetThirdCategory)) {
                  ShopAssetCategory::where('assetCategoryId',$assetCategoryId)->update([
                       'assetCategoryName' => $request->assetCategoryName,
                       'assetCategoryPosition' => $request->assetCategoryPosition,
                       'assetCategoryStatus' => $request->assetCategoryStatus,
                       'previousId' => $request->assetThirdCategory,
                       'updateBy' => Auth::User()->id,
                  ]);
                  return ;
               }
              if (isset($request->assetSubCategory)) {
                  ShopAssetCategory::where('assetCategoryId',$assetCategoryId)->update([
                       'assetCategoryName' => $request->assetCategoryName,
                       'assetCategoryPosition' => $request->assetCategoryPosition,
                       'assetCategoryStatus' => $request->assetCategoryStatus,
                       'previousId' => $request->assetSubCategory,
                       'updateBy' => Auth::User()->id,
                  ]);
                  return ;
               }
              if (isset($request->assetCategory)) {
                  ShopAssetCategory::where('assetCategoryId',$assetCategoryId)->update([
                       'assetCategoryName' => $request->assetCategoryName,
                       'assetCategoryPosition' => $request->assetCategoryPosition,
                       'assetCategoryStatus' => $request->assetCategoryStatus,
                       'previousId' => $request->assetCategory,
                       'updateBy' => Auth::User()->id,
                  ]);
                  return ;
               }
               ShopAssetCategory::where('assetCategoryId',$assetCategoryId)->update([
                   'assetCategoryName' => $request->assetCategoryName,
                   'assetCategoryPosition' => $request->assetCategoryPosition,
                   'assetCategoryStatus' => $request->assetCategoryStatus,
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
