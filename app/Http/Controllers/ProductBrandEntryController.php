<?php

namespace App\Http\Controllers;

use App\ProductBrandEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductBrandEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productBrandEntry = ProductBrandEntry::with('shopTypeName')->orderBy('productBrandEntryId','desc')->get();
        return ['productBrandEntry' => $productBrandEntry];
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'productBrandName' => 'required',
            'productBrandStatus' => 'required',
        ],
        [
            'productBrandName.required' => "Enter Product Brand Name",
            'productBrandStatus.required' => "Select Product Brand Status",
        ]);

        if (ProductBrandEntry::where('productBrandName', $request->productBrandName)->exists()) {
            return ['changeProductBrandName' => 'Change Product Brand Name'];
        }
        else {
            ProductBrandEntry::insert([
                'productBrandName' => $request->productBrandName,
                'productBrandStatus' => $request->productBrandStatus,
                'createByType' => Auth::user()->id,
                'shopTypeId' => $request->shopTypeId,
                'productBrandPosition' => $request->productBrandPosition,
                'createBy' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProductBrandEntry::where('productBrandEntryId', $id)->first()->productBrandStatus;

        if ($data == 1) {
            ProductBrandEntry::where('productBrandEntryId', $id)->update([
                'productBrandStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        } else {
            ProductBrandEntry::where('productBrandEntryId', $id)->update([
                'productBrandStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editProductBrandType = ProductBrandEntry::where('productBrandEntryId', $id)->first();
        return ['editProductBrandType' => $editProductBrandType];
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'productBrandName' => 'required',
            'productBrandStatus' => 'required',
        ],
        [
            'productBrandName.required' => "Enter Product Brand Name",
            'productBrandStatus.required' => "Select Product Brand Status",
        ]);

        if (ProductBrandEntry::where('productBrandName', $request->productBrandName)->where('productBrandEntryId','!=',$id)->exists()) {
            return ['changeProductBrandName' => 'Change Product Brand Name'];
        }
        else {
            ProductBrandEntry::where('productBrandEntryId', $id)->update([
              'productBrandName' => $request->productBrandName,
              'productBrandStatus' => $request->productBrandStatus,
              'updateBy' => Auth::user()->id,
            ]);
        }
    }


    public function destroy($id)
    {
        ProductBrandEntry::where('productBrandEntryId', $id)->delete();
    }

}
