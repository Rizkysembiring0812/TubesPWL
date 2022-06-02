@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="m-0  text-primary">Update Produk</h5>
                <a href="{{ route('product.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>

        <x-input-error />

        <form action="{{ route('product.update', $product) }}" method="POST">
            @csrf @method('PATCH')
            <div class="card ">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Produk </label>
                        <small class="text-primary d-block mb-3">Slug akan dibuat otomatis!</small>
                        <input type="text" name="title" value="{{ $product->title }}" placeholder="Nama Produk"
                            class="form-control" required>
                    </div>

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
                        <label for="">Harga Produk </label>
                        <input type="text" name="price" value="{{ $product->price }}" placeholder="Harga Produk"
                            class="form-control w-50" required>
                    </div>

                    <div class="form-group">
                        <label for="">Diskon</label>
                        <small class="text-primary d-block mb-3">Diskon akan ditampilkan otomatis!</small>
                        <input type="text" name="discount" value="{{ $product->discount }}" placeholder="Diskon"
                            class="form-control w-50">
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <br>
            <div class="card ">
                <div class="card-body">

                    <div class="form-group mt-4">
                        <label for="status" class="col-form-label">Status </label>
                        <select name="status" class="form-control" value="{{ $product->status }}">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Gambar </label>
                        <input type="file" name="image" value="{{ old('image') }}" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary my-3">Update</button>
                    </div>
                </div>
            </div>
    </div>
    {{-- <div class="card-footer">
        <form action="{{ route('product.destroy', $product) }}" method="POST" class="float-right">
            @csrf @method('DELETE')
            <button type="button" class="dltBtn btn btn-danger my-3">Hapus Produk</button>
        </form>

    </div> --}}
    </form>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush

@push('js')
    <script src="{{ asset('backend/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.dltBtn').click(function(e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
                // alert(dataID);
                e.preventDefault();
                swal({
                        title: "Anda yakin ingin menghapus Data ini?",
                        text: "Data yang telah dihapus tidak dapat dipulihkan lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("Data anda tidak terhapus!");
                        }
                    });
            })
        });
    </script>
@endpush
