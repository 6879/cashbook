<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminMenuTitleName;
use Carbon\Carbon;
use Auth;

class AdminMenuTitleController extends Controller
{

    public function index()
    {
         $adminMenuTitle = AdminMenuTitleName::orderBy('adminMenuTitlePosition','ASC')->get();
         return ['adminMenuTitle' => $adminMenuTitle];
    }


    public function create()
    {
        //
    }




    public function store(Request $request)
    {
      $this->validate($request, [
          'adminMenuTitleName' => 'required',
          'adminMenuTitlePosition' => 'required|numeric',
          'adminMenuTitleStatus' => 'required',
          'adminMenuTitlePermission'=> 'required'
      ],
      [
          'adminMenuTitleName.required' => 'Enter Menu Title',
          'adminMenuTitlePosition.required' => 'Enter Menu Title Postition',
          'adminMenuTitleStatus.required' => 'Select Menu Title Status',
          'adminMenuTitlePermission.required'=> 'Select Menu Title Permission'
      ]);
      if (AdminMenuTitleName::where('adminMenuTitlePosition',$request->adminMenuTitlePosition)->exists()) {
          return ['error' => 'Change Your Title Postition'];
      }

      else if (AdminMenuTitleName::where('adminMenuTitleName',$request->adminMenuTitleName)->exists()){
          return ['changeTitleName'=>'Change Your Title Name'];
      }

      else {
          AdminMenuTitleName::insert([
             'adminMenuTitleName' =>$request->adminMenuTitleName,
             'adminMenuTitlePosition' =>$request->adminMenuTitlePosition,
             'adminMenuTitleIcon' =>$request->adminMenuTitleIcon,
             'adminMenuTitleStatus' =>$request->adminMenuTitleStatus,
             'adminMenuTitlePermission' => $request->adminMenuTitlePermission,
             'createBy' => Auth::user()->id,
             'created_at' => Carbon::now(),
          ]);
      }
    }


    public function show($id)
    {
        $adminMenuTitlePermission = AdminMenuTitleName::where('adminMenuTitleId', $id)->first()->adminMenuTitlePermission;

        if ($adminMenuTitlePermission == 0){
            AdminMenuTitleName::where('adminMenuTitleId', $id)->update([
                'adminMenuTitlePermission' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
        if ($adminMenuTitlePermission == 1){
            AdminMenuTitleName::where('adminMenuTitleId', $id)->update([
                'adminMenuTitlePermission' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
    }

    public function changeStatuas($id)
    {
        $adminMenuTitleStatus = AdminMenuTitleName::where('adminMenuTitleId', $id)->first()->adminMenuTitleStatus;

        if ($adminMenuTitleStatus == 0){
            AdminMenuTitleName::where('adminMenuTitleId', $id)->update([
                'adminMenuTitleStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);

        }

        if ($adminMenuTitleStatus == 1){
            AdminMenuTitleName::where('adminMenuTitleId', $id)->update([
                'adminMenuTitleStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }

    }
    public function edit($id)
    {
        $data = AdminMenuTitleName::where('adminMenuTitleId',$id)->first();
        return ['data'=>$data];
    }
    public function update(Request $request, $id)
    {
          $this->validate($request, [
              'adminMenuTitleName' => 'required',
              'adminMenuTitlePosition' => 'required|numeric',
              'adminMenuTitleStatus' => 'required',
              'adminMenuTitlePermission'=> 'required'
          ],
          [
              'adminMenuTitleName.required' => 'Enter Menu Title',
              'adminMenuTitlePosition.required' => 'Enter Menu Title Postition',
              'adminMenuTitleStatus.required' => 'Select Menu Title Status',
              'adminMenuTitlePermission.required'=> 'Select Menu Title Permission'
          ]);

          if (AdminMenuTitleName::where('adminMenuTitleName',$request->adminMenuTitleName)->where('adminMenuTitleId','!=',$id)->exists()) {
               return ['changeMenuTitleName' => 'Change Your Admin Menu Title Name'];
          }
          else {
              AdminMenuTitleName::where('adminMenuTitleId',$id)->update([
                'adminMenuTitleName' =>$request->adminMenuTitleName,
                'adminMenuTitlePosition' =>$request->adminMenuTitlePosition,
                'adminMenuTitleIcon' =>$request->adminMenuTitleIcon,
                'adminMenuTitleStatus' =>$request->adminMenuTitleStatus,
                'adminMenuTitlePermission' => $request->adminMenuTitlePermission,
                'updateBy' => Auth::user()->id,
              ]);
              return ['success' => 'Update Successfully'];
          }

    }
    public function destroy($id)
    {
        $data = AdminMenuTitleName::where('adminMenuTitleId',$id);
        $data->delete();
    }
}
