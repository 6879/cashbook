<?php

namespace App\Http\Controllers;

use App\ShopLoanProviderEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ShopLoanProviderEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShopLoanProviderEntry::orderBy('loanProviderId','desc')->get();
        return  ['data' => $data];
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
            'loanProviderName' => 'required',
            'loanProviderPhone' => 'required | numeric',
            'loanProviderAddress' => 'required',
            'loanProviderStatus' => 'required',
        ],
        [
            'loanProviderName.required' => "Enter Loan Provider Name",
            'loanProviderPhone.required' => "Enter Loan Provider Phone",
            'loanProviderAddress.required' => "Enter Loan Provider Address",
            'loanProviderStatus.required' => "Select Loan Provider Status",
        ]);
            ShopLoanProviderEntry::insert([
                'loanProviderName' => $request->loanProviderName,
                'loanProviderPhone' => $request->loanProviderPhone,
                'loanProviderAddress' => $request->loanProviderAddress,
                'loanProviderStatus' => $request->loanProviderStatus,
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
        $loanProviderStatus = ShopLoanProviderEntry::where('loanProviderId',$id)->first()->loanProviderStatus;

        if ($loanProviderStatus == 1 ){
            ShopLoanProviderEntry::where('loanProviderId',$id)->update([
                'loanProviderStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else
        {
            ShopLoanProviderEntry::where('loanProviderId',$id)->update([
                'loanProviderStatus' => 1,
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
        $editLoanProvider = ShopLoanProviderEntry::where('loanProviderId',$id)->first();
        return ['editData' => $editLoanProvider];
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
            'loanProviderName' => 'required',
            'loanProviderPhone' => 'required | numeric',
            'loanProviderAddress' => 'required',
            'loanProviderStatus' => 'required',
        ],
        [
            'loanProviderName.required' => "Enter Loan Provider Name",
            'loanProviderPhone.required' => "Enter Loan Provider Phone",
            'loanProviderAddress.required' => "Enter Loan Provider Address",
            'loanProviderStatus.required' => "Select Loan Provider Status",
        ]);
        ShopLoanProviderEntry::where('loanProviderId',$id)->update([
            'loanProviderName' => $request->loanProviderName,
            'loanProviderPhone' => $request->loanProviderPhone,
            'loanProviderAddress' => $request->loanProviderAddress,
            'loanProviderStatus' => $request->loanProviderStatus,
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
        $deleteLoanProvider = ShopLoanProviderEntry::where('loanProviderId',$id)->delete();

    }
}
