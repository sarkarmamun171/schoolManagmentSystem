@extends('admin.layouts')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Assign Subject To Class</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Assign Subject</li>
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
                                <h3 class="card-title">Add Assign Subject</h3>
                            </div>
                            <form action="{{ route('assign.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Class</label>
                                        <select name="class_id" id="" class="form-control">
                                            <option value="" disabled selected>Class Name</option>
                                            @foreach ($classes as $class)
                                                <option value="">{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Subject Name</label>
                                            @foreach ($subjects as $subject)
                                                <div class="form-check">
                                                    <input type="checkbox" id="subject{{ $subject->id }}" name="subject_id[]" value="{{ $subject->id }}">
                                                    <label for="subject{{ $subject->id }}">{{ $subject->subject }}</label>
                                                </div>
                                            @endforeach
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
