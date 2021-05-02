<?php

namespace App\Http\Controllers\ShopInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\ShopInformation\ShopInformation;
use App\Models\Admin;
use App\ShopTypeEntry;
use App\User;
use App\Currencie;

use App\ShopInformation\ShopOwnerInformation;
use App\ShopInformation\ShopContactPersonInformation;
use App\ShopInformation\ShopRepresentativeInformation;
use App\ShopInformation\ShopAddressLocation;
use App\ShopBillingAmount;
use App\ShopAccountIntormation;
use App\ShopBillingGraceInformation;
use App\Http\Resources\ShopInformation\Admin as ShopInformationResource;
use Illuminate\Support\Facades\Auth;


class ShopInformationController extends Controller
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
        return  ShopInformationResource::collection(Admin::orderBy('id','DESC')->get());
        
    }


    public function getCurrencyRate(){
        
        $shopId = Auth::user()->id;
        $myCurrencyId = Auth::user()->currencyId;
        $myCurrency = Currencie::where('id',$myCurrencyId)->first()->code;
        $shopBill = shopAccountIntormation::where('shopId',$shopId)->first()->billAmount;

        
        $apikey = '21eba4f4ff74e127cda2';
        $from_Currency = $myCurrency;
        $to_Currency = 'BDT';
        $query =  "{$from_Currency}_{$to_Currency}";
        
        // // change to the free URL if you're using the free version
        $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
        $obj = json_decode($json, true);
      
        $val = floatval($obj["$query"]);
        $bill = number_format((float)($shopBill/$val), 2, '.', '');

        return ['data' => $bill];
    }


    public function getShopId($id){

        $select_shop_type = ShopTypeEntry::where('shopTypeEntryId',"$id")->first();
        $code = $select_shop_type->shopTypeCode;

        if(Admin::where('shopTypeId',"$id")->exists()){
        $select = Admin::where('shopTypeId',"$id")->orderBy('shopSirialId','DESC')->first();
        $new_code = $select->shopSirialId;
        $new_code = ++$new_code;
        $sirial_id = $code=$new_code;
        }
        else{
            $sirial_id = $code.'1';
        }
         
        return ['data'=>"$sirial_id"];
    }

    public function checkemail($userName){
        
        $exist = Admin::where('email',"$userName")->exists();
        if($exist){
            return ['exist'=>"Allready exist."];
        }else{
            return ['exist'=>"Available."];
        }
        
    }


    public function shopBillDateExpired(){

        $shopId = Auth::user()->id;

        $selectAccountInfo = shopAccountIntormation::where('shopId',"$shopId")->first();
        $billingDate = $selectAccountInfo->billingDate;
        $billingGraceDate = $selectAccountInfo->billingGraceDate;
        $today = date('Y-m-d H:i:s');

        if($billingGraceDate){
            if($today>$billingGraceDate){
                Admin::where('id', $shopId)->update([
                    'paymentStatus' => 1,
                    'status' => 0,
                ]);
                
                return ['data'=>"Expired"];
            }else{
                return ['data'=>"Not Expired"];
            }
            
        }else{
            if($today>$billingDate){
                Admin::where('id', $shopId)->update([
                    'paymentStatus' => 1,
                    'status' => 0,
                ]);
                
                return ['data'=>"Expired"];
            }else{
                return ['data'=>"Not Expired"];
            }
        }
        
    }


    public function getMyGuard(){
        if(Auth::getDefaultDriver() == 'web'){
            $myGuard = 'web';
        }else{
            $myGuard = 'admin';
        }
        return ['myGuard' => $myGuard];
    }

    public function changeStatus($id){
        $select = Admin::where('id',$id)->first();
        $last_status = $select->status;

      if($last_status == 0){
        Admin::where('id', $id)->update([
              'paymentStatus' => 2,
              'status' => 1,
          ]);
       

        $today = date('Y-m-d H:i:s');
        $billingDate =  date('Y-m-d H:i:s',strtotime("$today +1 Months"));
        
          ShopAccountIntormation::where('shopId', $id)->update([
              'billingDate' => $billingDate,
          ]);
            $smsStatus = 1;
      }
      else{
        Admin::where('id', $id)->update([
          'status' => 0,
      ]);
            $smsStatus = 0;
      }

      $shop_information =  Admin::where('id',$id)->first();
      $shop_owner_information =  ShopOwnerInformation::where('shopId',$id)->first();
      
      $email = $shop_information->email;
      $pass = $shop_information->pass;
      $mobileNo = $shop_owner_information->mobileNo;

      return [
          'smsStatus' => "$smsStatus",
          'mobileNo' => "$mobileNo",
          'email' => "$email",
          'password' => "$pass",
    ];
      }


public function shopInformationSearch($id){
    $data = Admin::
    where('shopName', 'like', '%' . $id . '%')
    ->orWhere('shopSirialId', 'like', '%' . $id . '%')
    ->orWhere('email', 'like', '%' . $id . '%')
    ->get();
    return ['data'=>$data];
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
            'shopTypeId' => 'required',
            'shopSirialId' => 'required',
            'shopName' => 'required',
            // 'email' => 'required',
            'email' => 'required | unique:admins',
            'refferUserId' => 'required',
            'haveBranch' => 'required',
            'totalBranch' => 'required',

            'shopOwnerName' => 'required',
            'shopOwnerMobileNo' => 'required',

            'SRName' => 'required',
            'SRMobileNo' => 'required',

            'CPName' => 'required',
            'CPMobileNo' => 'required',

            'countryId' => 'required',
            'divisionId' => 'required',
            'districtId' => 'required',
            'thanaId' => 'required',
            'unionId' => 'required',
            'wardId' => 'required',
            'addressLine1' => 'required',
        ],
        [
            'shopTypeId.required' => "Enter shop type.",
            'shopSirialId.required' => "Enter shop sirial id.",
            'shopName.required' => "Enter shop name.",
            'email.required' => "Enter shop user name.",
            'refferUserId.required' => "Enter refer user name.",
            'haveBranch.required' => "Select have branch.",

            'shopOwnerName.required' => "Enter owner name.",
            'shopOwnerMobileNo.required' => "Enter owner moibile no.",

            'SRName.required' => "Enter representative name.",
            'SRMobileNo.required' => "Enter representative moibile no.",

            'CPName.required' => "Enter contact person name.",
            'CPMobileNo.required' => "Enter contact person moibile no.",

            'countryId.required' => "Select Country.",
            'divisionId.required' => "Select Division.",
            'districtId.required' => "Select District.",
            'thanaId.required' => "Select Upazial.",
            'unionId.required' => "Select Union.",
            'wardId.required' => "Select Ward.",
            'addressLine1.required' => "Enter Address Line 1.",
        ]);
  
            
      
        $getShopBillAmount = ShopBillingAmount::where('billType',1)->first()->billAmount;
        $getBranchBillAmount = ShopBillingAmount::where('billType',1)->first()->billAmount;
      
        $ShopInformation = new Admin();

        $shopTypeId = $request->get('shopTypeId');
        $shopSirialId = $request->get('shopSirialId');
        $shopName = $request->get('shopName');
        $email = $request->get('email');
        $refferUserId = $request->get('refferUserId');
        $haveBranch = $request->get('haveBranch');
        $totalBranch = $request->get('totalBranch');
        $currencyId = $request->get('currencyId');
  

  

        $ShopInformation->shopTypeId = $shopTypeId;
        $ShopInformation->shopSirialId = $shopSirialId;
        $ShopInformation->shopName = $shopName;
        $ShopInformation->email = $email;
        $ShopInformation->refferUserId = $refferUserId;
        $ShopInformation->haveBranch = $haveBranch;
        $ShopInformation->totalBranch = $totalBranch;
        $ShopInformation->currencyId = $currencyId;
        $ShopInformation->password = Hash::make('123');
        $ShopInformation->pass = '123';
        $ShopInformation->lastLoginIp = '1';
        $ShopInformation->refferTypeId = '0';
        $ShopInformation->shopLicenceTypeId = '0';
        $ShopInformation->status = '0';
        $ShopInformation->deleteStatus = '0';
        $ShopInformation->createBy = '1';
        
        $ShopInformation->save();
        $shopId = $ShopInformation->id;


        $ShopAccountInformation = new ShopAccountIntormation();

        $branchBill = $getBranchBillAmount*$totalBranch;
        $totalBill = $getShopBillAmount+$branchBill;

        $ShopAccountInformation->shopId = $shopId;
        $ShopAccountInformation->billAmount = $totalBill;
        
        $infoAccount = $ShopAccountInformation->save();

        $ShopOwnerInformation = new ShopOwnerInformation();

        $shopOwnerName = $request->get('shopOwnerName');
        $shopOwnerMobileNo = $request->get('shopOwnerMobileNo');
        $shopOwnerEmail = $request->get('shopOwnerEmail');
        $shopOwnerAddress = $request->get('shopOwnerAddress');
        $shopOwnerPhoneNo = $request->get('shopOwnerPhoneNo');
 
        $ShopOwnerInformation->shopId = $shopId;
        $ShopOwnerInformation->shopOwnerName = $shopOwnerName;
        $ShopOwnerInformation->shopOwnerMobileNo = $shopOwnerMobileNo;
        $ShopOwnerInformation->shopOwnerEmail = $shopOwnerEmail;
        $ShopOwnerInformation->shopOwnerAddress = $shopOwnerAddress;
        $ShopOwnerInformation->shopOwnerPhoneNo = $shopOwnerPhoneNo;
        $ShopOwnerInformation->status = '1';
        $ShopOwnerInformation->deleteStatus = '1';
        $ShopOwnerInformation->createBy = '1';
        
        $infoOwner = $ShopOwnerInformation->save();


        $ShopContactPersonInformation = new ShopContactPersonInformation();

        $CPName = $request->get('CPName');
        $CPMobileNo = $request->get('CPMobileNo');
        $CPEmail = $request->get('CPEmail');
        $CPAddress = $request->get('CPAddress');
        $CPPhoneNo = $request->get('CPPhoneNo');
 
        $ShopContactPersonInformation->shopId = $shopId;
        $ShopContactPersonInformation->CPName = $CPName;
        $ShopContactPersonInformation->CPMobileNo = $CPMobileNo;
        $ShopContactPersonInformation->CPEmail = $CPEmail;
        $ShopContactPersonInformation->CPAddress = $CPAddress;
        $ShopContactPersonInformation->CPPhoneNo = $CPPhoneNo;
        $ShopContactPersonInformation->status = '1';
        $ShopContactPersonInformation->deleteStatus = '1';
        $ShopContactPersonInformation->createBy = '1';
        
        $infoContactPerson = $ShopContactPersonInformation->save();


        $ShopRepresentativeInformation = new ShopRepresentativeInformation();

        $SRName = $request->get('SRName');
        $SRMobileNo = $request->get('SRMobileNo');
        $SREmail = $request->get('SREmail');
        $SRAddress = $request->get('SRAddress');
        $SRPhoneNo = $request->get('SRPhoneNo');
 
        $ShopRepresentativeInformation->shopId = $shopId;
        $ShopRepresentativeInformation->SRName = $SRName;
        $ShopRepresentativeInformation->SRMobileNo = $SRMobileNo;
        $ShopRepresentativeInformation->SREmail = $SREmail;
        $ShopRepresentativeInformation->SRAddress = $SRAddress;
        $ShopRepresentativeInformation->SRPhoneNo = $SRPhoneNo;
        $ShopRepresentativeInformation->status = '1';
        $ShopRepresentativeInformation->deleteStatus = '1';
        $ShopRepresentativeInformation->createBy = '1';
        
        $infoContactPerson = $ShopRepresentativeInformation->save();


        $ShopAddressLocation = new ShopAddressLocation();

        $countryId = $request->get('countryId');
        $districtId = $request->get('districtId');
        $unionId = $request->get('unionId');
        $addressLine1 = $request->get('addressLine1');
        $front = $request->get('front');
        $left = $request->get('left');
        $shopSize = $request->get('shopSize');
        $shopNo = $request->get('shopNo');
        $divisionId = $request->get('divisionId');
        $thanaId = $request->get('thanaId');
        $wardId = $request->get('wardId');
        $addressLine2 = $request->get('addressLine2');
        $back = $request->get('back');
        $right = $request->get('right');
        $marketName = $request->get('marketName');
        $areaKnownName = $request->get('areaKnownName');
 
        $ShopAddressLocation->shopId = $shopId;
        $ShopAddressLocation->branchId = '1';
        $ShopAddressLocation->countryId = $countryId;
        $ShopAddressLocation->divisionId = $divisionId;
        $ShopAddressLocation->districtId = $districtId;
        $ShopAddressLocation->thanaId = $thanaId;
        $ShopAddressLocation->unionId = $unionId;
        $ShopAddressLocation->wardId = $wardId;
        $ShopAddressLocation->addressLine1 = $addressLine1;
        $ShopAddressLocation->addressLine2 = $addressLine2;
        $ShopAddressLocation->front = $front;
        $ShopAddressLocation->back = $back;
        $ShopAddressLocation->left = $left;
        $ShopAddressLocation->right = $right;
        $ShopAddressLocation->shopSize = $shopSize;
        $ShopAddressLocation->marketName = $marketName;
        $ShopAddressLocation->shopNo = $shopNo;
        $ShopAddressLocation->areaKnownName = $areaKnownName;
        $ShopAddressLocation->status = '1';
        $ShopAddressLocation->deleteStatus = '1';
        $ShopAddressLocation->createBy = '1';
        
        $infoContactPerson = $ShopAddressLocation->save();

          return ['data'=>"$infoContactPerson"];
    }
    
    public function topupBalance(Request $request)
    {
              
        $shopId = Auth::user()->id;
        $select_amount = ShopAccountIntormation::where('shopId',$shopId)->first();
        $current_amount = $select_amount->topupCurrentBalance;
        $amount = $request->get('amount')+$current_amount;

        $ShopAccount =  ShopAccountIntormation::where('shopId',$shopId)->update([
            'topupCurrentBalance' => $amount,
            ]);

          return ['data'=>"$ShopAccount"];
    }
    
    public function payBill(Request $request)
    {
              
        $shopId = Auth::user()->id;
        $select_amount = ShopAccountIntormation::where('shopId',$shopId)->first();
        $today = $select_amount->billingDate;
        $billingDate =  date('Y-m-d H:i:s',strtotime("$today +1 Months"));

        $current_amount = $select_amount->topupCurrentBalance;
        $amount = $current_amount-$request->get('bill');

        $ShopAccount =  ShopAccountIntormation::where('shopId',$shopId)->update([
            'topupCurrentBalance' => $amount,
            'billingDate' => $billingDate,
            'billingGraceDate' => '',
            ]);

        $Shop =  Admin::where('id',$shopId)->update([
            'paymentStatus' => 2,
            ]);

          return ['data'=>"$ShopAccount"];
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
    public function edit($id)
    {
       
        $data = DB::table('admins')
        ->select('admins.*','shop_owner_information.*','shop_contact_person_information.*','shop_representative_information.*','shop_address_locations.*')
        ->join('shop_contact_person_information','shop_contact_person_information.shopId','=','admins.id')
        ->join('shop_owner_information','shop_owner_information.shopId','=','shop_contact_person_information.shopId')
        ->join('shop_representative_information','shop_representative_information.shopId','=','shop_owner_information.shopId')
        ->join('shop_address_locations','shop_address_locations.shopId','=','shop_representative_information.shopId')
        ->where('admins.id', '=', $id)
        ->first();


        return response()->json($data);
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
        
       if($request->get('billingDate')){

            $updateDate = $request->get('billingDate');
            $message = $request->get('message');

            // update 
            $ShopAccount =  Admin::where('id',$id)->update([
                'paymentStatus' => 3
                ]);
            // update 
            $ShopAccount =  ShopAccountIntormation::where('shopId',$id)->update([
                'billingGraceDate' => $updateDate
                ]); 
            // update


            // insert 
            $graceInfo = new ShopBillingGraceInformation();
            $graceInfo->shopId = $id;
            $graceInfo->date = $updateDate;
            $graceInfo->message = $message;
            $graceInfo->create_by = Auth::user()->id;
            $graceInfo->update_by = Auth::user()->id;
            $graceInfo->save();
            // insert 

            return ['data' => '1'];

       }
       else if($request->get('shopOwnerName')){

        $this->validate($request, [
            'shopTypeId' => 'required',
            'shopSirialId' => 'required',
            'shopName' => 'required',
            // 'email' => 'required',
            // 'email' => 'required | unique:admins',
            'refferUserId' => 'required',
            'haveBranch' => 'required',
            'totalBranch' => 'required',

            'shopOwnerName' => 'required',
            'shopOwnerMobileNo' => 'required',

            'SRName' => 'required',
            'SRMobileNo' => 'required',

            'CPName' => 'required',
            'CPMobileNo' => 'required',

            'countryId' => 'required',
            'divisionId' => 'required',
            'districtId' => 'required',
            'thanaId' => 'required',
            'unionId' => 'required',
            'wardId' => 'required',
            'addressLine1' => 'required',
        ],
        [
            'shopTypeId.required' => "Enter shop type.",
            'shopSirialId.required' => "Enter shop sirial id.",
            'shopName.required' => "Enter shop name.",
            // 'email.required' => "Enter shop user name.",
            'refferUserId.required' => "Enter refer user name.",
            'haveBranch.required' => "Select have branch.",

            'shopOwnerName.required' => "Enter owner name.",
            'shopOwnerMobileNo.required' => "Enter owner moibile no.",

            'SRName.required' => "Enter representative name.",
            'SRMobileNo.required' => "Enter representative moibile no.",

            'CPName.required' => "Enter contact person name.",
            'CPMobileNo.required' => "Enter contact person moibile no.",

            'countryId.required' => "Select Country.",
            'divisionId.required' => "Select Division.",
            'districtId.required' => "Select District.",
            'thanaId.required' => "Select Upazial.",
            'unionId.required' => "Select Union.",
            'wardId.required' => "Select Ward.",
            'addressLine1.required' => "Enter Address Line 1.",
        ]);
  
            
      
            
      
        $ShopInformation =  Admin::find($id);

        $shopTypeId = $request->get('shopTypeId');
        $shopSirialId = $request->get('shopSirialId');
        $shopName = $request->get('shopName');
        $email = $request->get('email');
        $refferUserId = $request->get('refferUserId');
        $haveBranch = $request->get('haveBranch');
        $totalBranch = $request->get('totalBranch');
  

  

        $ShopInformation->shopTypeId = $shopTypeId;
        $ShopInformation->shopSirialId = $shopSirialId;
        $ShopInformation->shopName = $shopName;
        $ShopInformation->email = $email;
        $ShopInformation->refferUserId = $refferUserId;
        $ShopInformation->haveBranch = $haveBranch;
        $ShopInformation->totalBranch = $totalBranch;
        $ShopInformation->password = Hash::make('123');
        $ShopInformation->pass = '123';
        $ShopInformation->lastLoginIp = '1';
        $ShopInformation->refferTypeId = '0';
        $ShopInformation->shopLicenceTypeId = '0';
        $ShopInformation->status = '0';
        $ShopInformation->deleteStatus = '0';
        $ShopInformation->createBy = '1';
        
        $ShopInformation->update(); 


        $ShopOwnerInformation =  ShopOwnerInformation::where('shopId',$id)->update([
            'shopOwnerName'=>$request->get('shopOwnerName'),
            'shopOwnerMobileNo' => $request->get('shopOwnerMobileNo'),
            'shopOwnerEmail' => $request->get('shopOwnerEmail'),
            'shopOwnerAddress' => $request->get('shopOwnerAddress'),
            'shopOwnerPhoneNo' => $request->get('shopOwnerPhoneNo')
            
        ]);

      

        $ShopContactPersonInformation = ShopContactPersonInformation::where('shopId',$id)->update([
            'CPMobileNo' => $request->get('CPMobileNo'),
            'CPEmail' => $request->get('CPEmail'),
            'CPAddress' => $request->get('CPAddress'),
            'CPPhoneNo' => $request->get('CPPhoneNo')
        ]);



        $ShopRepresentativeInformation = ShopRepresentativeInformation::where('shopId',$id)->update([
        'SRName' => $request->get('SRName'),
        'SRMobileNo' => $request->get('SRMobileNo'),
        'SREmail' => $request->get('SREmail'),
        'SRAddress' => $request->get('SRAddress'),
        'SRPhoneNo' => $request->get('SRPhoneNo')
        ]);


        $ShopAddressLocation = ShopAddressLocation::where('shopId',$id)->update([

        'countryId' => $request->get('countryId'),
        'districtId' => $request->get('districtId'),
        'unionId' => $request->get('unionId'),
        'addressLine1' => $request->get('addressLine1'),
        'front' => $request->get('front'),
        'left' => $request->get('left'),
        'shopSize' => $request->get('shopSize'),
        'shopNo' => $request->get('shopNo'),
        'divisionId' => $request->get('divisionId'),
        'thanaId' => $request->get('thanaId'),
        'wardId' => $request->get('wardId'),
        'addressLine2' => $request->get('addressLine2'),
        'back' => $request->get('back'),
        'right' => $request->get('right'),
        'marketName' => $request->get('marketName'),
        'areaKnownName' => $request->get('areaKnownName')
        ]);
 
 
        

          return ['data'=>"$ShopAddressLocation"];

        }
        else{
            
            $shopBillingInfo = ShopBillingAmount::where('billType',2)->first();
            $branchAmount = $shopBillingInfo->billAmount;

            $select = Admin::where('id',$id)->first();
            $selectAccount = ShopAccountIntormation::where('shopId',$id)->first();
            
            $shopBillingDate = $selectAccount->billingDate;
            $getCurrentHaveBranch = $select->haveBranch;
            $getCurrentTotalBranch = $select->totalBranch;
            $shopCurrentBill = $selectAccount->billAmount;

            $new_branch =  $request->get('totalBranch')-$getCurrentTotalBranch;



            if(($getCurrentHaveBranch == 1) && ($request->get('haveBranch') !=1)){
                return ['haveBranchMess' => 1];
            }
            else if($new_branch>0){

                    $new_branch_bill = $new_branch*$branchAmount;
            

                    $today = date('Y-m-d H:i:s');
                    $start = strtotime($today);
                    $end = strtotime($shopBillingDate);

                    $days_between = ceil(abs($end - $start) / 86400);

                    $per_day_bill = $branchAmount/30;
                    
                    $perBranchBill = $days_between*$per_day_bill;
                    
                    $shopNewBill = $new_branch*$perBranchBill;
                    $shopBill = $shopCurrentBill+$shopNewBill;

                    // update 
                    $ShopAccount =  ShopAccountIntormation::where('shopId',$id)->update([
                        'billAmount' => $shopBill
                        ]);
                    // update


                    // update
                    $ShopInformation =  Admin::find($id);

                    $haveBranch = $request->get('haveBranch');
                    $totalBranch = $request->get('totalBranch');

                    $ShopInformation->haveBranch = $haveBranch;
                    $ShopInformation->totalBranch = $totalBranch;
                    
                    $ShopInformation->update();     
                    // update

                    return ['data' => 1];
            }else{
            return ['totalBranchMess' => $getCurrentTotalBranch];
            }



            // if(($getCurrentHaveBranch == 1) && ($request->get('haveBranch') !=1)){
            //     return ['haveBranchMess' => 1];
            // }
            // else if($request->get('totalBranch') >= $getCurrentTotalBranch){
              
                // $ShopInformation =  Admin::find($id);

            
                // $haveBranch = $request->get('haveBranch');
                // $totalBranch = $request->get('totalBranch');
        
                // $ShopInformation->haveBranch = $haveBranch;
                // $ShopInformation->totalBranch = $totalBranch;
                
                // $ShopInformation->update();  
                // return ['data' => 1];
            // }
            // else{
            //     return ['totalBranchMess' => $getCurrentTotalBranch];
            // }

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
