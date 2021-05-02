<?php

namespace App\Http\Controllers;


use Image;
use File;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use App\InvoiceSetup;
use App\InvoiceSetupDetails;
use App\InvoiceForTypeList;
use App\InvoiceTypeList;
use App\Http\Resources\InvoiceSetup as InvoiceSetupResource;


class invoiceSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return InvoiceSetupResource::collection(InvoiceSetup::orderBy('id','DESC')->get());
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
            'invoiceForId' => 'required',
            'invoiceTypeId' => 'required',
            'invoiceFormetId' => 'required',
        ],
        [
            'invoiceForId.required' => "Please Select invoice for.",
            'invoiceTypeId.required' => "Please Select invoice type.",
            'invoiceFormetId.required' => "Please Select invoice Formet.",
        ]);
  
             
            
            InvoiceSetup::create([
              'shopId' => '1',
              'invoiceForId' => $request->get('invoiceForId'),
              'invoiceTypeId' => $request->get('invoiceTypeId'),
              'invoiceFormetId' => $request->get('invoiceFormetId'),
              'status' => 1,
              'createBy' => 1,
              'updateBy' => 1,
          ]);

          $last_id = InvoiceSetup::latest()->first('id');
          $last_id = $last_id->id;

                if($last_id){


                    // replace photo when update 
                                // $form = model::find($id);
                                // $image = public_path("/folder name/{$form->image}"); //get prevous image name
                                // if(File::exists($image)){
                                //     unlink($image);
                                // }
                    // replace photo when update 




                    $InvoiceSetupDetails  = new InvoiceSetupDetails();
                    $strpos = strpos($request->logo,';');
                    $sub = substr($request->logo,0,$strpos);
                    $ex = explode('/',$sub)[1];
                    $name = time().".".$ex;
                    $img = Image::make($request->logo)->resize(360,100);
                    $upload_path = public_path()."/images/";
                    $img->save($upload_path.$name);


                    // $logo = $request->file('logo');
                    // if($logo){
                    //     $logo_name = md5(time()).'.'.$logo->getClientOriginalExtension();
                    //     $logo->move('public/images',$logo_name);
                    // }
                    // else{
                    //     $logo_name = 'img.png';
                    // }

                    $InvoiceSetupDetails->logo = $name;
                    $InvoiceSetupDetails->invoiceSetupId = $last_id;
                    $InvoiceSetupDetails->address = $request->get('address');
                    $InvoiceSetupDetails->toText = $request->get('toText');
                    $InvoiceSetupDetails->titleText = $request->get('titleText');
                    $InvoiceSetupDetails->themeColor = $request->get('themeColor');
                    $InvoiceSetupDetails->subTotal = $request->get('subTotal');
                    $InvoiceSetupDetails->vat = $request->get('vat');
                    $InvoiceSetupDetails->discount = $request->get('discount');
                    $InvoiceSetupDetails->grandTotal = $request->get('grandTotal');
                    $InvoiceSetupDetails->noticeTitle = $request->get('noticeTitle');
                    $InvoiceSetupDetails->noticeDetails = $request->get('noticeDetails');
                    $InvoiceSetupDetails->generatedFrom = $request->get('generatedFrom');
                    $InvoiceSetupDetails->thankyou = $request->get('thankyou');
                    $InvoiceSetupDetails->save();




                                // InvoiceSetupDetails::create([
                                //     'invoiceSetupId' => $last_id,
                                //     'logo' => '',
                                //     'address' => $request->get('address'),
                                //     'toText' => $request->get('toText'),
                                //     'titleText' => $request->get('titleText'),
                                //     'themeColor' => $request->get('themeColor'),
                                //     'subTotal' => $request->get('subTotal'),
                                //     'vat' => $request->get('vat'),
                                //     'discount' => $request->get('discount'),
                                //     'grandTotal' => $request->get('grandTotal'),
                                //     'noticeTitle' => $request->get('noticeTitle'),
                                //     'noticeDetails' => $request->get('noticeDetails'),
                                //     'generatedFrom' => $request->get('generatedFrom'),
                                //     'thankyou' => $request->get('thankyou'),
                                // ]);
                }

          return ['data'=>'Success Invoice Setup'];
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
        $data = InvoiceSetup::find($id)->first();
        return ['data'=>$data];
    }


    public function changeStatus($id){
        $last_status = InvoiceSetup::where('id',$id)->first()->status;

        if ($last_status == 0){
            InvoiceSetup::where('id', $id)->update([
              'status' => 1,
          ]);
      }else{
        InvoiceSetup::where('id', $id)->update([
          'status' => 0,
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
        $this->validate($request, [
          'adminMenuTitleId' => 'required',
          'adminMenuName' => 'required',
          'adminMenuPosition' => 'required|numeric',
          'adminMenuStatus' => 'required',
        ],
        [
          'adminMenuTitleId.required' => 'Enter Menu Title Name',
          'adminMenuName.required' => 'Enter Menu Name',
          'adminMenuPosition.required' => 'Enter Menu Postition',
          'adminMenuStatus.required' => 'Enter Menu Status',
        ]);

        if (InvoiceSetup::where('adminMenuTitleId',$request->adminMenuTitleId)->where('adminMenuName',$request->adminMenuName)->where('adminMenuId','!=',$id)->exists()) {
            return ['changeMenuName' => 'Change Your Admin Menu Name'];
        }
        else {
            InvoiceSetup::where('adminMenuId',$id)->update([
                'adminMenuTitleId'=> $request->adminMenuTitleId,
                'adminMenuName'=> $request->adminMenuName,
                'adminMenuPosition'=> $request->adminMenuPosition,
                'adminMenuUrl'=> $request->adminMenuUrl,
                'adminMenuIcon'=> $request->adminMenuIcon,
                'adminMenuStatus'=> $request->adminMenuStatus,
                'adminSubMenuStatus'=> $request->adminSubMenuStatus,
                'updateBy'=> Auth::user()->id,
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
        $data = InvoiceSetup::where('id',$id);
        $data1 = InvoiceSetupDetails::where('invoiceSetupId',$id);
        $data->delete();
        $data1->delete();
    }
}
