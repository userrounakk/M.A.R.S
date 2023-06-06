@extends('admin.layout')

@section('heading')
    Allowed Members
@endsection

@section('allowed')
    active
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Allowed Emails
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Registered?</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($allowed_users as $key => $allowed_user)
                            <div class="d-none">
                                {{ $user_registered = false }}
                            </div>
                            @foreach ($users as $user)
                                @if ($user->email == $allowed_user->email)
                                    <div class="d-none">
                                        {{ $user_registered = true }}
                                    </div>
                                @endif
                            @endforeach
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $allowed_user->email }}</td>
                                <td>{{ $allowed_user->role }}</td>
                                <td>
                                    @if ($user_registered)
                                        <span class="badge bg-light-success">Yes</span>
                                    @else
                                        <span class="badge bg-light-danger">No</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="/allowedemails/{{ $allowed_user->id }}/edit"
                                        class="btn btn-outline-warning btn-sm mt-1"><i class="bi bi-pencil-square"></i></a>
                                    <form class='d-inline' action="/users/allowed/{{ $allowed_user->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-sm mt-1 btn-outline-danger btn"
                                            onclick="return confirm('Are you sure you want to remove {{ $allowed_user->name }}?')"><i
                                                class="bi bi-trash"></i></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @isset($edit)
            <div class="card">
                <div class="card-header">
                    Edit Member Detail
                </div>
                <div class="card-body">
                    <form action="allowedemails/{{ $edit->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Email</h6>
                                <div class="form-group position-relative has-icon-left ">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter member's email" name="email" value="{{ $edit->email }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h6>Role</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="role" name="role">
                                        <option value="teacher" {{ $edit->role == 'teacher' ? 'selected' : '' }}>Teacher
                                        </option>
                                        <option value="student" {{ $edit->role == 'student' ? 'selected' : '' }}>Student
                                        </option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <a href="/allowedemails" class="btn btn-light-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-header">
                    Add New Member
                </div>
                <div class="card-body">
                    <form action="/allowedemails" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <h6>Email</h6>
                                <div class="form-group position-relative has-icon-left ">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter member's email" name="email" value="{{ old('email') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h6>Role</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="role" name="role">
                                        <option value="teacher" selected>Teacher</option>
                                        <option value="student">Student</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Import List from CSV (Yet to implement)</h5>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="/allowedusers/upload" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="csv" id="csv"
                                class="form-control @error('csv') is-invalid @enderror" accept="text/csv">
                            @error('csv')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button type="submit" class="btn btn-outline-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        @endisset
        @if (\Session::has('msg'))
            <div class="alert alert-light-success color-success">
                <i class="bi bi-check-circle"></i> {{ Session::get('msg') }}
            </div>
        @endif
    </section>
@endsection
