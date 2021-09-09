@extends('admin.main')

@section('body')
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
                                        @foreach ($list as $item)
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
                                                    @foreach ($list as $item)
                                                        <button type="button"
                                                            onclick="location.href='{{ route('edit-pengaju', $item->id) }}'"
                                                            class="btn mr-1 mb-1 btn-primary btn-sm">Edit</button>
                                                    @endforeach
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
@endsection
