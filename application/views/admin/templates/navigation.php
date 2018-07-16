<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url()?>admin">Admin Panel</a>
            </div>

            <div class="header-right">
                <a href="<?php echo base_url()?>logout" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                Jhon Deo Alex
                            <br />
                                <small>Last Login : 2 Weeks Ago </small>
                            </div>
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="<?php echo base_url()?>admin"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Vendor <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url()?>admin/add_vendor">Add Vendor</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>admin/view_all_vendor"></i>View All Vendor</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Project<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url()?>admin/project/add_project">Add Project</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>admin/project/view_all_project"></i>View All Project</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Payment<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url();?>admin/payment/add_payment">Add Payment</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>admin/payment/view_all_payment"></i>View All Payment</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>admin/profile">Profile</a>
                    </li>
                </ul>

            </div>

        </nav>
    </div>
    <div id="wrapper">