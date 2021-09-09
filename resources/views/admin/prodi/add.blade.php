@extends('admin.main')

@section('body')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Prodi</h4>
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
                            <form class="form" action="{{ route('prodi-process') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Prodi: </label>
                                                <div class="form-group">
                                                    <select class="custom-select" name="prodi" id="customSelect" required>
                                                        <option value="IF-S1" selected>Teknik Informatika - S1</option>
                                                        <option value="IF-D3">Teknik Informatika - D3
                                                        </option>
                                                        <option value="MI-D3">Manajemen Informatika - D3
                                                        </option>
                                                        <option value="KA-D3">Komputerisasi Akuntansi - D3
                                                        </option>
                                                    </select>
                                                </div>
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
