<html>

<head>
    <title>Manage Employees</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
@extends('layouts.app')

<body style="background-image: url('/images/image_2.png'); background-repeat: no-repeat; background-size: cover;">
    @section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-dark">
                    <div class="card-header" style="background: #008000; color: #FFFFFF;">Manage Employees</div>
                    <div class="card-body" style="background: #FFFFFF;">
                        <button id="add_employee_button" class="btn btn-primary btn"><i class="bi bi-person-plus"></i>
                            Add Employee</button>
                        <script>
                            document.getElementById('add_employee_button').addEventListener('click', function () {
                                window.location.href = "{{ route('create') }}";
                            });
                        </script>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table id="employees_table" class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark border-dark">
                                    <tr style="font-size: 14px; text-align: center">
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Salary</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="thead-dark border-dark">
                                    @foreach($employees as $employee)
                                    <tr style="font-size: 14px; text-align: center">
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->gender }}</td>
                                        <td>{{ $employee->position }}</td>
                                        <td>{{ $employee->status }}</td>
                                        <td>{{ $employee->salary }}</td>
                                        <td>
                                            <a href="{{ route('employee.edit', $employee->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $employees->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link bg-success text-white border-dark"
                                    href="{{ $employees->previousPageUrl() }}">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $employees->lastPage(); $i++)
                                <li class="page-item {{ $employees->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link {{ $employees->currentPage() == $i ? 'bg-primary text-white' : 'text-dark' }} border-dark"
                                        href="{{ $employees->url($i) }}">{{ $i }}</a>
                                </li>
                                @endfor
                                <li class="page-item {{ $employees->nextPageUrl() ? '' : 'disabled' }}">
                                    <a class="page-link bg-success text-white border-dark"
                                        href="{{ $employees->nextPageUrl() }}">Next</a>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    @endsection
</body>

</html>