@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <h3>{{ $title }}</h3>
            <h5 class="mb-3">Website Portal Berita</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-dark">VISI</h3>
                            <p class="text-jusfity">
                                It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                more-or-less normal distribution of letters, as opposed to using 'Content here, content
                                here', making it look like readable English
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-dark">MISI</h3>
                            <p class="text-jusfity">
                                It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                more-or-less normal distribution of letters, as opposed to using 'Content here, content
                                here', making it look like readable English
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                        if(session('users')->level == 'Admin' || session('users')->level == 'Kepala Desa') {
                        ?>
                <div class="col-md-4">
                    <a href="{{ url('panel/artikel') }}">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Jumlah Artikel</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $jumlahartikel }}</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="icon-list"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('panel/kategori') }}">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Jumlah Kategori</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $jumlahkategori }}</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="icon-note"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('panel/tag') }}">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Jumlah Tag</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $jumlahtag }}</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="icon-screen-tablet"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
                <?php
                        if(session('users')->level == 'Warga') {
                            ?>
                <?php } ?>
            </div>
        </div>
    </div>
@endsection
