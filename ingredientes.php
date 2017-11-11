<?php
	include 'PHP/conexao_bd.php';
	$conn = OpenCon();
	$msg = '';

	if (!isset($_SESSION)) {
		session_start();
	}

	if (!isset($_SESSION['UsuarioID']) || ($_SESSION['UsuarioNivel'] != 'S')) {
	  header("Location: PHP/logout.php"); exit;
	}

	function simNao($var){
		if ($var == 'S'){
			return 'Sim';
		}
		else {
			return 'Não';
		}
	}

	if ( isset( $_GET['action'] ) && $_GET['action'] == 'remove' ){
		
    	if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ){
    		$ingr_id = $_GET['id'];
    		$q_inativo_ingr = "UPDATE ingrediente
        				    	  SET ingr_ativo = 'N'
        				  		WHERE ingr_id = ".$ingr_id;
        	if(mysqli_query($conn, $q_inativo_ingr)){
	    		$msg = 'Ingrediente inativado!';
				header("Location: ingredientes.php?message=".$msg);
			} 
    	}
	}

	if ( isset( $_GET['action'] ) && $_GET['action'] == 'ativa' ){
		
    	if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ){
    		$ingr_id = $_GET['id'];
    		$q_inativa_ingr = "UPDATE ingrediente
        				    	  SET ingr_ativo = 'S'
        				  		WHERE ingr_id = ".$ingr_id;
        	if(mysqli_query($conn, $q_inativa_ingr)){
	    		$msg = 'Ingrediente ativado!';
				header("Location: ingredientes.php?message=".$msg);
			} 
    	}
	}

?>

<!DOCTYPE html>
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
								<li><a href="cadastrar_empresa.php" id="btn-cadastrar-pizzaria">Cadastrar Pizzaria</a></li>
								<li><a href="empresas.php" id="btn-empresas">Empresas</a></li>
								<li><a href="ingredientes.php" id="btn-ingredientes" class="active">Ingredientes</a></li>
								<li><a href="usuarios.php" id="btn-usuarios">Usuários</a></li>
								<li><a href="PHP/logout.php" id="btn-logout">Logout</a></li>
								</ul>
							</div>							
						</nav>
						<!--Menu area end-->
					</div>
				</div>
			</div>
		</header>;
									<?php
									echo ' <br> <br>
												<div class="container">';
												if(isset($_GET['message'])){
													echo $_GET['message'];
												}        
												echo  '<table class="table table-striped">
													    <thead>
													      <tr>
													        <th>Ingrediente</th>
													        <th>Obsservação</th>
													        <th>Ativo</th>
													        <th>Ativar/Inativar</th>
													        <th>Editar</th>
													      </tr>
													    </thead>
													    <tbody>';
										$q_ingr = "SELECT ingr_id,
															  ingr_nome,
															  ingr_obs,
															  ingr_ativo
														 FROM ingrediente";
										$f_ingr = $conn->query($q_ingr);

										while ($r_ingr = $f_ingr->fetch_array()){

											$v_ingr_id = $r_ingr['ingr_id'];
											$v_ingr_nome = $r_ingr['ingr_nome'];
											$v_ingr_obs = $r_ingr['ingr_obs'];
											$v_ingr_ativo = simNao($r_ingr['ingr_ativo']);

											echo '<tr>
											        <td>'.$v_ingr_nome.'</td>
											        <td>'.$v_ingr_obs.'</td>
											        <td>'.$v_ingr_ativo.'</td>
											        <td>';
											if ($v_ingr_ativo == 'Sim') {
												echo '<a title="inativar ingrediente" id="'.$v_ingr_id.'" href="ingredientes.php?action=remove&id='.$v_ingr_id.'">Inativar</td>';
											}
											else {
												echo '<a title="ativar ingrediente" id="'.$v_ingr_id.'" href="ingredientes.php?action=ativa&id='.$v_ingr_id.'">Ativar</td>';
											}
											
											echo '<td><a title="editar" id="'.$v_ingr_id.'" href="cadastrar_ingr.php?id='.$v_ingr_id.'">Editar</td>
											    </tr>';
										}
										CloseCon($conn);
												      
									echo '</tbody>
									   </table>
									</div>
									';
								   
								?>
<!-- 		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center image-center">
					<img src="img/image_slide.png" alt="">
				</div>	
			</div>
		</div> -->
		</section>



	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>