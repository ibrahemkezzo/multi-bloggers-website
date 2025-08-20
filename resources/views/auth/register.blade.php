<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1e1e1e;
            font-family: 'Segoe UI', sans-serif;
        }

        .auth-card {
            background-color: #2a2a2a;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            color: #f5f5f5;
            padding: 40px;
            width: 100%;
        }

        /* Responsive widths */
        @media (max-width: 576px) {
            .auth-card {
                max-width: 95%;
            }
        }

        @media (min-width: 577px) and (max-width: 992px) {
            .auth-card {
                max-width: 600px;
            }
        }

        @media (min-width: 993px) {
            .auth-card {
                max-width: 800px;
            }
        }

        .auth-card h3 {
            color: #d4af37;
        }

        .form-control {
            background-color: #333;
            border: none;
            color: #fff;
            height: 50px;
        }

        .form-control:focus {
            background-color: #444;
            color: #fff;
            box-shadow: none;
        }

        .btn-custom {
            background-color: #d4af37;
            color: #1e1e1e;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #b8972e;
            color: #fff;
        }

        a {
            color: #d4af37;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="auth-card">
            <h3 class="text-center mb-4">Register</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="nameRegister" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="nameRegister" placeholder="Enter your name"
                        name="name" :value="old('name')" required autofocus autocomplete="name">

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mb-3">
                    {{-- <label for="emailRegister" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailRegister" placeholder="Enter your email"> --}}
                    <x-input-label for="email" class="form-label" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                        required autocomplete="username" placeholder="Enter your email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mb-3">
                    {{-- <label for="passwordRegister" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordRegister" placeholder="Enter your password"> --}}
                    <x-input-label for="password" class="form-label" :value="__('Password')" />

                    <x-text-input id="password" class="form-control" type="password" name="password" required
                        autocomplete="new-password" placeholder="Enter your password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mb-3">
                    {{-- <label for="passwordConfirm" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="passwordConfirm"
                        placeholder="Confirm your password"> --}}
                    <x-input-label for="password_confirmation" class="form-label" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="form-control" type="password"
                        name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom">Create Account</button>
                </div>
                <p class="mt-3 text-center">Already have an account? <a href="login.html">Login</a></p>
            </form>
        </div>
    </div>

</body>

</html>
