<?php
use App\Models\Category;

$categories = Category::all();

?>

@guest
    <section class="top-banner bg-light my-0 py-2">
        <div class="container-fluid">
            <ul class="top-banner-list small">
                <li>
                    <a href="{{ route('register') }}">Registrasi</a>
                </li>
                <li>
                    <a href="{{ route('login') }}">Masuk</a>
                </li>
                <li class="active">
                    <a href="{{ route('myOrder.index') }}">Lacak Pesanan</a>
                </li>
            </ul>
        </div>
    </section>
@endguest

<header class="section-header sticky-top my-0 py-0">
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-6 col-md-3 col-5">
                    <a href="{{ route('shop.index') }}" class="brand-wrap" data-abc="true">
                        {{-- <img class="logo" width="50px" src="{{asset('logo.png')}}"> --}}
                        <span class="logo">Bazmi</span>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-8 col-md-6  col-xl-5  d-none d-md-block">
                    <form action="{{ route('shop.catalog') }}" class="search-wrap">
                        <div class="input-group w-100">
                            <input type="text" class="form-control search-form" name="search" placeholder="Cari">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary search-button"> <i
                                        class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3 col-xl-4 col-7">
                    <div class="d-flex justify-content-end">
                        <a class="nav-link nav-user-img text-white" href="{{ route('cart.index') }}"> <i
                                class="fas fa-heart"></i>
                            @guest
                                <a class="nav-link nav-user-img text-white" href="{{ route('login') }}"> Masuk</a>
                            @endguest
                            @auth
                                <a class="nav-link nav-user-img text-white" href="{{ route('home.index') }}"> Akun</a>
                            @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($categories->count() > 0)
        <nav class="navbar navbar-expand-md navbar-main border-bottom shadow bg-light">
            <div class="container">
                <div class="navbar-collapse collapse" id="dropdown6" style="">
                    <ul class="navbar-nav mr-auto">
                        @foreach ($categories as $category)
                            <li class="nav-item dropdown small"> <a class="nav-link "
                                    href="{{ $category->path() }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    @endif
</header>
