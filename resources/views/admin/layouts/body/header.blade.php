 <header class="main-header">
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top pl-30">
                <!-- Sidebar toggle button-->
                <div>
                    <ul class="nav">
                        <li class="btn-group nav-item">
                            <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
                                <i class="nav-link-icon mdi mdi-menu"></i>
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
                                <i class="nav-link-icon mdi mdi-crop-free"></i>
                            </a>
                        </li>
                       
                    </ul>
                </div>

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <!-- full Screen -->
                        <li class="search-bar">
                            <div class="lookup lookup-circle lookup-right">
                                <input type="text" name="s">
                            </div>
                        </li>
                        <!-- Notifications -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="waves-effect waves-light rounded dropdown-toggle" data-toggle="dropdown" title="Notifications">
                                <i class="ti-bell"></i>
                            </a>
                            <ul class="dropdown-menu animated bounceIn">

                                <li class="header">
                                    <div class="p-20">
                                        <div class="flexbox">
                                            <div>
                                                <h4 class="mb-0 mt-0">Notifications</h4>
                                            </div>
                                            <div>
                                                <a href="#" class="text-danger">Clear All</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu sm-scrol">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
                                            </a>
                                        </li>
                                        
                                      
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all</a>
                                </li>
                            </ul>
                        </li>
                        @php
                            $user = DB::table('users')->where('id', Auth::user()->id)->first();
                        @endphp

                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
                                  <img class="avatar avatar-xxl avatar-bordered" src="{{ (!empty($user->image))? url('uploads/user_images/'.$user->image) : url('uploads/no_image.jpg') }}" alt="{{ $user->name }}" >
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="user-body">
                                    <a class="dropdown-item" href="{{ route('profile.view') }}"><i class="ti-user text-muted mr-2"></i> Profile</a>
                                 
                                    <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ti-lock text-muted mr-2"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        

                    </ul>
                </div>
            </nav>
        </header>
