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
                            <form method="post" action="{{ url('panel/profileditsimpan') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $row->nama }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $row->email }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" class="form-control" name="password"
                                            value="{{ $row->password }}" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" name="simpan">Simpan</button>
                                <br><br>
                            </form>
                            <?php } ?>
                            <?php
                            if(session('users')->level == 'Warga') {
                            ?>
                            <form method="post" action="{{ url('panel/profileditsimpan') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">NIK</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="number" class="form-control" name="nik"
                                            value="{{ $row->nik }}" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">No. KK</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="number" class="form-control" name="nokk"
                                            value="{{ $row->nokk }}" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $row->nama }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $row->email }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" class="form-control" name="password"
                                            value="{{ $row->password }}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea rows="5" class="form-control" name="alamat" required>{{ $row->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="date" class="form-control" name="tanggallahir"
                                            value="{{ $row->tanggallahir }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Pendidikan Terakhir</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select name="pendidikanterakhir" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            <option <?php if ($row->pendidikanterakhir == 'SD') {
                                                echo 'selected';
                                            } ?> value="SD">SD</option>
                                            <option <?php if ($row->pendidikanterakhir == 'SMP') {
                                                echo 'selected';
                                            } ?> value="SMP">SMP</option>
                                            <option <?php if ($row->pendidikanterakhir == 'SMA') {
                                                echo 'selected';
                                            } ?> value="SMA">SMA</option>
                                            <option <?php if ($row->pendidikanterakhir == 'D-III') {
                                                echo 'selected';
                                            } ?> value="D-III">D-III</option>
                                            <option <?php if ($row->pendidikanterakhir == 'D-IV') {
                                                echo 'selected';
                                            } ?> value="D-IV">D-IV</option>
                                            <option <?php if ($row->pendidikanterakhir == 'S1') {
                                                echo 'selected';
                                            } ?> value="S1">S1</option>
                                            <option <?php if ($row->pendidikanterakhir == 'S2') {
                                                echo 'selected';
                                            } ?> value="S2">S2</option>
                                            <option <?php if ($row->pendidikanterakhir == 'S3') {
                                                echo 'selected';
                                            } ?> value="S3">S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Agama</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select name="agama" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            <option <?php if ($row->agama == 'Islam') {
                                                echo 'selected';
                                            } ?> value="Islam">Islam</option>
                                            <option <?php if ($row->agama == 'Kristen Khatolik') {
                                                echo 'selected';
                                            } ?> value="Kristen Khatolik">Kristen Khatolik</option>
                                            <option <?php if ($row->agama == 'Kristen Protestan') {
                                                echo 'selected';
                                            } ?> value="Kristen Protestan">Kristen Protestan
                                            </option>
                                            <option <?php if ($row->agama == 'Budha') {
                                                echo 'selected';
                                            } ?> value="Budha">Budha</option>
                                            <option <?php if ($row->agama == 'Hindu') {
                                                echo 'selected';
                                            } ?> value="Hindu">Hindu</option>
                                            <option <?php if ($row->agama == 'Konghucu') {
                                                echo 'selected';
                                            } ?> value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Foto Profil</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" name="simpan">Simpan</button>
                                <br><br>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
