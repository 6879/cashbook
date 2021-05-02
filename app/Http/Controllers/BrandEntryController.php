<?php

namespace App\Http\Controllers;

use App\BrandEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showdata = BrandEntry::all();
        return ['showdata'=>$showdata];
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

        $request->validate([
            'brandName' => 'required',
            'brandStatus' => 'required',
        ],
        [
          'brandName.required' => 'Enter Your Brand  Name',
          'brandStatus.required' => 'Enter Brand  Status',
        ]);

        if (BrandEntry::where('brandName', $request->brandName)->exists()) {
            return ['changedBrandName' => 'Change Brand Name'];
        }
        else {
            $data = new BrandEntry();
            $data->brandName = $request->brandName;
            $data->brandStatus = $request->brandStatus;
            $data->createByType = Auth::user()->id;
            $data->createBy = Auth::user()->id;
            $data->save();
        }
    }



    
    public function changeStatus($id){
        $last_status = BrandEntry::where('brandId',$id)->first()->brandStatus;

        if ($last_status == 0){
            BrandEntry::where('brandId', $id)->update([
              'brandStatus' => 1,
          ]);
      }else{
        BrandEntry::where('brandId', $id)->update([
          'brandStatus' => 0,
      ]);
      }
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

        $data = BrandEntry::where('brandId',$id)->first();
        return ['data'=>$data];
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
        $request->validate([
            'brandName' => 'required',
            'brandStatus' => 'required',
        ]);
        if (BrandEntry::where('brandName', $request->brandName)->where('brandId','!=',$id)->exists()) {
             return ['changedBrandName' => 'Changed Brand Name'];
        }
        else {
             BrandEntry::where('brandId',$id)->update([
                'brandName' => $request->brandName,
                'brandStatus'=> $request->brandStatus,
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
        $deleteBrand = BrandEntry::where('brandId',$id);
        $deleteBrand->delete();
    }
}
