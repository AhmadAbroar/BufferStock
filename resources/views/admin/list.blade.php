@extends('layouts.master')

@section('title', 'Data Admin')

@section('konten')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Admin</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('admin.create') }}" class="btn btn-primary">+ Tambah Data</a>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        <div class="row btn-group">
                                            <a class="btn btn-outline-primary" href="{{ route('admin.edit', $admin->id) }}"><i
                                                    class="nav-icon fas fa-edit"></i></a>
                                            <form action="{{ route('admin.destroy', $admin->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Are you sure?')"><i
                                                    class="nav-icon fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (session('success'))
                        <script>
                            toastr.success("{{ session('success') }}", "Success");
                        </script>
                    @endif
                    @if (session('error'))
                        <script>
                            toastr.error("{{ session('error') }}", "Gagal");
                        </script>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
@endsection
