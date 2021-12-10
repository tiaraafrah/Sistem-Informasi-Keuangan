<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            
            <!-- Sidebar - Brand -->

            <a class="sidebar-brand d-flex align-items-center justify-content-center">
            </a>

            <!-- Nav Item - Dashboard -->
             <div class="sidebar-heading">
                CORE
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('admin') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Pendapatan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data:</h6>
                        <a class="collapse-item" href="<?php echo site_url('admin/masuk/add') ?>">Input pendapatan</a>
                        <a class="collapse-item" href="<?php echo base_url();?>index.php/admin/masuk/">List pendapatan</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Pengeluaran</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data:</h6>
                        <a class="collapse-item" href="<?php echo site_url('admin/keluar/add') ?>">Input pengeluaran</a>
                        <a class="collapse-item" href="<?php echo base_url();?>index.php/admin/keluar/">List pengeluaran</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Report
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('admin/Laporan_masuk') ?>">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Laporan</span></a>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal" >
                    <i class="fas fa-fw fa-arrow-left"></i>
                    <span>Logout</span></a>
           
        </ul>
        <!-- End of Sidebar -->