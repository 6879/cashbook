<?php

namespace App\Http\Controllers;

use App\AdminMetaKeyDescription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMetaKeyDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = AdminMetaKeyDescription::orderBy('metaKeyId','desc')->paginate(20);
        return ['show'=>$show];
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
            'metaKey' => 'required',
            'metaDescription' => 'required',
            'metaStatus' => 'required',
        ],
        [
          'metaKey.required' => 'Enter Meta Key',
          'metaDescription.required' => 'Enter Meta Key Description',
          'metaStatus.required' => 'Select Meta Key Status',
        ]);

        if (AdminMetaKeyDescription::where('metaKey',$request->metaKey)->exists()){
        return ['changeMetakey'=>'Change Your Meta Key'];
        }
        else {
            $data = new AdminMetaKeyDescription();
            $data->metaKey = $request->metaKey;
            $data->metaDescription = $request->metaDescription;
            $data->metaStatus = $request->metaStatus;
            $data->createBy = Auth::user()->id;
            $data->created_at = Carbon::now();
            $data->save();
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
        $data=AdminMetaKeyDescription::where('metaKeyId',$id)->first()->metaStatus;

        if($data == 1){
            AdminMetaKeyDescription::where('metaKeyId',$id)->update([
                'metaStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else{
            AdminMetaKeyDescription::where('metaKeyId',$id)->update([
                'metaStatus' => 1,
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
        $editData = AdminMetaKeyDescription::where('metaKeyId',$id)->first();
        return ['editData'=>$editData];
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
            'metaKey' => 'required',
            'metaDescription' => 'required',
            'metaStatus' => 'required',
        ],
        [
          'metaKey.required' => 'Enter Meta Key',
          'metaDescription.required' => 'Enter Meta Key Description',
          'metaStatus.required' => 'Select Meta Key Status',
        ]);
        $data = AdminMetaKeyDescription::where('metaKeyId',$id)->update([
            'metaKey' => $request->metaKey,
            'metaDescription'=> $request->metaDescription,
            'metaStatus'=> $request->metaStatus,
            'updateBy'=> Auth::user()->id,
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
        $dataDelete = AdminMetaKeyDescription::where('metaKeyId',$id);
        $dataDelete->delete();
    }
}
