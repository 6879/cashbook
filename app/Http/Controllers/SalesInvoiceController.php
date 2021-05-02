<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesProductEntry;
use App\ShopInformation;
use App\SalesInvoice;
use Carbon\Carbon;
use Auth;

class SalesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $salesInvoiceLists = SalesInvoice::where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->paginate(30);
        $salesinvoiceNumber = SalesInvoice::where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->count();
        $salesInvoiceNo = $salesinvoiceNumber + 1;
        $currentDate = Carbon::now()->format('d-m-Y');
        return ['currentDate' => $currentDate,'salesInvoiceLists' => $salesInvoiceLists,'salesInvoiceNo' => $salesInvoiceNo];
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
          $currentDate = Carbon::now()->format('d-m-Y');

          $implodeSalesCustomerTypeId = implode(',', array_column($request->salesCustomerTypeId,$request->id));
          $salesCustomerTypeId = explode(',',$implodeSalesCustomerTypeId)[0];

          $implodeSalesCustomerId = implode(',', array_column($request->salesCustomerId,$request->id));
          $salesCustomerId = explode(',',$implodeSalesCustomerId)[0];

          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          $salesInvoice = new SalesInvoice();
          if ($request->salesDate == $currentDate) {
             $salesInvoice->salesDate = $request->salesDate;
          }
          else {
             $salesDatePosition = strpos($request->salesDate, 'T');
             $salesDate = substr($request->salesDate, 0, $salesDatePosition);
             $date = explode('-',$salesDate)[2];
             $dateIncrement = $date+1;
             $month = explode('-',$salesDate)[1];
             $year = explode('-',$salesDate)[0];

             $finalDate = $dateIncrement.'-'.$month.'-'.$year;
             $salesInvoice->salesDate = $finalDate;
          }
          $salesInvoice->salesInvoiceNo = $request->salesInvoiceNo;
          $salesInvoice->salesCustomerTypeId = $salesCustomerTypeId;
          $salesInvoice->salesCustomerId = $salesCustomerId;
          $salesInvoice->totalQuantity = $request->totalQuantity;
          $salesInvoice->totalBalance = $request->totalBalance;
          $salesInvoice->discountPrice = $request->discountPrice;
          $salesInvoice->totalVat = $request->totalVat;
          $salesInvoice->vatCalculate = $request->vatCalculate;
          $salesInvoice->totalPayable = $request->totalPayable;
          if ($request->currentTotalAmount > $request->currentPaidAmount) {
              $previousPayable = $request->currentTotalAmount - $request->currentPaidAmount;
              $salesInvoice->previousDue = $previousPayable;
          }
          $salesInvoice->currentTotalAmount = $request->currentTotalAmount;
          $salesInvoice->currentPaidAmount = $request->currentPaidAmount;
          $salesInvoice->shopId = Auth::User()->shopId;
          $salesInvoice->shopTypeId = $shopTypeId;
          $salesInvoice->shopUserId = Auth::User()->id;
          $salesInvoice->createBy = Auth::User()->id;
          $salesInvoice->save();

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
    public function edit($salesInvoiceId)
    {
        $singleSalesInvoiceList = SalesInvoice::where('salesInvoiceId',$salesInvoiceId)->first();
        $singleSalesProductList = SalesProductEntry::with('productName','brandName','unitName')->where('salesInvoiceNo',$singleSalesInvoiceList->salesInvoiceNo)->get();
        return ['singleSalesInvoiceList' => $singleSalesInvoiceList,'singleSalesProductList' => $singleSalesProductList];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $salesInvoiceId)
    {
        $currentDate = Carbon::now()->format('d-m-Y');


        $implodeSalesCustomerTypeId = implode(',', array_column($request->salesCustomerTypeId,$request->id));
        $salesCustomerTypeId = explode(',',$implodeSalesCustomerTypeId)[0];

        $implodeSalesCustomerId = implode(',', array_column($request->salesCustomerId,$request->id));
        $salesCustomerId = explode(',',$implodeSalesCustomerId)[0];

        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;


         SalesInvoice::where('salesInvoiceId',$salesInvoiceId)->update([
            'salesInvoiceNo'      =>   $request->salesInvoiceNo,
            'salesCustomerTypeId' =>   $salesCustomerTypeId,
            'salesCustomerId'     =>   $salesCustomerId,
            'totalQuantity'       =>   $request->totalQuantity,
            'totalBalance'        =>   $request->totalBalance,
            'discountPrice'       =>   $request->discountPrice,
            'totalVat'            =>   $request->totalVat,
            'vatCalculate'        =>   $request->vatCalculate,
            'totalPayable'        =>   $request->totalPayable,
            'currentTotalAmount'  =>   $request->currentTotalAmount,
            'currentPaidAmount'   =>   $request->currentPaidAmount,
            'updateBy'            =>   Auth::User()->id,
        ]);

        if ($request->salesDate == $currentDate) {
            SalesInvoice::where('salesInvoiceId',$salesInvoiceId)->update([
                'salesDate' => $request->salesDate,
            ]);
        }
        else {
           $salesDatePosition = strpos($request->salesDate, 'T');
           $salesDate = substr($request->salesDate, 0, $salesDatePosition);
           $date = explode('-',$salesDate)[2];
           $dateIncrement = $date+1;
           $month = explode('-',$salesDate)[1];
           $year = explode('-',$salesDate)[0];

           $finalDate = $dateIncrement.'-'.$month.'-'.$year;

           SalesInvoice::where('salesInvoiceId',$salesInvoiceId)->update([
               'salesDate' => $finalDate,
           ]);
        }

        if ($request->currentTotalAmount > $request->currentPaidAmount) {
            $previousPayable = $request->currentTotalAmount - $request->currentPaidAmount;

            SalesInvoice::where('salesInvoiceId',$salesInvoiceId)->update([
                'previousDue' => $previousPayable,
            ]);
        }
        else {
            SalesInvoice::where('salesInvoiceId',$salesInvoiceId)->update([
                'previousDue' => '',
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
