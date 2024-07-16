@extends('layout')
@section('content')
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">{{ $title }}</h1>

        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-5 mb-4">Daftar Akun</h1>
                    <form method="post" action="{{ url('daftarsimpan') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-3">
                            <label class="col-sm-12 col-md-4 col-form-label">Nama</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-12 col-md-4 col-form-label">Email</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-12 col-md-4 col-form-label">Password</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success float-end" name="simpan">Daftar</button>
                        <br><br>
                        <center>
                            <a href="{{ url('loginakun') }}">Sudah punya akun ? Login sekarang</a>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
