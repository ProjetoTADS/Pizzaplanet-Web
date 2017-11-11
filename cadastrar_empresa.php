<?php
	include 'PHP/conexao_bd.php';
	$conn = OpenCon();

	$emp_razao_social = null;
	$emp_nome_fantasia = null;
	$emp_cnpj = null;
	$emp_rua = null;
	$emp_numero = null;
	$emp_bairro = null;
	$emp_cidade = null;
	$emp_estado = null;
	$emp_cep = null;
	$emp_logradouro = null;
	$emp_tel = null;
	$emp_cel = null;

	if (!isset($_SESSION)) {
		session_start();
	}

	if (!isset($_SESSION['UsuarioID']) || ($_SESSION['UsuarioNivel'] != 'S')) {
	  header("Location: PHP/logout.php"); exit;
	}

	if (isset( $_GET['id'] ) && !empty( $_GET['id'])){
		$emp_id = $_GET['id'];

		$q_empresas = "SELECT emp_razao_social,
							  emp_nome_fantasia,
							  emp_cnpj,
							  emp_rua,
							  emp_numero,
							  emp_bairro,
							  emp_cidade,
							  emp_estado,
							  emp_cep,
							  emp_logradouro,
							  emp_tel,
							  emp_cel
						 FROM empresa
					    WHERE emp_id = ".$emp_id;
		$f_empresas = $conn->query($q_empresas);
		while ($r_empresas = $f_empresas->fetch_array()){

			$emp_razao_social = $r_empresas['emp_razao_social'];
			$emp_nome_fantasia = $r_empresas['emp_nome_fantasia'];
			$emp_cnpj = $r_empresas['emp_cnpj'];
			$emp_rua = $r_empresas['emp_rua'];
			$emp_numero = $r_empresas['emp_numero'];
			$emp_bairro = $r_empresas['emp_bairro'];
			$emp_cidade = $r_empresas['emp_cidade'];
			$emp_estado = $r_empresas['emp_estado'];
			$emp_cep = $r_empresas['emp_cep'];
			$emp_logradouro = $r_empresas['emp_logradouro'];
			$emp_tel = $r_empresas['emp_tel'];
			$emp_cel = $r_empresas['emp_cel'];
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
								<li><a href="cadastrar_empresa.php" id="btn-cadastrar-pizzaria" class="active">Cadastrar Pizzaria</a></li>
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
					<form method="POST" action="PHP/cadastrar_empresa_bd.php" data-toggle="validator" role="form">
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="razao_social">Razão Social: </label>
								<input type="text" id="razao_social" name="razao_social" class="form-control"  placeholder="Razão Social" ';
								if (isset( $_GET['id'] ) && !empty( $_GET['id'])) {
									echo 'value="'.$emp_razao_social.'" readonly>';
								}
								else {
									echo ' required>';
								}
								echo '
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="nome_fantasia">Nome Fantasia:</label>
								<input type="text" id="nome_fantasia" name="nome_fantasia" class="form-control" placeholder="Nome Fantasia" ';
								if (isset( $_GET['id'] ) && !empty( $_GET['id'])) {
									echo 'value="'.$emp_nome_fantasia.'" readonly>';
								}
								else {
									echo ' required>';
								}
								echo '
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="cnpj">CNPJ:</label>
								<input type="text" id="cnpj" name="cnpj" class="form-control" placeholder="CNPJ" ';
								if (isset( $_GET['id'] ) && !empty( $_GET['id'])) {
									echo 'value="'.$emp_cnpj.'" readonly>';
								}
								else {
									echo ' required>';
								}
								echo '
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="tel">Telefone:</label>
								<input type="text" id="tel" name="tel" class="form-control" placeholder="Telefone" value="'.$emp_tel.'" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="cel">Celular:</label>
								<input type="text" id="cel" name="cel" class="form-control" placeholder="Celular" value="'.$emp_cel.'">
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="estado">Estado:</label>
								<input type="text" id="estado" name="estado" class="form-control" placeholder="Estado" value="'.$emp_estado.'" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="cidade">Cidade:</label>
								<input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" value="'.$emp_cidade.'" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="cep">CEP:</label>
								<input type="text" id="cep" name="cep" class="form-control" placeholder="CEP" value="'.$emp_cep.'" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="bairro">Bairro:</label>
								<input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" value="'.$emp_bairro.'" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="Rua">Rua:</label>
								<input type="text" id="rua" name="rua" class="form-control" placeholder="Rua" value="'.$emp_rua.'" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="numero">Número:</label>
								<input type="number" id="numero" name="numero" class="form-control" placeholder="Número" value="'.$emp_numero.'" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<br>
								<label for="logradouro">Logradouro:</label>
								<input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="Logradouro" value="'.$emp_logradouro.'" required>';
								if (isset( $_GET['id'] ) && !empty( $_GET['id'])) {
									echo '<input type="hidden" id="emp_id" name="emp_id" class="form-control" value="'.$emp_id.'">';
								}
							echo '</div>
						</div>'
						?>
						<br>
						<input name="submit" type="submit" value="Submeter" class="btn btn-success">
										
					</form>
				</div>
			</section>
		</section>



	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.min.js">	</script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
  		$('#cnpj').mask('99.999.999/9999-99');
  		$('#cep').mask('99999-999');
  		$('#tel').mask('(99) 9999-9999');
  		$('#cel').mask('(99) 9 9999-9999');
	});</script>
</body>
</html>