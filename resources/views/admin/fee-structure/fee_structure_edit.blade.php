@extends('admin.layouts')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fee Structure Edit</h1>
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
                            @if (session('update'))
                            <div class="alert alert-info">{{ session('update') }}</div>
                        @endif
                            <div class="card-header">
                                <h3 class="card-title">Edit Fee Structure</h3>
                            </div>
                            <form action="{{ route('fee.str.update',$fee_structures->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Class Name</label>
                                            <select name="class_id" id="class_id" class="form-control">
                                                <option value="">Select Class</option>
                                                @foreach ($classes as $classe)
                                                <option value="{{ $classe->id }}" @if($classe->id == $fee_structures->id) selected @endif>{{ $classe->class_name }}</option>
                                                @endforeach
                                           </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Academic Year</label>
                                            <select name="academic_id" id="academic_id" class="form-control">
                                                <option value="">Select Academic Name</option>
                                                @foreach ($academicyears as $academicyear)
                                                <option value="{{ $academicyear->id }}" @if($academicyear->id == $fee_structures->id) selected @endif>{{ $academicyear->name }}</option>
                                                @endforeach
                                           </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Fee Head Name</label>
                                            <select name="fee_head_id" id="fee_head_id" class="form-control">
                                                <option value="">Select Academic Name</option>
                                                @foreach ($feeheads as $feehead)
                                                <option value="{{ $feehead->id }}"  @if($feehead->id == $fee_structures->id) selected @endif>{{ $feehead->feehead_name }}</option>
                                                @endforeach
                                           </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">January</label>
                                            <input type="text" class="form-control" name="january" value="{{ $fee_structures->january }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">February</label>
                                            <input type="text" class="form-control" name="february" value="{{ $fee_structures->february }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">March</label>
                                            <input type="text" class="form-control" name="march" value="{{ $fee_structures->march }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">April</label>
                                            <input type="text" class="form-control" name="april" value="{{ $fee_structures->april }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">May</label>
                                            <input type="text" class="form-control" name="may" value="{{ $fee_structures->may }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">June</label>
                                            <input type="text" class="form-control" name="june" value="{{ $fee_structures->june }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">July</label>
                                            <input type="text" class="form-control" name="july" value="{{ $fee_structures->july }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">August</label>
                                            <input type="text" class="form-control" name="august" value="{{ $fee_structures->august }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">September</label>
                                            <input type="text" class="form-control" name="september" value="{{ $fee_structures->september }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">October</label>
                                            <input type="text" class="form-control" name="october" value="{{ $fee_structures->october }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">November</label>
                                            <input type="text" class="form-control" name="november" value="{{ $fee_structures->november }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">December</label>
                                            <input type="text" class="form-control" name="december" value="{{ $fee_structures->december }}">
                                        </div>
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
