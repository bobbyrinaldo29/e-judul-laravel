@extends('admin.main')

@section('body')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Tahun Ajaran</h4>
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
                                @foreach ($tbl_ajaran as $item)
                                    <form action="{{ route('ajaran.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus data ini ?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Ya</button>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            @foreach ($tbl_ajaran as $item)
                                <form class="form" action="{{ route('thn-ajaran.process', $item->id) }}" method="POST">
                            @endforeach
                            @csrf
                            <div class="form-body">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="thn_ajaran">Tahun Ajaran</label>
                                                @foreach ($tbl_ajaran as $item)
                                                    <input type="text" name="thn_ajaran" class="form-control"
                                                        id="thn_ajaran" value="{{ $item->thn_ajaran }}" readonly>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="namaJudul">Status</label>
                                                <select class="custom-select" name="status" id="customSelect" required>
                                                    @foreach ($tbl_ajaran as $item)
                                                        <option selected>{{ $item->status == '1' ? 'Aktif' : 'Nonaktif' }}
                                                        </option>
                                                    @endforeach
                                                    <option value="1">Aktif
                                                    </option>
                                                    <option value="0">Nonaktif
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                </fieldset>
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
