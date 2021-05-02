<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\AddProductSupplierEntry;
use App\ShopInformation;
use Carbon\Carbon;
class ShopAddProductSupplierController extends Controller
{


    

    public function __construct()
    {
        $this->middleware('auth:,admin');
    }




    public function index()
    {
        if(Auth::guard('web')->check()){

            $productSupplierGetData = AddProductSupplierEntry::latest()->orderBy('productSupplierId','DESC')->paginate(20);
            return ['productSupplierGetData'=> $productSupplierGetData];

        }
        else {

            $productSupplierGetData = AddProductSupplierEntry::where('createBy',Auth::User()->id)->orderBy('productSupplierId','DESC')->paginate(20);
            return ['productSupplierGetData'=> $productSupplierGetData];

        }
    }


    public function create()
    {
        if(Auth::guard('admin')->check()){
        $shopTypeId = Auth::user()->shopTypeId;
        $countCode = AddProductSupplierEntry::where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->get()->count();
        $autoIncrementCode  = $countCode+1;
        return ['autoIncrementCode' => $autoIncrementCode];
      }
      
      
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'productSupplierName' => 'required',
            'productSupplierMail' => 'required|unique:add_product_supplier_entries,productSupplierMail',
            'productSupplierCode' => 'required',
            'productSupplierPhone' => 'required|numeric|unique:add_product_supplier_entries,productSupplierPhone',
            'productSupplierAddress' => 'required',
        ]);

  

        $lastInsertId = AddProductSupplierEntry::insertGetId([
            'productSupplierName' => $request->productSupplierName,
            'productSupplierCode' => $request->productSupplierCode,
            'productSupplierPhone' => $request->productSupplierPhone,
            'productSupplierHotLine' => $request->productSupplierHotLine,
            'productSupplierMail' => $request->productSupplierMail,
            'productSupplierFb' => $request->productSupplierFb,
            'productSupplierWeb' => $request->productSupplierWeb,
            'productSupplierImo' => $request->productSupplierImo,
            'productSupplierAddress' => $request->productSupplierAddress,
            'shopId' => Auth::user()->id,
            'shopTypeId' => Auth::user()->shopTypeId,
            'createBy' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = AddProductSupplierEntry::where('productSupplierId',$id)->first();
        return ['data'=>$data];
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'productSupplierName' => 'required',
            'productSupplierMail' => 'required',
            'productSupplierCode' => 'required',
            'productSupplierPhone' => 'required',
            'productSupplierAddress' => 'required',
        ]);

        AddProductSupplierEntry::where('productSupplierId', $id)->update([
            'productSupplierName' => $request->productSupplierName,
            'productSupplierCode' => $request->productSupplierCode,
            'productSupplierHotLine' => $request->productSupplierHotLine,
            'productSupplierFb' => $request->productSupplierFb,
            'productSupplierWeb' => $request->productSupplierWeb,
            'productSupplierImo' => $request->productSupplierImo,
            'productSupplierAddress' => $request->productSupplierAddress,
            'updateBy' => Auth::user()->id,
        ]);
        if (AddProductSupplierEntry::where('productSupplierMail',$request->productSupplierMail)->where('productSupplierId','!=',$id)->exists()) {
            return ['sameMail' => "Change Your Mail"];
        }
        elseif (AddProductSupplierEntry::where('productSupplierPhone',$request->productSupplierPhone)->where('productSupplierId','!=',$id)->exists()) {
              return ['samePhone' => "Change Your Phone Number"];
        }
        else {
          AddProductSupplierEntry::where('productSupplierId', $id)->update([
              'productSupplierMail' => $request->productSupplierMail,
              'productSupplierPhone' => $request->productSupplierPhone,
              'updateBy' => Auth::user()->id,
          ]);
        }

    }

    public function destroy($id)
    {
        AddProductSupplierEntry::where('productSupplierId',$id)->delete();
    }
}
