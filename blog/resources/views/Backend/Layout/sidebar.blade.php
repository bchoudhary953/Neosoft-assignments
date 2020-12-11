<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{asset('Backend/img/AdminLTELogo.png')}}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin E-Commerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">




        <!-- Sidebar Menu -->
        <nav class="mt-2">


            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview">
                    <a href="{{url('/admin/dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/add-user" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/user_management" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>
                            Configuration management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/add-config" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Configuration</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/config_management" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Configuration</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Banner management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/add-banners" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/banners" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Banner</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/add-category" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/view-categories" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/add-product" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/view-products" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Product</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-gift"></i>
                        <p>
                            Coupon
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/add-coupon" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Coupon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/view-coupons" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Coupon</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="fab fa-first-order"></i>
                        <p>
                            Orders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/view-orders" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/pending-orders" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/delivered-orders" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Delivered Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/completed-orders" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Completed Order</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            CMS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/add-cms-page" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add CMS Pages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/view-cms-pages" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View CMS Pages</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/search-report" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Search report for sales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/search-registeredUser-report" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Search report for registered user</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/search-usedCoupon-report" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Search report for used coupon</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{url('/admin/contact-us')}}" class="nav-link">
                            <i class="nav-icon fas fa-question"></i>
                            <p>
                                Contact Us Messages
                            </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->


    </div>

    <!-- /.sidebar -->
</aside>
