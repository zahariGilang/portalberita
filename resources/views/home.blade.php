@extends('layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <a class="btn btn-primary mb-3" href="{{ url('admin/kegiatantambah') }}">Tambah Data</a>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Judul</th>
                                                    <th>Tanggal</th>
                                                    <th>Deskripsi</th>
                                                    <th>Foto</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>asdasd</td>
                                                    <td>asdas</td>
                                                    <td>asdsd</td>
                                                    <td>asdads</td>
                                                    <td>
                                                        <a class="btn btn-primary" href="#">Edit</a>
                                                        <a class="btn btn-danger" href="#">Hapus</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
