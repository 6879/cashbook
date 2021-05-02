<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopAssetCategory;
use App\ShopInformation;
use App\AssetCodeEntry;
use Carbon\Carbon;
use Auth;

class AssetCodeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(Auth::User()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
            $assetCodeEntryLists = AssetCodeEntry::with('assetCategoryName')->where('createBy',Auth::user()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->paginate(30);
            return ['assetCodeEntryLists' => $assetCodeEntryLists];
        }
        else {
            $assetCodeEntryLists = 0;
            return ['assetCodeEntryLists' => $assetCodeEntryLists];
        }
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
            'assetCategory' => 'required',
            'assetPorductName' => 'required',
            'assetPorductCode' => 'required',
            'assetCodeStatus' => 'required',
        ],
        [
           'assetCategory.required' => 'Select Asset Category  Name',
           'assetPorductName.required' => 'Enter Asset Category  Name',
           'assetPorductCode.required' => 'Enter Asset Category  Name',
           'assetCodeStatus.required' => 'Select Asset Category Status',
        ]);

        $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;


        if (isset($request->assetSevenCategory)) {
            $AssetCodeEntry = new AssetCodeEntry();
            $AssetCodeEntry->assetCategoryId = $request->assetSevenCategory;
            $AssetCodeEntry->assetPorductName = $request->assetPorductName;
            $AssetCodeEntry->assetPorductCode = $request->assetPorductCode;

            if (isset($request->assetCodeStatus)){
              $AssetCodeEntry->assetCodeStatus =  true;
            }
            else {
              $AssetCodeEntry->assetCodeStatus = false;
            }
            $AssetCodeEntry->shopId = Auth::User()->shopId;
            $AssetCodeEntry->shopTypeId = $shopTypeId;

            $AssetCodeEntry->createBy = Auth::User()->id;
            $AssetCodeEntry->created_at = Carbon::now();
            $AssetCodeEntry->save();
            return ;
        }

        if (isset($request->assetSixCategory)) {
            $AssetCodeEntry = new AssetCodeEntry();
            $AssetCodeEntry->assetCategoryId = $request->assetSixCategory;
            $AssetCodeEntry->assetPorductName = $request->assetPorductName;
            $AssetCodeEntry->assetPorductCode = $request->assetPorductCode;

            if (isset($request->assetCodeStatus)){
              $AssetCodeEntry->assetCodeStatus =  true;
            }
            else {
              $AssetCodeEntry->assetCodeStatus = false;
            }
            $AssetCodeEntry->shopId = Auth::User()->shopId;
            $AssetCodeEntry->shopTypeId = $shopTypeId;

            $AssetCodeEntry->createBy = Auth::User()->id;
            $AssetCodeEntry->created_at = Carbon::now();
            $AssetCodeEntry->save();
            return ;
        }
        if (isset($request->assetFiveCategory)) {
            $AssetCodeEntry = new AssetCodeEntry();
            $AssetCodeEntry->assetCategoryId = $request->assetFiveCategory;
            $AssetCodeEntry->assetPorductName = $request->assetPorductName;
            $AssetCodeEntry->assetPorductCode = $request->assetPorductCode;

            if (isset($request->assetCodeStatus)){
              $AssetCodeEntry->assetCodeStatus =  true;
            }
            else {
              $AssetCodeEntry->assetCodeStatus = false;
            }
            $AssetCodeEntry->shopId = Auth::User()->shopId;
            $AssetCodeEntry->shopTypeId = $shopTypeId;

            $AssetCodeEntry->createBy = Auth::User()->id;
            $AssetCodeEntry->created_at = Carbon::now();
            $AssetCodeEntry->save();
            return ;
        }

        if (isset($request->assetFourCategory)) {
            $AssetCodeEntry = new AssetCodeEntry();
            $AssetCodeEntry->assetCategoryId = $request->assetFourCategory;
            $AssetCodeEntry->assetPorductName = $request->assetPorductName;
            $AssetCodeEntry->assetPorductCode = $request->assetPorductCode;

            if (isset($request->assetCodeStatus)){
              $AssetCodeEntry->assetCodeStatus =  true;
            }
            else {
              $AssetCodeEntry->assetCodeStatus = false;
            }
            $AssetCodeEntry->shopId = Auth::User()->shopId;
            $AssetCodeEntry->shopTypeId = $shopTypeId;

            $AssetCodeEntry->createBy = Auth::User()->id;
            $AssetCodeEntry->created_at = Carbon::now();
            $AssetCodeEntry->save();
            return ;
        }
        if (isset($request->assetThirdCategory)) {
            $AssetCodeEntry = new AssetCodeEntry();
            $AssetCodeEntry->assetCategoryId = $request->assetThirdCategory;
            $AssetCodeEntry->assetPorductName = $request->assetPorductName;
            $AssetCodeEntry->assetPorductCode = $request->assetPorductCode;

            if (isset($request->assetCodeStatus)){
              $AssetCodeEntry->assetCodeStatus =  true;
            }
            else {
              $AssetCodeEntry->assetCodeStatus = false;
            }
            $AssetCodeEntry->shopId = Auth::User()->shopId;
            $AssetCodeEntry->shopTypeId = $shopTypeId;

            $AssetCodeEntry->createBy = Auth::User()->id;
            $AssetCodeEntry->created_at = Carbon::now();
            $AssetCodeEntry->save();
            return ;
        }
        if (isset($request->assetSubCategory)) {
            $AssetCodeEntry = new AssetCodeEntry();
            $AssetCodeEntry->assetCategoryId = $request->assetSubCategory;
            $AssetCodeEntry->assetPorductName = $request->assetPorductName;
            $AssetCodeEntry->assetPorductCode = $request->assetPorductCode;

            if (isset($request->assetCodeStatus)){
              $AssetCodeEntry->assetCodeStatus =  true;
            }
            else {
              $AssetCodeEntry->assetCodeStatus = false;
            }
            $AssetCodeEntry->shopId = Auth::User()->shopId;
            $AssetCodeEntry->shopTypeId = $shopTypeId;

            $AssetCodeEntry->createBy = Auth::User()->id;
            $AssetCodeEntry->created_at = Carbon::now();
            $AssetCodeEntry->save();
            return ;
        }
        if (isset($request->assetCategory)) {
            $AssetCodeEntry = new AssetCodeEntry();
            $AssetCodeEntry->assetCategoryId = $request->assetCategory;
            $AssetCodeEntry->assetPorductName = $request->assetPorductName;
            $AssetCodeEntry->assetPorductCode = $request->assetPorductCode;

            if (isset($request->assetCodeStatus)){
              $AssetCodeEntry->assetCodeStatus =  true;
            }
            else {
              $AssetCodeEntry->assetCodeStatus = false;
            }
            $AssetCodeEntry->shopId = Auth::User()->shopId;
            $AssetCodeEntry->shopTypeId = $shopTypeId;

            $AssetCodeEntry->createBy = Auth::User()->id;
            $AssetCodeEntry->created_at = Carbon::now();
            $AssetCodeEntry->save();
            return ;
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
    public function edit($assetCodeEntryId)
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;
        $assetCategorySingleInfo = AssetCodeEntry::where('assetCodeEntryId',$assetCodeEntryId)->first();

        $categoryInfo = ShopAssetCategory::where('assetCategoryId',$assetCategorySingleInfo->assetCategoryId)->first();

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
    public function update(Request $request, $assetCodeEntryId)
    {
          $this->validate($request, [
              'assetCategory' => 'required',
              'assetPorductName' => 'required',
              'assetPorductCode' => 'required',
              'assetCodeStatus' => 'required',
          ],
          [
             'assetCategory.required' => 'Select Asset Category  Name',
             'assetPorductName.required' => 'Enter Asset Category  Name',
             'assetPorductCode.required' => 'Enter Asset Category  Name',
             'assetCodeStatus.required' => 'Select Asset Category Status',
          ]);


          if (isset($request->assetSevenCategory)) {
              AssetCodeEntry::where('assetCodeEntryId',$assetCodeEntryId)->update([
                'assetCategoryId' => $request->assetSevenCategory,
                'assetPorductName' => $request->assetPorductName,
                'assetPorductCode' => $request->assetPorductCode,
                'assetCodeStatus' => $request->assetCodeStatus,
                'updateBy' => Auth::User()->shopId,
              ]);
              return ;
          }

          if (isset($request->assetSixCategory)) {
              AssetCodeEntry::where('assetCodeEntryId',$assetCodeEntryId)->update([
                  'assetCategoryId' => $request->assetSixCategory,
                  'assetPorductName' => $request->assetPorductName,
                  'assetPorductCode' => $request->assetPorductCode,
                  'assetCodeStatus' => $request->assetCodeStatus,
                  'updateBy' => Auth::User()->shopId,
              ]);
              return ;
          }
          if (isset($request->assetFiveCategory)) {
              AssetCodeEntry::where('assetCodeEntryId',$assetCodeEntryId)->update([
                  'assetCategoryId' => $request->assetFiveCategory,
                  'assetPorductName' => $request->assetPorductName,
                  'assetPorductCode' => $request->assetPorductCode,
                  'assetCodeStatus' => $request->assetCodeStatus,
                  'updateBy' => Auth::User()->shopId,
              ]);
              return ;
          }
          if (isset($request->assetFourCategory)) {
              AssetCodeEntry::where('assetCodeEntryId',$assetCodeEntryId)->update([
                  'assetCategoryId' => $request->assetFourCategory,
                  'assetPorductName' => $request->assetPorductName,
                  'assetPorductCode' => $request->assetPorductCode,
                  'assetCodeStatus' => $request->assetCodeStatus,
                  'updateBy' => Auth::User()->shopId,
              ]);
              return ;
           }
          if (isset($request->assetThirdCategory)) {
              AssetCodeEntry::where('assetCodeEntryId',$assetCodeEntryId)->update([
                  'assetCategoryId' => $request->assetThirdCategory,
                  'assetPorductName' => $request->assetPorductName,
                  'assetPorductCode' => $request->assetPorductCode,
                  'assetCodeStatus' => $request->assetCodeStatus,
                  'updateBy' => Auth::User()->shopId,
              ]);
              return ;
           }
          if (isset($request->assetSubCategory)) {
              AssetCodeEntry::where('assetCodeEntryId',$assetCodeEntryId)->update([
                  'assetCategoryId' => $request->assetSubCategory,
                  'assetPorductName' => $request->assetPorductName,
                  'assetPorductCode' => $request->assetPorductCode,
                  'assetCodeStatus' => $request->assetCodeStatus,
                  'updateBy' => Auth::User()->shopId,
              ]);
           }
          if (isset($request->assetCategory)) {
              AssetCodeEntry::where('assetCodeEntryId',$assetCodeEntryId)->update([
                  'assetCategoryId' => $request->assetCategory,
                  'assetPorductName' => $request->assetPorductName,
                  'assetPorductCode' => $request->assetPorductCode,
                  'assetCodeStatus' => $request->assetCodeStatus,
                  'updateBy' => Auth::User()->shopId,
              ]);
              return ;
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
