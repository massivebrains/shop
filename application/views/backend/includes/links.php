<nav class="page-sidebar" data-pages="sidebar">

    <div class="sidebar-header">
        <img src="<?php echo base_url() ?>assets/backend/assets/img/logo.png" alt="logo" class="brand" width="78" height="22">
        <div class="sidebar-header-controls">

            <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
            </button>
        </div>
    </div>


    <div class="sidebar-menu">

        <ul class="menu-items">
            <li class="m-t-30 ">
                <a href="<?=site_url('backend/index') ?>" class="detailed">
                    <span class="title">Dashboard</span>
                    <span class="details"><?php echo date('j, F Y'); ?></span>
                </a>
                <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
            </li>
            <li class="">
                <a href="javascript:;"><span class="title">Catalogue</span>
                    <span class="arrow"></span></a>
                    <span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
                    <ul class="sub-menu">
                        <li>
                        <a href="<?=site_url('backend/products') ?>">Products</a>
                            <span class="icon-thumbnail">PR</span>
                        </li>
                        <li>
                            <a href="<?=site_url('backend/categories') ?>">Categories</a>
                            <span class="icon-thumbnail">CA</span>
                        </li>
                        <li>
                            <a href="<?=site_url('backend/subcategories') ?>">Sub - Categories</a>
                            <span class="icon-thumbnail">SC</span>
                        </li>
                        <li>
                             <a href="<?=site_url('backend/suppliers') ?>">Suppliers</a>
                            <span class="icon-thumbnail">SU</span>
                        </li>
                        <li>
                             <a href="<?=site_url('backend/pickup_stations') ?>">Pickup Stations</a>
                            <span class="icon-thumbnail">PS</span>
                        </li>

                    </ul>
                </li>
                <li class="">
                    <a href="<?=site_url('backend/orders') ?>" class="detailed">
                        <span class="title">Orders</span>
                        <span class="details">Count: <?=number_format(table_count(TABLE_ORDERS)) ?></span>
                    </a>
                    <span class="icon-thumbnail">OR</span>
                </li>
                <li class="">
                    <a href="javascript:;"><span class="title">Charges</span>
                        <span class="arrow"></span></a>
                        <span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?=site_url('backend/charges') ?>">Charges</a>
                                <span class="icon-thumbnail">CH</span>
                            </li>
                            <li>
                                <a href="#">Coupons</a>
                                <span class="icon-thumbnail">CO</span>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="javascript:;"><span class="title">Users</span>
                            <span class="arrow"></span></a>
                            <span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?=site_url('backend/users') ?>">Admins</a>
                                    <span class="icon-thumbnail">AD</span>
                                </li>
                                <li>
                                    <a href="<?=site_url('backend/customers') ?>">Customers</a>
                                    <span class="icon-thumbnail">CU</span>
                                </li>
                            </ul>
                        </li>

                        <li class="">
                            <a href="javascript:;"><span class="title">Reports</span>
                                <span class="arrow"></span></a>
                                <span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="#">Revenue</a>
                                        <span class="icon-thumbnail">RE</span>
                                    </li>
                                    <li>
                                        <a href="#">Refunds</a>
                                        <span class="icon-thumbnail">RF</span>
                                    </li>
                                    <li>
                                        <a href="#">Deliveries</a>
                                        <span class="icon-thumbnail">DL</span>
                                    </li>
                                    <li>
                                        <a href="#">Orders</a>
                                        <span class="icon-thumbnail">OR</span>
                                    </li>
                                    <li class="">
                                        <a href="javascript:;">
                                            <span class="title">Sales Items</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="#">Products</a>
                                                <span class="icon-thumbnail">PR</span>
                                            </li>
                                            <li>
                                                <a href="#">Categories</a>
                                                <span class="icon-thumbnail">CA</span>
                                            </li>
                                            <li>
                                                <a href="#">Sub Categories</a>
                                                <span class="icon-thumbnail">SC</span>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>


                            <li class="">
                                <a href="javascript:;"><span class="title">Utilities</span>
                                    <span class="arrow"></span></a>
                                    <span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="#">Database Backup</a>
                                            <span class="icon-thumbnail">DB</span>
                                        </li>
                                        <li>
                                            <a href="#">Activity Log</a>
                                            <span class="icon-thumbnail">AL</span>
                                        </li>
                                    </ul>
                                </li>

                                <li class="">
                                    <a href="#"><span class="title">Logout</span></a>
                                    <span class="icon-thumbnail"><i class="pg-power"></i></span>
                                </li>


                            </ul>
                            <div class="clearfix"></div>
                        </div>

                    </nav>
