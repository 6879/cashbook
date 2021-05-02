<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseProductTotalQuantity;
use App\PurchaseProductTotalPrice;
use App\PurchaseProductMoreField;
use App\AddProductSupplierEntry;
use App\PurchaseProductDetails;
use App\PurchaseProductEntry;
use App\AdminPurchaseType;
use App\PurchaseType;
use App\PurchaseInvoice;
use App\ProductName;
use App\UniteEntry;
use App\BrandEntry;
use App\InvoiceSetup;
use App\InvoiceSetupDetails;
use Carbon\Carbon;
use Auth;

class PurchaseController extends Controller
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

        $purchaseInvoiceList = PurchaseInvoice::with('productSupplierName')->where('shopId',Auth::user()->id)->where('shopUserId',Auth::user()->id)->where('shopTypeId',$shopTypeId)->get();
        $adminPurchaseTypeList = AdminPurchaseType::all();
        return ['purchaseInvoiceList' => $purchaseInvoiceList,'adminPurchaseTypeList' => $adminPurchaseTypeList];
    }

    public function purchaseInvoiceShow()
    {
        if (Auth::user()->id) {
            $shopTypeId = Auth::user()->shopTypeId;
            $purchaseInvoice = PurchaseInvoice::where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->get()->count();
            $purchaseInvoiceIncrement = $purchaseInvoice + 1;
            $currentDate = Carbon::now()->format('d/m/Y');
            return ['currentDate' => $currentDate, 'purchaseInvoiceIncrement' => $purchaseInvoiceIncrement];
        }
    }








    public function getInvoiceSetupInformation()
    {
       
       $InvoiceSetup = InvoiceSetup::where('status',1)->where('invoiceForId',1)->orderBy('id','DESC')->first();
       $id = $InvoiceSetup->id;
       $data = InvoiceSetupDetails::where('invoiceSetupId',$id)->first();
       return ['data' => $data];
    }


    public function getInvoiceInformation($id)
    {
       
       $data = PurchaseInvoice::where('purchaseInvoiceId',$id)->first();
       $purchaseInvoiceNo = PurchaseInvoice::where('purchaseInvoiceId',$id)->first()->purchaseInvoiceNo;
       $productSupplierId = PurchaseInvoice::where('purchaseInvoiceId',$id)->first()->productSupplierId;
       $invoiceProductLists = PurchaseProductEntry::where('purchaseInvoiceNo',$purchaseInvoiceNo)->get();
       $supplierInfo = AddProductSupplierEntry::where('productSupplierId',$productSupplierId)->first();
       $purchaseProductList = ProductName::get();
 

       return [
           'data' => $data,
           'invoiceProductLists' => $invoiceProductLists,
           'supplierInfo' => $supplierInfo,
           'purchaseProductList' => $purchaseProductList,
        ];
    }


    public function getSupllierInformation($id)
    {
       
       $data = AddProductSupplierEntry::where('productSupplierId',$id)->first();

       return ['data' => $data];
    }







    public function shopWishProductSupplier()
    {
        $shopTypeId = Auth::user()->shopTypeId;
        $productSupplierList = AddProductSupplierEntry::orderBy('productSupplierId','desc')->where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->get();
        return ['productSupplierList' => $productSupplierList];
    }


    public function shopWishProductSupplierId($productSupplierId)
    {
        $singleProductSupplier = AddProductSupplierEntry::where('productSupplierId',$productSupplierId)->first();
        $productSupplierPhone = $singleProductSupplier->productSupplierPhone;
        $productSupplierAddress = $singleProductSupplier->productSupplierAddress;

        $shopTypeId = Auth::user()->shopTypeId;
        $previousPayableDue = PurchaseInvoice::where('productSupplierId',$productSupplierId)->where('shopId',Auth::user()->id)->where('shopTypeId',$shopTypeId)->latest()->first();
        if (isset($previousPayableDue->previousPayableDue)) {
            $previousBill = $previousPayableDue->previousPayableDue;
            return ['previousBill'=> $previousBill,'productSupplierPhone' => $productSupplierPhone,'productSupplierAddress'=>$productSupplierAddress];
        }
        return ['productSupplierPhone' => $productSupplierPhone,'productSupplierAddress'=>$productSupplierAddress];
    }



    public function purchaseTypeShow()
    {
        $purchaseType = PurchaseType::where('status','0')->orderBY('id','asc')->get();
        return ['purchaseType' => $purchaseType];
    }
    public function unitNameShow()
    {
          $unitNameShow = UniteEntry::orderBy('uniteEntryId','desc')->get();
          $brandLists = BrandEntry::orderBy('brandId','desc')->where('createBy',Auth::User()->id)->get();
          return  ['unitNameShow' => $unitNameShow, 'brandLists' => $brandLists];
    }
    public function productNameShow()
    {
          $shopTypeId = Auth::user()->shopTypeId;

          $productNameList = ProductName::where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->id)->get();
          return  ['productNameList' => $productNameList];
    }

    public function purchaseProductList()
    {
        $shopTypeId = Auth::user()->shopTypeId;
        $purchaseProductList = PurchaseProductEntry::with('productName','brandName','unitName')->where('shopId',Auth::user()->id)->where('shopTypeId',$shopTypeId)->latest()->get();
        return ['purchaseProductList' => $purchaseProductList];
    }

    public function getPurchaseProductList()
    {
        $purchaseProductList = ProductName::where('productNameId',17)->get();
        return ['purchaseProductList' => $purchaseProductList];
    }
    public function totalPurchaseValue($purchaseInvoiceNo)
    {
        $shopTypeId = Auth::user()->shopTypeId;
        $purchaseProductList = PurchaseProductEntry::where('purchaseInvoiceNo',$purchaseInvoiceNo)->where('shopId',Auth::user()->id)->where('shopTypeId',$shopTypeId)->get();
        return ['purchaseProductList' => $purchaseProductList];
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
              'productSupplierId' => 'required',
              'purchaseTypeId' => 'required',
          ],
          [
             'productSupplierId.required' => 'Select Product Supplier  Name',
             'purchaseTypeId.required' => 'Select Purchase Type Name',
          ]);

          $purchaseTypeId = implode(',', array_values($request->purchaseTypeId));

          $shopTypeId = Auth::user()->shopTypeId;

          $purchaseInvoice = new PurchaseInvoice();
          $purchaseInvoice->purchaseDate = $request->purchaseDate;
          $purchaseInvoice->purchaseInvoiceNo = $request->purchaseInvoiceNo;
          $purchaseInvoice->productSupplierId = $request->productSupplierId;
          $purchaseInvoice->purchaseTypeId = $purchaseTypeId;
          $purchaseInvoice->totalPurchaseValue = $request->totalPurchaseValue;
          $purchaseInvoice->carriageInward = $request->carriageInward;
          $purchaseInvoice->totalAmount = $request->totalAmount;
          $purchaseInvoice->discount = $request->discount;
          $purchaseInvoice->supplierPayable = $request->supplierPayable;
          $purchaseInvoice->otherCost = $request->otherCost;
          $purchaseInvoice->damageAndWarranty = $request->damageAndWarranty;
          $purchaseInvoice->totalProductCost = $request->totalProductCost;
          // if (PurchaseInvoice::where('productSupplierId',$request->productSupplierId)->where('shopId',Auth::user()->id)->where('shopTypeId',$shopTypeId)->exists()) {
          //     $previousPayableDue = PurchaseInvoice::where('productSupplierId',$request->productSupplierId)->where('shopId',Auth::user()->id)->where('shopTypeId',$shopTypeId)->latest()->first()->previousPayableDue;
          //       if ($request->currentPayable > $request->payable) {
          //         $previousPayable = $request->currentPayable - $request->payable;
          //         $totalPayableBill = $previousPayable + $previousPayableDue;
          //         $purchaseInvoice->previousPayableDue = $totalPayableBill;
          //       }
          // }
          // else {
          //     if ($request->currentPayable > $request->payable) {
          //       $previousPayable = $request->currentPayable - $request->payable;
          //       $purchaseInvoice->previousPayableDue = $previousPayable;
          //     }
          // }
          $purchaseInvoice->currentPayable = $request->currentPayable;
          // $purchaseInvoice->totalPayable = $request->payable;
          $purchaseInvoice->shopId = Auth::user()->id;
          $purchaseInvoice->shopTypeId = $shopTypeId;
          $purchaseInvoice->shopUserId = Auth::user()->id;
          $purchaseInvoice->createBy = Auth::User()->id;
          $purchaseInvoice->created_at = Carbon::now();
          $purchaseInvoice->save();

            if (PurchaseProductTotalQuantity::where('productSupplierId',$request->productSupplierId)->exists()) {
                $productInfo = PurchaseProductTotalQuantity::where('productSupplierId',$request->productSupplierId)->latest()->first();
                $totalQuantity = $productInfo->totalQuantity + (float)($request->totalProductQuantity);
                $totalPrice = $productInfo->totalPrice + (float)($request->supplierPayable);

                PurchaseProductTotalQuantity::where('productSupplierId',$request->productSupplierId)->update([
                    'totalQuantity' => $totalQuantity,
                    'totalPrice' => $totalPrice,
                    'updateBy' => Auth::User()->id,
                ]);
            }
            else {
                PurchaseProductTotalQuantity::insert([
                    'productSupplierId' => $request->productSupplierId,
                    'totalQuantity' => $request->totalProductQuantity,
                    'totalPrice' => $request->supplierPayable,
                    'shopId' => Auth::user()->id,
                    'shopTypeId' => $shopTypeId,
                    'createBy' => Auth::User()->id,
                    'created_at' => Carbon::now(),
                ]);
            }

    }
    public function productEntry(Request $request)
    {
        if (PurchaseProductEntry::where('purchaseInvoiceNo',$request->purchaseInvoiceNo)->where('productId',$request->productId)->exists()) {
            return ['alreadyEntry' => 'Already Product Entry'];
        }
        else {
          $shopTypeId = Auth::user()->shopTypeId;

           PurchaseProductEntry::insert([
                'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                'productSupplierId' => $request->productSupplierId,
                'productId' => $request->productId,
                'brandId' => $request->brandId,
                'quantity' => $request->quantity,
                'unitId' => $request->unitId,
                'unitPrice' => $request->unitPrice,
                'totalPrice' => $request->totalPrice,
                'shopId' => Auth::user()->id,
                'shopTypeId' => $shopTypeId,
                'createBy' => Auth::User()->id,
                'created_at' => Carbon::now(),
          ]);
        }
        if (PurchaseProductTotalPrice::where('productId',$request->productId)->exists()) {
              $productInfo = PurchaseProductTotalPrice::where('productId',$request->productId)->latest()->first();
              $totalQuantity = $productInfo->totalQuantity + $request->quantity;
              $totalPrice = $productInfo->totalPrice + $request->totalPrice;

              PurchaseProductTotalPrice::where('productId',$request->productId)->update([
                  'totalQuantity' => $totalQuantity,
                  'totalPrice' => $totalPrice,
                  'updateBy' => Auth::User()->id,
              ]);
        }
        else {
            PurchaseProductTotalPrice::insert([
                'productId' => $request->productId,
                'totalQuantity' => $request->quantity,
                'totalPrice' => $request->totalPrice,
                'shopId' => Auth::user()->id,
                'shopTypeId' => $shopTypeId,
                'createBy' => Auth::User()->id,
                'created_at' => Carbon::now(),
            ]);
        }

    }
    public function productQuantityUpdate(Request $request){
        PurchaseProductEntry::where('purchaseInvoiceNo',$request->purchaseInvoiceNo)->where('productId',$request->productId)->update([
            'quantity' => $request->quantity,
            'unitPrice' => $request->unitPrice,
            'totalPrice' => $request->totalPrice,
        ]);
    }



    public function purchaseProductDetails(Request $request)
    {
           $shopTypeId = Auth::user()->shopTypeId;

            if (isset($request->modelNo) || isset($request->batchNo) || isset($request->qrCode) || isset($request->mfgLicenseNO) || isset($request->mfgDate) || isset($request->expiryDate)) {
                
                
                if (PurchaseProductDetails::where('purchaseInvoiceNo',$request->purchaseInvoiceNo)->where('productSupplierId',$request->productSupplierId)->where('purchaseProductId',$request->purchaseProductIdCatch)->exists()) {
                
                 

                    PurchaseProductDetails::where('purchaseProductId',$request->purchaseProductIdCatch)->update([
                        'modelNo' => $request->modelNo,
                        'batchNo' => $request->batchNo,
                        'qrCode' => $request->qrCode,
                        'mfgLicenseNO' => $request->mfgLicenseNO,
                        'warranty' => $request->warranty,
                        'selectMothOrYearWarranty' => $request->selectMothOrYearWarranty,
                        'guarantee' => $request->guarantee,
                        'selectMothOrYearGuarantee' => $request->selectMothOrYearGuarantee,
                        'mfgDate' => $request->mfgDate,
                        'expiryDate' => $request->expiryDate,
                        'quantityType' => $request->quantityType,
                        'quantityNoti' => $request->quantityNoti,
                        'proDescription' => strip_tags($request->proDescription),
                        'proAdvantage' => strip_tags($request->proAdvantage),
                        'updateBy' => Auth::User()->id,
                    ]);
          
                    if (isset($request->tax)) {
                         if ($request->tax == 1) {
                              PurchaseProductDetails::where('purchaseProductId',$request->purchaseProductIdCatch)->update([
                                  'tax' => $request->tax,
                                  'taxAmount' => $request->taxAmount,
                                  'taxAmountType' => $request->taxAmountType,
                              ]);
                         }
                         else {
                             PurchaseProductDetails::where('purchaseProductId',$request->purchaseProductIdCatch)->update([
                                  'tax' => 0,
                              ]);
                         }
                    }

                    
                // ===================================
                // ========== More field information =
                // ===================================


                // ========== one information 
                if (isset($request->fieldNameOne)) {
                if (PurchaseProductMoreField::
                    where('purchaseInvoiceNo',$request->purchaseInvoiceNo)
                    ->where('purchaseProductId',$request->purchaseProductIdCatch)
                    ->where('serialId',1)->exists()) {
                    
                
                PurchaseProductMoreField::where('purchaseProductId',$request->purchaseProductIdCatch)
                    ->where('purchaseInvoiceNo',$request->purchaseInvoiceNo)
                    ->where('serialId',1)
                    ->update([
                        'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                        'purchaseProductId' => $request->purchaseProductIdCatch,
                        'optionName' => $request->fieldNameOne,
                        'optionWork' => $request->workOne,
                        'updateBy' => Auth::User()->id,
                    ]);
                    }else{

                PurchaseProductMoreField::insert([
                    'serialId' => 1,
                    'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                    'purchaseProductId' => $request->purchaseProductIdCatch,
                    'optionName' => $request->fieldNameOne,
                    'optionWork' => $request->workOne,
                    'shopId' => Auth::user()->id,
                    'shopTypeId' => $shopTypeId,
                    'createBy' => Auth::User()->id,
                    'created_at' => Carbon::now(),
                ]);
                    }
                    }

                    
                // ========== one information 
                


                // ========== two information 
                
                    if (isset($request->fieldNameTwo)) {
                if (PurchaseProductMoreField::
                    where('purchaseInvoiceNo',$request->purchaseInvoiceNo)
                    ->where('purchaseProductId',$request->purchaseProductIdCatch)
                    ->where('serialId',2)->exists()) {
                    
                
                PurchaseProductMoreField::where('purchaseProductId',$request->purchaseProductIdCatch)
                    ->where('purchaseInvoiceNo',$request->purchaseInvoiceNo)
                    ->where('serialId',2)
                    ->update([
                        'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                        'purchaseProductId' => $request->purchaseProductIdCatch,
                        'optionName' => $request->fieldNameTwo,
                        'optionWork' => $request->workTwo,
                        'updateBy' => Auth::User()->id,
                    ]);
                    }else{

                PurchaseProductMoreField::insert([
                    'serialId' => 2,
                    'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                    'purchaseProductId' => $request->purchaseProductIdCatch,
                    'optionName' => $request->fieldNameTwo,
                    'optionWork' => $request->workTwo,
                    'shopId' => Auth::user()->id,
                    'shopTypeId' => $shopTypeId,
                    'createBy' => Auth::User()->id,
                    'created_at' => Carbon::now(),
                ]);
                    }
                    }

                    
                // ========== two information 
                


                // ========== three information 
                
                if (isset($request->fieldNameThree)) {
                if (PurchaseProductMoreField::
                    where('purchaseInvoiceNo',$request->purchaseInvoiceNo)
                    ->where('purchaseProductId',$request->purchaseProductIdCatch)
                    ->where('serialId',3)->exists()) {
                    
                
                PurchaseProductMoreField::where('purchaseProductId',$request->purchaseProductIdCatch)
                    ->where('purchaseInvoiceNo',$request->purchaseInvoiceNo)
                    ->where('serialId',3)
                    ->update([
                        'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                        'purchaseProductId' => $request->purchaseProductIdCatch,
                        'optionName' => $request->fieldNameThree,
                        'optionWork' => $request->workThree,
                        'updateBy' => Auth::User()->id,
                    ]);
                    }else{

                PurchaseProductMoreField::insert([
                    'serialId' => 3,
                    'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                    'purchaseProductId' => $request->purchaseProductIdCatch,
                    'optionName' => $request->fieldNameThree,
                    'optionWork' => $request->workThree,
                    'shopId' => Auth::user()->id,
                    'shopTypeId' => $shopTypeId,
                    'createBy' => Auth::User()->id,
                    'created_at' => Carbon::now(),
                ]);
                    }
                    }

                    
                // ========== three information 
                


                // ========== Fore information 
                
                if (isset($request->fieldNameFour)) {
                if (PurchaseProductMoreField::
                    where('purchaseInvoiceNo',$request->purchaseInvoiceNo)
                    ->where('purchaseProductId',$request->purchaseProductIdCatch)
                    ->where('serialId',4)->exists()) {
                    
                
                PurchaseProductMoreField::where('purchaseProductId',$request->purchaseProductIdCatch)
                    ->where('purchaseInvoiceNo',$request->purchaseInvoiceNo)
                    ->where('serialId',4)
                    ->update([
                        'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                        'purchaseProductId' => $request->purchaseProductIdCatch,
                        'optionName' => $request->fieldNameFour,
                        'optionWork' => $request->workFour,
                        'updateBy' => Auth::User()->id,
                    ]);
                    }else{

                PurchaseProductMoreField::insert([
                    'serialId' => 4,
                    'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                    'purchaseProductId' => $request->purchaseProductIdCatch,
                    'optionName' => $request->fieldNameFour,
                    'optionWork' => $request->workFour,
                    'shopId' => Auth::user()->id,
                    'shopTypeId' => $shopTypeId,
                    'createBy' => Auth::User()->id,
                    'created_at' => Carbon::now(),
                ]);
                    }
                    }

                    
                // ========== fore information 
                
                
                // ===================================
                // ========== More field information =
                // ===================================

                



                    return ['alreadyEntry' => 'Update Poroduct Description'];
                }
                else {
                    $purchaseProduct = PurchaseProductEntry::where('purchaseProductId',$request->purchaseProductIdCatch)->first();
                    $lastInsertId = PurchaseProductDetails::insertGetId([
                        'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                        'productSupplierId' => $request->productSupplierId,
                        'purchaseProductId' => $request->purchaseProductIdCatch,
                        'productId' => $purchaseProduct->productId,
                        'modelNo' => $request->modelNo,
                        'batchNo' => $request->batchNo,
                        'qrCode' => $request->qrCode,
                        'mfgLicenseNO' => $request->mfgLicenseNO,
                        'warranty' => $request->warranty,
                        'selectMothOrYearWarranty' => $request->selectMothOrYearWarranty,
                        'guarantee' => $request->guarantee,
                        'selectMothOrYearGuarantee' => $request->selectMothOrYearGuarantee,
                        'mfgDate' => $request->mfgDate,
                        'expiryDate' => $request->expiryDate,
                        'quantityType' => $request->quantityType,
                        'quantityNoti' => $request->quantityNoti,
                        'proDescription' => strip_tags($request->proDescription),
                        'proAdvantage' => strip_tags($request->proAdvantage),
                        'shopId' => Auth::user()->id,
                        'shopTypeId' => $shopTypeId,
                        'createBy' => Auth::User()->id,
                        'created_at' => Carbon::now(),
                    ]);
                }
            }
            else {
               return ['noEntry' => 'Enter Your Information'];
            }
            if (isset($request->tax)) {
                 if ($request->tax == 1) {
                    	PurchaseProductDetails::where('purchaseProductDetailsId',$lastInsertId)->update([
                          'tax' => $request->tax,
                          'taxAmount' => $request->taxAmount,
                          'taxAmountType' => $request->taxAmountType,
                      ]);
                 }
                 else {
                     PurchaseProductDetails::where('purchaseProductDetailsId',$lastInsertId)->update([
                          'tax' => 0,
                      ]);
                 }
            }

            if (isset($request->fieldNameOne)) {
                PurchaseProductMoreField::insert([
                    'serialId' => 1,
                    'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                    'purchaseProductId' => $request->purchaseProductIdCatch,
                    'optionName' => $request->fieldNameOne,
                    'optionWork' => $request->workOne,
                    'shopId' => Auth::user()->id,
                    'shopTypeId' => $shopTypeId,
                    'createBy' => Auth::User()->id,
                    'created_at' => Carbon::now(),
                ]);
            }
            
            if (isset($request->fieldNameTwo)) {
                PurchaseProductMoreField::insert([
                    'serialId' => 2,
                    'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                    'purchaseProductId' => $request->purchaseProductIdCatch,
                    'optionName' => $request->fieldNameTwo,
                    'optionWork' => $request->workTwo,
                    'shopId' => Auth::user()->id,
                    'shopTypeId' => $shopTypeId,
                    'createBy' => Auth::User()->id,
                    'created_at' => Carbon::now(),
                ]);
            }
            
            if (isset($request->fieldNameThree)) {
                PurchaseProductMoreField::insert([
                    'serialId' => 3,
                    'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                    'purchaseProductId' => $request->purchaseProductIdCatch,
                    'optionName' => $request->fieldNameThree,
                    'optionWork' => $request->workThree,
                    'shopId' => Auth::user()->id,
                    'shopTypeId' => $shopTypeId,
                    'createBy' => Auth::User()->id,
                    'created_at' => Carbon::now(),
                ]);
            }
            
            if (isset($request->fieldNameFour)) {
                PurchaseProductMoreField::insert([
                    'serialId' => 4,
                    'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
                    'purchaseProductId' => $request->purchaseProductIdCatch,
                    'optionName' => $request->fieldNameFour,
                    'optionWork' => $request->workFour,
                    'shopId' => Auth::user()->id,
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
    public function show($purchaseInvoiceId)
    {
        $shopTypeId = Auth::user()->shopTypeId;
        $purchaseProductList = PurchaseProductEntry::with('productName','brandName','unitName')->where('purchaseInvoiceNo',$purchaseInvoiceId)->where('shopId',Auth::user()->id)->where('shopTypeId',$shopTypeId)->latest()->get();
        return ['purchaseProductList' => $purchaseProductList];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($purchaseInvoiceId)
    {
        $purchaseInfor = PurchaseInvoice::where('purchaseInvoiceId',$purchaseInvoiceId)->latest()->first();
        return ['purchaseInfor' => $purchaseInfor];
    }
    public function purchaseProductInfo($purchaseProductId)
    {
        $purchaseProductdetail = PurchaseProductDetails::where('purchaseProductId',$purchaseProductId)->latest()->first();
        $purchaseProductMoredetails = PurchaseProductMoreField::where('purchaseProductId',$purchaseProductId)->get();
        return ['purchaseProductdetail' => $purchaseProductdetail , 'purchaseProductMoredetails' => $purchaseProductMoredetails];
    }


    public function invoiceProductMoreDetails($productId,$invoiceNo)
    {
        $invoiceProductMoreDetails = PurchaseProductDetails::where('purchaseProductId',$productId)->where('purchaseInvoiceNo',$invoiceNo)->first();
        $invoiceProductMoreField1 = PurchaseProductMoreField::where('purchaseProductId',$productId)->where('purchaseInvoiceNo',$invoiceNo)->where('serialId',1)->first();
        $invoiceProductMoreField2 = PurchaseProductMoreField::where('purchaseProductId',$productId)->where('purchaseInvoiceNo',$invoiceNo)->where('serialId',2)->first();
        $invoiceProductMoreField3 = PurchaseProductMoreField::where('purchaseProductId',$productId)->where('purchaseInvoiceNo',$invoiceNo)->where('serialId',3)->first();
        $invoiceProductMoreField4 = PurchaseProductMoreField::where('purchaseProductId',$productId)->where('purchaseInvoiceNo',$invoiceNo)->where('serialId',4)->first();

        return [
            'invoiceProductMoreDetailss' => $invoiceProductMoreDetails,
            'invoiceProductMoreField1' => $invoiceProductMoreField1,
            'invoiceProductMoreField2' => $invoiceProductMoreField2,
            'invoiceProductMoreField3' => $invoiceProductMoreField3,
            'invoiceProductMoreField4' => $invoiceProductMoreField4,
        ];
    }


    public function purchaseProductMoreFieldDelete($id)
    {
        $delete = PurchaseProductMoreField::where('purchaseProductMoreFieldId',$id)->delete();
        
        if($delete){
        return ['delete' => 1];
        }else{
            return ['delete' => 0];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $purchaseInvoiceId)
    {

           $this->validate($request, [
                'productSupplierId' => 'required',
                'purchaseTypeId' => 'required',
            ],
            [
               'productSupplierId.required' => 'Select Product Supplier  Name',
               'purchaseTypeId.required' => 'Select Purchase Type Name',
            ]);

            PurchaseInvoice::where('purchaseInvoiceId',$purchaseInvoiceId)->update([
                  'productSupplierId' => $request->productSupplierId,
                  'purchaseTypeId' => $request->purchaseTypeId,
                  'totalPurchaseValue' => $request->totalPurchaseValue,
                  'carriageInward' => $request->carriageInward,
                  'totalAmount' => $request->totalAmount,
                  'discount' => $request->discount,
                  'supplierPayable' => $request->supplierPayable,
                  'otherCost' => $request->otherCost,
                  'damageAndWarranty' => $request->damageAndWarranty,
                  'totalProductCost' => $request->totalProductCost,
                  'currentPayable' => $request->currentPayable,
                  'updateBy' => Auth::User()->id,
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function purchaseProductDetailsUpdate(Request $request)
    {
           PurchaseProductDetails::where('purchaseProductId',$request->purchaseProductIdCatch)->update([
              'modelNo' => $request->modelNo,
              'batchNo' => $request->batchNo,
              'qrCode' => $request->qrCode,
              'mfgLicenseNO' => $request->mfgLicenseNO,
              'warranty' => $request->warranty,
              'selectMothOrYearWarranty' => $request->selectMothOrYearWarranty,
              'guarantee' => $request->guarantee,
              'selectMothOrYearGuarantee' => $request->selectMothOrYearGuarantee,
              'mfgDate' => $request->mfgDate,
              'expiryDate' => $request->expiryDate,
              'quantityType' => $request->quantityType,
              'quantityNoti' => $request->quantityNoti,
              'proDescription' => strip_tags($request->proDescription),
              'proAdvantage' => strip_tags($request->proAdvantage),
              'updateBy' => Auth::User()->id,
          ]);

          if (isset($request->tax)) {
               if ($request->tax == 1) {
                    PurchaseProductDetails::where('purchaseProductId',$request->purchaseProductIdCatch)->update([
                        'tax' => $request->tax,
                        'taxAmount' => $request->taxAmount,
                        'taxAmountType' => $request->taxAmountType,
                    ]);
               }
               else {
                   PurchaseProductDetails::where('purchaseProductId',$request->purchaseProductIdCatch)->update([
                        'tax' => 0,
                    ]);
               }
          }

    }
    public function destroy($purchaseProductId)
    {
        if (PurchaseProductDetails::where('purchaseProductId',$purchaseProductId)->exists()) {
            $purchaseProductDetailsId = PurchaseProductDetails::where('purchaseProductId',$purchaseProductId)->latest()->first();
            PurchaseProductDetails::where('purchaseProductDetailsId',$purchaseProductDetailsId->purchaseProductDetailsId)->delete();
        }
        if (PurchaseProductTotalPrice::where('productId',$purchaseProductId)->exists()) {
            $purchaseProductTotalPriceId = PurchaseProductTotalPrice::where('productId',$purchaseProductId)->latest()->first();
            PurchaseProductTotalPrice::where('purchaseProductTotalPriceId',$purchaseProductTotalPriceId->purchaseProductTotalPriceId)->delete();
        }
        PurchaseProductEntry::where('purchaseProductId',$purchaseProductId)->delete();

    }
}
