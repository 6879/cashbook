<div class="app-header header-shadow">
<!-- app-header__logo -->
    <div class="">
        <div class="logo-src">
          <img src="{{ asset('dashboard/assets/images/cashbook-logo.png') }}" class="img-fluid" alt="Not Found" style="width:180px;height:42px;">
        </div>
        <!-- <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div> -->
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
   <div class="app-header__content">
      <div class="app-header-left">
          <div class="search-wrapper">
              <div class="input-holder">
                  <input type="text" class="search-input" placeholder="Type to search">
                  <button class="search-icon"><span></span></button>
              </div>
              <button class="close"></button>
          </div>
        </div>
        <div class="app-header-right">
            <div class="header-dots">
              <div class="dropdown">
                  <button id="notice" class="p-0 mr-2 btn btn-link">
                      <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                          <span class="icon-wrapper-bg bg-danger"></span>
                          <i class="icon text-danger icon-anim-pulse ion-android-notifications"></i>
                          <span class="badge badge-danger" style="position: absolute;top: 0px;left:30px;padding:3px;border-radius:12px;">
                            40
                          </span>
                      </span>
                  </button>

              <div  id="notic-show" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right" >
                  <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
                      <li class="nav-item">
                          <a role="tab" class="nav-link active" data-toggle="tab" href="#tab-messages-header">
                            <span>Messages
                              <p class="badge badge-danger" style="position: absolute;top: -13px;right:-20px;padding:3px;border-radius:12px;">
                                40
                              </p>
                            </span>
                         </a>
                     </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" data-toggle="tab" href="#tab-events-header">
                            <span>Notification
                              <p class="badge badge-danger" style="position: absolute;top: -13px;right:-20px;padding:3px;border-radius:12px;">
                                40
                              </p>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" data-toggle="tab" href="#tab-errors-header">
                            <span>Offer
                              <p class="badge badge-danger" style="position: absolute;top: -13px;right:-20px;padding:3px;border-radius:12px;">
                                40
                              </p>
                            </span>
                        </a>
                    </li>
              </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab-messages-header" role="tabpanel">
              <div class="scroll-area-sm">
                  <div class="scrollbar-container">
                    <div class="p-3">
                      <div class="notifications-box">
                        <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                            <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">All Hands Meeting</h4><span class="vertical-timeline-element-date"></span></div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in"><p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in"><p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                              <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                  <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                      <div class="vertical-timeline-element-content bounce-in"><p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span>
                                      </div>
                                  </div>
                              </div>
                              <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                  <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                      <div class="vertical-timeline-element-content bounce-in"><p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span>
                                      </div>
                                  </div>
                              </div>
                              <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                  <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                      <div class="vertical-timeline-element-content bounce-in"><p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span>
                                      </div>
                                  </div>
                              </div>
                              <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                  <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                      <div class="vertical-timeline-element-content bounce-in"><p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span>
                                      </div>
                                  </div>
                              </div>
                              <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                  <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                      <div class="vertical-timeline-element-content bounce-in"><p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span>
                                      </div>
                                  </div>
                              </div>
                              <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                  <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                      <div class="vertical-timeline-element-content bounce-in"><p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span>
                                      </div>
                                  </div>
                              </div>


                                </div>
                              </div>
                           </div>
                       </div>
                    </div>
                  </div>
                    <div class="tab-pane" id="tab-events-header" role="tabpanel">
                        <div class="scroll-area-sm">
                          <div class="scrollbar-container">
                              <div class="p-3">
                                  <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                      <div class="vertical-timeline-item vertical-timeline-element">
                                          <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-success"> </i></span>
                                              <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">All Hands Meeting</h4>
                                                  <p>Lorem ipsum dolor sic amet, today at <a href="javascript:void(0);">12:00 PM</a></p><span class="vertical-timeline-element-date"></span></div>
                                          </div>
                                      </div>
                                      <div class="vertical-timeline-item vertical-timeline-element">
                                          <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-warning"> </i></span>
                                              <div class="vertical-timeline-element-content bounce-in"><p>Another meeting today, at <b class="text-danger">12:00 PM</b></p>
                                                  <p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span></div>
                                          </div>
                                      </div>
                                      <div class="vertical-timeline-item vertical-timeline-element">
                                          <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-danger"> </i></span>
                                              <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">Build the production release</h4>
                                                  <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore et dolore magna elit enim at minim veniam quis nostrud</p><span
                                                          class="vertical-timeline-element-date"></span></div>
                                          </div>
                                      </div>
                                 </div>
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="tab-pane" id="tab-errors-header" role="tabpanel">
                          <div class="scroll-area-sm">
                            <div class="scrollbar-container">
                              <div class="no-results pt-3 pb-0">
                                  <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                      <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                      <span class="swal2-success-line-tip"></span>
                                      <span class="swal2-success-line-long"></span>
                                      <div class="swal2-success-ring"></div>
                                      <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                      <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                  </div>
                                  <div class="results-subtitle">All caught up!</div>
                                  <div class="results-title">There are no system errors!</div>
                              </div>
                            </div>
                        </div>
                      </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="header-btn-lg pr-0">
              <div class="widget-content p-0">
                  <div class="widget-content-wrapper">
                      <div class="widget-content-left">
                          <div class="btn-group">
                              <a id="profile"  class="p-0 btn">
                                  <img width="50" height="46px" class="rounded-circle" src="{{ asset('dashboard/assets/images/dropdown-header/city1.jpg') }}" alt="">
                                  <i class="fa fa-angle-down ml-2 opacity-8"></i>
                              </a>
                              <div id="profile-show" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">

                                  <div style="border-bottom:rgba(26,54,126,0.125) solid 1px">
                                    <div class="widget-content-wrapper p-2">
                                        <div class="widget-content-left">
                                             <div class="widget-heading">
                                             @auth("web")
                                                    You're a admin!
                                                @endauth

                                                @auth("admin")
                                                    You're an shop!
                                                @endauth

                                                

                                                
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                             <div class="scroll-area-xs">
                                <div class="scrollbar-container ps">
                                    <ul class="nav flex-column">
                                        <li class="nav-item-header nav-item">
                                          <router-link to="/profile">
                                             Profile
                                          </router-link>
                                        </li>
                                        <li class="nav-item-header nav-item">
                                          <router-link to="/home">
                                             Dashboard
                                          </router-link>
                                        </li>
                                        <li class="nav-item-header nav-item">
                                          <router-link to="/changepassword">
                                            Change Password
                                           </router-link>
                                        </li>
                                        <li class="nav-item-header nav-item">
                                          <router-link to="/refer@taka">
                                              Refer &amp; get up to 100 Tk
                                           </router-link>
                                        </li>
                                        <li class="nav-item-header nav-item">
                                          <router-link to="/offer">
                                              Offer
                                           </router-link>
                                        </li>
                                        <li class="nav-item-header nav-item">
                                          <router-link to="/setting">
                                              Setting
                                           </router-link>
                                        </li>
                                        <li class="nav-item-header nav-item">
                                          <router-link to="/helps@support">
                                              Helps &amp; Support
                                           </router-link>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider mb-0 nav-item"></li>
                            </ul>
                            <div class="widget-content-right text-right p-2">
                                <a class="btn-pill btn-shadow btn-shine btn btn-focus" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-content-left  ml-3 header-user-info">
                    <div class="widget-heading">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="widget-subheading">
                    {{ Auth::user()->email }}
                    {{Auth::getDefaultDriver()}}
                    </div>
                </div>
                
            </div>
        </div>
       </div>
          <div class="header-btn-lg">
              <button type="button" class="hamburger hamburger--elastic open-right-drawer">
                  <span class="hamburger-box">
                      <span class="hamburger-inner"></span>
                  </span>
              </button>
          </div>
      </div>
    </div>
</div>
<div class="ui-theme-settings">
    <button type="button" id="TooltipDemo" class="btn-open-options btn btn-info">
        <i class="pe-7s-angle-left"></i>
    </button>
    <div class="theme-settings__inner">
        <div class="scrollbar-container">
            <div class="theme-settings__options-wrapper">
                <h3 class="themeoptions-heading">Layout Options
                </h3>
                <div class="p-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-3">
                                        <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                            <div class="switch-animate switch-on">
                                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Fixed Header
                                        </div>
                                        <div class="widget-subheading">Makes the header top fixed, always visible!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-3">
                                        <div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
                                            <div class="switch-animate switch-on">
                                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Fixed Sidebar
                                        </div>
                                        <div class="widget-subheading">Makes the sidebar left fixed, always visible!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-3">
                                        <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                            <div class="switch-animate switch-off">
                                                <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Fixed Footer
                                        </div>
                                        <div class="widget-subheading">Makes the app footer bottom fixed, always visible!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <h3 class="themeoptions-heading">
                    <div>
                        Header Options
                    </div>
                    <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                        Restore Default
                    </button>
                </h3>
                <div class="p-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h5 class="pb-2">Choose Color Scheme
                            </h5>
                            <div class="theme-settings-swatches">
                                <div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light">
                                </div>
                                <div class="divider">
                                </div>
                                <div class="swatch-holder bg-vicious-stance switch-header-cs-class" data-class="bg-vicious-stance header-text-light">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <h3 class="themeoptions-heading">
                    <div>Sidebar Options</div>
                    <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
                        Restore Default
                    </button>
                </h3>
                <div class="p-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h5 class="pb-2">Choose Color Scheme
                            </h5>
                            <div class="theme-settings-swatches">
                                <div class="swatch-holder bg-primary switch-sidebar-cs-class" data-class="bg-primary sidebar-text-light">
                                </div>

                                <div class="swatch-holder bg-happy-green switch-sidebar-cs-class" data-class="bg-happy-green sidebar-text-light">
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
                <h3 class="themeoptions-heading">
                    <div>Main Content Options</div>
                    <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default
                    </button>
                </h3>
                <div class="p-3">
                    <ul class="list-group">

                        <li class="list-group-item">
                            <h5 class="pb-2">Page Section Tabs
                            </h5>
                            <div class="theme-settings-swatches">
                                <div role="group" class="mt-2 btn-group">
                                    <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">
                                        Line
                                    </button>
                                    <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">
                                        Shadow
                                    </button>
                                </div>
                            </div>
                        </li>
                        
                        <li class="list-group-item">
                            <h5 class="pb-2"> Light Color Schemes
                            </h5>
                            <div class="theme-settings-swatches">
                                <div role="group" class="mt-2 btn-group">
                                    <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="app-theme-white">
                                        White Theme
                                    </button>
                                    <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="app-theme-gray">
                                        Gray Theme
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
