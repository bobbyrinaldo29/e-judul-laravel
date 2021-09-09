@extends('admin.main')

@section('body')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Judul</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
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
                            <form class="form" action="{{ route('add-process') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="namaJudul">Nama Judul</label>
                                                    <input type="text" name="namaJudul" class="form-control" id="namaJudul"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="penulis">Penulis</label>
                                                    <input type="text" name="penulis" class="form-control" id="penulis"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="thn_ajaran">Tahun Ajaran</label>
                                                    <select class="custom-select" name="thn_ajaran_id" id="customSelect"
                                                        required>
                                                        @foreach ($thn as $item)
                                                            @if ($item->status == '1')
                                                                <option value="{{ $item->thn_ajaran }}">
                                                                    {{ $item->thn_ajaran }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="metode">Metode Penelitian</label>
                                                    <input type="text" name="metode" class="form-control" id="metode"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="shortDescription1">Abstrak :</label>
                                                    <textarea name="abstrak" id="abstrak" rows="8" class="form-control"
                                                        required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
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
