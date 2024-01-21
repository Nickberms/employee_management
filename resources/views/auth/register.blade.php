<html>

<head>
    <title>Register</title>
</head>
@extends('layouts.app')

<body style="background-image: url('/images/image_1.png'); background-repeat: no-repeat; background-size: cover;">
    @section('content')
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-dark">
                    <div class="card-header" style="background: #008000; color: #FFFFFF;">Register</div>
                    <div class="card-body" style="background: #FFFFFF;">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <br>
                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>
                                <div class="col-md-6">
                                    <input id="username" type="text" maxlength="15"
                                        class="form-control border-dark @error('username') is-invalid @enderror"
                                        name="username" value="{{ old('username') }}" oninput="LettersOnly(this)"
                                        required>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" maxlength="100"
                                        class="form-control border-dark @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" maxlength="30"
                                        class="form-control border-dark @error('password') is-invalid @enderror"
                                        name="password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="confirm_password" class="col-md-4 col-form-label text-md-end">Confirm
                                    Password</label>
                                <div class="col-md-6">
                                    <input id="confirm_password" type="password" maxlength="30"
                                        class="form-control border-dark" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Register</button>
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
    <br>
    <script>
        function LettersOnly(inputField) {
            var pattern = /^[A-Za-z]+( [A-Za-z]+)*$/;
            var inputValue = inputField.value;
            if (!pattern.test(inputValue)) {
                inputField.value = inputValue.replace(/[^A-Za-z\s]/g, '').replace(/\s{2,}/g, ' ');
            }
        }
        document.getElementById('username').addEventListener('keypress', function (event) {
            if (event.key === ' ') {
                event.preventDefault();
            }
        });
        document.getElementById('email').addEventListener('keypress', function (event) {
            if (event.key === ' ') {
                event.preventDefault();
            }
        });
        document.getElementById("email").addEventListener("input", function () {
            this.value = this.value.toLowerCase();
        });
    </script>
    @endsection
</body>

</html>