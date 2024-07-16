@extends('layout')
@section('content')
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">{{ $title }}</h1>
        </div>
    </div>
    <div class="container my-5 pt-5">
        <div class="row mt-5">
            @foreach ($kategori as $row)
                <div class="col-md-4 col-12 mb-5">
                    <a href="{{ url('kategoridetail/' . $row->kategori) }}">
                        <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp h-100" data-wow-delay="0.5s">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <h5 class="mt-3">{{ $row->kategori }}</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                {{ $kategori->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
