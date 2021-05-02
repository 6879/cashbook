<?php

namespace App\Http\Controllers;

use App\ShopLoanEntry;
use App\ShopLoanProviderEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ShopLoanEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showLoanData = ShopLoanEntry::with('ShopLoanProviderEntry')->orderBy('loanEntryId','desc')->get();
        return  ['showLoanData' => $showLoanData ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $showProviderName = ShopLoanProviderEntry::orderBy('loanProviderId','desc')->get();
        return  ['showProviderName' => $showProviderName];
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
            'loanProviderId' => 'required',
            'loanAmount' => 'required',
            'loanCondition' => 'required',
            'loanCommitment' => 'required',
            'loanStatus' => 'required',
        ],
        [
            'loanProviderId.required' => "Select Loan Provider Name",
            'loanAmount.required' => "Enter Loan Amount",
            'loanCondition.required' => "Enter Loan Condition",
            'loanCommitment.required' => "Enter Loan Commitment",
            'loanStatus.required' => "Select Loan Status",
        ]);
        ShopLoanEntry::insert([
            'loanProviderId' => $request->loanProviderId,
            'loanAmount' => $request->loanAmount,
            'loanCondition' => $request->loanCondition,
            'loanCommitment' => $request->loanCommitment,
            'loanStatus' => $request->loanStatus,
            'createBy' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loanStatus = ShopLoanEntry::where('loanEntryId',$id)->first()->loanStatus;

        if ($loanStatus == 1 ){
            ShopLoanEntry::where('loanEntryId',$id)->update([
                'loanStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else
        {
            ShopLoanEntry::where('loanEntryId',$id)->update([
                'loanStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editLoanEntry = ShopLoanEntry::where('loanEntryId',$id)->first();
        return ['loanEditData' => $editLoanEntry];
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
        $this->validate($request, [
            'loanProviderId' => 'required',
            'loanAmount' => 'required',
            'loanCondition' => 'required',
            'loanCommitment' => 'required',
            'loanStatus' => 'required',
        ],
        [
            'loanProviderId.required' => "Select Loan Provider Name",
            'loanAmount.required' => "Enter Loan Amount",
            'loanCondition.required' => "Enter Loan Condition",
            'loanCommitment.required' => "Enter Loan Commitment",
            'loanStatus.required' => "Select Loan Status",
        ]);
        ShopLoanEntry::where('loanEntryId',$id)->update([
            'loanProviderId' => $request->loanProviderId,
            'loanAmount' => $request->loanAmount,
            'loanCondition' => $request->loanCondition,
            'loanCommitment' => $request->loanCommitment,
            'loanStatus' => $request->loanStatus,
            'updateBy' => Auth::user()->id,
            'created_at' => Carbon::now(),
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
        $deleteShopLoan = ShopLoanEntry::where('loanEntryId',$id)->delete();
    }
}
