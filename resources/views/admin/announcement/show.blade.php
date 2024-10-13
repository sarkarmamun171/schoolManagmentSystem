@extends('admin.layouts')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Announcement Managementr</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Announcement Management List</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('delete'))
                        <div class="alert alert-danger">{{ session('delete') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Message</th>
                                        <th>BroadCast To</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($announcements as $sl=>$announcement)
                                    <tr>
                                        <td>{{ $sl+1 }}</td>
                                        <td>{{ $announcement->message }}</td>
                                        <td>{{ $announcement->type }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('announcement.edit',$announcement->id) }}" class="btn btn-info shadow btn-xs sharp "><i class="fa-solid fa-pen-to-square"></i></a>
                                                &nbsp;
                                                <a href="{{ route('announcement.destroy',$announcement->id) }}" class="btn btn-danger shadow btn-xs sharp "><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Message</th>
                                        <th>BroadCast To</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
