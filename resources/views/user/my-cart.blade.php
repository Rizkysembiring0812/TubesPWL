@extends('layouts.app')

@section('page-title', 'Favorit')

@section('content')
    <br><br>
    <div class="container">
        <div class=" row">
            <div class="col-xl-2 col-md-2 col-sm-12 ml-auto">
                @include('inc.app.user-sidebar')
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Favorit</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishlist as $item)
                                            <tr>
                                                <td>{{ $item->product->title }}</td>
                                                <td>{{ $item->product->price }}</td>
                                                <td>
                                                    <form action="/wishlist/{{ $item->id }}/destroy" method="GET">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @forelse ($wishlist as $item)
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group focused">
                                <label>{{ $item->product->name }}</label>
                                <input type="text" class="form-control form-control-alternative" disabled
                                    placeholder="Product Name" value="{{ $item->product->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group focused">
                            <label> {{ $item->product->price }}</label>
                            <input type="text" class="form-control form-control-alternative" disabled
                                placeholder="Product Price" value="{{ $item->product->price }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@empty

    <p class="text-center"> You have no wishlist yet</p>
@endforelse
</div>
</div>
@endsection --}}
