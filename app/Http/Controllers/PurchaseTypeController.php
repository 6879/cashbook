<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use App\PurchaseType;
use App\Http\Resources\PurchaseType as PurchaseTypeResource;

class PurchaseTypeController extends Controller
{
    public function index()
    {
      return PurchaseTypeResource::collection(PurchaseType::get());
    }

    public function store(Request $request)
    {

        // $this->validate($request,[
        //     'purchaseType' => 'required | unique:PurchaseTypes',
        // ]);

        $this->validate($request, [
          'purchaseType' => 'required | unique:purchase_types',
          'status' => 'required',
      ],
      [
        'purchaseType.required' => "Enter Purchase Type Name",
        'status.required' => "Enter Status",
      ]);

    //   if (PurchaseType::where('purchaseType',$request->purchaseType)->exists()){
    //     return ['changePurchaseType'=>'Change Your Purchase Type Name'];
    // }
    //   else{  
          PurchaseType::create([
            'purchaseType' => $request->get('purchaseType'),
            'status' => $request->get('status'),
        ]);
      // }
        
    }

    public function edit($id)
    {
        $data = PurchaseType::find($id);
        return response()->json($data);
    }




    public function update($id, Request $request)
    {
      $post = PurchaseType::find($id);

      $post->update($request->all());

      return response()->json('successfully updated');
    }



      public function statusChange($id){
        $last_status = PurchaseType::where('id',$id)->first()->status;

        if ($last_status == 0){
          PurchaseType::where('id', $id)->update([
              'status' => 1,
          ]);
      }else{
        PurchaseType::where('id', $id)->update([
          'status' => 0,
      ]);
      }
      }


    public function delete($id)
    {
      $post = PurchaseType::find($id);
      $post->delete();
      return response()->json('successfully deleted');
    }
}
