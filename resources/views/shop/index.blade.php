@extends('layouts.app')

@section('page-title', 'Bazmi | Bazaar Kami')

@section('content')

    {{-- categories-section --}}
    <section class="categories-section container my-4 h-100">
        <h3>Kategori</h3>
        <div class="row h-100">
            @foreach ($categories as $category)
                <div class="col-4 col-sm-4 col-md-2 p-2">
                    <a href="{{ $category->path() }}">
                        <div class="card shadow-hover">
                            <div class="card-body">
                                <img src="{{ $category->image }}" class="img-fluid" alt="">
                                <p class="card-title text-center">{{ $category->name }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    {{-- @dd($newProducts) --}}
    {{-- products-section --}}
    {{-- just for you --}}
    <section class="just-for-you-section container h-100 my-4">
        <h3>Produk Kami</h3>
        <div class="row h-100">
            @foreach ($products as $product)
                <div class="col-6 col-sm-4 col-md-2 p-2">
                    <a href="{{ $product->path() }}">
                        <div class="card shadow-hover h-100">
                            <img src="{{ asset($product->image) }}" class="card-img-top" alt="">
                            <div class="card-body ">
                                <p class="product-title">{{ substr($product->title, 0, 35) }}..</p>
                                <p class="product-price">Rp.{{ number_format($product->price) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
        @if ($products->count() < 1)
            <div class="d-flex justify-content-center mt-5">
                <div class="text-center">
                    <h2>Barang Kosong</h2>
                    <a href="{{ route('shop.catalog') }}" class="btn btn-orange">Cari!</a>
                </div>
            </div>
        @endif
    </section>


@endsection
