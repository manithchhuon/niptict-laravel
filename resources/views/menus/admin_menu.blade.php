<!-- Alternative Sidebar -->
        <div id="sidebar-alt">
            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-alt-scroll">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Messages -->
                    <a href="page_ready_inbox.html" class="sidebar-title">
                        <i class="fa fa-envelope pull-right"></i> <strong>Messages</strong>UI (5)
                    </a>
                    <div class="sidebar-section">
                        <div class="alert alert-alt">
                            Debra Stanley<small class="pull-right">just now</small><br>
                            <a href="page_ready_inbox_message.html"><strong>New Follower</strong></a>
                        </div>
                        <div class="alert alert-alt">
                            Sarah Cole<small class="pull-right">2 min ago</small><br>
                            <a href="page_ready_inbox_message.html"><strong>Your subscription was updated</strong></a>
                        </div>
                        <div class="alert alert-alt">
                            Bryan Porter<small class="pull-right">10 min ago</small><br>
                            <a href="page_ready_inbox_message.html"><strong>A great opportunity</strong></a>
                        </div>
                        <div class="alert alert-alt">
                            Jose Duncan<small class="pull-right">30 min ago</small><br>
                            <a href="page_ready_inbox_message.html"><strong>Account Activation</strong></a>
                        </div>
                        <div class="alert alert-alt">
                            Henry Ellis<small class="pull-right">40 min ago</small><br>
                            <a href="page_ready_inbox_message.html"><strong>You reached 10.000 Followers!</strong></a>
                        </div>
                    </div>
                    <!-- END Messages -->
                </div>
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Alternative Sidebar -->

        <!-- Main Sidebar -->
        <div id="sidebar">
            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-scroll">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Brand -->
                    <a href="index.html" class="sidebar-brand">
                        <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Pro</strong>UI</span>
                    </a>
                    <!-- END Brand -->

                    <!-- User Info -->
                    <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                        <div class="sidebar-user-avatar">
                            <a href="page_ready_user_profile.html">
                                <img src={{asset('storage/'.\Auth::user()->url_image)}} alt="avatar">
                            </a>
                        </div>
                        <div class="sidebar-user-name">{{Auth::user()->name}}</div>
                        <div class="sidebar-user-links">
                            <a href="page_ready_user_profile.html" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                            <a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                            <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                            <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>
                            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                    <!-- END User Info -->

                    <!-- Sidebar Navigation -->
                    <ul class="sidebar-nav">
                        <li>
                            <a href="#" class="active"><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                        </li>
                       
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Design Kit</span>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">User Management</span></a>
                            <ul>
                                <li>
                                    <a href="{{route('register')}}">New User</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('category.index')}}"><i class="fa fa-list sidebar-nav-icon"></i><span>Category</span></a>
                        </li>
                        <li>
                            <a href="{{route('product.index')}}"><i class="fa fa-cart-plus sidebar-nav-icon"></i><span>Product</span></a>
                        </li>
                        <li>
                            <a href="{{route('role.index')}}"><i class="fa fa-user-circle sidebar-nav-icon"></i><span>Role</span></a>
                        </li>
                        <!--li>
                            <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-wrench sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Components</span></a>
                            <ul>
                                <li>
                                    <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>3 Level Menu</a>
                                    <ul>
                                        <li>
                                            <a href="#">Link 1</a>
                                        </li>
                                        <li>
                                            <a href="#">Link 2</a>
                                        </li>
                                    </ul>
                                </li>
                                
                            </ul>
                        </li-->
                    </ul>
                    <!-- END Sidebar Navigation -->

                    <!-- Sidebar Notifications -->
                    <div class="sidebar-header sidebar-nav-mini-hide">
                        <span class="sidebar-header-options clearfix">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
                        </span>
                        <span class="sidebar-header-title">Activity</span>
                    </div>
                    <div class="sidebar-section sidebar-nav-mini-hide">
                        <div class="alert alert-success alert-alt">
                            <small>5 min ago</small><br>
                            <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                        </div>
                        <div class="alert alert-info alert-alt">
                            <small>10 min ago</small><br>
                            <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                        </div>
                        <div class="alert alert-warning alert-alt">
                            <small>3 hours ago</small><br>
                            <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in use</strong> 2GB left
                        </div>
                        <div class="alert alert-danger alert-alt">
                            <small>Yesterday</small><br>
                            <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)"><strong>New bug submitted</strong></a>
                        </div>
                    </div>
                    <!-- END Sidebar Notifications -->
                </div>
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Main Sidebar -->