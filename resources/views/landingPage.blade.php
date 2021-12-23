@include('partials/header')

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- coming soon flat design -->
                <section>
                    <div class="row d-flex vh-100 align-items-center justify-content-center">
                        <div class="col-xl-5 col-md-8 col-sm-10 col-12 px-md-0 px-2">
                            <div class="card text-center w-100 mb-0">
                                <div class="card-header justify-content-center pb-0">
                                    <div class="card-title">
                                        <h2 class="mb-0">Pengajuanmu Sudah Terkirim</h2>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-0">
                                        &nbsp;
                                        <img src="{{ asset('templates') }}/app-assets/images/pages/rocket.png" class="img-responsive block width-150 mx-auto" width="150" alt="bg-img">
                                        &nbsp;
                                        <p class="text-center">
                                            Selamat, Pengajuanmu akan diproses oleh kepala program studi, harap tunggu yaa.. kami akan mengirimkan pemberitahuan melalui email.
                                        </p>
                                        <div class="divider"><button class="btn btn-primary w-100" onclick="location.href='/'">Kembali ke halaman awal</button></div>
                                        <!--<button class="btn btn-success w-100" onclick="location.href='{{ route('generate-pdf') }}'">Print Bukti Pengajuan</button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ coming soon flat design -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('templates') }}/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('templates') }}/app-assets/vendors/js/coming-soon/jquery.countdown.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('templates') }}/app-assets/js/core/app-menu.js"></script>
    <script src="{{ asset('templates') }}/app-assets/js/core/app.js"></script>
    <script src="{{ asset('templates') }}/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('templates') }}/app-assets/js/scripts/pages/coming-soon.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>