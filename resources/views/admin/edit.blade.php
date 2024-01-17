@extends('layouts.master')

@section('title', 'Tambah Data Admin')

@section('konten')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update', $admin->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4">
                                <label for="name">Name:</label>
                                <input type="text" name="name" value="{{ old('name', $admin->name) }}" class="form-control">
                                @error('name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email',$admin->email) }}">
                                @error('email')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary mt-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
@endsection
