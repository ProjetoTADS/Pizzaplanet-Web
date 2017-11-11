<?php
	include 'PHP/conexao_bd.php';
	$conn = OpenCon();

	$ingr = null;
	$obs = null;

	if (!isset($_SESSION)) {
		session_start();
	}

	if (!isset($_SESSION['UsuarioID']) || ($_SESSION['UsuarioNivel'] != 'S')) {
	  header("Location: PHP/logout.php"); exit;
	}

	if (isset( $_GET['id'] ) && !empty( $_GET['id'])){
		$ingr_id = $_GET['id'];

		$q_ingr = "SELECT ingr_nome,
						  ingr_obs
					 FROM ingrediente
				    WHERE ingr_id = ".$ingr_id;
		$f_ingr = $conn->query($q_ingr);
		while ($r_ingr = $f_ingr->fetch_array()){

			$ingr = $r_ingr['ingr_nome'];
			$obs = $r_ingr['ingr_obs'];
		}
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
								<li><a href="cadastrar_ingr.php" id="btn-cadastrar-ingrediente" class="active">Cadastrar Ingredientes</a></li>
								<li><a href="cadastrar_empresa.php" id="btn-cadastrar-pizzaria">Cadastrar Pizzaria</a></li>
								<li><a href="empresas.php" id="btn-empresas">Empresas</a></li>
								<li><a href="usuarios.php" id="btn-usuarios">Usuários</a></li>
								<li><a href="PHP/logout.php" id="btn-logout">Logout</a></li>
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
					echo '
					<form method="POST" action="PHP/cadastrar_ingr_bd.php" data-toggle="validator" role="form">
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="tel">Ingrediente:</label>
								<input type="text" id="ingr" name="ingr" class="form-control" placeholder="Ingrediente" value="'.$ingr.'" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="cel">Observações:</label>
								<input type="text" id="obs" name="obs" class="form-control" placeholder="Observações" value "'.$obs.'">';
								if (isset( $_GET['id'] ) && !empty( $_GET['id'])) {
									echo '<input type="hidden" id="ingr_id" name="ingr_id" class="form-control" value="'.$ingr_id.'">';
								}
								echo '
							</div>
						</div>
						<br>
						<input name="submit" type="submit" value="Submeter" class="btn btn-success">
										
					</form>';
					?>
				</div>
			</section>
		</section>



	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.min.js">	</script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>
</html>