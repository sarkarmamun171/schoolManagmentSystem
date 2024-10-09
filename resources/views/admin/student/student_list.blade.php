@extends('admin.layouts')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student Managment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Student Managment List</li>
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
                            <form action="" method="post">
                                {{-- <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="">Class Name</label>
                                        <select name="class_id" id="class_id" class="form-control">
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $classe)
                                                <option value="{{ $classe->id }}">{{ $classe->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>a
                                    <div class="form-group col-md-5">
                                        <label for="">Academic Year</label>
                                        <select name="academic_id" id="academic_id" class="form-control">
                                            <option value="">Select Class</option>
                                            @foreach ($academicyears as $academicyear)
                                                <option value="{{ $academicyear->id }}">{{ $academicyear->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-info">Fillter</button>
                                    </div>
                                </div> --}}
                            </form>
                            <div class="card-body">
                                <table id="example1" class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Class Name</th>
                                            <th>Academic Year</th>
                                            <th>Father's Name</th>
                                            <th>Mother's Name</th>
                                            <th>Admission Date</th>
                                            <th>Date of Birth</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $sl => $student)
                                            <tr>
                                                <td>{{ $sl + 1 }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->rel_to_class->class_name }}</td>
                                                <td>{{ $student->rel_to_academicYear->name }}</td>
                                                <td>{{ $student->father_name }}</td>
                                                <td>{{ $student->mother_name }}</td>
                                                <td>{{ $student->admission_date }}</td>
                                                <td>{{ $student->dob }}</td>
                                                <td>{{ $student->phone }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->password }}</td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('edit.student',$student->id) }}"
                                                            class="btn btn-info shadow btn-xs sharp "><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        &nbsp;
                                                        <a href=""
                                                            class="btn btn-danger shadow btn-xs sharp "><i
                                                                class="fa fa-trash"></i></a>
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

@section('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
