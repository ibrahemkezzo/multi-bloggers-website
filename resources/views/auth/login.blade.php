<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                max-width: 600px;
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
            <h3 class="text-center mb-4">Login</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    {{-- <label for="emailLogin" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="emailLogin"
                        placeholder="Enter your email"> --}}
                    <x-input-label for="email" class="form-label" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" placeholder="Enter your email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mb-3">
                    <label for="passwordLogin" class="form-label">Password</label>
                    {{-- <input name="password" type="password" class="form-control" id="passwordLogin"
                        placeholder="Enter your password" required autocomplete="current-password"> --}}
                    <x-input-label for="password" class="form-label" :value="__('Password')" />

                    <x-text-input id="password" class="form-control" type="password" name="password" required
                        autocomplete="current-password" placeholder="Enter your password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom">Login</button>
                </div>
                <p class="mt-3 text-center">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </form>
        </div>
    </div>

</body>

</html>
