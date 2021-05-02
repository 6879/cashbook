<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopAddAssetSupplierEntry;
use App\ShopAssetCategory;
use App\AssetBrandEntry;
use App\ShopInformation;
use App\ShopAssetEntry;
use App\AssetCodeEntry;
use Auth;

class ShopAssetEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(Auth::User()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $shopAssetEntryLists = ShopAssetEntry::with('assetCategoryName','assetBrandName','assetCodeName','supplierName')->where('createBy',Auth::User()->id)->where('shopTypeId',$shopTypeId)->where('shopId',Auth::User()->shopId)->orderBy('shopAssetEntryId','desc')->paginate(30);
            $shopAssetPrices = ShopAssetEntry::where('createBy',Auth::User()->id)->where('shopTypeId',$shopTypeId)->where('shopId',Auth::User()->shopId)->get();
            return ['shopAssetEntryLists'=> $shopAssetEntryLists, 'shopAssetPrices' => $shopAssetPrices];
        }
        else {
            $shopAssetEntryLists = 0;
            return ['shopAssetEntryLists'=> $shopAssetEntryLists];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (isset(Auth::User()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;

            $assetBrandLists = AssetBrandEntry::select('assetBrandEntryId','assetBrandName')->where('createBy',Auth::user()->id)->where('assetBrandStatus',1)->orderBy('assetBrandEntryId','desc')->get();
            $assetSupplierLists = ShopAddAssetSupplierEntry::select('assetSupplierId','assetSupplierName','assetSupplierCode')->where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->orderBy('assetSupplierId','desc')->get();
            $assetCodeEntryLists = AssetCodeEntry::select('assetCodeEntryId','assetPorductName','assetPorductCode')->where('createBy',Auth::user()->id)->where('shopId',Auth::User()->shopId)->where('shopTypeId',$shopTypeId)->orderBy('assetCodeEntryId','desc')->get();

            return ['assetBrandLists' => $assetBrandLists, 'assetCodeEntryLists' => $assetCodeEntryLists, 'assetSupplierLists'=> $assetSupplierLists];

        }
        else {
              $assetBrandLists = 0;
              $assetSupplierLists = 0;
              $assetCodeEntryLists = 0;
              return ['assetBrandLists' => $assetBrandLists, 'assetCodeEntryLists' => $assetCodeEntryLists, 'assetSupplierLists'=> $assetSupplierLists];
        }
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
              'assetProductId' => 'required',
              'assetSupplierId' => 'required',
              'assetBrandId' => 'required',
              'productQuantity' => 'required',
              'productCost' => 'required',
              'currentPayable' => 'required',
          ]);

          $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;

          $ShopAssetEntry = new ShopAssetEntry();

          if (isset($request->assetSevenCategory)) {
                 $ShopAssetEntry->assetCategoryId = $request->assetSevenCategory;
                 $ShopAssetEntry->assetProductId = $request->assetProductId;
                 $ShopAssetEntry->assetSupplierId = $request->assetSupplierId;
                 $ShopAssetEntry->assetBrandId = $request->assetBrandId;
                 $ShopAssetEntry->purchasedate = $request->purchasedate;
                 $ShopAssetEntry->mfgDate = $request->mfgDate;
                 $ShopAssetEntry->expiryDate = $request->expiryDate;
                 $ShopAssetEntry->invoiceNo = $request->invoiceNo;
                 $ShopAssetEntry->modelNo = $request->modelNo;
                 $ShopAssetEntry->productQuantity = $request->productQuantity;
                 $ShopAssetEntry->productCost = $request->productCost;
                 if (ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->exists()) {
                     $previousPayableDue = ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->latest()->first();
                       if ($request->currentPayable > $request->totalProductCost) {

                            $previousPayable = $request->currentPayable - $request->totalProductCost;

                            if ($previousPayableDue->previousPayableDue ==  $previousPayable) {
                                 $ShopAssetEntry->previousPayableDue = '';
                            }

                            elseif ($previousPayableDue->previousPayableDue <  $previousPayable ) {
                                return ['owed' => 'You wrote more money than you owed'];
                            }
                            else {
                                $finalDue = $previousPayableDue->previousPayableDue -  $previousPayable;
                                $ShopAssetEntry->previousPayableDue = $finalDue;
                            }
                        }
                       else {
                           $previousPayable =  $request->totalProductCost - $request->currentPayable;
                           $ShopAssetEntry->previousPayableDue = $previousPayable + $previousPayableDue->previousPayableDue;
                       }
                 }
                 else {
                     if ($request->currentPayable < $request->totalProductCost) {
                         $previousPayable =  $request->totalProductCost - $request->currentPayable;
                         $ShopAssetEntry->previousPayableDue = $previousPayable;
                     }
                 }
                 $ShopAssetEntry->totalProductCost = $request->totalProductCost;
                 $ShopAssetEntry->currentPayable = $request->currentPayable;
                 $ShopAssetEntry->depreciation = $request->totalDepreciation;
                 $ShopAssetEntry->depreciationDay = $request->depreciationDay;
                 $ShopAssetEntry->depreciationMonth = $request->depreciationMonth;
                 $ShopAssetEntry->depreciationYear = $request->depreciationYear;
                 $ShopAssetEntry->warranty = $request->warranty;
                 $ShopAssetEntry->selectMothOrYearWarranty = $request->selectMothOrYearWarranty;
                 $ShopAssetEntry->guarantee = $request->guarantee;
                 $ShopAssetEntry->selectMothOrYearGuarantee = $request->selectMothOrYearGuarantee;
                 $ShopAssetEntry->color = $request->color;
                 $ShopAssetEntry->size = strip_tags($request->size);
                 $ShopAssetEntry->description = strip_tags($request->description);
                 $ShopAssetEntry->shopId = Auth::User()->shopId;
                 $ShopAssetEntry->shopTypeId = $shopTypeId;
                 $ShopAssetEntry->createBy = Auth::User()->id;
                 $ShopAssetEntry->save();
                 return ;

          }
          if (isset($request->assetSixCategory)) {
                 $ShopAssetEntry->assetCategoryId = $request->assetSixCategory;
                 $ShopAssetEntry->assetProductId = $request->assetProductId;
                 $ShopAssetEntry->assetSupplierId = $request->assetSupplierId;
                 $ShopAssetEntry->assetBrandId = $request->assetBrandId;
                 $ShopAssetEntry->purchasedate = $request->purchasedate;
                 $ShopAssetEntry->mfgDate = $request->mfgDate;
                 $ShopAssetEntry->expiryDate = $request->expiryDate;
                 $ShopAssetEntry->invoiceNo = $request->invoiceNo;
                 $ShopAssetEntry->modelNo = $request->modelNo;
                 $ShopAssetEntry->productQuantity = $request->productQuantity;
                 $ShopAssetEntry->productCost = $request->productCost;
                 if (ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->exists()) {
                     $previousPayableDue = ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->latest()->first();
                       if ($request->currentPayable > $request->totalProductCost) {

                            $previousPayable = $request->currentPayable - $request->totalProductCost;

                            if ($previousPayableDue->previousPayableDue ==  $previousPayable) {
                                 $ShopAssetEntry->previousPayableDue = '';
                            }

                            elseif ($previousPayableDue->previousPayableDue <  $previousPayable ) {
                                return ['owed' => 'You wrote more money than you owed'];
                            }
                            else {
                                $finalDue = $previousPayableDue->previousPayableDue -  $previousPayable;
                                $ShopAssetEntry->previousPayableDue = $finalDue;
                            }
                        }
                       else {
                           $previousPayable =  $request->totalProductCost - $request->currentPayable;
                           $ShopAssetEntry->previousPayableDue = $previousPayable + $previousPayableDue->previousPayableDue;
                       }
                 }
                 else {
                     if ($request->currentPayable < $request->totalProductCost) {
                         $previousPayable =  $request->totalProductCost - $request->currentPayable;
                         $ShopAssetEntry->previousPayableDue = $previousPayable;
                     }
                 }
                 $ShopAssetEntry->totalProductCost = $request->totalProductCost;
                 $ShopAssetEntry->currentPayable = $request->currentPayable;
                 $ShopAssetEntry->depreciation = $request->totalDepreciation;
                 $ShopAssetEntry->depreciationDay = $request->depreciationDay;
                 $ShopAssetEntry->depreciationMonth = $request->depreciationMonth;
                 $ShopAssetEntry->depreciationYear = $request->depreciationYear;
                 $ShopAssetEntry->warranty = $request->warranty;
                 $ShopAssetEntry->selectMothOrYearWarranty = $request->selectMothOrYearWarranty;
                 $ShopAssetEntry->guarantee = $request->guarantee;
                 $ShopAssetEntry->selectMothOrYearGuarantee = $request->selectMothOrYearGuarantee;
                 $ShopAssetEntry->color = $request->color;
                 $ShopAssetEntry->size = strip_tags($request->size);
                 $ShopAssetEntry->description = strip_tags($request->description);
                 $ShopAssetEntry->shopId = Auth::User()->shopId;
                 $ShopAssetEntry->shopTypeId = $shopTypeId;
                 $ShopAssetEntry->createBy = Auth::User()->id;
                 $ShopAssetEntry->save();
                 return ;
          }
          if (isset($request->assetFiveCategory)) {
                 $ShopAssetEntry->assetCategoryId = $request->assetFiveCategory;
                 $ShopAssetEntry->assetProductId = $request->assetProductId;
                 $ShopAssetEntry->assetSupplierId = $request->assetSupplierId;
                 $ShopAssetEntry->assetBrandId = $request->assetBrandId;
                 $ShopAssetEntry->purchasedate = $request->purchasedate;
                 $ShopAssetEntry->mfgDate = $request->mfgDate;
                 $ShopAssetEntry->expiryDate = $request->expiryDate;
                 $ShopAssetEntry->invoiceNo = $request->invoiceNo;
                 $ShopAssetEntry->modelNo = $request->modelNo;
                 $ShopAssetEntry->productQuantity = $request->productQuantity;
                 $ShopAssetEntry->productCost = $request->productCost;
                 if (ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->exists()) {
                     $previousPayableDue = ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->latest()->first();
                       if ($request->currentPayable > $request->totalProductCost) {

                            $previousPayable = $request->currentPayable - $request->totalProductCost;

                            if ($previousPayableDue->previousPayableDue ==  $previousPayable) {
                                 $ShopAssetEntry->previousPayableDue = '';
                            }

                            elseif ($previousPayableDue->previousPayableDue <  $previousPayable ) {
                                return ['owed' => 'You wrote more money than you owed'];
                            }
                            else {
                                $finalDue = $previousPayableDue->previousPayableDue -  $previousPayable;
                                $ShopAssetEntry->previousPayableDue = $finalDue;
                            }
                        }
                       else {
                           $previousPayable =  $request->totalProductCost - $request->currentPayable;
                           $ShopAssetEntry->previousPayableDue = $previousPayable + $previousPayableDue->previousPayableDue;
                       }
                 }
                 else {
                     if ($request->currentPayable < $request->totalProductCost) {
                         $previousPayable =  $request->totalProductCost - $request->currentPayable;
                         $ShopAssetEntry->previousPayableDue = $previousPayable;
                     }
                 }
                 $ShopAssetEntry->totalProductCost = $request->totalProductCost;
                 $ShopAssetEntry->currentPayable = $request->currentPayable;
                 $ShopAssetEntry->depreciation = $request->totalDepreciation;
                 $ShopAssetEntry->depreciationDay = $request->depreciationDay;
                 $ShopAssetEntry->depreciationMonth = $request->depreciationMonth;
                 $ShopAssetEntry->depreciationYear = $request->depreciationYear;
                 $ShopAssetEntry->warranty = $request->warranty;
                 $ShopAssetEntry->selectMothOrYearWarranty = $request->selectMothOrYearWarranty;
                 $ShopAssetEntry->guarantee = $request->guarantee;
                 $ShopAssetEntry->selectMothOrYearGuarantee = $request->selectMothOrYearGuarantee;
                 $ShopAssetEntry->color = $request->color;
                 $ShopAssetEntry->size = strip_tags($request->size);
                 $ShopAssetEntry->description = strip_tags($request->description);
                 $ShopAssetEntry->shopId = Auth::User()->shopId;
                 $ShopAssetEntry->shopTypeId = $shopTypeId;
                 $ShopAssetEntry->createBy = Auth::User()->id;
                 $ShopAssetEntry->save();
                 return ;
          }
          if (isset($request->assetFourCategory)) {
                 $ShopAssetEntry->assetCategoryId = $request->assetFourCategory;
                 $ShopAssetEntry->assetProductId = $request->assetProductId;
                 $ShopAssetEntry->assetSupplierId = $request->assetSupplierId;
                 $ShopAssetEntry->assetBrandId = $request->assetBrandId;
                 $ShopAssetEntry->purchasedate = $request->purchasedate;
                 $ShopAssetEntry->mfgDate = $request->mfgDate;
                 $ShopAssetEntry->expiryDate = $request->expiryDate;
                 $ShopAssetEntry->invoiceNo = $request->invoiceNo;
                 $ShopAssetEntry->modelNo = $request->modelNo;
                 $ShopAssetEntry->productQuantity = $request->productQuantity;
                 $ShopAssetEntry->productCost = $request->productCost;
                 if (ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->exists()) {
                     $previousPayableDue = ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->latest()->first();
                       if ($request->currentPayable > $request->totalProductCost) {

                            $previousPayable = $request->currentPayable - $request->totalProductCost;

                            if ($previousPayableDue->previousPayableDue ==  $previousPayable) {
                                 $ShopAssetEntry->previousPayableDue = '';
                            }

                            elseif ($previousPayableDue->previousPayableDue <  $previousPayable ) {
                                return ['owed' => 'You wrote more money than you owed'];
                            }
                            else {
                                $finalDue = $previousPayableDue->previousPayableDue -  $previousPayable;
                                $ShopAssetEntry->previousPayableDue = $finalDue;
                            }
                        }
                       else {
                           $previousPayable =  $request->totalProductCost - $request->currentPayable;
                           $ShopAssetEntry->previousPayableDue = $previousPayable + $previousPayableDue->previousPayableDue;
                       }
                 }
                 else {
                     if ($request->currentPayable < $request->totalProductCost) {
                         $previousPayable =  $request->totalProductCost - $request->currentPayable;
                         $ShopAssetEntry->previousPayableDue = $previousPayable;
                     }
                 }
                 $ShopAssetEntry->totalProductCost = $request->totalProductCost;
                 $ShopAssetEntry->currentPayable = $request->currentPayable;
                 $ShopAssetEntry->depreciation = $request->totalDepreciation;
                 $ShopAssetEntry->depreciationDay = $request->depreciationDay;
                 $ShopAssetEntry->depreciationMonth = $request->depreciationMonth;
                 $ShopAssetEntry->depreciationYear = $request->depreciationYear;
                 $ShopAssetEntry->warranty = $request->warranty;
                 $ShopAssetEntry->selectMothOrYearWarranty = $request->selectMothOrYearWarranty;
                 $ShopAssetEntry->guarantee = $request->guarantee;
                 $ShopAssetEntry->selectMothOrYearGuarantee = $request->selectMothOrYearGuarantee;
                 $ShopAssetEntry->color = $request->color;
                 $ShopAssetEntry->size = strip_tags($request->size);
                 $ShopAssetEntry->description = strip_tags($request->description);
                 $ShopAssetEntry->shopId = Auth::User()->shopId;
                 $ShopAssetEntry->shopTypeId = $shopTypeId;
                 $ShopAssetEntry->createBy = Auth::User()->id;
                 $ShopAssetEntry->save();
                 return ;
          }
          if (isset($request->assetThirdCategory)) {
                 $ShopAssetEntry->assetCategoryId = $request->assetThirdCategory;
                 $ShopAssetEntry->assetProductId = $request->assetProductId;
                 $ShopAssetEntry->assetSupplierId = $request->assetSupplierId;
                 $ShopAssetEntry->assetBrandId = $request->assetBrandId;
                 $ShopAssetEntry->purchasedate = $request->purchasedate;
                 $ShopAssetEntry->mfgDate = $request->mfgDate;
                 $ShopAssetEntry->expiryDate = $request->expiryDate;
                 $ShopAssetEntry->invoiceNo = $request->invoiceNo;
                 $ShopAssetEntry->modelNo = $request->modelNo;
                 $ShopAssetEntry->productQuantity = $request->productQuantity;
                 $ShopAssetEntry->productCost = $request->productCost;
                 if (ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->exists()) {
                     $previousPayableDue = ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->latest()->first();
                       if ($request->currentPayable > $request->totalProductCost) {

                            $previousPayable = $request->currentPayable - $request->totalProductCost;

                            if ($previousPayableDue->previousPayableDue ==  $previousPayable) {
                                 $ShopAssetEntry->previousPayableDue = '';
                            }

                            elseif ($previousPayableDue->previousPayableDue <  $previousPayable ) {
                                return ['owed' => 'You wrote more money than you owed'];
                            }
                            else {
                                $finalDue = $previousPayableDue->previousPayableDue -  $previousPayable;
                                $ShopAssetEntry->previousPayableDue = $finalDue;
                            }
                        }
                       else {
                           $previousPayable =  $request->totalProductCost - $request->currentPayable;
                           $ShopAssetEntry->previousPayableDue = $previousPayable + $previousPayableDue->previousPayableDue;
                       }
                 }
                 else {
                     if ($request->currentPayable < $request->totalProductCost) {
                         $previousPayable =  $request->totalProductCost - $request->currentPayable;
                         $ShopAssetEntry->previousPayableDue = $previousPayable;
                     }
                 }
                 $ShopAssetEntry->totalProductCost = $request->totalProductCost;
                 $ShopAssetEntry->currentPayable = $request->currentPayable;
                 $ShopAssetEntry->depreciation = $request->totalDepreciation;
                 $ShopAssetEntry->depreciationDay = $request->depreciationDay;
                 $ShopAssetEntry->depreciationMonth = $request->depreciationMonth;
                 $ShopAssetEntry->depreciationYear = $request->depreciationYear;
                 $ShopAssetEntry->warranty = $request->warranty;
                 $ShopAssetEntry->selectMothOrYearWarranty = $request->selectMothOrYearWarranty;
                 $ShopAssetEntry->guarantee = $request->guarantee;
                 $ShopAssetEntry->selectMothOrYearGuarantee = $request->selectMothOrYearGuarantee;
                 $ShopAssetEntry->color = $request->color;
                 $ShopAssetEntry->size = strip_tags($request->size);
                 $ShopAssetEntry->description = strip_tags($request->description);
                 $ShopAssetEntry->shopId = Auth::User()->shopId;
                 $ShopAssetEntry->shopTypeId = $shopTypeId;
                 $ShopAssetEntry->createBy = Auth::User()->id;
                 $ShopAssetEntry->save();
                 return ;
          }
          if (isset($request->assetSubCategory)) {
                 $ShopAssetEntry->assetCategoryId = $request->assetSubCategory;
                 $ShopAssetEntry->assetProductId = $request->assetProductId;
                 $ShopAssetEntry->assetSupplierId = $request->assetSupplierId;
                 $ShopAssetEntry->assetBrandId = $request->assetBrandId;
                 $ShopAssetEntry->purchasedate = $request->purchasedate;
                 $ShopAssetEntry->mfgDate = $request->mfgDate;
                 $ShopAssetEntry->expiryDate = $request->expiryDate;
                 $ShopAssetEntry->invoiceNo = $request->invoiceNo;
                 $ShopAssetEntry->modelNo = $request->modelNo;
                 $ShopAssetEntry->productQuantity = $request->productQuantity;
                 $ShopAssetEntry->productCost = $request->productCost;
                 if (ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->exists()) {
                     $previousPayableDue = ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->latest()->first();
                       if ($request->currentPayable > $request->totalProductCost) {

                            $previousPayable = $request->currentPayable - $request->totalProductCost;

                            if ($previousPayableDue->previousPayableDue ==  $previousPayable) {
                                 $ShopAssetEntry->previousPayableDue = '';
                            }

                            elseif ($previousPayableDue->previousPayableDue <  $previousPayable ) {
                                return ['owed' => 'You wrote more money than you owed'];
                            }
                            else {
                                $finalDue = $previousPayableDue->previousPayableDue -  $previousPayable;
                                $ShopAssetEntry->previousPayableDue = $finalDue;
                            }
                        }
                       else {
                           $previousPayable =  $request->totalProductCost - $request->currentPayable;
                           $ShopAssetEntry->previousPayableDue = $previousPayable + $previousPayableDue->previousPayableDue;
                       }
                 }
                 else {
                     if ($request->currentPayable < $request->totalProductCost) {
                         $previousPayable =  $request->totalProductCost - $request->currentPayable;
                         $ShopAssetEntry->previousPayableDue = $previousPayable;
                     }
                 }
                 $ShopAssetEntry->totalProductCost = $request->totalProductCost;
                 $ShopAssetEntry->currentPayable = $request->currentPayable;
                 $ShopAssetEntry->depreciation = $request->totalDepreciation;
                 $ShopAssetEntry->depreciationDay = $request->depreciationDay;
                 $ShopAssetEntry->depreciationMonth = $request->depreciationMonth;
                 $ShopAssetEntry->depreciationYear = $request->depreciationYear;
                 $ShopAssetEntry->warranty = $request->warranty;
                 $ShopAssetEntry->selectMothOrYearWarranty = $request->selectMothOrYearWarranty;
                 $ShopAssetEntry->guarantee = $request->guarantee;
                 $ShopAssetEntry->selectMothOrYearGuarantee = $request->selectMothOrYearGuarantee;
                 $ShopAssetEntry->color = $request->color;
                 $ShopAssetEntry->size = strip_tags($request->size);
                 $ShopAssetEntry->description = strip_tags($request->description);
                 $ShopAssetEntry->shopId = Auth::User()->shopId;
                 $ShopAssetEntry->shopTypeId = $shopTypeId;
                 $ShopAssetEntry->createBy = Auth::User()->id;
                 $ShopAssetEntry->save();
                 return ;
          }

         if (isset($request->assetCategory)) {
                 $ShopAssetEntry->assetCategoryId = $request->assetCategory;
                 $ShopAssetEntry->assetProductId = $request->assetProductId;
                 $ShopAssetEntry->assetSupplierId = $request->assetSupplierId;
                 $ShopAssetEntry->assetBrandId = $request->assetBrandId;
                 $ShopAssetEntry->purchasedate = $request->purchasedate;
                 $ShopAssetEntry->mfgDate = $request->mfgDate;
                 $ShopAssetEntry->expiryDate = $request->expiryDate;
                 $ShopAssetEntry->invoiceNo = $request->invoiceNo;
                 $ShopAssetEntry->modelNo = $request->modelNo;
                 $ShopAssetEntry->productQuantity = $request->productQuantity;
                 $ShopAssetEntry->productCost = $request->productCost;
                 if (ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->exists()) {
                     $previousPayableDue = ShopAssetEntry::where('assetSupplierId',$request->assetSupplierId)->latest()->first();
                       if ($request->currentPayable > $request->totalProductCost) {

                            $previousPayable = ($request->currentPayable) - ($request->totalProductCost);

                            if ($previousPayableDue->previousPayableDue ==  $previousPayable) {
                                 $ShopAssetEntry->previousPayableDue = '';
                            }

                            elseif ($previousPayableDue->previousPayableDue <  $previousPayable ) {
                                return ['owed' => 'You wrote more money than you owed'];
                            }
                            else {
                                $finalDue = ($previousPayableDue->previousPayableDue) -  ($previousPayable);
                                $ShopAssetEntry->previousPayableDue = $finalDue;
                            }
                        }
                        elseif ($request->totalProductCost == $request->currentPayable) {

                        }
                       else {
                           $previousPayable =  ($request->totalProductCost) - ($request->currentPayable);
                           $ShopAssetEntry->previousPayableDue = ($previousPayable) + ($previousPayableDue->previousPayableDue);
                       }
                 }
                 else {
                     if ($request->currentPayable < $request->totalProductCost) {
                         $previousPayable =  ($request->totalProductCost) - ($request->currentPayable);
                         $ShopAssetEntry->previousPayableDue = $previousPayable;
                     }
                 }
                 $ShopAssetEntry->totalProductCost = $request->totalProductCost;
                 $ShopAssetEntry->currentPayable = $request->currentPayable;
                 $ShopAssetEntry->depreciation = $request->totalDepreciation;
                 $ShopAssetEntry->depreciationDay = $request->depreciationDay;
                 $ShopAssetEntry->depreciationMonth = $request->depreciationMonth;
                 $ShopAssetEntry->depreciationYear = $request->depreciationYear;
                 $ShopAssetEntry->warranty = $request->warranty;
                 $ShopAssetEntry->selectMothOrYearWarranty = $request->selectMothOrYearWarranty;
                 $ShopAssetEntry->guarantee = $request->guarantee;
                 $ShopAssetEntry->selectMothOrYearGuarantee = $request->selectMothOrYearGuarantee;
                 $ShopAssetEntry->color = $request->color;
                 $ShopAssetEntry->size = strip_tags($request->size);
                 $ShopAssetEntry->description = strip_tags($request->description);
                 $ShopAssetEntry->shopId = Auth::User()->shopId;
                 $ShopAssetEntry->shopTypeId = $shopTypeId;
                 $ShopAssetEntry->createBy = Auth::User()->id;
                 $ShopAssetEntry->save();
                 return ;
         }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($assetSupplierId)
    {
            $previousPayableDue = ShopAssetEntry::where('assetSupplierId',$assetSupplierId)->latest()->first();
            if (isset($previousPayableDue->previousPayableDue)) {
                return ['previousPayableDue'=> $previousPayableDue->previousPayableDue];
            }
            if(!isset($previousPayableDue->previousPayableDue)) {
               return ['paidPayableBill'=> $paidPayableBill];
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allCategoryShow()
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
    public function edit($shopAssetEntryId)
    {
        $assetSingleData =  ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->first();
        $categoryInfo = ShopAssetCategory::where('assetCategoryId',$assetSingleData->assetCategoryId)->first();

        if ($categoryInfo->label == 7 ) {

            $sixCategoryName = ShopAssetCategory::where('assetCategoryId',$categoryInfo->previousId)->first();
            $fiveCategoryName = ShopAssetCategory::where('assetCategoryId',$sixCategoryName->previousId)->first();
            $fourCategoryName = ShopAssetCategory::where('assetCategoryId',$fiveCategoryName->previousId)->first();
            $thirdCategoryName = ShopAssetCategory::where('assetCategoryId',$fourCategoryName->previousId)->first();
            $subCategoryName = ShopAssetCategory::where('assetCategoryId',$thirdCategoryName->previousId)->first();
            $categoryName = ShopAssetCategory::where('assetCategoryId',$subCategoryName->previousId)->first();

            return [
                'assetSingleData' => $assetSingleData, 'categoryInfo' => $categoryInfo,
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
                'assetSingleData' => $assetSingleData, 'categoryInfo' => $categoryInfo,
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
                'assetSingleData' => $assetSingleData, 'categoryInfo' => $categoryInfo,
                'thirdCategoryName'=> $thirdCategoryName,'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
                'fourCategoryName' => $fourCategoryName,
            ];
        }
        if ($categoryInfo->label == 4 ) {

            $thirdCategoryName = ShopAssetCategory::where('assetCategoryId',$categoryInfo->previousId)->first();
            $subCategoryName = ShopAssetCategory::where('assetCategoryId',$thirdCategoryName->previousId)->first();
            $categoryName = ShopAssetCategory::where('assetCategoryId',$subCategoryName->previousId)->first();

            return [
                'assetSingleData' => $assetSingleData, 'categoryInfo' => $categoryInfo,
                'thirdCategoryName'=> $thirdCategoryName,'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
            ];
        }
        if ($categoryInfo->label == 3 ) {

            $subCategoryName = ShopAssetCategory::where('assetCategoryId',$categoryInfo->previousId)->first();
            $categoryName = ShopAssetCategory::where('assetCategoryId',$subCategoryName->previousId)->first();

            return [
                'assetSingleData' => $assetSingleData, 'categoryInfo' => $categoryInfo,
                'subCategoryName' => $subCategoryName, 'categoryName' => $categoryName,
            ];
        }

        if ($categoryInfo->label == 2 ) {

            $categoryName = ShopAssetCategory::where('assetCategoryId',$categoryInfo->previousId)->first();

            return [
                'assetSingleData' => $assetSingleData, 'categoryInfo' => $categoryInfo,
                'categoryName' => $categoryName,
            ];
        }
        if ($categoryInfo->label == 1 ) {

            return [
                'assetSingleData' => $assetSingleData, 'categoryInfo' => $categoryInfo,
            ];
        }
        return ['assetSingleData' => $assetSingleData];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $shopAssetEntryId)
    {
            $this->validate($request, [
                'assetCategory' => 'required',
                'assetProductId' => 'required',
                'assetSupplierId' => 'required',
                'assetBrandId' => 'required',
                'totalProductCost' => 'required',
                'currentPayable' => 'required',
                'currentPayable' => 'required',
            ]);

            $shopTypeId = ShopInformation::where('shopInfoId',Auth::User()->shopId)->first()->shopTypeId;

            if (isset($request->assetSevenCategory)) {
                    ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                         'assetCategoryId' => $request->assetCategory,
                         'assetProductId' => $request->assetProductId,
                         'assetSupplierId' => $request->assetSupplierId,
                         'assetBrandId' => $request->assetBrandId,
                         'purchasedate' => $request->purchasedate,
                         'mfgDate' => $request->mfgDate,
                         'expiryDate' => $request->expiryDate,
                         'invoiceNo' => $request->invoiceNo,
                         'modelNo' => $request->modelNo,
                         'productQuantity' => $request->productQuantity,
                         'productCost' => $request->productCost,
                         'totalProductCost' => $request->totalProductCost,
                         'currentPayable' => $request->currentPayable,
                         'depreciation' => $request->totalDepreciation,
                         'depreciationDay' => $request->depreciationDay,
                         'depreciationMonth' => $request->depreciationMonth,
                         'depreciationYear' => $request->depreciationYear,
                         'warranty' => $request->warranty,
                         'selectMothOrYearWarranty' => $request->selectMothOrYearWarranty,
                         'guarantee' => $request->guarantee,
                         'selectMothOrYearGuarantee' => $request->selectMothOrYearGuarantee,
                         'color' => $request->color,
                         'size' => strip_tags($request->size),
                         'description' => strip_tags($request->description),
                         'shopId' => Auth::User()->shopId,
                         'shopTypeId' => $shopTypeId,
                         'updateBy' => Auth::User()->id,
                   ]);

                if ($request->currentPayable > $request->totalProductCost) {
                       $previousPayable = $request->currentPayable - $request->totalProductCost;

                       if ($request->previousPayableDue ==  $previousPayable) {
                              ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                                  'previousPayableDue' => '',
                              ]);
                       }
                       elseif ($request->previousPayableDue <  $previousPayable ) {
                           return ['owed' => 'You wrote more money than you owed'];
                       }
                       else {
                           $finalDue = $request->previousPayableDue -  $previousPayable;
                           ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                               'previousPayableDue' => $finalDue,
                           ]);
                       }
                   }

                  else {
                        $previousPayable =  $request->totalProductCost - $request->currentPayable;
                        $totalDue = $previousPayable + $request->previousPayableDue;
                        ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                           'previousPayableDue' => $totalDue,
                        ]);
                  }
            }

            if (isset($request->assetSixCategory)) {
                    ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                         'assetCategoryId' => $request->assetCategory,
                         'assetProductId' => $request->assetProductId,
                         'assetSupplierId' => $request->assetSupplierId,
                         'assetBrandId' => $request->assetBrandId,
                         'purchasedate' => $request->purchasedate,
                         'mfgDate' => $request->mfgDate,
                         'expiryDate' => $request->expiryDate,
                         'invoiceNo' => $request->invoiceNo,
                         'modelNo' => $request->modelNo,
                         'productQuantity' => $request->productQuantity,
                         'productCost' => $request->productCost,
                         'totalProductCost' => $request->totalProductCost,
                         'currentPayable' => $request->currentPayable,
                         'depreciation' => $request->totalDepreciation,
                         'depreciationDay' => $request->depreciationDay,
                         'depreciationMonth' => $request->depreciationMonth,
                         'depreciationYear' => $request->depreciationYear,
                         'warranty' => $request->warranty,
                         'selectMothOrYearWarranty' => $request->selectMothOrYearWarranty,
                         'guarantee' => $request->guarantee,
                         'selectMothOrYearGuarantee' => $request->selectMothOrYearGuarantee,
                         'color' => $request->color,
                         'size' => strip_tags($request->size),
                         'description' => strip_tags($request->description),
                         'shopId' => Auth::User()->shopId,
                         'shopTypeId' => $shopTypeId,
                         'updateBy' => Auth::User()->id,
                   ]);

                if ($request->currentPayable > $request->totalProductCost) {
                       $previousPayable = $request->currentPayable - $request->totalProductCost;

                       if ($request->previousPayableDue ==  $previousPayable) {
                              ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                                  'previousPayableDue' => '',
                              ]);
                       }
                       elseif ($request->previousPayableDue <  $previousPayable ) {
                           return ['owed' => 'You wrote more money than you owed'];
                       }
                       else {
                           $finalDue = $request->previousPayableDue -  $previousPayable;
                           ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                               'previousPayableDue' => $finalDue,
                           ]);
                       }
                   }

                  else {
                        $previousPayable =  $request->totalProductCost - $request->currentPayable;
                        $totalDue = $previousPayable + $request->previousPayableDue;
                        ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                           'previousPayableDue' => $totalDue,
                        ]);
                  }
            }

            if (isset($request->assetFiveCategory)) {
                    ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                         'assetCategoryId' => $request->assetCategory,
                         'assetProductId' => $request->assetProductId,
                         'assetSupplierId' => $request->assetSupplierId,
                         'assetBrandId' => $request->assetBrandId,
                         'purchasedate' => $request->purchasedate,
                         'mfgDate' => $request->mfgDate,
                         'expiryDate' => $request->expiryDate,
                         'invoiceNo' => $request->invoiceNo,
                         'modelNo' => $request->modelNo,
                         'productQuantity' => $request->productQuantity,
                         'productCost' => $request->productCost,
                         'totalProductCost' => $request->totalProductCost,
                         'currentPayable' => $request->currentPayable,
                         'depreciation' => $request->totalDepreciation,
                         'depreciationDay' => $request->depreciationDay,
                         'depreciationMonth' => $request->depreciationMonth,
                         'depreciationYear' => $request->depreciationYear,
                         'warranty' => $request->warranty,
                         'selectMothOrYearWarranty' => $request->selectMothOrYearWarranty,
                         'guarantee' => $request->guarantee,
                         'selectMothOrYearGuarantee' => $request->selectMothOrYearGuarantee,
                         'color' => $request->color,
                         'size' => strip_tags($request->size),
                         'description' => strip_tags($request->description),
                         'shopId' => Auth::User()->shopId,
                         'shopTypeId' => $shopTypeId,
                         'updateBy' => Auth::User()->id,
                   ]);

                if ($request->currentPayable > $request->totalProductCost) {
                       $previousPayable = $request->currentPayable - $request->totalProductCost;

                       if ($request->previousPayableDue ==  $previousPayable) {
                              ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                                  'previousPayableDue' => '',
                              ]);
                       }
                       elseif ($request->previousPayableDue <  $previousPayable ) {
                           return ['owed' => 'You wrote more money than you owed'];
                       }
                       else {
                           $finalDue = $request->previousPayableDue -  $previousPayable;
                           ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                               'previousPayableDue' => $finalDue,
                           ]);
                       }
                   }

                  else {
                        $previousPayable =  $request->totalProductCost - $request->currentPayable;
                        $totalDue = $previousPayable + $request->previousPayableDue;
                        ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                           'previousPayableDue' => $totalDue,
                        ]);
                  }
            }

            if (isset($request->assetFourCategory)) {
                    ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                         'assetCategoryId' => $request->assetCategory,
                         'assetProductId' => $request->assetProductId,
                         'assetSupplierId' => $request->assetSupplierId,
                         'assetBrandId' => $request->assetBrandId,
                         'purchasedate' => $request->purchasedate,
                         'mfgDate' => $request->mfgDate,
                         'expiryDate' => $request->expiryDate,
                         'invoiceNo' => $request->invoiceNo,
                         'modelNo' => $request->modelNo,
                         'productQuantity' => $request->productQuantity,
                         'productCost' => $request->productCost,
                         'totalProductCost' => $request->totalProductCost,
                         'currentPayable' => $request->currentPayable,
                         'depreciation' => $request->totalDepreciation,
                         'depreciationDay' => $request->depreciationDay,
                         'depreciationMonth' => $request->depreciationMonth,
                         'depreciationYear' => $request->depreciationYear,
                         'warranty' => $request->warranty,
                         'selectMothOrYearWarranty' => $request->selectMothOrYearWarranty,
                         'guarantee' => $request->guarantee,
                         'selectMothOrYearGuarantee' => $request->selectMothOrYearGuarantee,
                         'color' => $request->color,
                         'size' => strip_tags($request->size),
                         'description' => strip_tags($request->description),
                         'shopId' => Auth::User()->shopId,
                         'shopTypeId' => $shopTypeId,
                         'updateBy' => Auth::User()->id,
                   ]);

                if ($request->currentPayable > $request->totalProductCost) {
                       $previousPayable = $request->currentPayable - $request->totalProductCost;

                       if ($request->previousPayableDue ==  $previousPayable) {
                              ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                                  'previousPayableDue' => '',
                              ]);
                       }
                       elseif ($request->previousPayableDue <  $previousPayable ) {
                           return ['owed' => 'You wrote more money than you owed'];
                       }
                       else {
                           $finalDue = $request->previousPayableDue -  $previousPayable;
                           ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                               'previousPayableDue' => $finalDue,
                           ]);
                       }
                   }

                  else {
                        $previousPayable =  $request->totalProductCost - $request->currentPayable;
                        $totalDue = $previousPayable + $request->previousPayableDue;
                        ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                           'previousPayableDue' => $totalDue,
                        ]);
                  }
            }

            if (isset($request->assetThirdCategory)) {
                    ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                         'assetCategoryId' => $request->assetCategory,
                         'assetProductId' => $request->assetProductId,
                         'assetSupplierId' => $request->assetSupplierId,
                         'assetBrandId' => $request->assetBrandId,
                         'purchasedate' => $request->purchasedate,
                         'mfgDate' => $request->mfgDate,
                         'expiryDate' => $request->expiryDate,
                         'invoiceNo' => $request->invoiceNo,
                         'modelNo' => $request->modelNo,
                         'productQuantity' => $request->productQuantity,
                         'productCost' => $request->productCost,
                         'totalProductCost' => $request->totalProductCost,
                         'currentPayable' => $request->currentPayable,
                         'depreciation' => $request->totalDepreciation,
                         'depreciationDay' => $request->depreciationDay,
                         'depreciationMonth' => $request->depreciationMonth,
                         'depreciationYear' => $request->depreciationYear,
                         'warranty' => $request->warranty,
                         'selectMothOrYearWarranty' => $request->selectMothOrYearWarranty,
                         'guarantee' => $request->guarantee,
                         'selectMothOrYearGuarantee' => $request->selectMothOrYearGuarantee,
                         'color' => $request->color,
                         'size' => strip_tags($request->size),
                         'description' => strip_tags($request->description),
                         'shopId' => Auth::User()->shopId,
                         'shopTypeId' => $shopTypeId,
                         'updateBy' => Auth::User()->id,
                   ]);

                if ($request->currentPayable > $request->totalProductCost) {
                       $previousPayable = $request->currentPayable - $request->totalProductCost;

                       if ($request->previousPayableDue ==  $previousPayable) {
                              ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                                  'previousPayableDue' => '',
                              ]);
                       }
                       elseif ($request->previousPayableDue <  $previousPayable ) {
                           return ['owed' => 'You wrote more money than you owed'];
                       }
                       else {
                           $finalDue = $request->previousPayableDue -  $previousPayable;
                           ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                               'previousPayableDue' => $finalDue,
                           ]);
                       }
                   }

                  else {
                        $previousPayable =  $request->totalProductCost - $request->currentPayable;
                        $totalDue = $previousPayable + $request->previousPayableDue;
                        ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                           'previousPayableDue' => $totalDue,
                        ]);
                  }
            }

            if (isset($request->assetSubCategory)) {
                    ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                         'assetCategoryId' => $request->assetCategory,
                         'assetProductId' => $request->assetProductId,
                         'assetSupplierId' => $request->assetSupplierId,
                         'assetBrandId' => $request->assetBrandId,
                         'purchasedate' => $request->purchasedate,
                         'mfgDate' => $request->mfgDate,
                         'expiryDate' => $request->expiryDate,
                         'invoiceNo' => $request->invoiceNo,
                         'modelNo' => $request->modelNo,
                         'productQuantity' => $request->productQuantity,
                         'productCost' => $request->productCost,
                         'totalProductCost' => $request->totalProductCost,
                         'currentPayable' => $request->currentPayable,
                         'depreciation' => $request->totalDepreciation,
                         'depreciationDay' => $request->depreciationDay,
                         'depreciationMonth' => $request->depreciationMonth,
                         'depreciationYear' => $request->depreciationYear,
                         'warranty' => $request->warranty,
                         'selectMothOrYearWarranty' => $request->selectMothOrYearWarranty,
                         'guarantee' => $request->guarantee,
                         'selectMothOrYearGuarantee' => $request->selectMothOrYearGuarantee,
                         'color' => $request->color,
                         'size' => strip_tags($request->size),
                         'description' => strip_tags($request->description),
                         'shopId' => Auth::User()->shopId,
                         'shopTypeId' => $shopTypeId,
                         'updateBy' => Auth::User()->id,
                   ]);

                if ($request->currentPayable > $request->totalProductCost) {
                       $previousPayable = $request->currentPayable - $request->totalProductCost;

                       if ($request->previousPayableDue ==  $previousPayable) {
                              ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                                  'previousPayableDue' => '',
                              ]);
                       }
                       elseif ($request->previousPayableDue <  $previousPayable ) {
                           return ['owed' => 'You wrote more money than you owed'];
                       }
                       else {
                           $finalDue = $request->previousPayableDue -  $previousPayable;
                           ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                               'previousPayableDue' => $finalDue,
                           ]);
                       }
                   }

                  else {
                        $previousPayable =  $request->totalProductCost - $request->currentPayable;
                        $totalDue = $previousPayable + $request->previousPayableDue;
                        ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                           'previousPayableDue' => $totalDue,
                        ]);
                  }
            }

           if (isset($request->assetCategory)) {
                   ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                        'assetCategoryId' => $request->assetCategory,
                        'assetProductId' => $request->assetProductId,
                        'assetSupplierId' => $request->assetSupplierId,
                        'assetBrandId' => $request->assetBrandId,
                        'purchasedate' => $request->purchasedate,
                        'mfgDate' => $request->mfgDate,
                        'expiryDate' => $request->expiryDate,
                        'invoiceNo' => $request->invoiceNo,
                        'modelNo' => $request->modelNo,
                        'productQuantity' => $request->productQuantity,
                        'productCost' => $request->productCost,
                        'totalProductCost' => $request->totalProductCost,
                        'currentPayable' => $request->currentPayable,
                        'depreciation' => $request->totalDepreciation,
                        'depreciationDay' => $request->depreciationDay,
                        'depreciationMonth' => $request->depreciationMonth,
                        'depreciationYear' => $request->depreciationYear,
                        'warranty' => $request->warranty,
                        'selectMothOrYearWarranty' => $request->selectMothOrYearWarranty,
                        'guarantee' => $request->guarantee,
                        'selectMothOrYearGuarantee' => $request->selectMothOrYearGuarantee,
                        'color' => $request->color,
                        'size' => strip_tags($request->size),
                        'description' => strip_tags($request->description),
                        'shopId' => Auth::User()->shopId,
                        'shopTypeId' => $shopTypeId,
                        'updateBy' => Auth::User()->id,
                  ]);

               if ($request->currentPayable > $request->totalProductCost) {
                      $previousPayable = $request->currentPayable - $request->totalProductCost;

                      if ($request->previousPayableDue ==  $previousPayable) {
                             ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                                 'previousPayableDue' => '',
                             ]);
                      }
                      elseif ($request->previousPayableDue <  $previousPayable ) {
                          return ['owed' => 'You wrote more money than you owed'];
                      }
                      else {
                          $finalDue = $request->previousPayableDue -  $previousPayable;
                          ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                              'previousPayableDue' => $finalDue,
                          ]);
                      }
                  }

                 else {
                       $previousPayable =  $request->totalProductCost - $request->currentPayable;
                       $totalDue = $previousPayable + $request->previousPayableDue;
                       ShopAssetEntry::where('shopAssetEntryId',$shopAssetEntryId)->update([
                          'previousPayableDue' => $totalDue,
                       ]);
                 }
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
