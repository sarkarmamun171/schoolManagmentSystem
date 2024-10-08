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
                            <li class="breadcrumb-item active">Fee Structure</li>
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
                                <h3 class="card-title">Add Fee Structure</h3>
                            </div>
                            <form action="{{ route('fee.str.store') }}" method="POST">
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
                                        <div class="form-group col-md-4">
                                            <label for="">Fee Head Name</label>
                                            <select name="fee_head_id" id="fee_head_id" class="form-control">
                                                <option value="">Select Academic Name</option>
                                                @foreach ($feeheads as $feehead)
                                                <option value="{{ $feehead->id }}">{{ $feehead->feehead_name }}</option>
                                                @endforeach
                                           </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">January</label>
                                            <input type="text" class="form-control" name="january">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">February</label>
                                            <input type="text" class="form-control" name="february">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">March</label>
                                            <input type="text" class="form-control" name="march">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">April</label>
                                            <input type="text" class="form-control" name="april">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">May</label>
                                            <input type="text" class="form-control" name="may">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">June</label>
                                            <input type="text" class="form-control" name="june">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">July</label>
                                            <input type="text" class="form-control" name="july">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">August</label>
                                            <input type="text" class="form-control" name="august">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">September</label>
                                            <input type="text" class="form-control" name="september">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">October</label>
                                            <input type="text" class="form-control" name="october">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">November</label>
                                            <input type="text" class="form-control" name="november">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">December</label>
                                            <input type="text" class="form-control" name="december">
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
