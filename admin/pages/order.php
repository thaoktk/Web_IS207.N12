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
    <title>Admin</title>
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
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


    <?php include "./components/header.php" ?>

    <main class="content">

        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <!-- Search form -->
                        <form class="navbar-search form-inline" id="navbar-search-main">
                            <div class="input-group input-group-merge search-bar">
                                <span class="input-group-text" id="topbar-addon">
                                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
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
                    <div class="nav-item  ms-lg-3">
                        <a class="nav-link pt-1 px-0" href="#" role="button" aria-expanded="false">
                        <span class="mb-0 font-small fw-bold text-gray-900">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="py-4">
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Đơn hàng</h1>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start">#</th>
                                <th class="border-0">Traffic Source</th>
                                <th class="border-0">Source Type</th>
                                <th class="border-0">Category</th>
                                <th class="border-0">Global Rank</th>
                                <th class="border-0">Traffic Share</th>
                                <th class="border-0 rounded-end">Change</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Item -->
                            <tr>
                                <td><a href="#" class="text-primary fw-bold">1</a> </td>
                                <td class="fw-bold d-flex align-items-center">
                                    <svg class="icon icon-xxs text-gray-500 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Direct
                                </td>
                                <td>
                                    Direct
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    --
                                </td>
                                <td>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-12 col-xl-2 px-0">
                                            <div class="small fw-bold">51%</div>
                                        </div>
                                        <div class="col-12 col-xl-10 px-0 px-xl-1">
                                            <div class="progress progress-lg mb-0">
                                                <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="51"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 51%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-success">
                                    <div class="d-flex align-items-center">
                                        <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="fw-bold">2.45%</span>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->

                            <!-- Item -->
                            <tr>
                                <td><a href="#" class="text-primary fw-bold">2</a> </td>
                                <td class="fw-bold d-flex align-items-center">
                                    <svg class="icon icon-xxs text-gray-500 me-2" aria-hidden="true" focusable="false"
                                        data-prefix="fab" data-icon="google" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512">
                                        <path fill="currentColor"
                                            d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                                        </path>
                                    </svg>
                                    Google Search
                                </td>
                                <td>
                                    Search / Organic
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    --
                                </td>
                                <td>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-12 col-xl-2 px-0">
                                            <div class="small fw-bold">18%</div>
                                        </div>
                                        <div class="col-12 col-xl-10 px-0 px-xl-1">
                                            <div class="progress progress-lg mb-0">
                                                <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="18"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 18%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-success">
                                    <div class="d-flex align-items-center">
                                        <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="fw-bold">17.78%</span>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->

                            <!-- Item -->
                            <tr>
                                <td><a href="#" class="text-primary fw-bold">3</a> </td>
                                <td class="fw-bold d-flex align-items-center">
                                    <svg class="icon icon-xxs text-gray-500 me-2" aria-hidden="true" focusable="false"
                                        data-prefix="fab" data-icon="youtube" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor"
                                            d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                                        </path>
                                    </svg>
                                    youtube.com
                                </td>
                                <td>
                                    Social
                                </td>
                                <td>
                                    <a class="small fw-bold" href="#">Arts and Entertainment</a>
                                </td>
                                <td>
                                    #2
                                </td>
                                <td>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-12 col-xl-2 px-0">
                                            <div class="small fw-bold">18%</div>
                                        </div>
                                        <div class="col-12 col-xl-10 px-0 px-xl-1">
                                            <div class="progress progress-lg mb-0">
                                                <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="18"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 18%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    -
                                </td>
                            </tr>
                            <!-- End of Item -->

                            <!-- Item -->
                            <tr>
                                <td><a href="#" class="text-primary fw-bold">4</a> </td>
                                <td class="fw-bold d-flex align-items-center">
                                    <svg class="icon icon-xxs text-gray-500 me-2" aria-hidden="true" focusable="false"
                                        data-prefix="fab" data-icon="yahoo" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M223.69,141.06,167,284.23,111,141.06H14.93L120.76,390.19,82.19,480h94.17L317.27,141.06Zm105.4,135.79a58.22,58.22,0,1,0,58.22,58.22A58.22,58.22,0,0,0,329.09,276.85ZM394.65,32l-93,223.47H406.44L499.07,32Z">
                                        </path>
                                    </svg>
                                    yahoo.com
                                </td>
                                <td>
                                    Referral
                                </td>
                                <td>
                                    <a class="small fw-bold" href="#">News and Media</a>
                                </td>
                                <td>
                                    #11
                                </td>
                                <td>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-12 col-xl-2 px-0">
                                            <div class="small fw-bold">8%</div>
                                        </div>
                                        <div class="col-12 col-xl-10 px-0 px-xl-1">
                                            <div class="progress progress-lg mb-0">
                                                <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="8"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 8%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-danger">
                                    <div class="d-flex align-items-center">
                                        <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="fw-bold">9.45%</span>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->

                            <!-- Item -->
                            <tr>
                                <td><a href="#" class="text-primary fw-bold">5</a> </td>
                                <td class="fw-bold d-flex align-items-center">
                                    <svg class="icon icon-xxs text-gray-500 me-2" aria-hidden="true" focusable="false"
                                        data-prefix="fab" data-icon="twitter" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                        </path>
                                    </svg>
                                    twitter.com
                                </td>
                                <td>
                                    Social
                                </td>
                                <td>
                                    <a class="small fw-bold" href="#">Social Networks</a>
                                </td>
                                <td>
                                    #4
                                </td>
                                <td>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-12 col-xl-2 px-0">
                                            <div class="small fw-bold">4%</div>
                                        </div>
                                        <div class="col-12 col-xl-10 px-0 px-xl-1">
                                            <div class="progress progress-lg mb-0">
                                                <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="4"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 4%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    -
                                </td>
                            </tr>
                            <!-- End of Item -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

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