@extends('layout')
@section('content')
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">{{ $title }}</h1>

        </div>
    </div>
    <div class="container-fluid my-5 pt-5">
        <div class="container pt-5">
            <form method="get" action="{{ url('artikeldaftarcari') }}">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-4">
                            <input type="text" name="keyword" class="form-control"
                                placeholder="Masukkan keyword pencarian">
                        </div>
                        <div class="col-md-4 col-4">
                            <button type="submit" class="btn btn-success">Cari</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row mt-5 justify-content-center">
                @foreach ($artikel as $row)
                    <div class="col-md-4 col-12 mb-5">
                        <a href="{{ url('artikeldetail/' . $row->idartikel) }}">
                            <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" style="height: 550px"
                                data-wow-delay="0.5s">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <h5 class="mt-3">{{ potong($row->judul, 35) }}...</h5>
                                        <span>
                                            <i class="fa fa-clock"></i> {{ tanggal($row->tanggal) }}
                                        </span>
                                        <span>
                                            <i class="fa fa-clipboard"></i> {{ $row->kategori }}
                                        </span>
                                        <br>
                                        <span>
                                            <i class="fa fa-tag"></i> {{ $row->tag }}
                                        </span>
                                        <p style="text-align: justify" class="mt-4 text-dark">
                                            {!! potong($row->isiartikel, 100) !!}...</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    {{ $artikel->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
