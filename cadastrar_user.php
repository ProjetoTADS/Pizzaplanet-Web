<?php
	include 'PHP/conexao_bd.php';
	$conn = OpenCon();

	if (!isset($_SESSION)) {
		session_start();
	}

	if (isset($_SESSION['UsuarioID'])) {
	  header("Location: PHP/logout.php"); exit;
	}

?>
<html>
<head>
	<meta charset="utf-8" http-equiv="refresh" content="100">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pizza Planet</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Alegreya|Exo+2:700" rel="stylesheet">
</head>
<body>	
	<!--Header end-->

		<!-- <div class="nav navbar navbar-fixed-top" id="float-menu">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 padding-right-0">
						<nav class="navbar">
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-menu" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
							  <a class="navbar-brand" href="#"><img src="images/logo.png" alt="" /></a>
							</div>
							<div class="collapse navbar-collapse main-menu" id="nav-menu">
							  <ul class="nav navbar-nav navbar-right">
								<li><a href="#how-it-work-2" id="btn-top" title="Voltar ao topo"><i class="fa fa-2x fa-home" aria-hidden="true"></i></a></li>
								<li><a href="#how-it-work-2" id="btn-how-it-work-2">Como funciona</a></li>
								<li><a href="#about-us-area-2" id="btn-about-us-2">Sobre o Rede Frete</a></li>
								<li><a href="#advantage-area-2" id="btn-advantage-2">Vantagens</a></li>
								<li><a href="#contact-area-2" id="btn-contact-us-2">Fale conosco</a></li>
							  </ul>
							</div>
						</nav>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 padding-left-0">
						<a href="/login"><button class="entrar-2">entrar</button></a>
						<button class="cadastre" id="btn-cadastrar-2">cadastre-se</button>
					</div>
				</div>
			</div>				
		</div> -->

	<section class="home">
		<!--Header start-->
		<header class="header-area clearfix">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!---- Menu area start ---->
						<nav class="navbar">
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-menu" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
							  <a class="navbar-brand" href="/"><span class="first-letter">Go</span> <span class="second-letter">pizza</span></a>
							</div>
							<div class="collapse navbar-collapse pull-right" id="nav-menu">
							  <ul class="nav navbar-nav navbar-right pull-right">
								<li><a href="index.php" id="btn-home">Inicio</a></li>
								<li><a href="/#how-it-work" id="btn-how-it-work">Como funciona</a></li>
								<li><a href="/#about-us-area" id="btn-about-us">Baixe o app</a></li>
								<li><a href="/#advantage-area" id="btn-advantage">Parceiros</a></li>
							  </ul>
							</div>							
						</nav>
						<!--Menu area end-->
					</div>
				</div>
			</div>
		</header>
<!-- 		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center image-center">
					<img src="img/image_slide.png" alt="">
				</div>	
			</div>
		</div> -->
			
			<section class="body">
				<div class="container">
					<?php
						if(isset($_GET['message'])){
			    			echo $_GET['message'];
						}
					?>
					<form method="POST" action="PHP/cadastrar_user_bd.php" data-toggle="validator" role="form">
						<div class="row">
							<div class="col-md-3">
								<br>
								<label for="login">Login: </label>
								<input type="text" id="login" name="login" class="form-control"  placeholder="Login" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<br>
								<label for="password">Senha:</label>
								<input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<br>
								<label for="email">E-mail:</label>
								<input type="text" id="email" name="email" class="form-control" placeholder="E-mail" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<br>
								<label for="empresa">Empresa:</label>
								<select class="form-control" name="empresa" id="empresa">
								<?php
									$q_empresas = "SELECT emp_id emp_id,
														  emp_razao_social emp_razao_social
												     FROM empresa
										   	        WHERE IFNULL(emp_ativo, 'S') = 'S'";

									$f_empresas = $conn->query($q_empresas);

									while ($r_empresas = $f_empresas->fetch_array()){

										$v_emp_id = $r_empresas['emp_id'];
										$v_emp_razao_social = $r_empresas['emp_razao_social'];

										echo '<option value="'.$v_emp_id.'">'.$v_emp_razao_social.'</option>';

									}
									CloseCon($conn);
				                ?>
						        </select>
							</div>
						</div>

						<br>
						<input name="submit" type="submit" value="Cadastrar" class="btn btn-success">
										
					</form>
				</div>
			</section>
		</section>



	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>