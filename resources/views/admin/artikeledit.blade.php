@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-3">{{ $title }}</h3>
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('panel/artikeleditsimpan/' . $artikel->idartikel) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Judul</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" class="form-control" name="judul"
                                            value="{{ $artikel->judul }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select class="form-control" name="kategori" required>
                                            <option value="">Pilih kategori</option>
                                            @foreach ($kategori as $category)
                                                <option value="{{ $category->kategori }}"
                                                    {{ $artikel->kategori == $category->kategori ? 'selected' : '' }}>
                                                    {{ $category->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Isi</label>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea class="form-control" rows="5" id="isiartikel" name="isiartikel" required>{{ $artikel->isiartikel }}</textarea>
                                        <script>
                                            CKEDITOR.replace('isiartikel');
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tag</label>
                                    <div class="col-sm-12 col-md-10">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Pilih tag
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @php
                                                    $selectedTags = explode(',', $artikel->tag);
                                                @endphp
                                                @foreach ($tags as $tag)
                                                    <label class="dropdown-item">
                                                        <input type="checkbox" name="tag[]" value="{{ $tag->tag }}"
                                                            {{ in_array($tag->tag, $selectedTags) ? 'checked' : '' }}>
                                                        {{ $tag->tag }}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="date" class="form-control" name="tanggal"
                                            value="{{ $artikel->tanggal }}" required>
                                    </div>
                                </div>
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

@section('scripts')
    <style>
        .dropdown-menu {
            display: none;
            max-height: 300px;
            overflow-y: auto;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15);
        }

        .dropdown-menu.show {
            display: block;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownButton = document.getElementById('dropdownMenuButton');
            var dropdownMenu = document.querySelector('.dropdown-menu');

            dropdownButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('show');
            });

            document.addEventListener('click', function(event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>
@endsection
