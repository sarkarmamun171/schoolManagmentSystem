@extends('admin.student_layouts')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Change Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        @if (session('success'))
            <div class="alert alert-secondary">{{ session('success') }}</div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Academic Year</h3>
                        </div>
                        <form action="#" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Old Password</label>
                                    <input type="text" class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="text" class="form-control" name="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="text" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection
