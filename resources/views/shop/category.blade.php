@extends('layouts.app')

@section('page-title', 'Bazmi | Kategori')

@section('content')

    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 order-md-2 col-lg-9">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-md-left text-center float-md-left mb-3 mt-3 mt-md-0 mb-md-0">
                                @if (isset($category))
                                    <h1 class="">Kategori : {{ $category->name }}</h1>
                                    <br>
                                @elseif (isset($search))
                                    <h1 class="">Hasil Pencarian : {{ $keyword }}</h1>
                                    <br>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if ($products->count())
                            @foreach ($products as $product)
                                <div class="col-8 col-sm-6 col-md-4 p-2 m-5">
                                    <a href="{{ $product->path() }}">
                                        <div class="card shadow-hover h-100">
                                            <img src="{{ $product->image }}" class="card-img-top" alt="">
                                            <div class="card-body ">
                                                <p class="text-dark">{{ $product->title }}</p>
                                                @if ($product->onSale)
                                                    <small class="line-through text-dark">{{ $product->price }}</small>
                                                    <p class="text-orange py-0 my-0 h5">
                                                        Harga Spesial Flash Sale:
                                                        Rp.{{ number_format($product->sale_price) }}</p>
                                                @else
                                                    <p class="text-orange py-0 my-0 h5">
                                                        Harga: Rp.{{ number_format($product->price) }}
                                                    </p>
                                                @endif
                                            </div>
                                            <button class="btn btn-orange btn-block">Lihat Detail</button>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="row">
                                <div class="col-sm-8 col-md-6 col-6 mx-auto">
                                    <div class="text-center mt-10">
                                        <p>Tidak ada barang dengan kategori {{ $category->name }}</p>
                                        <img src="{{ asset('images/demo/empty.svg') }}" class="w-100" alt="">
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="row sorting my-5">
                        <div class="col-12">
                            <div class="btn-group float-md-right ml-3">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
