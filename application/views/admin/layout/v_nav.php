<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('admin/dashboard')?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pengaduan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li <?=$tittle == 'dashboard' ? 'class="nav-item active"':'class="nav-item"'?>>
                <a class="nav-link" href="<?=base_url('admin/dashboard')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola User
            </div>

            <!-- Nav Item - Charts -->
            <li <?=$tittle == 'daftar_user' ? 'class="nav-item active"':'class="nav-item"'?>>
                <a class="nav-link" href="<?= base_url('admin/daftar_user')?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Pelanggan</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Data Keluhan
            </div>

            <!-- Nav Item - Charts -->
            <li <?=$tittle == 'daftar_keluhan' ? 'class="nav-item active"':'class="nav-item"'?> >
                <a class="nav-link" href="<?= base_url('admin/daftar_keluhan')?>">
                    <i class="fas fa-fw fa-sticky-note"></i>
                    <span>Data Keluhan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li <?=$tittle == 'daftar_kritik_saran' ? 'class="nav-item active"':'class="nav-item"'?>>
                <a class="nav-link" href="<?= base_url('admin/daftar_kritik_saran')?>">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Data Kritik & Saran</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Website
            </div>

            <!-- Nav Item - Charts -->
            <li <?=$tittle == 'daftar_kategori_berita' ? 'class="nav-item active"':'class="nav-item"'?>>
                <a class="nav-link" href="<?= base_url('admin/daftar_kategori_berita')?>">
                    <i class="fas fa-fw fa-tag"></i>
                    <span>Data Kategori Berita</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li <?=$tittle == 'daftar_berita' ? 'class="nav-item active"':'class="nav-item"'?>>
                <a class="nav-link" href="<?= base_url('admin/daftar_berita')?>">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Data Berita</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li <?=$tittle == 'daftar_galeri' ? 'class="nav-item active"':'class="nav-item"'?>>
                <a class="nav-link" href="<?= base_url('admin/daftar_galeri')?>">
                    <i class="fas fa-fw fa-file-image"></i>
                    <span>Data Galeri</span></a>
            </li>  

             <!-- Nav Item - Charts -->
            <li <?=$tittle == 'daftar_service' ? 'class="nav-item active"':'class="nav-item"'?>>
                <a class="nav-link" href="<?= base_url('admin/daftar_service')?>">
                    <i class="fas fa-fw fa-cube"></i>
                    <span>Data Layanan</span></a>
            </li>        

            <!-- Nav Item - Charts -->
            <li <?=$tittle == 'edit_about' ? 'class="nav-item active"':'class="nav-item"'?>>
                <a class="nav-link" href="<?= base_url('admin/edit_about')?>">
                    <i class="fas fa-fw fa-info"></i>
                    <span>About Us</span></a>
            </li>          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama_admin_pengaduan') ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url()?>template_admin/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->                