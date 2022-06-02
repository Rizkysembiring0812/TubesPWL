@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <section class="my-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h3>Semua User</h3>

                        <a href="{{ route('userManagement.index') }}" class="btn btn-primary btn-sm my-2"><i
                                class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>No.Telp</th>
                                    <th>Alamat</th>
                                    {{-- <th>Created at</th>
                                    <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->userInfo->phone ?? 'Tidak Ada' }}</td>
                                        <td>{{ $user->userInfo->address ?? 'Tidak Ada' }}</td>
                                        {{-- <td>{{ $user->created_at }}</td>
                                        <td><a href="mailto:{{ $user->email }}"
                                                class="btn btn-sm btn-block btn-success">Mail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
