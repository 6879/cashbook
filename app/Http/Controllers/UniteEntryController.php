<?php

namespace App\Http\Controllers;

use App\AdminEntry;
use App\AdminType;
use App\UniteEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UniteEntryController extends Controller
{

    public function index()
    {
        $data = UniteEntry::orderBy('uniteEntryId','desc')->get();
        return  ['data' => $data];

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'uniteEntryName' => 'required',
            'uniteEntryStatus' => 'required',
        ],
        [
            'uniteEntryName.required' => "Enter Unite  Name",
            'uniteEntryStatus.required' => "Select Unite Status",
        ]);
        if (UniteEntry::where('uniteEntryName',$request->uniteEntryName)->exists()){
            return ['changeUniteEntryName'=> 'Change Unite Entry Name'];
        }
        else {
            UniteEntry::insert([
                'uniteEntryName' => $request->uniteEntryName,
                'uniteEntryStatus' => $request->uniteEntryStatus,
                'createBy' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        }
    }


    public function show($id)
    {


        $data=UniteEntry::where('uniteEntryId',$id)->first()->uniteEntryStatus;
        if($data == 1){
            UniteEntry::where('uniteEntryId',$id)->update([
                'uniteEntryStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else{
            UniteEntry::where('uniteEntryId',$id)->update([
                'uniteEntryStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }

    }

    public function edit($id)
    {
        $data = UniteEntry::where('uniteEntryId',$id)->first();
        return ['data'=>$data];

    }


    public function update(Request $request, $id)
    {
          $this->validate($request, [
              'uniteEntryName' => 'required',
              'uniteEntryStatus' => 'required',
          ],
          [
              'uniteEntryName.required' => "Enter Unite  Name",
              'uniteEntryStatus.required' => "Select Unite Status",
          ]);

          if (UniteEntry::where('uniteEntryName',$request->uniteEntryName)->where('uniteEntryId','!=',$id)->exists()){
               return ['changeUniteName'=> 'Change Unite Entry Name'];
          }
          else {
              UniteEntry::where('uniteEntryId',$id)->update([
                'uniteEntryName' => $request->uniteEntryName,
                'uniteEntryStatus' => $request->uniteEntryStatus,
                'updateBy' => Auth::user()->id,
                'updated_at' => Carbon::now(),
              ]);
              return ['success' => 'ok'];
          }
    }


    public function destroy($id)
    {
        $data = UniteEntry::where('uniteEntryId',$id);
        $data->delete();
    }
}
