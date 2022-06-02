@extends('layouts.app')

@section('page-title', 'Login')
@section('content')
    <div class="container py-5">
        <h5 class="font-weight-light text-center">Masuk Sekarang!</h5>

        <div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="row no-gutters">
                    <div class="col-md-4 mx-auto col-sm-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ implode('', $errors->all(':message')) }}
                            </div>
                        @endif
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="small" for="">Alamat Email</label>
                                    <input type="email" placeholder="Alamat Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="small" for="">Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        placeholder="Password Minimal 8 karakter"
                                        class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-orange btn-block ">Masuk</button>

                                <div class=" my-2"><span>Belum Punya Akun? <a
                                            href="{{ route('register') }}">Daftar</a> disini.</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('css')
    <style>

    </style>
@endpush
