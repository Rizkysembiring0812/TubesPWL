@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">

            <div class="card-header py-3 d-flex justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Tambah Kategori</h5>
                <a href="{{ route('category.index') }}" class="btn btn-primary">Kembali</a>
            </div>

            <x-input-error />

            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Kategori </label>
                        <small class="text-primary d-block mb-3">Slug akan diacak otomatis</small>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Kategori"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar </label>
                        <input type="file" name="image" value="{{ old('image') }}" class="form-control" required>
                    </div>

                    {{-- <div class="form-group">
          <label for="is_parent">Is Parent</label><br>
          <input type="checkbox" name='is_parent' id='is_parent'> Yes                        
        </div>

        <div class="form-group" id='parent_categories'>
          <label for="parent_id">Parent Category</label> --}}
                    {{-- <select name="parent_id" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        @foreach ($parent_categories as $key => $cat)
                            <option value='{{ $cat->id }}'>{{ $cat->name }}</option>
                        @endforeach
                    </select> --}}
                    <div class="form-group">
                        <label for="status" class="col-form-label">Status </label>
                        <select name="status" class="form-control">
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary my-3">Simpan</button>
                    </div>
                </div>
        </div>
        </form>

    </div>
    </div>
@endsection

@push('js')
    {{-- <script>
        $('#is_parent').change(function() {

            if ($('#is_parent').prop('checked')) {
                $('#parent_categories').addClass('d-none');
                $('#parent_categories').val('');
            } else {
                $('#parent_categories').removeClass('d-none');
            }
        })
    </script> --}}
@endpush
