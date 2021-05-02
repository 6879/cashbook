<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminMenuTitleName;
use App\AdminMenu;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminmenulist = AdminMenu::with('adminMenuTitleName')->orderBy('adminMenuId','desc')->paginate(20);
        return  ['adminmenulist' => $adminmenulist];
    }

    
    public function adminMenuTitlelist()
    {
        $adminMenuTitle =  AdminMenuTitleName::where('adminMenuTitleStatus',1)->orderBy('adminMenuTitleId','asc')->get();
        return ['adminMenuTitle' => $adminMenuTitle];
    }


    public function menuTitlePositionSelect($adminMenuTitleId)
    {
        $adminMenuPosition = AdminMenu::where('adminMenuTitleId',$adminMenuTitleId)->count();
        $adminMenuPositionInc = $adminMenuPosition +1 ;
        return ['adminMenuPositionInc' => $adminMenuPositionInc];
    }


    public function adminMenulistById($id){
        $adminMenuTitle = AdminMenu::where('adminMenuTitleId',$id)->get();
        return ['adminMenuTitle' => $adminMenuTitle];
    }


    public function changeStatus($id)
    {
        $adminMenuStatus = AdminMenu::where('adminMenuId', $id)->first()->adminMenuStatus;

        if ($adminMenuStatus == 0){
            AdminMenu::where('adminMenuId', $id)->update([
                'adminMenuStatus' => 1,
                'updateBy'=>  Auth::user()->id,
            ]);

        }
        else {
            AdminMenu::where('adminMenuId', $id)->update([
              'adminMenuStatus' => 0,
              'updateBy'=>  Auth::user()->id,
            ]);
        }

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'adminMenuTitleId' => 'required',
            'adminMenuName' => 'required',
            'adminMenuPosition' => 'required|numeric',
            'adminMenuStatus' => 'required',
        ],
        [
          'adminMenuTitleId.required' => 'Enter Menu Title Name',
          'adminMenuName.required' => 'Enter Menu Name',
          'adminMenuPosition.required' => 'Enter Menu Postition',
          'adminMenuStatus.required' => 'Enter Menu Status',
        ]);

        if (AdminMenu::where('adminMenuTitleId',$request->adminMenuTitleId)->where('adminMenuPosition',$request->adminMenuPosition)->exists()){
            return ['changePosition'=>'Change Your Menu Postition'];
        }

        else if (AdminMenu::where('adminMenuName',$request->adminMenuName)->where('adminMenuTitleId',$request->adminMenuTitleId)->exists()){
            return ['changeMenuName'=>'Change Your Menu adminMenuName'];
        }
        else{
            $AdminMenu= new AdminMenu();
            $AdminMenu->adminMenuTitleId= $request->adminMenuTitleId;
            $AdminMenu->adminMenuName= $request->adminMenuName;
            $AdminMenu->adminMenuPosition= $request->adminMenuPosition;
            $AdminMenu->adminMenuUrl= $request->adminMenuUrl;
            $AdminMenu->adminMenuIcon= $request->adminMenuIcon;
            $AdminMenu->adminMenuStatus= $request->adminMenuStatus;
            if (isset($request->adminSubMenuStatus)){
                $AdminMenu->adminSubMenuStatus= true;
            }
            else {
                $AdminMenu->adminSubMenuStatus= false;
            }
            $AdminMenu->createBy= Auth::user()->id;
            $AdminMenu->created_at= Carbon::now();
            $AdminMenu->save();
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
        $data = AdminMenu::where('adminMenuId',$id)->first();
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
        $this->validate($request, [
          'adminMenuTitleId' => 'required',
          'adminMenuName' => 'required',
          'adminMenuPosition' => 'required|numeric',
          'adminMenuStatus' => 'required',
        ],
        [
          'adminMenuTitleId.required' => 'Enter Menu Title Name',
          'adminMenuName.required' => 'Enter Menu Name',
          'adminMenuPosition.required' => 'Enter Menu Postition',
          'adminMenuStatus.required' => 'Enter Menu Status',
        ]);

        if (AdminMenu::where('adminMenuTitleId',$request->adminMenuTitleId)->where('adminMenuName',$request->adminMenuName)->where('adminMenuId','!=',$id)->exists()) {
            return ['changeMenuName' => 'Change Your Admin Menu Name'];
        }
        else {
            AdminMenu::where('adminMenuId',$id)->update([
                'adminMenuTitleId'=> $request->adminMenuTitleId,
                'adminMenuName'=> $request->adminMenuName,
                'adminMenuPosition'=> $request->adminMenuPosition,
                'adminMenuUrl'=> $request->adminMenuUrl,
                'adminMenuIcon'=> $request->adminMenuIcon,
                'adminMenuStatus'=> $request->adminMenuStatus,
                'adminSubMenuStatus'=> $request->adminSubMenuStatus,
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
        $data=AdminMenu::where('adminMenuId',$id);
        $data->delete();
    }
}
