@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-3">{{ $title }}</h3>
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if(session('users')->level == 'Admin' or session('users')->level == 'Kepala Desa') {
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td>: <?= $row->nama ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>: <?= $row->email ?></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>: <?= $row->password ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
                            <?php
                            if(session('users')->level == 'Warga') {
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>NIK</td>
                                            <td><?= $row->nik ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. KK</td>
                                            <td><?= $row->nokk ?></td>
                                        </tr>
                                        <tr>
                                            <td width="200px" style="width: 200px !important">Nama</td>
                                            <td>: <?= $row->nama ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>: <?= $row->email ?></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>: <?= $row->password ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><?= $row->alamat ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td><?= tanggal($row->tanggallahir) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan Terakhir</td>
                                            <td><?= $row->pendidikanterakhir ?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td><?= $row->agama ?></td>
                                        </tr>
                                        <tr>
                                            <td>Foto Profil</td>
                                            <td><img src="{{ asset('foto/' . $row->fotoprofil) }}" width="150px"
                                                    style="border-radius:10px" alt=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
                            <a href="{{ url('panel/profiledit') }}" class="btn btn-warning pull-right" name="simpan"><i
                                    class="fa fa-edit"></i>
                                Edit Profil</a>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
