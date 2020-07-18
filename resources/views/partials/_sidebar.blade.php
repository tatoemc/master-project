 
<div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        
                        <li class="nav-item start ">
                            <a href="{{  url('home') }}" class="nav-link nav-toggle">
        
                                <img src="{{ asset('images/' . Auth::user()->image )}}" class="rounded">
                                
                            </a>
                         </li>   
                        <li class="nav-item start ">
                            <a href="{{  url('home') }}" class="nav-link nav-toggle">
                
                                <span class="title">{{ Auth::user()->name }}</span>
                                
                            </a>
                            
                        </li>

                        <li class="nav-item start ">
                            <a href="{{  url('home') }}" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">الرئيسية</span>
                                
                            </a>
                            
                        </li>

                        
                        <li class="nav-item  ">
                            <a href="{{  url('home') }}" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-home"></i>
                                <span class="title">حسابي</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">

                                    <a href="/changePassword" class="nav-link ">
                                         <i class="glyphicon glyphicon-cog"></i>
                                        <span class="title">تغير كلمة المرور</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                       <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">الكفالة</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{ route('sponserforms.index')}}" class="nav-link ">
                                        <span class="title">عرض الكفالة</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{ route('sponserforms.create')}}" class="nav-link ">
                                        <span class="title">اضافة كفالة</span>
                                    </a>
                                </li>
                        
                            </ul>
                        </li>

                      @can('isAdmin')
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">المستخدمين</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{ route('users.index')}}" class="nav-link ">
                                        <span class="title">عرض المستخدمين</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{ route('users.create')}}" class="nav-link ">
                                        <span class="title">اضافة مستخدم</span>
                                    </a>
                                </li>
                        
                            </ul>
                        </li>
                        @endcan
                        @can('isAdmin')
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-education"></i>
                                <span >المشرفين</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">

                                     <a href="{{  url('supervisor') }}" class="nav-link ">
                                        <span class="title">عرض المشرفين</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        @endcan
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">الايتام</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{ route('orphans.create')}}" class="nav-link ">
                                        <span class="title">أضافة يتيم</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{ route('orphans.index')}}" class="nav-link ">
                                        <span class="title">عرض الايتام</span>
                                    </a>
                                </li>

                                <li class="nav-item  ">
                                    <a href="{{ url('sponsered') }}" class="nav-link ">
                                        <span class="title">الايتام المكفولين</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{ url('notsponsered') }}" class="nav-link ">
                                        <span class="title">الايتام غير المكفولين</span>
                                    </a>
                                </li>

                                 @can('isUser')
                                <li class="nav-item  ">
                                    <a href="{{ url('create2') }}" class="nav-link ">
                                        <span class="title">أضافة يتيم</span>
                                    </a>
                                </li>
                                @endcan
                                
                                
                               
                            </ul>
                        </li>
                       @can('isAdmin')
                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-heart"></i>
                                <span class="title">الكافلين</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                
                                <li class="nav-item  ">
                                     <a href="{{  url('sponsor') }}" class="nav-link ">
                                        <span class="title">عرض الكافلين</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        @endcan
                        @can('isAdmin')
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="">اوليا الامور</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{  url('guardian') }}" class="nav-link ">
                                        <span class="title">عرض اوليا الامور</span>
                                    </a>
                                </li>
                                             
                            </ul>
                        </li>
                        @endcan
        
                        <li class="nav-item  "> 
                            <a href="" class="nav-link ">
                                        <i class="icon-call-end"></i>
                                        <span class="title">الدعم الفنى 249907861800</span>
                                    </a>
                        </li>
                        
                        <li class="nav-item  ">

                            <a href="{{ route('user.logout') }}" class="nav-link ">
                                      
                                        <i class="glyphicon glyphicon-off"></i>
                                        <span class="title">خروج</span>
                            </a>
                            
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>