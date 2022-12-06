<!--

=========================================================
* Volt Free - Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- Primary Meta Tags -->
  <title>Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Themesberg">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="120x120" href="../../img/phone/logo.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../img/phone/logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../img/phone/logo.png">
  <link rel="manifest" href="../assets/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="../../img/phone/logo.png" color="#ffffff">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <!-- Sweet Alert -->
  <link type="text/css" href="../vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

  <!-- Notyf -->
  <link type="text/css" href="../vendor/notyf/notyf.min.css" rel="stylesheet">

  <!-- Volt CSS -->
  <link type="text/css" href="../css/volt.css" rel="stylesheet">

  <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>

  <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

  <?php include "templates/connect.php" ?>
  <?php 
  session_start(); 
  $currentUserAdmin = $_SESSION['admin-user'];
  if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['admin-user']);
    header("Location: sign-in.php");
    } 

  if ($currentUserAdmin['MaQuyen'] == 1) { ?>
    
  
    <main class="content">
  <?php include "./components/header.php" ?>


    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
      <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
          <div class="d-flex align-items-center">
            <!-- Search form -->
            <form class="navbar-search form-inline" id="navbar-search-main">
              <div class="input-group input-group-merge search-bar">
                <span class="input-group-text" id="topbar-addon">
                  <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"></path>
                  </svg>
                </span>
                <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Search"
                  aria-label="Search" aria-describedby="topbar-addon">
              </div>
            </form>
            <!-- / Search form -->
          </div>
          <!-- Navbar links -->
          <div class="nav-item  ms-lg-3">
            <a class="nav-link pt-1 px-0" href="#" role="button" aria-expanded="false">
            <span class="mb-0 font-small fw-bold text-gray-900">Logout</span>
            </a>
          </div>
        </div>
    </nav>

    <div class="py-4">
      <div class="dropdown">
        <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle" data-bs-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          New Task
        </button>
        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
          <a class="dropdown-item d-flex align-items-center" href="#">
            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
              </path>
            </svg>
            Add User
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
              </path>
            </svg>
            Add Widget
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
              </path>
              <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
            </svg>
            Upload Files
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd"></path>
            </svg>
            Preview Security
          </a>
          <div role="separator" class="dropdown-divider my-1"></div>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                clip-rule="evenodd"></path>
            </svg>
            Upgrade to Pro
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 mb-4">
        <div class="card bg-yellow-100 border-0 shadow">
          <div class="card-header d-sm-flex flex-row align-items-center flex-0">
            <div class="d-block mb-3 mb-sm-0">
              <div class="fs-5 fw-normal mb-2">Sales Value</div>
              <h2 class="fs-3 fw-extrabold">$10,567</h2>
              <div class="small mt-2">
                <span class="fw-normal me-2">Yesterday</span>
                <span class="fas fa-angle-up text-success"></span>
                <span class="text-success fw-bold">10.57%</span>
              </div>
            </div>
            <div class="d-flex ms-auto">
              <a href="#" class="btn btn-secondary text-dark btn-sm me-2">Month</a>
              <a href="#" class="btn btn-dark btn-sm me-3">Week</a>
            </div>
          </div>
          <div class="card-body p-2">
            <div class="ct-chart-sales-value ct-double-octave ct-series-g"></div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <div class="row d-block d-xl-flex align-items-center">
              <div
                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                  <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                  </svg>
                </div>
                <div class="d-sm-none">
                  <h2 class="h5">Customers</h2>
                  <h3 class="fw-extrabold mb-1">345,678</h3>
                </div>
              </div>
              <div class="col-12 col-xl-7 px-xl-0">
                <div class="d-none d-sm-block">
                  <h2 class="h6 text-gray-400 mb-0">Customers</h2>
                  <h3 class="fw-extrabold mb-2">345k</h3>
                </div>
                <small class="d-flex align-items-center text-gray-500">
                  Feb 1 - Apr 1,
                  <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                      clip-rule="evenodd"></path>
                  </svg>
                  USA
                </small>
                <div class="small d-flex mt-1">
                  <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                    </svg><span class="text-success fw-bolder">22%</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <div class="row d-block d-xl-flex align-items-center">
              <div
                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                  <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                      clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="d-sm-none">
                  <h2 class="fw-extrabold h5">Revenue</h2>
                  <h3 class="mb-1">$43,594</h3>
                </div>
              </div>
              <div class="col-12 col-xl-7 px-xl-0">
                <div class="d-none d-sm-block">
                  <h2 class="h6 text-gray-400 mb-0">Revenue</h2>
                  <h3 class="fw-extrabold mb-2">$43,594</h3>
                </div>
                <small class="d-flex align-items-center text-gray-500">
                  Feb 1 - Apr 1,
                  <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                      clip-rule="evenodd"></path>
                  </svg>
                  GER
                </small>
                <div class="small d-flex mt-1">
                  <div>Since last month <svg class="icon icon-xs text-danger" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                    </svg><span class="text-danger fw-bolder">2%</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <div class="row d-block d-xl-flex align-items-center">
              <div
                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                  <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                      clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="d-sm-none">
                  <h2 class="fw-extrabold h5"> Bounce Rate</h2>
                  <h3 class="mb-1">50.88%</h3>
                </div>
              </div>
              <div class="col-12 col-xl-7 px-xl-0">
                <div class="d-none d-sm-block">
                  <h2 class="h6 text-gray-400 mb-0"> Bounce Rate</h2>
                  <h3 class="fw-extrabold mb-2">50.88%</h3>
                </div>
                <small class="text-gray-500">
                  Feb 1 - Apr 1
                </small>
                <div class="small d-flex mt-1">
                  <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                    </svg><span class="text-success fw-bolder">4%</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-xl-8">
        <div class="row">
          <div class="col-12 mb-4">
            <div class="card border-0 shadow">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <h2 class="fs-5 fw-bold mb-0">Page visits</h2>
                  </div>
                  <div class="col text-end">
                    <a href="#" class="btn btn-sm btn-primary">See all</a>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th class="border-bottom" scope="col">Page name</th>
                      <th class="border-bottom" scope="col">Page Views</th>
                      <th class="border-bottom" scope="col">Page Value</th>
                      <th class="border-bottom" scope="col">Bounce rate</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th class="text-gray-900" scope="row">
                        /demo/admin/index.html
                      </th>
                      <td class="fw-bolder text-gray-500">
                        3,225
                      </td>
                      <td class="fw-bolder text-gray-500">
                        $20
                      </td>
                      <td class="fw-bolder text-gray-500">
                        <div class="d-flex">
                          <svg class="icon icon-xs text-danger me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                              d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path>
                          </svg>
                          42,55%
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-gray-900" scope="row">
                        /demo/admin/forms.html
                      </th>
                      <td class="fw-bolder text-gray-500">
                        2,987
                      </td>
                      <td class="fw-bolder text-gray-500">
                        0
                      </td>
                      <td class="fw-bolder text-gray-500">
                        <div class="d-flex">
                          <svg class="icon icon-xs text-success me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                              d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                              clip-rule="evenodd"></path>
                          </svg>
                          43,24%
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-gray-900" scope="row">
                        /demo/admin/util.html
                      </th>
                      <td class="fw-bolder text-gray-500">
                        2,844
                      </td>
                      <td class="fw-bolder text-gray-500">
                        294
                      </td>
                      <td class="fw-bolder text-gray-500">
                        <div class="d-flex">
                          <svg class="icon icon-xs text-success me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                              d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                              clip-rule="evenodd"></path>
                          </svg>
                          32,35%
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-gray-900" scope="row">
                        /demo/admin/validation.html
                      </th>
                      <td class="fw-bolder text-gray-500">
                        2,050
                      </td>
                      <td class="fw-bolder text-gray-500">
                        $147
                      </td>
                      <td class="fw-bolder text-gray-500">
                        <div class="d-flex">
                          <svg class="icon icon-xs text-danger me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                              d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path>
                          </svg>
                          50,87%
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-gray-900" scope="row">
                        /demo/admin/modals.html
                      </th>
                      <td class="fw-bolder text-gray-500">
                        1,483
                      </td>
                      <td class="fw-bolder text-gray-500">
                        $19
                      </td>
                      <td class="fw-bolder text-gray-500">
                        <div class="d-flex">
                          <svg class="icon icon-xs text-success me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                              d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                              clip-rule="evenodd"></path>
                          </svg>
                          26,12%
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-4">
        <div class="col-12 px-0 mb-4">
          <div class="card border-0 shadow">
            <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
              <div class="d-block">
                <div class="h6 fw-normal text-gray mb-2">Total orders</div>
                <h2 class="h3 fw-extrabold">452</h2>
                <div class="small mt-2">
                  <span class="fas fa-angle-up text-success"></span>
                  <span class="text-success fw-bold">18.2%</span>
                </div>
              </div>
              <div class="d-block ms-auto">
                <div class="d-flex align-items-center text-end mb-2">
                  <span class="dot rounded-circle bg-gray-800 me-2"></span>
                  <span class="fw-normal small">July</span>
                </div>
                <div class="d-flex align-items-center text-end">
                  <span class="dot rounded-circle bg-secondary me-2"></span>
                  <span class="fw-normal small">August</span>
                </div>
              </div>
            </div>
            <div class="card-body p-2">
              <div class="ct-chart-ranking ct-golden-section ct-series-a"></div>
            </div>
          </div>
        </div>
        <div class="col-12 px-0 mb-4">
          <div class="card border-0 shadow">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between border-bottom pb-3">
                <div>
                  <div class="h6 mb-0 d-flex align-items-center">
                    <svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                        clip-rule="evenodd"></path>
                    </svg>
                    Global Rank
                  </div>
                </div>
                <div>
                  <a href="#" class="d-flex align-items-center fw-bold">
                    #755
                    <svg class="icon icon-xs text-gray-500 ms-1" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </a>
                </div>
              </div>
              <div class="d-flex align-items-center justify-content-between border-bottom py-3">
                <div>
                  <div class="h6 mb-0 d-flex align-items-center">
                    <svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                        clip-rule="evenodd"></path>
                    </svg>
                    Country Rank
                  </div>
                  <div class="small card-stats">
                    United States
                    <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </div>
                </div>
                <div>
                  <a href="#" class="d-flex align-items-center fw-bold">
                    #32
                    <svg class="icon icon-xs text-gray-500 ms-1" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </a>
                </div>
              </div>
              <div class="d-flex align-items-center justify-content-between pt-3">
                <div>
                  <div class="h6 mb-0 d-flex align-items-center">
                    <svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                        clip-rule="evenodd"></path>
                      <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"></path>
                    </svg>
                    Category Rank
                  </div>
                  <div class="small card-stats">
                    Computers Electronics > Technology
                    <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </div>
                </div>
                <div>
                  <a href="#" class="d-flex align-items-center fw-bold">
                    #11
                    <svg class="icon icon-xs text-gray-500 ms-1" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 px-0">
          <div class="card border-0 shadow">
            <div class="card-body">
              <h2 class="fs-5 fw-bold mb-1">Acquisition</h2>
              <p>Tells you where your visitors originated from, such as search engines, social networks or website
                referrals.</p>
              <div class="d-block">
                <div class="d-flex align-items-center me-5">
                  <div class="icon-shape icon-sm icon-shape-danger rounded me-3">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11 4a1 1 0 10-2 0v4a1 1 0 102 0V7zm-3 1a1 1 0 10-2 0v3a1 1 0 102 0V8zM8 9a1 1 0 00-2 0v2a1 1 0 102 0V9z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <div class="d-block">
                    <label class="mb-0">Bounce Rate</label>
                    <h4 class="mb-0">33.50%</h4>
                  </div>
                </div>
                <div class="d-flex align-items-center pt-3">
                  <div class="icon-shape icon-sm icon-shape-purple rounded me-3">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                      </path>
                    </svg>
                  </div>
                  <div class="d-block">
                    <label class="mb-0">Sessions</label>
                    <h4 class="mb-0">9,567</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="theme-settings card bg-gray-800 pt-2 collapse" id="theme-settings">
      <div class="card-body bg-gray-800 text-white pt-4">
        <button type="button" class="btn-close theme-settings-close" aria-label="Close" data-bs-toggle="collapse"
          href="#theme-settings" role="button" aria-expanded="false" aria-controls="theme-settings"></button>
        <div class="d-flex justify-content-between align-items-center mb-3">
          <p class="m-0 mb-1 me-4 fs-7">Open source <span role="img" aria-label="gratitude">💛</span></p>
          <a class="github-button" href="https://github.com/themesberg/volt-bootstrap-5-dashboard"
            data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star"
            data-size="large" data-show-count="true"
            aria-label="Star themesberg/volt-bootstrap-5-dashboard on GitHub">Star</a>
        </div>
        <a href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard" target="_blank"
          class="btn btn-secondary d-inline-flex align-items-center justify-content-center mb-3 w-100">
          Download
          <svg class="icon icon-xs ms-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z"
              clip-rule="evenodd"></path>
          </svg>
        </a>
        <p class="fs-7 text-gray-300 text-center">Available in the following technologies:</p>
        <div class="d-flex justify-content-center">
          <a class="me-3" href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard"
            target="_blank">
            <img src="../../assets/img/technologies/bootstrap-5-logo.svg" class="image image-xs">
          </a>
          <a href="https://demo.themesberg.com/volt-react-dashboard/#/" target="_blank">
            <img src="../../assets/img/technologies/react-logo.svg" class="image image-xs">
          </a>
        </div>
      </div>
    </div>

    <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
      <div class="row">
        <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
          <p class="mb-0 text-center text-lg-start">© 2019-<span class="year"></span> <a
              class="text-primary fw-normal" href="https://themesberg.com" target="_blank">Themesberg</a></p>
        </div>
        <div class="col-12 col-md-8 col-xl-6 text-end text-end">
          <!-- List -->
          Remake by 3TN Store
        </div>
      </div>
    </footer>
  </main>

  <?php } else {
    echo "<main class=''>
    <div class='mt-5 w-100 h-100'>
    <h1 class='text-center'>Thông báo</h1>
    <h4 class='mt-4 text-center'>Bạn không có quyền vào trang này!</h4>
    <div class='mt-4 d-flex justify-content-center'>
      <a href='../../index.php' class='btn btn-primary'>Quay lại</a>
    </div>
  </div>
    </main>";
   }?>
  <!-- Core -->
  <script src="../vendor/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../vendor/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Vendor JS -->
  <script src="../vendor/onscreen/dist/on-screen.umd.min.js"></script>

  <!-- Slider -->
  <script src="../vendor/nouislider/distribute/nouislider.min.js"></script>

  <!-- Smooth scroll -->
  <script src="../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

  <!-- Charts -->
  <script src="../vendor/chartist/dist/chartist.min.js"></script>
  <script src="../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

  <!-- Datepicker -->
  <script src="../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

  <!-- Sweet Alerts 2 -->
  <script src="../vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <!-- Moment JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

  <!-- Vanilla JS Datepicker -->
  <script src="../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

  <!-- Notyf -->
  <script src="../vendor/notyf/notyf.min.js"></script>

  <!-- Simplebar -->
  <script src="../vendor/simplebar/dist/simplebar.min.js"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Volt JS -->
  <script src="../assets/js/volt.js"></script>


</body>

</html>