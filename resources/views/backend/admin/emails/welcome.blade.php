<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin login</title>

    <!-- Google Font: Source Sans Pro -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/assets/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">

    <div class="login-box">

        <div class="card card-outline card-primary">
            <h2>Hi {{ $user['name'] }} ! Welcome to Tach and Earn Empire</h2>
            <h3>Your Login Information below</h3>
            <p>Email: <span class="badge badge-success">{{ $user['email'] }}</span></p>
            <p>Password: <span class="badge badge-success">{{ $user['password'] }}</span></p>
        </div>
        <p>To login now <a href="http://127.0.0.1:8000/login">Click Here</a></p>

        <h3>Thanks for Connecting With us</h3>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('backend/assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
