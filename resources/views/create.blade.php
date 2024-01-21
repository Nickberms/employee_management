<html>

<head>
    <title>Add Employee</title>
</head>
@extends('layouts.app')

<body style="background-image: url('/images/image_2.png'); background-repeat: no-repeat; background-size: cover;">
    @section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-dark">
                    <div class="card-header" style="background: #008000; color: #FFFFFF;">Add Employee</div>
                    <div class="card-body" style="background: #FFFFFF;">
                        <form method="POST" action="{{ route('employee.store') }}">
                            <br>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row mb-3">
                                <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" maxlength="100" class="form-control border-dark"
                                        name="first_name" value="" oninput="LettersOnly(this)" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" maxlength="100" class="form-control border-dark"
                                        name="last_name" value="" oninput="LettersOnly(this)" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-end">Gender</label>
                                <div class="col-md-6">
                                    <select id="gender" class="form-select border-dark" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="position" class="col-md-4 col-form-label text-md-end">Position</label>
                                <div class="col-md-6">
                                    <input id="position" type="text" maxlength="100" class="form-control border-dark"
                                        name="position" value="" oninput="LettersOnly(this)" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-md-4 col-form-label text-md-end">Status</label>
                                <div class="col-md-6">
                                    <select id="status" class="form-select border-dark" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="On Leave">On Leave</option>
                                        <option value="Fired">Fired</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="salary" class="col-md-4 col-form-label text-md-end">Salary</label>
                                <div class="col-md-6">
                                    <input id="salary" type="text" maxlength="8" class="form-control border-dark"
                                        name="salary" value="" oninput="NumbersOnly(this)" required>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button id="cancel_adding_employee" type="button"
                                        class="btn btn-danger">Cancel</button>
                                    <script>
                                        document.getElementById('cancel_adding_employee').addEventListener('click', function () {
                                            window.location.href = "{{ route('index') }}";
                                        });
                                    </script>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <script>
        function LettersOnly(inputField) {
            var pattern = /^[A-Za-z]+( [A-Za-z]+)*$/;
            var inputValue = inputField.value;
            if (!pattern.test(inputValue)) {
                inputField.value = inputValue.replace(/[^A-Za-z\s]/g, '').replace(/\s{2,}/g, ' ');
            }
        }
        function NumbersOnly(inputField) {
            var pattern = /^[0-9]+$/;
            var inputValue = inputField.value;
            if (!pattern.test(inputValue)) {
                inputField.value = inputValue.replace(/[^0-9]/g, '');
            }
        }
    </script>
    @endsection
</body>

</html>