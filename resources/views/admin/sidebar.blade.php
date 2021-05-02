@if(Auth::check())
@if(Auth::check())
<div class="app-sidebar sidebar-shadow ">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>


  <div class="scrollbar-sidebar">
    @if (Auth::user()->role == 1)
      <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
          <li class="app-sidebar__heading">Menu Create</li>
          <li>
            <router-link to="/home" id="icon0">
              <i class="metismenu-icon pe-7s-home icon-gradient bg-love-kiss"></i>
               Home
            </router-link>
          </li>
{{--...............................................  Configaration Setup......................................--}}
          <li>
            <a href="#" id="icon0">
              <i class="metismenu-icon pe-7s-tools icon-gradient bg-arielle-smile"></i>
               Configuration s
              <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
            <ul>
              
              <li class="block-element-btn-example-1">
                <router-link to="/adminmenu@title">
                  <i class="metismenu-icon"></i>
                  Admin Menu Title
                </router-link>
              </li>
              <li class="block-element-btn-example-1">
                <router-link to="/adminmenu@create">
                  <i class="metismenu-icon"></i>
                  Admin Menu Create
                </router-link>
              </li>

              <li class="block-element-btn-example-1">
                <router-link to="/adminsubmenu@create">
                  <i class="metismenu-icon"></i>
                  Admin Sub Menu Create
                </router-link>
              </li>

              <li class="block-element-btn-example-1">
                <router-link to="/admintype@create">
                  <i class="metismenu-icon"></i>
                  Admin Type Create
                </router-link>
              </li>

              <li class="block-element-btn-example-1">
                <router-link to="/purchaseTypeNew">
                  <i class="metismenu-icon"></i>
                  Purchase Type Create
                </router-link>
              </li>
              <li class="block-element-btn-example-1">
                <router-link to="/adminentry@create">
                  <i class="metismenu-icon"></i>
                  Admin Entry Create
                </router-link>
              </li>
              <li class="block-element-btn-example-1">
                <router-link to="/adminsetup@create">
                  <i class="metismenu-icon"></i>
                  Admin Setup Create
                </router-link>
              </li>


              <li class="block-element-btn-example-1">
                <router-link to="/adminmenu@permission">
                  <i class="metismenu-icon"></i>
                  Admin Menu Permission
                </router-link>
              </li>

              <li class="block-element-btn-example-1">
                <router-link to="/adminmenu@permissionlist">
                  <i class="metismenu-icon"></i>
                  Admin Menu Permission List
                </router-link>
              </li>
            </ul>
          </li>


{{--...............................................  Configaration Setup......................................--}}
          <li>
                <a href="#" id="icon0">
                    <i class="metismenu-icon pe-7s-timer icon-gradient bg-grow-early"></i>
                     Configuration Setup
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
            <ul>
                <li class="block-element-btn-example-1">
                  <router-link to="/unite@entry">
                    <i class="metismenu-icon"></i>
                    Unite Entry
                  </router-link>
                </li>
                <li class="block-element-btn-example-1">
                  <router-link to="/bank@entry">
                    <i class="metismenu-icon"></i>
                    Bank Entry
                  </router-link>
                </li>
                <li class="block-element-btn-example-1">
                  <router-link to="/banktype@entry">
                    <i class="metismenu-icon"></i>
                    Bank Type Entry
                  </router-link>
                </li>
                <li class="block-element-btn-example-1">
                  <router-link to="/adminassetbrand@entry">
                    <i class="metismenu-icon"></i>
                    Asset Brand Entry
                  </router-link>
                </li>
                <li class="block-element-btn-example-1">
                  <router-link to="/metakeydescription@entry">
                    <i class="metismenu-icon"></i>
                       Metakey  Entry
                  </router-link>
                </li>
                <li class="block-element-btn-example-1">
                  <router-link to="/adminholiday@entry">
                    <i class="metismenu-icon"></i>
                        Holiday Type Entry
                  </router-link>
                </li>
                <li class="block-element-btn-example-1">
                    <router-link to="/adminholiday@setup">
                        <i class="metismenu-icon"></i>
                        Holiday Setup
                    </router-link>
                </li>
                <li class="block-element-btn-example-1">
                  <router-link to="/adminemployee@typecreate">
                    <i class="metismenu-icon"></i>
                       Employee Type Entry
                  </router-link>
                </li>
                <li class="block-element-btn-example-1">
                    <router-link to="/licencetype@entry">
                        <i class="metismenu-icon"></i>
                        Licence Type Entry
                    </router-link>
                </li>
                <li class="block-element-btn-example-1">
                    <router-link to="/productbrand@entry">
                        <i class="metismenu-icon"></i>
                        Product Brand Entry
                    </router-link>
                </li>
                <li class="block-element-btn-example-1">
                    <router-link to="/shoptype@entry">
                        <i class="metismenu-icon"></i>
                        Shop Type Entry
                    </router-link>
                </li>
                <li class="block-element-btn-example-1">
                    <router-link to="/shopaddexpencetype@entry">
                        <i class="metismenu-icon"></i>
                        Add Expence Type
                    </router-link>
                </li>
                <li class="block-element-btn-example-1">
                    <router-link to="/shopaddincometype@entry">
                        <i class="metismenu-icon"></i>
                        Add Income Type
                    </router-link>
                </li>
                <li class="block-element-btn-example-1">
                    <router-link to="/purchasetype@entry">
                        <i class="metismenu-icon"></i>
                        Purchase Type Entry
                    </router-link>
                </li>
                <li class="block-element-btn-example-1">
                  <router-link to="/bussinesstype@create">
                    <i class="metismenu-icon"></i>
                    Bussiness Type Create
                  </router-link>
                </li>
                <li class="block-element-btn-example-1">
                  <router-link to="/commissiontype@entry">
                    <i class="metismenu-icon"></i>
                    Commission Type Entry
                  </router-link>
                </li>
                <li class="block-element-btn-example-1">
                  <router-link to="/shopcustomertype@entry">
                    <i class="metismenu-icon"></i>
                    Shop Customer Type Entry
                  </router-link>
                </li>
                <li class="block-element-btn-example-1">
                    <router-link to="/educationinfo@entry">
                        <i class="metismenu-icon"></i>
                        Education Information Entry
                    </router-link>
                </li>
              </ul>
           </li>
            {{--...............................................End  Configaration Setup......................................--}}
        </ul>
      </div>

    @endif

  {{--------------------------------- User Menu ----------------------------}}
  @if (Auth::user()->role == 1)
    {{---------------------------------------- Admin Menu ----------------------------------------}}
      @php
       $adminMenuTitleNames = App\AdminMenuTitleName::where('adminMenuTitleStatus',1)->orderBy('adminMenuTitleId','asc')->get();
      @endphp

      @foreach ($adminMenuTitleNames as $adminMenuTitleName)
        <div class="app-sidebar__inner">
          <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">{{ $adminMenuTitleName->adminMenuTitleName }}</li>
            @php
            $adminMenuLists = App\AdminMenu::where('adminMenuTitleId',$adminMenuTitleName->adminMenuTitleId	)->where('adminMenuStatus',1)->orderBy('adminMenuPosition','asc')->get();
            @endphp
            @foreach ($adminMenuLists as $adminMenuList)
              <li>
                <{{ ($adminMenuList->adminSubMenuStatus == 1)? "a href=#" : "router-link to=/$adminMenuList->adminMenuUrl" }}>
                @if ($adminMenuList->adminSubMenuStatus == 1)
                  <span class="icon-wrapper-bg bg-danger">
                    <i class="metismenu-icon  {{ $adminMenuList->adminMenuIcon }}  bg-info text-white rounded"></i>
                    </span>
                @else
                  <i class="metismenu-icon {{ $adminMenuList->adminMenuIcon }}  bg-danger text-white rounded"></i>
                @endif
                {{ $adminMenuList->adminMenuName }}
                @if ($adminMenuList->adminSubMenuStatus == 1)
                  <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                @endif
                <{{ ($adminMenuList->adminSubMenuStatus == 1)? "/a" : "/router-link" }}>

                @if ( $adminMenuList->adminSubMenuStatus == 1 )
                    <ul>
                      @php
                        $AdminSubMenuLists = App\AdminSubMenu::where('adminMenuId',$adminMenuList->adminMenuId)->where('adminSubMenueStatus',1)->orderBy('adminSubMenuePosition','asc')->get();
                      @endphp
                      @foreach ($AdminSubMenuLists as $AdminSubMenuList)
                        <li class="block-element-btn-example-1">
                          <router-link to="/{{ $AdminSubMenuList->adminSubMenuUrl }}">
                            <i class="metismenu-icon"></i>
                            {{ $AdminSubMenuList->adminSubMenuName }}
                          </router-link>
                        </li>
                      @endforeach
                    </ul>
                  @endif
                </li>
              @endforeach
            </ul>
          </div>
        @endforeach

    @elseif (Auth::user()->role == 2)
        @php
           $menuTitleNames = App\AdminMenuPermission::where('adminId', Auth::user()->adminId)->where('permissionStatus',1)->distinct()->get(['menuTitleId']);
        @endphp

        <div class="app-sidebar__inner">
          <ul class="vertical-nav-menu">
              @foreach ($menuTitleNames as $menuTitleName)
                  @php
                    $menuTitleNames = App\AdminMenuTitleName::where('adminMenuTitleId', $menuTitleName->menuTitleId)->where('adminMenuTitleStatus',1)->orderBy('adminMenuTitleId','asc')->get()
                  @endphp
                    @foreach ($menuTitleNames as $menuTitleName)
                      <li class="app-sidebar__heading">{{ $menuTitleName->adminMenuTitleName }}</li>
                    @endforeach
                    @php
                       $menuNameIds = App\AdminMenuPermission::where('adminId', Auth::user()->adminId)->where('permissionStatus',1)->distinct()->orderBy('menuId','asc')->get(['menuId']);
                    @endphp
                    @foreach ($menuNameIds as $menuNameId)
                      @php
                        $menuNames = App\AdminMenu::where('adminMenuId', $menuNameId->menuId)->where('adminMenuTitleId', $menuTitleName->adminMenuTitleId)->where('adminMenuStatus',1)->get()
                      @endphp
                        @foreach ($menuNames as $menuName)
                            <li>
                              <{{ ($menuName->adminSubMenuStatus == 1)? "a href=#" : "router-link to=/$menuName->adminMenuUrl" }}>
                              @if ($menuName->adminSubMenuStatus == 1)
                                <i class="metismenu-icon pe-7s-browser"></i>
                              @else
                                <i class="metismenu-icon pe-7s-angle-right"></i>
                              @endif
                              {{ $menuName->adminMenuName }}
                              @if ($menuName->adminSubMenuStatus == 1)
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                              @endif
                              <{{ ($menuName->adminSubMenuStatus == 1)? "/a" : "/router-link" }}>

                            @if ( $menuName->adminSubMenuStatus == 1 )

                              <ul>
                                @php
                                   $subMenuIds = App\AdminMenuPermission::where('adminId', Auth::user()->adminId)->where('permissionStatus',1)->distinct()->get(['subMenuId']);
                                @endphp
                                @foreach ($subMenuIds as $subMenuId)
                                  @php
                                    $sunMenuNames = App\AdminSubMenu::where('adminSubMenuId', $subMenuId->subMenuId)->where('adminMenuId', $menuNameId->menuId)->where('adminSubMenueStatus',1)->get()
                                  @endphp
                                    @foreach ($sunMenuNames as $sunMenuName)
                                      <li class="block-element-btn-example-1">
                                        <router-link to="/{{ $sunMenuName->adminSubMenuUrl }}">
                                          <i class="metismenu-icon"></i>
                                          {{ $sunMenuName->adminSubMenuName }}
                                        </router-link>
                                      </li>
                                  @endforeach
                                @endforeach
                              </ul>
                              @endif
                            </li>
                        @endforeach
                    @endforeach
              @endforeach
           </ul>
       </div>


      @elseif (Auth::user()->role == 3)
        <div class="app-sidebar__inner">
          <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading"> Menu Permission </li>

            <li>
            <router-link to="/home" id="icon0">
              <i class="metismenu-icon pe-7s-home icon-gradient bg-love-kiss"></i>
               Home
            </router-link>
          </li>


            
          </ul>
        </div>
        
        @php
           $adminMenuTitleNames = App\AdminMenuTitleName::where('adminMenuTitleStatus',1)->where('adminMenuTitlePermission',1)->orderBy('adminMenuTitleId','asc')->get();
        @endphp

          @foreach ($adminMenuTitleNames as $adminMenuTitleName)
            <div class="app-sidebar__inner">
              <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">{{ $adminMenuTitleName->adminMenuTitleName }}</li>
                @php
                $adminMenuLists = App\AdminMenu::where('adminMenuTitleId',$adminMenuTitleName->adminMenuTitleId	)->where('adminMenuStatus',1)->orderBy('adminMenuPosition','asc')->get();
                @endphp
                @foreach ($adminMenuLists as $adminMenuList)
                  <li>
                    <{{ ($adminMenuList->adminSubMenuStatus == 1)? "a href=#" : "router-link to=/$adminMenuList->adminMenuUrl" }}>
                    @if ($adminMenuList->adminSubMenuStatus == 1)
                      <i class="metismenu-icon pe-7s-browser"></i>
                    @else
                      <i class="metismenu-icon pe-7s-angle-right"></i>
                    @endif
                    {{ $adminMenuList->adminMenuName }}
                    @if ($adminMenuList->adminSubMenuStatus == 1)
                      <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    @endif
                    <{{ ($adminMenuList->adminSubMenuStatus == 1)? "/a" : "/router-link" }}>

                    @if ( $adminMenuList->adminSubMenuStatus == 1 )
                        <ul>
                          @php
                            $AdminSubMenuLists = App\AdminSubMenu::where('adminMenuId',$adminMenuList->adminMenuId)->where('adminSubMenueStatus',1)->orderBy('adminSubMenuePosition','asc')->get();
                          @endphp
                          @foreach ($AdminSubMenuLists as $AdminSubMenuList)
                            <li class="block-element-btn-example-1">
                              <router-link to="/{{ $AdminSubMenuList->adminSubMenuUrl }}">
                                <i class="metismenu-icon"></i>
                                {{ $AdminSubMenuList->adminSubMenuName }}
                              </router-link>
                            </li>
                          @endforeach
                        </ul>
                    @endif
                  </li>
                @endforeach
              </ul>
            </div>
          @endforeach

        @elseif (Auth::user()->role == 4)

            @php
               $menuTitleNames = App\ShopMenuPermission::where('employeeEntryId', Auth::user()->employeeId)->where('permissionStatus',1)->distinct()->get(['menuTitleId']);
            @endphp

            <div class="app-sidebar__inner">
              <ul class="vertical-nav-menu">
                  @foreach ($menuTitleNames as $menuTitleName)
                      @php
                        $menuTitleNames = App\AdminMenuTitleName::where('adminMenuTitleId', $menuTitleName->menuTitleId)->where('adminMenuTitleStatus',1)->orderBy('adminMenuTitleId','asc')->get()
                      @endphp
                        @foreach ($menuTitleNames as $menuTitleName)
                          <li class="app-sidebar__heading">{{ $menuTitleName->adminMenuTitleName }}</li>
                        @endforeach
                        @php
                           $menuNameIds = App\ShopMenuPermission::where('employeeEntryId', Auth::user()->employeeId)->where('permissionStatus',1)->distinct()->orderBy('menuId','asc')->get(['menuId']);
                        @endphp
                        @foreach ($menuNameIds as $menuNameId)
                            @php
                              $menuNames = App\AdminMenu::where('adminMenuId', $menuNameId->menuId)->where('adminMenuTitleId', $menuTitleName->adminMenuTitleId)->where('adminMenuStatus',1)->get()
                            @endphp
                              @foreach ($menuNames as $menuName)
                                  <li>
                                    <{{ ($menuName->adminSubMenuStatus == 1)? "a href=#" : "router-link to=/$menuName->adminMenuUrl" }}>
                                    @if ($menuName->adminSubMenuStatus == 1)
                                      <i class="metismenu-icon pe-7s-browser"></i>
                                    @else
                                      <i class="metismenu-icon pe-7s-angle-right"></i>
                                    @endif
                                    {{ $menuName->adminMenuName }}
                                    @if ($menuName->adminSubMenuStatus == 1)
                                      <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    @endif
                                    <{{ ($menuName->adminSubMenuStatus == 1)? "/a" : "/router-link" }}>

                                  @if ( $menuName->adminSubMenuStatus == 1 )

                                    <ul>
                                      @php
                                         $subMenuIds = App\ShopMenuPermission::where('employeeEntryId', Auth::user()->employeeId)->where('permissionStatus',1)->distinct()->get(['subMenuId']);
                                      @endphp
                                      @foreach ($subMenuIds as $subMenuId)
                                        @php
                                          $sunMenuNames = App\AdminSubMenu::where('adminSubMenuId', $subMenuId->subMenuId)->where('adminMenuId', $menuNameId->menuId)->where('adminSubMenueStatus',1)->get()
                                        @endphp
                                          @foreach ($sunMenuNames as $sunMenuName)
                                            <li class="block-element-btn-example-1">
                                              <router-link to="/{{ $sunMenuName->adminSubMenuUrl }}">
                                                <i class="metismenu-icon"></i>
                                                {{ $sunMenuName->adminSubMenuName }}
                                              </router-link>
                                            </li>
                                        @endforeach
                                      @endforeach
                                    </ul>
                                    @endif
                                  </li>
                               @endforeach
                         @endforeach
                   @endforeach
               </ul>
           </div>

      @endif
      @endif

   </div>
</div>



@endif








@if(0)
<div class="app-sidebar sidebar-shadow ">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>


  <div class="scrollbar-sidebar">
   

  <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
          <li class="app-sidebar__heading"> Menu Create </li>
          <li>
            <router-link to="/shop" id="icon0">
              <i class="metismenu-icon pe-7s-home icon-gradient bg-love-kiss"></i>
               Home
            </router-link>
          </li>
        </ul>
          </div>
        
        @php
           $adminMenuTitleNames = App\AdminMenuTitleName::where('adminMenuTitleStatus',1)->where('adminMenuTitlePermission',1)->orderBy('adminMenuTitlePosition','ASC')->get();
        @endphp

          @foreach ($adminMenuTitleNames as $adminMenuTitleName)
            <div class="app-sidebar__inner">
              <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">{{ $adminMenuTitleName->adminMenuTitleName }}</li>
                @php
                $adminMenuLists = App\AdminMenu::where('adminMenuTitleId',$adminMenuTitleName->adminMenuTitleId	)->where('adminMenuStatus',1)->orderBy('adminMenuPosition','ASC')->get();
                @endphp
                @foreach ($adminMenuLists as $adminMenuList)
                  <li>
                    <{{ ($adminMenuList->adminSubMenuStatus == 1)? "a href=#" : "router-link to=/$adminMenuList->adminMenuUrl" }}>
                    @if ($adminMenuList->adminSubMenuStatus == 1)
                      <i class="metismenu-icon pe-7s-browser"></i>
                    @else
                      <i class="metismenu-icon pe-7s-angle-right"></i>
                    @endif
                    {{ $adminMenuList->adminMenuName }}
                    @if ($adminMenuList->adminSubMenuStatus == 1)
                      <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    @endif
                    <{{ ($adminMenuList->adminSubMenuStatus == 1)? "/a" : "/router-link" }}>

                    @if ( $adminMenuList->adminSubMenuStatus == 1 )
                        <ul>
                          @php
                            $AdminSubMenuLists = App\AdminSubMenu::where('adminMenuId',$adminMenuList->adminMenuId)->where('adminSubMenueStatus',1)->orderBy('adminSubMenuePosition','asc')->get();
                          @endphp
                          @foreach ($AdminSubMenuLists as $AdminSubMenuList)
                            <li class="block-element-btn-example-1">
                              <router-link to="/{{ $AdminSubMenuList->adminSubMenuUrl }}">
                                <i class="metismenu-icon"></i>
                                {{ $AdminSubMenuList->adminSubMenuName }}
                              </router-link>
                            </li>
                          @endforeach
                        </ul>
                    @endif
                  </li>
                @endforeach
              </ul>
            </div>
          @endforeach

        
  

   </div>
</div>
@endif