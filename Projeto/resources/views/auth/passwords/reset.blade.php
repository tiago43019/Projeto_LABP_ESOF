<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/f733acf00f.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Recuperar Password</h4>
                                            <form method="POST" action="{{ route('password.update') }}">
                                                @csrf
                                                <input type="hidden" name="token" value="{{ $token }}">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-style" placeholder="Email" value="{{ $email ?? old('email') }}" required>
                                                    <i class="input-icon fa-solid fa-envelope" style="color: #ffffff;"></i>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-style" placeholder="Nova Senha" required>
                                                    <i class="input-icon fa-solid fa-lock" style="color: #ffffff;"></i>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password_confirmation" class="form-style" placeholder="Confirmar Nova Senha" required>
                                                    <i class="input-icon fa-solid fa-lock" style="color: #ffffff;"></i>
                                                </div>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger" style="margin-top: 15px;">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <button type="submit" class="btn mt-4">Recuperar Password</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
