   <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{!!asset('backend_assets/')!!}/images/users/1.jpg" alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Markarn Doe <span class="caret"></span></a>
                <div class="dropdown-menu animated flipInY">
                    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                    <div class="dropdown-divider"></div> <a href="" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                    <div class="dropdown-divider"></div> <a href="" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">PERSONAL</li>
                <li>
                    <a href="https://drive.google.com/drive/my-drive" aria-expanded="false"><i class="mdi mdi-castle"></i><span class="hide-menu">Quản trị</span></a>
                </li>    
                <li>
                    <a class="has-arrow " href="" aria-expanded="false"><i class="mdi mdi-buffer"></i><span class="hide-menu">Danh mục</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{!! route('category.index') !!}">Danh sách</a></li>
                        <li><a href="{!! route('category.create') !!}">Thêm danh mục</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="" aria-expanded="false"><i class="mdi mdi-newspaper"></i><span class="hide-menu">Tin tức</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{!! route('post.index') !!}">Danh sách</a></li>
                        <li><a href="{!! route('post.create') !!}">Thêm tin tức</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="" aria-expanded="false"><i class="mdi mdi-dribbble"></i><span class="hide-menu">Sản phẩm</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{!! route('product.index') !!}">Danh sách</a></li>
                        <li><a href="{!! route('product.index') !!}">Thêm sản phẩm</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Thành viên</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)">Danh sách</a></li>
                        <li><a href="javascript:void(0)">Thêm sản phẩm</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Multi level dd</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)">item 1.1</a></li>
                        <li><a href="javascript:void(0)">item 1.2</a></li>
                        <li>
                            <a class="has-arrow" href="" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)">item 1.3.1</a></li>
                                <li><a href="javascript:void(0)">item 1.3.2</a></li>
                                <li><a href="javascript:void(0)">item 1.3.3</a></li>
                                <li><a href="javascript:void(0)">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="">item 1.4</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>