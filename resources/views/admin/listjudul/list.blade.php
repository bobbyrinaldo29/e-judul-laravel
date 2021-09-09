@extends('admin.main')

@section('body')
    <!-- Column selectors with Export Options and print table -->
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Judul KP/TA/Skripsi</h4>
                        <button type="button" class="btn btn-primary mr-1 mb-1"
                            onclick="location.href='{{ route('add-list') }}'">Tambah
                            Judul</button>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors">
                                    <thead>
                                        <tr>
                                            <th>Nama Judul</th>
                                            <th>Penulis</th>
                                            <th>Metode</th>
                                            <th>Tahun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $item)
                                            <tr>
                                                <td>{{ $item->namaJudul }}</td>
                                                <td>{{ $item->penulis }}</td>
                                                <td>{{ $item->metode }}</td>
                                                <td>{{ $item->thn_ajaran_id }}</td>
                                                <td><button type="button"
                                                        onclick="location.href='{{ route('edit-listjudul', $item->id) }}'"
                                                        class="btn btn-primary mr-1 mb-1">Ubah</button></td>
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
@endsection
