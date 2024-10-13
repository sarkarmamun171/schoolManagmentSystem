@extends('admin.layouts')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Announcement Management Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Announcement</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('success'))
                            <div class="alert alert-secondary">{{ session('success') }}</div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Announcement</h3>
                            </div>
                            <form action="{{ route('announcement.update', $announcements->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Message</label>
                                        <input type="text" class="form-control" name="message"
                                            value="{{ $announcements->message }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">BroadCast To</label>
                                        <select name="type" id="" class="form-control">
                                            <option value="" disabled selected>Selected List</option>
                                            <option value="admin"{{ $announcements->type == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="student" {{ $announcements->type == 'student' ? 'selected' : '' }}>
                                                Student</option>
                                            <option value="teacher" {{ $announcements->type == 'teacher' ? 'selected' : '' }}>
                                                Teacher</option>
                                            <option value="parent" {{ $announcements->type == 'admin' ? 'parent' : '' }}>Parent
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
