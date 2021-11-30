<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>로얄 호텔 관리자</title>

    <!-- Custom fonts for this template-->
    <link href="/~team4/my/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/~team4/my/admin/css/sb-admin-2.min.css" rel="stylesheet">
	
    <link href="/~team4/my/admin/css/my.css" rel="stylesheet">

	<!-- datepicker style 날짜관련-->
	<script src="/~team4/my/admin/vendor/jquery/jquery.min.js"></script>
 	<script src="/~team4/my/admin/js/moment-with-locales.min.js"> </script>
	<script src="/~team4/my/admin/js/bootstrap-datetimepicker.js"></script>
	<link href="/~team4/my/admin/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<link href="/~team4/my/admin/css/fontawesome-all.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/~team4/admin">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-hotel"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Royal Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/~team4/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>관리자 메인</span>
				</a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="align-self:center; font-size: 16px; color: white">
                메뉴
            </div>

            <!-- Nav Item - MEMBER Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/~team4/member">
                    <i class="fas fa-user"></i>
                    <span>MEMBER</span>
                </a>
            </li>

            <!-- Nav Item - ROOM Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-bed"></i>
                    <span>ROOM</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Categories :</h6>
                        <a class="collapse-item" href="/~team4/roomType">방 종류</a>
                        <a class="collapse-item" href="/~team4/room">방 정보</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - BOOK Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/~team4/book">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>BOOK</span>
                </a>
            </li>

            <!-- Nav Item - GALLERY -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="tables.html" data-toggle="collapse" data-target="#collapseGallery"
                    aria-expanded="true" aria-controls="collapseGallery">
                    <i class="fas fa-fw fa-table"></i>
                    <span>GALLERY</span>
				</a>
				<div id="collapseGallery" class="collapse" aria-labelledby="headingGallery"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Categories :</h6>
                        <a class="collapse-item" href="/~team4/category">Gallery Category</a>
                        <a class="collapse-item" href="/~team4/gallery">Gallery</a>
                    </div>
                </div>
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

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="/~team4/my/admin/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/~team4/main">
                                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Go to Main
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
