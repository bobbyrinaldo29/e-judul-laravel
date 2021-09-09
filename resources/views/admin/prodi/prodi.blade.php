@extends('admin.main')

@section('body')
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Prodi</h4>
                        <button type="button" class="btn btn-primary mr-1 mb-1"
                            onclick="location.href='{{ route('add-prodi') }}'">Tambah
                            Prodi</button>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Prodi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $item->prodi }}</td>
                                                <td><button type="button"
                                                        onclick="location.href='/dataprodi/hapus/{{ $item->id }}'"
                                                        class="btn mr-1 mb-1 btn-danger btn-sm">Hapus</button>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->
@endsection
