<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminMenuPermission;
use App\AdminMenu;
use App\AdminSubMenu;
use App\AdminSetup;
use Carbon\Carbon;
use Auth;

class AdminMenuPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminSetup = AdminSetup::with('adminEntryRelation')->orderBy('adminSetupId','desc')->get();
        return ['adminSetup'=> $adminSetup];
    }

    public function adminTypeShow($adminId)
    {
         $adminTypeName = AdminSetup::with('adminTypeRelation')->where('adminId',$adminId)->orderBy('adminSetupId','desc')->get();
         return ['adminTypeName' => $adminTypeName];
    }

    public function adminSubMenuShow()
    {
         $subMenuList = AdminSubMenu::where('adminSubMenueStatus',1)->orderBy('adminSubMenuId','asc')->get();
         return ['subMenuList' => $subMenuList];
    }
    public function permissionmenushow()
    {
        $permissionMenuShow = AdminMenuPermission::with('adminMenuName')->distinct()->get(['menuId','adminId']);
        return ['permissionMenuShow' => $permissionMenuShow];

    }

    public function adminMenuShow($adminId,$menuId)
    {
       $menuShows = AdminMenuPermission::with('adminEntryName','adminTypeName','adminMenuName')->where('adminId',$adminId)->where('menuId',$menuId)->distinct()->get(['adminId','adminType','menuId']);
       return ['menuShows'=> $menuShows];

    }
    public function adminSubMenuEditShow($adminId,$menuId)
    {
        $singleSubMenuList = AdminMenuPermission::with('adminSubName')->where('adminId',$adminId)->where('menuId',$menuId)->get();
        return ['singleSubMenuList' => $singleSubMenuList];
    }
    public function adminMenuPermissionChange($adminId,$adminTypeId,$menuId)
    {
      $permissionStatus =  AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminTypeId)->where('menuId',$menuId)->first()->permissionStatus;
        if ($permissionStatus == 1) {
            AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminTypeId)->where('menuId',$menuId)->update([
                'permissionStatus' => false,
                'updateBy' => Auth::user()->id,
            ]);
            return ['Unactive'=> 'Menu Status Unactive'];
        }
        else {
            AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminTypeId)->where('menuId',$menuId)->update([
                'permissionStatus' => true,
                'updateBy' => Auth::user()->id,
            ]);
           return ['Active'=> 'Menu Status Active'];
        }
    }

    public function adminSubMenuPermissionChange($adminId,$adminTypeId,$subMenuId)
    {
         $adminMenuPermission = AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminTypeId)->where('subMenuId',$subMenuId)->first();


        if ($adminMenuPermission->fullAccess == 1 || $adminMenuPermission->fullAccess == 0 && $adminMenuPermission->fullAccess != "") {
            if ($adminMenuPermission->fullAccess == 1) {
                AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminTypeId)->where('subMenuId',$subMenuId)->update([
                    'fullAccess' => 0,
                    'permissionStatus' => false,
                    'updateBy' => Auth::user()->id,
                ]);
                return ['Unactive'=> 'SubMenu Status Unactive'];
            }
            else {
                AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminTypeId)->where('subMenuId',$subMenuId)->update([
                    'fullAccess' => 1,
                    'permissionStatus' => true,
                    'updateBy' => Auth::user()->id,
                ]);
                return ['active'=> 'SubMenu Status Active'];
            }
        }

        if ($adminMenuPermission->viewAccess  == 1 || $adminMenuPermission->viewAccess  == 0 && $adminMenuPermission->viewAccess != "") {
            if ($adminMenuPermission->viewAccess  == 1) {
                AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminTypeId)->where('subMenuId',$subMenuId)->update([
                    'viewAccess' => 0,
                    'permissionStatus' => false,
                    'updateBy' => Auth::user()->id,
                ]);
                return ['Unactive'=> 'SubMenu Status Unactive'];
            }
            else {
                AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminTypeId)->where('subMenuId',$subMenuId)->update([
                    'viewAccess' => 1,
                    'permissionStatus' => true,
                    'updateBy' => Auth::user()->id,
                ]);
               return ['active'=> 'SubMenu Status Active'];
            }
        }


        if ($adminMenuPermission->addAccess  == 1 || $adminMenuPermission->addAccess  == 0 && $adminMenuPermission->addAccess != "") {
              if ($adminMenuPermission->addAccess  == 1) {
                AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminTypeId)->where('subMenuId',$subMenuId)->update([
                  'addAccess' => 0,
                  'permissionStatus' => false,
                  'updateBy' => Auth::user()->id,
                ]);
                return ['Unactive'=> 'SubMenu Status Unactive'];
              }
              else {
                AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminTypeId)->where('subMenuId',$subMenuId)->update([
                  'addAccess' => 1,
                  'permissionStatus' => true,
                  'updateBy' => Auth::user()->id,
                ]);
                return ['active'=> 'SubMenu Status Active'];
              }
        }

        if ($adminMenuPermission->editAccess  == 1 || $adminMenuPermission->editAccess  == 0 && $adminMenuPermission->editAccess != "") {
            if ($adminMenuPermission->editAccess  == 1) {
                AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminTypeId)->where('subMenuId',$subMenuId)->update([
                    'editAccess' => 0,
                    'permissionStatus' => false,
                    'updateBy' => Auth::user()->id,
                ]);
                return ['Unactive'=> 'SubMenu Status Unactive'];
            }
            else{
                AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminTypeId)->where('subMenuId',$subMenuId)->update([
                    'editAccess' => 1,
                    'permissionStatus' => true,
                    'updateBy' => Auth::user()->id,
                ]);
               return ['active'=> 'SubMenu Status Active'];
            }
        }


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      	$adminMenuPermissionList = AdminMenuPermission::with('adminEntryName','adminTypeName')->distinct()->get(['adminId','adminType']);
        return ['adminMenuPermissionList' => $adminMenuPermissionList];

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, [
                'adminId' => 'required',
                'adminTypeId' => 'required',
            ]);

          if ($request->fullAccess != []) {
              foreach ($request->fullAccess as $full) {
                  $adminMenuId = AdminSubMenu::where('adminSubMenuId',$full)->first()->adminMenuId;
                  $adminMenuTitleId = AdminMenu::where('adminMenuId',$adminMenuId)->first()->adminMenuTitleId;
                  $AdminMenuPermission = new AdminMenuPermission;
                  $AdminMenuPermission->adminId = $request->adminId;
                  $AdminMenuPermission->adminType = $request->adminTypeId;
                  $AdminMenuPermission->menuTitleId = $adminMenuTitleId;
                  $AdminMenuPermission->menuId = $adminMenuId;
                  $AdminMenuPermission->subMenuId = $full;
                  $AdminMenuPermission->fullAccess = 1;
                  $AdminMenuPermission->permissionStatus = true;
                  $AdminMenuPermission->createBy = Auth::user()->id;
                  $AdminMenuPermission->created_at = Carbon::now();
                  $AdminMenuPermission->save();
              }
          }

         if ($request->viewAccess != []) {
             foreach ($request->viewAccess  as $view) {
                 $adminMenuId = AdminSubMenu::where('adminSubMenuId',$view)->first()->adminMenuId;
                 $adminMenuTitleId = AdminMenu::where('adminMenuId',$adminMenuId)->first()->adminMenuTitleId;

                 $AdminMenuPermission = new AdminMenuPermission;
                 $AdminMenuPermission->adminId = $request->adminId;
                 $AdminMenuPermission->adminType = $request->adminTypeId;
                 $AdminMenuPermission->menuTitleId = $adminMenuTitleId;
                 $AdminMenuPermission->menuId = $adminMenuId;
                 $AdminMenuPermission->subMenuId = $view;
                 $AdminMenuPermission->viewAccess = 1;
                 $AdminMenuPermission->permissionStatus = true;
                 $AdminMenuPermission->createBy = Auth::user()->id;
                 $AdminMenuPermission->created_at = Carbon::now();
                 $AdminMenuPermission->save();
             }
         }

        if ($request->addAccess != []) {
            foreach ($request->addAccess  as $add) {
                $adminMenuId = AdminSubMenu::where('adminSubMenuId',$add)->first()->adminMenuId;
                $adminMenuTitleId = AdminMenu::where('adminMenuId',$adminMenuId)->first()->adminMenuTitleId;

                $AdminMenuPermission = new AdminMenuPermission;
                $AdminMenuPermission->adminId = $request->adminId;
                $AdminMenuPermission->adminType = $request->adminTypeId;
                $AdminMenuPermission->menuTitleId = $adminMenuTitleId;
                $AdminMenuPermission->menuId = $adminMenuId;
                $AdminMenuPermission->subMenuId = $add;
                $AdminMenuPermission->addAccess = 1;
                $AdminMenuPermission->permissionStatus = true;
                $AdminMenuPermission->createBy = Auth::user()->id;
                $AdminMenuPermission->created_at = Carbon::now();
                $AdminMenuPermission->save();
            }
        }
         if ($request->editAccess != []) {
            foreach ($request->editAccess  as $edit) {
                 $adminMenuId = AdminSubMenu::where('adminSubMenuId',$edit)->first()->adminMenuId;
                 $adminMenuTitleId = AdminMenu::where('adminMenuId',$adminMenuId)->first()->adminMenuTitleId;

                 $AdminMenuPermission = new AdminMenuPermission;
                 $AdminMenuPermission->adminId = $request->adminId;
                 $AdminMenuPermission->adminType = $request->adminTypeId;
                 $AdminMenuPermission->menuTitleId = $adminMenuTitleId;
                 $AdminMenuPermission->menuId = $adminMenuId;
                 $AdminMenuPermission->subMenuId = $edit;
                 $AdminMenuPermission->editAccess = 1;
                 $AdminMenuPermission->permissionStatus = true;
                 $AdminMenuPermission->createBy = Auth::user()->id;
                 $AdminMenuPermission->created_at = Carbon::now();
                 $AdminMenuPermission->save();
            }
         }



      if ($request->adminMenuId) {
          foreach ($request->adminMenuId as $adminMenuId) {
            $adminMenuTitleId = AdminMenu::where('adminMenuId',$adminMenuId)->first()->adminMenuTitleId;
            $AdminMenuPermission = new AdminMenuPermission;
            $AdminMenuPermission->adminId = $request->adminId;
            $AdminMenuPermission->adminType = $request->adminTypeId;
            $AdminMenuPermission->menuTitleId = $adminMenuTitleId;
            $AdminMenuPermission->menuId = $adminMenuId;
            $AdminMenuPermission->permissionStatus = true;
            $AdminMenuPermission->createBy = Auth::user()->id;
            $AdminMenuPermission->created_at = Carbon::now();
            $AdminMenuPermission->save();
          }
     }

  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function adminPermissionMenus($adminId,$adminType)
     {
        $menuPermissionids = AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminType)->distinct()->get(['menuId','permissionStatus']);
        return ['menuPermissionid' => $menuPermissionids];
     }
     public function adminPermissionSubMenus($adminId,$adminType)
     {
        $subMenuPermissionids = AdminMenuPermission::where('adminId',$adminId)->where('adminType',$adminType)->distinct()->get();
        return ['subMenuPermissionid' => $subMenuPermissionids];
     }

    public function show($menuId)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($menuPermissionId)
    {

    }
}
