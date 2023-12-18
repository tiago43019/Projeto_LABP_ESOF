<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/f733acf00f.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <a href="/home" class="botaoVoltar">Voltar</a>
<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Entrar </span><span>Registar</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Entrar</h4>
											<form action="/login" method="post">
											@csrf
											<div class="form-group">
												<input type="text" class="form-style" name="username" placeholder="username" required>
												<i class="input-icon fa-solid fa-user" style="color: #ffffff;"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" class="form-style" name="password" placeholder="Password" required>
												<i class="input-icon fa-solid fa-lock" style="color: #ffffff;"></i>
											</div>
											<button type="submit" class="btn mt-4">Entrar</button>
											</form>
											@if($errors->any())
    											<div class="alert alert-danger">
													<ul>
														@foreach ($errors->all() as $error)
															<li>{{ $error }}</li>
														@endforeach
													</ul>
												</div>
											@endif

                      <p class="mb-0 mt-4 text-center"><a href="/login_forget_password" class="link">Esqueceste-te da palavra passe?</a></p>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-3 pb-3">Registar</h4>
											<form action="/register" method="post">
											@csrf
											<div class="form-group">
												<input type="text" class="form-style" name="nome_completo" placeholder="Nome Completo" required>
                                                <i class="input-icon fa-solid fa-user" style="color: #ffffff;"></i>	
                                            <div class="form-group mt-2">
												<input type="text" class="form-style" name="username" placeholder="Username" required>
                                                <i class="input-icon fa-solid fa-user-pen" style="color: #ffffff;"></i>											</div>	
											<div class="form-group mt-2">
												<input type="tel" class="form-style" name="numero_telemovel" placeholder="Numero de telemovel" required>
                                                <i class="input-icon fa-solid fa-phone" style="color: #ffffff;"></i>											</div>	
                                            <div class="form-group mt-2">
												<input type="email" class="form-style" name="email" placeholder="Email" required>
                                                <i class="input-icon fa-solid fa-envelope" style="color: #ffffff;"></i>											</div>
											<div class="form-group mt-2">
												<input type="password" class="form-style" name="password" placeholder="Password" required>
												<i class="input-icon fa-solid fa-lock" style="color: #ffffff;"></i>
											</div>
											<button type="submit" class="btn mt-4">Registar</button>
				      					</div>
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
</body>
</html>