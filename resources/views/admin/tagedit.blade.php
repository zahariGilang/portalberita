@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-3">{{ $title }}</h3>
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('panel/tageditsimpan/' . $tag->idtag) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tag</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" class="form-control" name="tag"
                                            value="{{ $tag->tag }}" required>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Isi</label>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi" required></textarea>
                                        <script>
                                            CKEDITOR.replace('deskripsi');
                                        </script>
                                    </div>
                                </div> --}}

                                <button type="submit" class="btn btn-success pull-right" name="simpan">Simpan</button>
                                <br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
