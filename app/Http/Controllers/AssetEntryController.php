<?php

namespace App\Http\Controllers;

use App\AssetBrandEntry;
use App\UniteEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetEntryController extends Controller
{
    public function index()
    {
        $data = AssetBrandEntry::orderBy('assetBrandEntryId', 'desc')->paginate(20);
        return ['data' => $data];
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'assetBrandName' => 'required',
            'assetBrandStatus' => 'required',
        ],
        [
            'assetBrandName.required' => "Enter Asset Brand Name",
            'assetBrandStatus.required' => "Select Asset Brand Status",
        ]);

        if (AssetBrandEntry::where('assetBrandName', $request->assetBrandName)->exists()) {
            return ['changeAssetBrandName' => 'Change Your Asset Brand Name'];
        }
        else {
            AssetBrandEntry::insert([
                'assetBrandName' => $request->assetBrandName,
                'assetBrandStatus' => $request->assetBrandStatus,
                'createBy' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        }
    }


    public function show($id)
    {
        $data = AssetBrandEntry::where('assetBrandEntryId', $id)->first()->assetBrandStatus;
        if ($data == 1) {
            AssetBrandEntry::where('assetBrandEntryId', $id)->update([
                'assetBrandStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        } else {
            AssetBrandEntry::where('assetBrandEntryId', $id)->update([
                'assetBrandStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }

    }

    public function edit($id)
    {
        $data = AssetBrandEntry::where('assetBrandEntryId', $id)->first();
        return ['data' => $data];
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'assetBrandName' => 'required',
            'assetBrandStatus' => 'required',
        ],
        [
            'assetBrandName.required' => "Enter Asset Brand Name",
            'assetBrandStatus.required' => "Select Asset Brand Status",
        ]);
        if (AssetBrandEntry::where('assetBrandName',$request->assetBrandName)->where('assetBrandEntryId','!=',$id)->exists()) {
             return ['changeAssetBrandName' => 'Change Your Asset Brand Name'];
        }
        else {
            AssetBrandEntry::where('assetBrandEntryId', $id)->update([
              'assetBrandName' => $request->assetBrandName,
              'assetBrandStatus' => $request->assetBrandStatus,
              'updateBy' => Auth::user()->id,
              'updated_at' => Carbon::now(),
            ]);
        }
    }


    public function destroy($id)
    {
        $data = AssetBrandEntry::where('assetBrandEntryId', $id);
        $data->delete();
    }
}
