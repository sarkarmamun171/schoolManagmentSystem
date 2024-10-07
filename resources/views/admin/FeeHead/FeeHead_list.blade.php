@extends('admin.layouts')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fee Head List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Fee Head List</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                    <div class="alert alert-danger">{{ session('success') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fee Head Name</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fees as $sl=>$fee)
                                    <tr>
                                        <td>{{ $sl+1 }}</td>
                                        <td>{{ $fee->feehead_name }}</td>
                                        <td>{{ $fee->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('fee.head.edit',$fee->id) }}" class="btn btn-info shadow btn-xs sharp "><i class="fa-solid fa-pen-to-square"></i></a>
                                                &nbsp;
                                                <a href="{{ route('fee.head.delete',$fee->id) }}" class="btn btn-danger shadow btn-xs sharp "><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
