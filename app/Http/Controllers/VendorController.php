<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Http\Resources\Vendor as VendorResource;

class VendorController extends Controller
{
    public function index()
    {
      return VendorResource::collection(Vendor::get());
    }

    public function store(Request $request){
        Vendor::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'img' => $request->get('img'),
        ]);
    }

    public function delete($id)
    {
      $post = Vendor::find($id);

      $post->delete();

      return response()->json('successfully deleted');
    }
}
