@extends('layout')
@section('content')
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">{{ $title }}</h1>
        </div>
    </div>
    <div class="container-fluid my-5 pt-5">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-md-12 col-12 mb-5">
                    <div class="card border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                        <center>
                            <h1 class="mt-3">{{ $row->judul }}</h1>
                            <span>
                                <i class="fa fa-calendar"></i> {{ tanggal($row->tanggal) }}
                            </span>
                            <br>
                            <br>
                            <div>
                                <p>URL untuk dibagikan: {{ Request::url() }}</p>
                            </div>
                            <div>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                                    target="_blank" class="btn btn-primary">
                                    Bagikan di Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}&text={{ urlencode($row->judul) }}"
                                    target="_blank" class="btn btn-info">
                                    Bagikan di Twitter
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::url()) }}&title={{ urlencode($row->judul) }}&summary={{ urlencode(Str::limit($row->isiartikel, 100)) }}"
                                    target="_blank" class="btn btn-info">
                                    Bagikan di LinkedIn
                                </a>
                                <a href="https://www.instagram.com/?url={{ urlencode(Request::url()) }}" target="_blank"
                                    class="btn btn-danger">
                                    Bagikan di Instagram
                                </a>
                            </div>
                        </center>
                        <br>
                        <br>
                        <div class="row g-3">
                            <div class="col-md-3 col-12">
                            </div>
                            <div class="col-md-9 col-12">
                                <span style="text-align: justify" class="mt-2 text-dark">
                                    {!! $row->isiartikel !!}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Form Tambah Komentar -->
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Tambahkan Komentar</h5>
                            <form action="{{ url('komentartambah/' . $row->idartikel) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="content">Komentar</label>
                                    <textarea class="form-control" name="komentar" rows="3" required></textarea>
                                </div>
                                <input type="hidden" name="idartikel" value="{{ $row->idartikel }}">
                                <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                            </form>
                        </div>
                    </div>

                    <!-- Menampilkan Komentar -->
                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="card-title">Komentar</h5>
                            @foreach ($comments as $comment)
                                <div class="mb-3">
                                    <p>{{ $comment->komentar }}</p>
                                    <small class="text-muted">Ditulis oleh {{ $comment->nama }} pada
                                        {{ $comment->tanggalkomen }}</small>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            {{ $comments->links('pagination::bootstrap-5') }}
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
