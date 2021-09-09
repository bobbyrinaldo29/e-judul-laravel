@extends('admin.main')

@section('body')
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        @if (Auth::check())
            @if (session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">{{ $userCount }}</h2>
                                <p>Total User</p>
                            </div>
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-user text-primary font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">{{ $listCount }}</h2>
                                <p>Total Judul</p>
                            </div>
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-server text-success font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">{{ $pengajuCount }}</h2>
                                <p>Total Pengajuan</p>
                            </div>
                            <div class="avatar bg-rgba-danger p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-file-text text-danger font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">{{ $prodiCount }}</h2>
                                <p>Total Prodi</p>
                            </div>
                            <div class="avatar bg-rgba-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-info text-warning font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Dashboard Analytics end -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tahun Ajaran</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class=" justify-content-between mb-25">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="{{ route('tahun-ajaran') }}" method="POST">
                                        <div class="form-body">
                                            <div class="row">
                                                <table class="table table-striped mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tahun Ajaran</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        @foreach ($list as $item)
                                                            <tr>
                                                                <th>{{ $no }}</th>
                                                                <td>{{ $item->thn_ajaran }}</td>
                                                                <td>{{ $item->status == '1' ? 'Aktif' : 'Nonaktif' }}
                                                                </td>
                                                                <td><button type="button"
                                                                        onclick="location.href='{{ route('edit-tahun-ajaran', $id = $item->id) }}'"
                                                                        class="btn mr-1 mb-1 btn-primary btn-sm">Edit</button>
                                                                </td>
                                                            </tr>
                                                            <?php $no++; ?>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                &nbsp;
                                                <div class="col-12">
                                                    <div>
                                                        <h6>Tambah Tahun Ajaran :</h6>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-3 col-12">
                                                            @csrf
                                                            <input type="text" id="tahun-ajaran" name="thn_ajaran"
                                                                class="form-control" placeholder="ex: 2020/2021" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Column selectors with Export Options and print table -->
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pengajuan KP/TA/Skripsi</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Prodi</th>
                                            <th>Judul</th>
                                            <th>Pengajuan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengaju as $item)
                                            <tr>
                                                <td>{{ $item->nim }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->prodi }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->pengajuan }}</td>
                                                @if ($item->status == '1')
                                                    <td>
                                                        <div class="badge badge-pill badge-success badge-md mr-1 mb-1">
                                                            Diterima</div>
                                                    </td>
                                                @elseif ($item->status == '0')
                                                    <td>
                                                        <div class="badge badge-pill badge-warning badge-md mr-1 mb-1">
                                                            Diproses</div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="badge badge-pill badge-danger badge-md mr-1 mb-1">
                                                            Ditolak</div>
                                                    </td>
                                                @endif
                                                <td>
                                                        <button type="button"
                                                            onclick="location.href='{{ route('edit-pengaju', $item->id) }}'"
                                                            class="btn mr-1 mb-1 btn-primary btn-sm">Edit</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Column selectors with Export Options and print table -->
    @endif
@endsection
