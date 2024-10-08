@extends('admin.layouts')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fee Structure</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Student Added</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            @if (session('success'))
                            <div class="alert alert-info">{{ session('success') }}</div>
                        @endif
                            <div class="card-header">
                                <h3 class="card-title">Add Student</h3>
                            </div>
                            <form action="{{ route('store.student') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Class Name</label>
                                            <select name="class_id" id="class_id" class="form-control">
                                                <option value="">Select Class</option>
                                                @foreach ($classes as $classe)
                                                <option value="{{ $classe->id }}">{{ $classe->class_name }}</option>
                                                @endforeach
                                           </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Academic Name</label>
                                            <select name="academic_id" id="academic_id" class="form-control">
                                                <option value="">Select Academic Name</option>
                                                @foreach ($academicyears as $academicyear)
                                                <option value="{{ $academicyear->id }}">{{ $academicyear->name }}</option>
                                                @endforeach
                                           </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Father Name</label>
                                            <input type="text" class="form-control" name="father_name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Mother Name</label>
                                            <input type="text" class="form-control" name="mother_name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Admission Date</label>
                                            <input type="date" class="form-control" name="admission_date">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">Date of Birth</label>
                                            <input type="date" class="form-control" name="dob">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Phone Number</label>
                                            <input type="number" class="form-control" name="phone">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Create Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
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
