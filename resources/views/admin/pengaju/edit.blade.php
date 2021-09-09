@extends('admin.main')

@section('body')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Pengajuan Mahasiswa</h4>
                        <button type="button" class="btn btn-danger mr-1 mb-1" data-toggle="modal"
                            data-target="#exampleModalCenter">Delete</button>
                    </div><br>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Peringatan!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/editpengajuan/delete/" method="GET">
                                    @csrf
                                    <div class="modal-body">
                                        <p>Yakin ingin menghapus data ini ?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Ya</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </form>

                    <div class="card-content">
                        <div class="card-body">
                            @foreach ($pengaju as $item)
                                <form class="form" action="{{ route('pengaju.process', $item->id) }}" method="POST">
                            @endforeach
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    @foreach ($pengaju as $item)
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="nim-column" class="form-control" name="nim"
                                                    value="{{ $item->nim }}" readonly>
                                                <label for="first-name-column">NIM</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="nama-column" class="form-control"
                                                    value="{{ $item->nama }}" name="nama" readonly>
                                                <label for="last-name-column">Nama Mahasiswa</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="jurusan-column" class="form-control"
                                                    value="{{ $item->prodi }}" name="jurusan" readonly>
                                                <label for="jurusan-column">Program Studi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="noTlp-floating" class="form-control" name="email"
                                                    value="{{ $item->email }}" readonly>
                                                <label for="noTlp-floating">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="pengajuan-column" class="form-control"
                                                    name="pengajuan" value="{{ $item->pengajuan }}" readonly>
                                                <label for="pengajuan-column">Mengajukan</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="email" id="judul-column" class="form-control" name="judul"
                                                    value="{{ $item->judul }}" readonly>
                                                <label for="judul-column">Judul Yang Diajukan</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="status">
                                                    @foreach ($pengaju as $p)
                                                        @if ($p->status == '1')
                                                            <option selected>Diterima</option>
                                                        @elseif ($p->status == '0')
                                                            <option selected>Diproses</option>
                                                        @elseif ($p->status == '2')
                                                            <option selected>Ditolak</option>
                                                        @endif
                                                        </option>
                                                        <option value="1">Diterima
                                                        </option>
                                                        <option value="2">Ditolak
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                            <label for="status-column">Judul Yang Diajukan</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="divider">
                                    <div class="divider-text"></div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="shortDescription1">Saran Bagi Mahasiswa :</label>
                                        @foreach ($pengaju as $i)
                                        <textarea id="saran" name="saran" rows="8" class="form-control">{{ $i->saran }}</textarea>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Floating Label Form section end -->
@endsection
