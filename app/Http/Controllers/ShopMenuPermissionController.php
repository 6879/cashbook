<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopEmployeeEntry;
use App\AdminMenuTitleName;
use App\AdminMenu;
use App\AdminSubMenu;
use App\ShopMenuPermission;
use Carbon\Carbon;
use Auth;

class ShopMenuPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    public function shopEmployeeEntryLists()
    {
       $shopEmployeeEntryLists = ShopEmployeeEntry::orderBy('shopEmployeeEntryId','desc')->get();
       return ['shopEmployeeEntryLists' => $shopEmployeeEntryLists];
    }
    public function shopEmployeeTypeName($shopEmployeeEntryId)
    {
       $shopEmployeeTypeName = ShopEmployeeEntry::with('shopEmployeeTypes')->where('shopEmployeeEntryId',$shopEmployeeEntryId)->first();
       return ['shopEmployeeTypeName' => $shopEmployeeTypeName];
    }
    public function shopMenuTittleShow()
    {
        $shopMenuTittleShows = AdminMenuTitleName::where('adminMenuTitlePermission',1)->orderBy('adminMenuTitleId','asc')->get();
        return ['shopMenuTittleShows' => $shopMenuTittleShows];
    }
    public function shopMenuShow()
    {
        $shopMenuShows = AdminMenu::where('adminMenuStatus',1)->orderBy('adminMenuId','asc')->get();
        return  ['shopMenuShows' => $shopMenuShows];
    }
    public function shopSubMenuShow()
    {
       $shopSubMenuShows = AdminSubMenu::where('adminSubMenueStatus',1)->orderBy('adminSubMenuId','asc')->get();
       return ['shopSubMenuShows' => $shopSubMenuShows];

    }
    public function shopPermissionMenuShows($employeeEntryId, $employeeTypeId)
    {
        $shopMenuPermissionids = ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->distinct()->get(['menuId','permissionStatus']);
        return ['shopMenuPermissionids' => $shopMenuPermissionids];

    }
    public function shopPermissionSubMenuShows($employeeEntryId, $employeeTypeId)
    {
        $shopSubMenuPermissionids = ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->get();
        return ['shopSubMenuPermissionids' => $shopSubMenuPermissionids];
    }


    public function shopMenuPermissionChange($employeeEntryId,$employeeTypeId,$menuId)
    {
      $permissionStatus =  ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('menuId',$menuId)->first()->permissionStatus;
        if ($permissionStatus == 1) {
            ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('menuId',$menuId)->update([
                'permissionStatus' => false,
                'updateBy' => Auth::user()->id,
            ]);
            return ['Unactive'=> 'Menu Status Unactive'];
        }
        else {
            ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('menuId',$menuId)->update([
                'permissionStatus' => true,
                'updateBy' => Auth::user()->id,
            ]);
           return ['Active'=> 'Menu Status Active'];
        }

    }
////////////  shopSubMenuStatusChangeDeactive
    public function shopSubMenuStatusDeactive($employeeEntryId,$employeeTypeId,$subMenuId)
    {
         $shopMenuPermission = ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->first();

        if ($shopMenuPermission->fullAccess == 1  && $shopMenuPermission->fullAccess != "") {

            ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->update([
                'fullAccess' => 0,
                'permissionStatus' => false,
                'updateBy' => Auth::user()->id,
            ]);
            return ['Unactive'=> 'SubMenu Status Unactive'];
        }

        if ($shopMenuPermission->viewAccess  == 1  && $shopMenuPermission->viewAccess != "") {

              ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->update([
                  'viewAccess' => 0,
                  'permissionStatus' => false,
                  'updateBy' => Auth::user()->id,
              ]);
              return ['Unactive'=> 'SubMenu Status Unactive'];
        }

        if ($shopMenuPermission->addAccess  == 1   && $shopMenuPermission->addAccess != "") {

              ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->update([
                'addAccess' => 0,
                'permissionStatus' => false,
                'updateBy' => Auth::user()->id,
              ]);
              return ['Unactive'=> 'SubMenu Status Unactive'];
        }

        if ($shopMenuPermission->editAccess  == 1  && $shopMenuPermission->editAccess != "") {

                ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->update([
                    'editAccess' => 0,
                    'permissionStatus' => false,
                    'updateBy' => Auth::user()->id,
                ]);
                return ['Unactive'=> 'SubMenu Status Unactive'];

        }


    }

///////////     shopSubMenuStatusChangeActive

      public function shopSubMenuStatusActiveFullAccess($employeeEntryId,$employeeTypeId,$subMenuId)
      {
           $shopMenuPermission = ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->first();

           if ($shopMenuPermission->fullAccess == 0 ) {
               ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->update([
                   'fullAccess' => 1,
                   'permissionStatus' => true,
                   'updateBy' => Auth::user()->id,
               ]);
               return ['active'=> 'SubMenu Status Active'];
           }
      }
      public function shopSubMenuStatusActiveViewAccess($employeeEntryId,$employeeTypeId,$subMenuId)
      {
           $shopMenuPermission = ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->first();

           if ($shopMenuPermission->viewAccess == 0 ) {
                 ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->update([
                     'viewAccess' => 1,
                     'permissionStatus' => true,
                     'updateBy' => Auth::user()->id,
                 ]);
                return ['active'=> 'SubMenu Status Active'];
           }
      }
      public function shopSubMenuStatusActiveAddAccess($employeeEntryId,$employeeTypeId,$subMenuId)
      {
           $shopMenuPermission = ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->first();

           if ($shopMenuPermission->addAccess == 0 ) {
               ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->update([
                 'addAccess' => 1,
                 'permissionStatus' => true,
                 'updateBy' => Auth::user()->id,
               ]);
               return ['active'=> 'SubMenu Status Active'];
           }
      }
      public function shopSubMenuStatusActiveEditAccess($employeeEntryId,$employeeTypeId,$subMenuId)
      {
           $shopMenuPermission = ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->first();

           if ($shopMenuPermission->editAccess == 0 ) {
               ShopMenuPermission::where('employeeEntryId',$employeeEntryId)->where('employeeTypeId',$employeeTypeId)->where('subMenuId',$subMenuId)->update([
                   'editAccess' => 1,
                   'permissionStatus' => true,
                   'updateBy' => Auth::user()->id,
               ]);
              return ['active'=> 'SubMenu Status Active'];
           }
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
        $this->validate($request, [
            'employeeEntryId' => 'required',
            'employeeTypeId' => 'required',
        ]);
        if ($request->fullAccess != []) {
            foreach ($request->fullAccess as $full) {
                $adminMenuId = AdminSubMenu::where('adminSubMenuId',$full)->first()->adminMenuId;
                $adminMenuTitleId = AdminMenu::where('adminMenuId',$adminMenuId)->first()->adminMenuTitleId;

                $ShopMenuPermission = new ShopMenuPermission;
                $ShopMenuPermission->employeeEntryId = $request->employeeEntryId;
                $ShopMenuPermission->employeeTypeId = $request->employeeTypeId;
                $ShopMenuPermission->menuTitleId = $adminMenuTitleId;
                $ShopMenuPermission->menuId = $adminMenuId;
                $ShopMenuPermission->subMenuId = $full;
                $ShopMenuPermission->fullAccess = 1;
                $ShopMenuPermission->permissionStatus = true;
                $ShopMenuPermission->createBy = Auth::user()->id;
                $ShopMenuPermission->created_at = Carbon::now();
                $ShopMenuPermission->save();
            }
        }

        if ($request->viewAccess != []) {
            foreach ($request->viewAccess  as $view) {
                $adminMenuId = AdminSubMenu::where('adminSubMenuId',$view)->first()->adminMenuId;
                $adminMenuTitleId = AdminMenu::where('adminMenuId',$adminMenuId)->first()->adminMenuTitleId;

                $ShopMenuPermission = new ShopMenuPermission;
                $ShopMenuPermission->employeeEntryId = $request->employeeEntryId;
                $ShopMenuPermission->employeeTypeId = $request->employeeTypeId;
                $ShopMenuPermission->menuTitleId = $adminMenuTitleId;
                $ShopMenuPermission->menuId = $adminMenuId;
                $ShopMenuPermission->subMenuId = $view;
                $ShopMenuPermission->viewAccess = 1;
                $ShopMenuPermission->permissionStatus = true;
                $ShopMenuPermission->createBy = Auth::user()->id;
                $ShopMenuPermission->created_at = Carbon::now();
                $ShopMenuPermission->save();
            }
        }

        if ($request->addAccess != []) {
            foreach ($request->addAccess  as $add) {
                $adminMenuId = AdminSubMenu::where('adminSubMenuId',$add)->first()->adminMenuId;
                $adminMenuTitleId = AdminMenu::where('adminMenuId',$adminMenuId)->first()->adminMenuTitleId;

                $ShopMenuPermission = new ShopMenuPermission;
                $ShopMenuPermission->employeeEntryId = $request->employeeEntryId;
                $ShopMenuPermission->employeeTypeId = $request->employeeTypeId;
                $ShopMenuPermission->menuTitleId = $adminMenuTitleId;
                $ShopMenuPermission->menuId = $adminMenuId;
                $ShopMenuPermission->subMenuId = $add;
                $ShopMenuPermission->addAccess = 1;
                $ShopMenuPermission->permissionStatus = true;
                $ShopMenuPermission->createBy = Auth::user()->id;
                $ShopMenuPermission->created_at = Carbon::now();
                $ShopMenuPermission->save();
            }
        }

        if ($request->editAccess != []) {
           foreach ($request->editAccess  as $edit) {
                $adminMenuId = AdminSubMenu::where('adminSubMenuId',$edit)->first()->adminMenuId;
                $adminMenuTitleId = AdminMenu::where('adminMenuId',$adminMenuId)->first()->adminMenuTitleId;

                $ShopMenuPermission = new ShopMenuPermission;
                $ShopMenuPermission->employeeEntryId = $request->employeeEntryId;
                $ShopMenuPermission->employeeTypeId = $request->employeeTypeId;
                $ShopMenuPermission->menuTitleId = $adminMenuTitleId;
                $ShopMenuPermission->menuId = $adminMenuId;
                $ShopMenuPermission->subMenuId = $edit;
                $ShopMenuPermission->editAccess = 1;
                $ShopMenuPermission->permissionStatus = true;
                $ShopMenuPermission->createBy = Auth::user()->id;
                $ShopMenuPermission->created_at = Carbon::now();
                $ShopMenuPermission->save();
           }
        }

        if ($request->shopMenuId) {
            foreach ($request->shopMenuId as $shopMenuId) {
              $adminMenuTitleId = AdminMenu::where('adminMenuId',$shopMenuId)->first()->adminMenuTitleId;
              $ShopMenuPermission = new ShopMenuPermission;
              $ShopMenuPermission->employeeEntryId = $request->employeeEntryId;
              $ShopMenuPermission->employeeTypeId = $request->employeeTypeId;
              $ShopMenuPermission->menuTitleId = $adminMenuTitleId;
              $ShopMenuPermission->menuId = $shopMenuId;
              $ShopMenuPermission->permissionStatus = true;
              $ShopMenuPermission->createBy = Auth::user()->id;
              $ShopMenuPermission->created_at = Carbon::now();
              $ShopMenuPermission->save();
            }
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
    public function destroy($id)
    {
        //
    }
}
