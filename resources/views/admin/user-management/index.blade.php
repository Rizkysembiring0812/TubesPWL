@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ implode('', $errors->all(':message')) }}
            </div>
        @endif
        <form action="{{ route('userManagement.store') }}" method="POST">
            @csrf
            <div class="card shadow">
                <div class="card-body">
                    <p class="text-primary mb-2">Tambah User</p>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Alamat Email</label>
                                <input type="text" name="email" placeholder="Email Penggguna" value=""
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="name" placeholder="Username" value="" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" placeholder="Password" value=""
                                    class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="">No.Telepon</label>
                                <input type="text" name="phone" placeholder="No. Telepon" value="" class="form-control"
                                    required>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="address" placeholder="Alamat" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Role</label>
                                <select name="role" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="shipper">Shipper</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Tambahkan</button>
                </div>
            </div>
        </form>

        <section class="my-4">
            <div class="card">
                <div class="card-body">
                    <h3>User Manajemen</h3>
                    <a href="{{ route('userManagement.getAllUsers') }}" class="btn btn-primary btn-sm float-right">Lihat
                        Semua User</a>

                    <div class="table-responsive pt-2">
                        <table class="table table-hover table-bordered small" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th>No.Telp</th>
                                    <th>Alamat</th>
                                    {{-- <th>Created at</th>
                                    <th>Updated at</th> --}}
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#dataTable').dataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('userManagement.all') }}",
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'role',
                        orderable: false
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'address'
                    },
                    // {
                    //     data: 'created_at'
                    // },
                    // {
                    //     data: 'updated_at'
                    // },
                    {
                        data: 'actions'
                    },
                ]
            });

        });
    </script>
@endpush
