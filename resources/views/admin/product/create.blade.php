@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="m-0  text-primary">Tambah Barang</h5>
                <a href="{{ route('product.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>

        <x-input-error />

        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Judul Barang </label>
                        <small class="text-primary d-block mb-3">Slug akan diacak otomatis</small>
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Nama Barang"
                            class="form-control" required>
                    </div>

                    {{-- category selector vue component --}}
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <small class="text-primary d-block mb-3">Pilih kategori untuk barang ini</small>
                        @foreach ($categories as $category)
                            <p class="d-inline">{{ $loop->iteration }}. {{ $category->name }}</p> <br>
                        @endforeach
                        <br>
                        <input type="text" name="category_id" value="{{ old('category_id') }}" placeholder="ID Kategori"
                            class="form-control" required>

                    </div>
                    <div class="form-group">
                        <label for="">Harga Barang </label>
                        <input type="text" name="price" value="{{ old('price') }}" placeholder="Harga Barang"
                            class="form-control w-50" required>
                    </div>

                    <div class="form-group">
                        <label for="">Diskon</label>
                        <small class="text-primary d-block mb-3">Diskon akan ditampilkam secara otomatis</small>
                        <input type="text" name="discount" value="{{ old('discount') }}" placeholder="Diskon"
                            class="form-control w-50">
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="card">
                        <div class="card-body">



                            <div class="form-group mt-4">
                                <label for="status" class="col-form-label">Status </label>
                                <select name="status" class="form-control">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="alert alert-primary">
                        Gambar Barang dapat diupload melalui <a href="{{ route('product.index') }}">Manajemen Barang</a>
                    </div> --}}
                            <div class="form-group">
                                <label for="">Gambar </label>
                                <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                                    required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary my-3">Simpan</button>
                            </div>

                        </div>
                    </div>

                    {{-- <x-category-selector :categories="$categories" /> --}}
                </div>
                {{-- <category-selector :categories="{{ $categories }}"></category-selector> --}}


            </div>
    </div>

    <br>

    {{-- <div class="card">
                <div class="card-body">

                    <attribute-selector
                        :attributes='[{ "uid": 9922, "type": "asda", "attribute": "sdas", "stock": "123", "live": 1 }]'>
                    </attribute-selector>

                </div>
            </div> --}}

    <br>



    </form>

    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote-bs4.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('backend/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Tulis deskripsi.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush
