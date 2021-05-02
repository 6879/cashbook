<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\voucherType;
use App\AccountSetup;
use App\ChartOfAccount;
use App\voucherInformation;
use App\voucherInformationReport;


class voucherEntryController extends Controller
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
        $voucherInformation = voucherInformation::get();
        $data = voucherType::get();
        
        return [
            'list' => $data,
            'voucherInformation' => $voucherInformation,
        ];
    }

    public function getVoucherCode($id){

        $shortName = voucherType::where('id',$id)->first()->shortName;
        $lastId = '01';
        $date = date('m/y');
        $newCode = $shortName.'-'.$lastId.'-'.$date;
        return ['code' => $newCode];
    }

    public function getVoucherHeadCashbookCode($id){

        if($id == 1){
            $headCode = AccountSetup::where('placementType',15)->where('headName',45)->first()->headCode;
            $headCode1 = AccountSetup::where('placementType',15)->where('headName',46)->first()->headCode;
        }
       else if($id == 2){
            $headCode = AccountSetup::where('placementType',15)->where('headName',47)->first()->headCode;
            $headCode1 = AccountSetup::where('placementType',15)->where('headName',48)->first()->headCode;
        }
       else if($id == 3){
            $headCode = AccountSetup::where('placementType',15)->where('headName',49)->first()->headCode;
            $headCode1 = AccountSetup::where('placementType',15)->where('headName',50)->first()->headCode;
        }
       else if($id == 4){
            $headCode = AccountSetup::where('placementType',15)->where('headName',51)->first()->headCode;
            $headCode1 = AccountSetup::where('placementType',15)->where('headName',52)->first()->headCode;
        }
       else if($id == 5){
            $headCode = AccountSetup::where('placementType',15)->where('headName',51)->first()->headCode;
            $headCode1 = AccountSetup::where('placementType',15)->where('headName',52)->first()->headCode;
        }
       else if($id == 6){
            $headCode = AccountSetup::where('placementType',15)->where('headName',51)->first()->headCode;
            $headCode1 = AccountSetup::where('placementType',15)->where('headName',52)->first()->headCode;
        }

        $headOfCashBookList = ChartOfAccount::where('headCode','LIKE',"$headCode%")
        ->whereNotIn('headCode', [$headCode])
        ->where('headGroupType', 4)
        ->get();
        $headOfAccountList = ChartOfAccount::where('headCode','LIKE',"$headCode1%")
        ->where('headGroupType',3)->whereNotIn('headCode', [$headCode1])->get();
        
        return [
                'headOfCashBookList' => $headOfCashBookList,
                'headOfAccountList' => $headOfAccountList,
            ];
    }

    public function getSubHeadOfAccounts($id){

        
            $headCode = ChartOfAccount::where('headCode',$id)->first()->headCode;
            $headLavel = ChartOfAccount::where('headCode',$id)->first()->headLavel+1;
            
        

        $subHeadList = ChartOfAccount::where('headCode','LIKE',"$headCode%")
        ->where('headLavel',"$headLavel")
        ->where('headGroupType',4)
        ->get();
        
        return  [
                    'subHeadList' => $subHeadList,
                ];
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
            'voucherType' => 'required',
            'voucherNo' => 'required',
            'paymentTo' => 'required',
            'mobileNo' => 'required',
            'headOfCashBook' => 'required',
            'headOfAccounts' => 'required',
            'voucherAmount' => 'required|numeric|min:1',
            'particular' => 'required',
        ],
        [
            'voucherType.required' => 'Select Voucher Type.',
            'voucherNo.required' => 'Enter Voucher No.',
            'paymentTo.required' => 'Enter Person Name.',
            'mobileNo.required' => 'Enter Mobile No.',
            'headOfCashBook.required' => 'Select Accounts Code.',
            'headOfAccounts.required' => 'Select Accounts Code.',
            'voucherAmount.required' => 'Enter Voucher Amount.',
            'particular.required' => 'Write Particular.',
        ]);
            


        $voucherUniqueId = time();
        $day = date('d');
        $month = date('m');
        $year = date('Y');

        
        voucherInformation::insert([
                  'shopId' => Auth::user()->id,
                  'branchId' => 0,
                  'voucherDate' => $request->voucherDate,
                  'voucherType' => $request->voucherType,
                  'voucherNo' => $request->voucherNo,
                  'voucherUniqueId' => $voucherUniqueId,
                  'paymentTo' => $request->paymentTo,
                  'mobileNo' => $request->mobileNo,
                  'checkPaymentType' => $request->checkPaymentType,
                  'receiverBankAccountName' => $request->receiverBankAccountName,
                  'chequeNo' => $request->chequeNo,
                  'chequeDate' => $request->chequeDate,

                  'accountCodeDebit' => $request->headOfCashBook,
                  'accountCodeCredit' => $request->subHead,
                  'debitAmount' => $request->voucherAmount,
                  'creditAmount' => $request->voucherAmount,
                  'voucherAmount' => $request->voucherAmount,

                  'particular' => $request->particular,
                  'day' => $day,
                  'month' => $month,
                  'year' => $year,
                  'createBy' => Auth::user()->id,
                  'created_at' => Carbon::now(),
              ]);
        
              voucherInformationReport::insert([
                  'shopId' => Auth::user()->id,
                  'branchId' => 0,
                  'voucherDate' => $request->voucherDate,
                  'voucherType' => $request->voucherType,
                  'voucherNo' => $request->voucherNo,
                  'voucherUniqueId' => $voucherUniqueId,
                  'paymentTo' => $request->paymentTo,
                  'mobileNo' => $request->mobileNo,
                  'checkPaymentType' => $request->checkPaymentType,
                  'receiverBankAccountName' => $request->receiverBankAccountName,
                  'chequeNo' => $request->chequeNo,
                  'chequeDate' => $request->chequeDate,

                  'accountsCode' => $request->headOfCashBook,
                  'type' => 1,
                  'voucherAmount' => $request->voucherAmount,
                  'randId' => '0',

                  'particular' => $request->particular,
                  'day' => $day,
                  'month' => $month,
                  'year' => $year,
                  'createBy' => Auth::user()->id,
                  'created_at' => Carbon::now(),
              ]);
        
              voucherInformationReport::insert([
                  'shopId' => Auth::user()->id,
                  'branchId' => 0,
                  'voucherDate' => $request->voucherDate,
                  'voucherType' => $request->voucherType,
                  'voucherNo' => $request->voucherNo,
                  'voucherUniqueId' => $voucherUniqueId,
                  'paymentTo' => $request->paymentTo,
                  'mobileNo' => $request->mobileNo,
                  'checkPaymentType' => $request->checkPaymentType,
                  'receiverBankAccountName' => $request->receiverBankAccountName,
                  'chequeNo' => $request->chequeNo,
                  'chequeDate' => $request->chequeDate,

                  'accountsCode' => $request->subHead,
                  'type' => 2,
                  'voucherAmount' => $request->voucherAmount,
                  'randId' => '0',

                  'particular' => $request->particular,
                  'day' => $day,
                  'month' => $month,
                  'year' => $year,
                  'createBy' => Auth::user()->id,
                  'created_at' => Carbon::now(),
              ]);
    }


    public function getVoucherEntryInformationById($id){
        $voucherInformation = voucherInformation::where('id',$id)->first();
        $headCode = voucherInformation::where('id',$id)->first()->accountCodeCredit;
        $headName = chartOfAccount::where('headCode',$headCode)->first()->headName;
        return [
            'voucherInformation' => $voucherInformation,
            'headName' => $headName,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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
    public function destroy($id)
    {
        //
    }
}
