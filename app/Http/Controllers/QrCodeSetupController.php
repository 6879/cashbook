<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use App\QrCodeSetup;
use App\Http\Resources\QrCodeSetup as QrCodeSetupResource;

class QrCodeSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return QrCodeSetupResource::collection(QrCodeSetup::orderBy('id','DESC')->get());
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
            'invoiceShowStatus' => 'required',
            'scanInformation' => 'required | unique:qr_code_setups',
        ],
        [
            'invoiceShowStatus.required' => "Enter QR Code Status",
            'scanInformation.required' => "Enter After Scan Information",
        ]);
  
            
           // if($request->get('invoiceShowStatus') == 1){
                QrCodeSetup::where( 'invoiceShowStatus','!=',0)->update([
                    'invoiceShowStatus' => 0
                ]);
            // }
            
        QrCodeSetup::create([
              'invoiceShowStatus' => $request->get('invoiceShowStatus'),
              'scanInformation' => $request->get('scanInformation'),
              'createBy' => 1,
              'updateBy' => 1,
          ]);

          return ['data'=>'success qr code'];
    }

    public function invoiceForList()
    {
        $invoiceForList =  InvoiceForTypeList::where('status',1)->orderBy('id','ASC')->get();
        return ['invoiceForList' => $invoiceForList];
    }

    public function invoiceTypeList()
    {
        $invoiceTypeList =  InvoiceTypeList::where('status',1)->orderBy('id','ASC')->get();
        return ['invoiceTypeList' => $invoiceTypeList];
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

    public function edit($id)
    {
        $data = QrCodeSetup::where('id',$id)->first();
        return response()->json($data);
    }


    public function changeStatus($id){
        $last_status = QrCodeSetup::where('id',$id)->first()->invoiceShowStatus;

        if ($last_status == 0){
            QrCodeSetup::where('id', $id)->update([
              'invoiceShowStatus' => 1,
          ]);
      }else{
        QrCodeSetup::where('id', $id)->update([
          'invoiceShowStatus' => 0,
      ]);
      }
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
        // $this->validate($request, [
        //   'invoiceShowStatus' => 'required',
        //   'scanInformation' => 'required',
        // ],
        // [
        //   'invoiceShowStatus.required' => 'Enter Invoice Show Status',
        //   'scanInformation.required' => 'Enter Scane Information ',
        // ]);

        // if (AdminMenu::where('adminMenuTitleId',$request->adminMenuTitleId)->where('adminMenuName',$request->adminMenuName)->where('adminMenuId','!=',$id)->exists()) {
        //     return ['changeMenuName' => 'Change Your Admin Menu Name'];
        // }
        // else {
            QrCodeSetup::find($id)->update([
                'invoiceShowStatus'=> $request->get('invoiceShowStatus'),
                'scanInformation'=> $request->get('scanInformation'),
               
            ]);
        // }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = QrCodeSetup::where('id',$id);
        $data->delete();
    }
}
