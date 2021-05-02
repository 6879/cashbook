<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AdminMenu;
use App\AdminSubMenu;
use Carbon\Carbon;
use Auth;

class AdminSubMenuController extends Controller
{

    public function index()
    {
        $adminsubmenulist = AdminSubMenu::with('adminMenuRelation')->orderBy('adminSubMenuId','desc')->paginate(30000);
        return  ['adminsubmenulist' => $adminsubmenulist];
    }


    public function create()
    {
      $adminmenulist = AdminMenu::with('adminMenuTitleName')->orderBy('adminMenuId','desc')->get();
      return  ['adminmenulist' => $adminmenulist];
    }
    public function menuPositionSelect($adminMenuId)
    {
      if(AdminSubMenu::where('adminMenuId',$adminMenuId)->orderBy('adminSubMenuePosition','DESC')->exists()){
      $adminSubMenuPosition = AdminSubMenu::where('adminMenuId',$adminMenuId)->orderBy('adminSubMenuePosition','DESC')->first();
      $adminSubMenuPositionInc = $adminSubMenuPosition->adminSubMenuePosition +1 ;
      }else{
      $adminSubMenuPositionInc = 1 ;
      }


      return ['adminSubMenuPositionInc' => $adminSubMenuPositionInc];
    }
    public function adminSubMenueStatus($adminSubMenuId)
    {
        $adminSubMenueStatus = AdminSubMenu::where('adminSubMenuId', $adminSubMenuId)->first()->adminSubMenueStatus;

        if ($adminSubMenueStatus == 0){
            AdminSubMenu::where('adminSubMenuId', $adminSubMenuId)->update([
                'adminSubMenueStatus' => 1,
                'updateBy'=>  Auth::user()->id,
            ]);

        }
        else {
          AdminSubMenu::where('adminSubMenuId', $adminSubMenuId)->update([
              'adminSubMenueStatus' => 0,
              'updateBy'=>  Auth::user()->id,
          ]);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'adminMenuId' => 'required',
            'adminSubMenuName' => 'required',
            'adminSubMenuUrl' => 'required',
            'adminSubMenuePosition' => 'required|numeric',
            'adminSubMenueStatus' => 'required',
        ],
        [
            'adminMenuId.required' => 'Select Menu Name',
            'adminSubMenuName.required' => 'Enter Sub Menu Name',
            'adminSubMenuUrl.required' => 'Enter Sub Menu Url ',
            'adminSubMenuePosition.required' => 'Enter Sub Menu Position',
            'adminSubMenueStatus.required' => 'Enter Sub Menu Status',
        ]);

        if (AdminMenu::where('adminMenuId',$request->adminMenuId)->where('adminSubMenuStatus',1)->exists()){
              if (AdminSubMenu::where('adminMenuId',$request->adminMenuId)->where('adminSubMenuePosition',$request->adminSubMenuePosition)->exists()){
                  return ['changePosition'=>'Change Your Menu Postition'];
              }


            else if (AdminSubMenu::where('adminSubMenuName',$request->adminSubMenuName)->where('adminMenuId',$request->adminMenuId)->exists()){
                    return ['changeSubmenuName'=>'Change Your SubMenu Name'];
                }

              else{
                    $AdminSubMenu = new AdminSubMenu();
                    $AdminSubMenu->adminMenuId = $request->adminMenuId;
                    $AdminSubMenu->adminSubMenuName = $request->adminSubMenuName;
                    $AdminSubMenu->adminSubMenuUrl = $request->adminSubMenuUrl;
                    $AdminSubMenu->adminSubMenuePosition = $request->adminSubMenuePosition;
                    $AdminSubMenu->adminSubMenueStatus = $request->adminSubMenueStatus;
                    $AdminSubMenu->createBy= Auth::user()->id;
                    $AdminSubMenu->created_at= Carbon::now();
                    $AdminSubMenu->save();
              }
        }

        else {
            return ['inactive'=>'SubMenu Inactive'];
        }

    }

    public function show($adminSubMenuId)
    {
        $subMenuInfo = AdminSubMenu::where('adminSubMenuId',$adminSubMenuId)->first();
        return ['subMenuInfo'=>$subMenuInfo];
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $adminSubMenuId)
    {
        $this->validate($request, [
            'adminMenuId' => 'required',
            'adminSubMenuName' => 'required',
            'adminSubMenuUrl' => 'required',
            'adminSubMenuePosition' => 'required|numeric',
            'adminSubMenueStatus' => 'required',
        ],
        [
            'adminMenuId.required' => 'Select Menu Name',
            'adminSubMenuName.required' => 'Enter Sub Menu Name',
            'adminSubMenuUrl.required' => 'Enter Sub Menu Url ',
            'adminSubMenuePosition.required' => 'Enter Sub Menu Position',
            'adminSubMenueStatus.required' => 'Enter Sub Menu Status',
        ]);

        if (AdminSubMenu::where('adminMenuId',$request->adminMenuId)->where('adminSubMenuName',$request->adminSubMenuName)->where('adminSubMenuId','!=',$adminSubMenuId)->exists()) {
            return ['changeSubMenuName' => 'Change Your Admin Sub Menu Name'];
        }
        else {
            AdminSubMenu::where('adminSubMenuId',$adminSubMenuId)->update([
              'adminMenuId'=> $request->adminMenuId,
              'adminSubMenuName'=> $request->adminSubMenuName,
              'adminSubMenuUrl'=> $request->adminSubMenuUrl,
              'adminSubMenuePosition'=> $request->adminSubMenuePosition,
              'adminSubMenueStatus'=> $request->adminSubMenueStatus,
              'updateBy'=> Auth::user()->id,
            ]);
        }

    }


    public function destroy($adminSubMenuId)
    {
        AdminSubMenu::where('adminSubMenuId',$adminSubMenuId)->delete();
        return ['deleteOk' => "Delete Ok"];
    }
}
