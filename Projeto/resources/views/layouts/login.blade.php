<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navbar-->
    @include('includes.navbar')

    <div class="login-box">
        <h2>Login Form</h2>
        <form action="">
            <div class="user-box">
                <input type="text" required>
                <label for="">Username</label>
            </div>
            <div class="user-box">
                <input type="password" required>
                <label for="">password</label>
            </div>
            <a href="">
                <span></span>
                <span></span>
                <span></span>
                <span></span>Submit
            </a>
        </form>
    </div>

    <!--Footer-->
    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>