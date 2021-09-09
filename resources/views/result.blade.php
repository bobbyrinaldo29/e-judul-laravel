@include('partials/header')

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand"
                        href="{{ asset('templates') }}/html/ltr/horizontal-menu-template/index.html">
                        <div>STMIK MI</div>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i
                                    class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <form action="/search" method="POST">
                                    <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="input" type="text" placeholder="Explore E Judul" tabindex="-1">
                                    <div class="search-input-close"><i class="feather icon-x"></i></div>
                                </form>
                                <ul class="search-list search-list-main"></ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Table Hover Animation start -->
                <div class="row" id="table-hover-animation">
                    <div class="col-12">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Danger</h4>
                                <p class="mb-0">
                                    <li>{{ $error }}</li>
                                </p>
                            </div>
                        @endforeach
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Hasil Pencarian '{{ $keyword }}'</h4>
                                <button type="button" class="btn btn-primary mr-1 mb-1" data-toggle="modal"
                                    data-target="#inlineForm">Ajukan Judul</button>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Judul</th>
                                                    <th scope="col">Nama Penulis</th>
                                                    <th scope="col">Metode</th>
                                                    <th scope="col">Tahun</th>
                                                    <th scope="col">Persentase Kemiripan Judul</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($result as $item)
                                                    <tr>
                                                        <th scope="row">{{ $no }}</th>
                                                        <td>{{ $item->namaJudul }}</td>
                                                        <td>{{ $item->penulis }}</td>
                                                        <td>{{ $item->metode }}</td>
                                                        <td>{{ $item->thn_ajaran_id }}</td>
                                                        <td>{{ $perc }} %</td>
                                                    </tr>
                                                    <?php $no++; ?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table head options end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Modal-->
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Form Pengajuan Judul KP/TA/Skirpsi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pengajuan-process') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="divider">
                            <div class="divider-text">Form Data Diri</div>
                        </div>
                        <label>NIM: </label>
                        <div class="form-group">
                            <input type="text" name="nim" placeholder="NIM" class="form-control" required>
                        </div>
                        <label>Nama Mahasiswa: </label>
                        <div class="form-group">
                            <input type="text" name="nama" placeholder="Nama Mahasiswa" class="form-control" required>
                        </div>
                        <label>Prodi: </label>
                        <div class="form-group">
                            <select class="custom-select" name="prodi" id="customSelect" required>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->prodi }}">{{ $item->prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label>Alamat Email: </label>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Alamat Email" class="form-control" required>
                        </div>
                        <div class="divider">
                            <div class="divider-text">Form Pengajuan</div>
                        </div>
                        <label>Judul KP/TA/Skripsi: </label>
                        <div class="form-group">
                            <input type="text" name="judul" placeholder="Judul KP/TA/Skripsi" class="form-control"
                                required>
                        </div>
                        <label>Pengajuan: </label>
                        <div class="form-group">
                            <select class="custom-select" name="pengajuan" id="customSelect" required>
                                <option selected>Pilih Pengajuan</option>
                                <option value="KP">Kerja Praktek</option>
                                <option value="TA">Tugas Akhir</option>
                                <option value="SKRIPSI">Skripsi</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('partials/footer')
    @include('partials/js')
