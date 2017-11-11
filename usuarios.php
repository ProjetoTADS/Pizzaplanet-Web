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
    		$user_id = $_GET['id'];
    		$q_inativa_user = "UPDATE usuario
        				    	  SET user_ativo = 'N'
        				  		WHERE user_id = ".$user_id;
        	if(mysqli_query($conn, $q_inativa_user)){
	    		$msg = 'Usuário Inativado!';
				header("Location: usuarios.php?message=".$msg);
			} 
    	}
	}

	if ( isset( $_GET['action'] ) && $_GET['action'] == 'ativa' ){
		
    	if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ){
    		$user_id = $_GET['id'];
    		$q_inativa_user = "UPDATE usuario
        				    	  SET user_ativo = 'S'
        				  		WHERE user_id = ".$user_id;
        	if(mysqli_query($conn, $q_inativa_user)){
	    		$msg = 'Usuário Ativado!';
				header("Location: usuarios.php?message=".$msg);
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
								<li><a href="usuarios.php" id="btn-usuarios" class="active">Usuários</a></li>
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
													        <th>Usuário</th>
													        <th>E-mail</th>
													        <th>Ativo</th>
													        <th>Administrador</th>
													        <th>Ativar/Inativar</th>
													      </tr>
													    </thead>
													    <tbody>';
										$q_usuarios = "SELECT user_id,
															  user_name,
															  user_email,
															  user_ativo,
															  user_admin
														 FROM usuario
													    WHERE user_id != ".$_SESSION['UsuarioID']."
													      AND user_admin != 'S'";
										$f_usuarios = $conn->query($q_usuarios);

										while ($r_usuarios = $f_usuarios->fetch_array()){

											$v_user_name = $r_usuarios['user_name'];
											$v_user_email = $r_usuarios['user_email'];
											$v_user_ativo = simNao($r_usuarios['user_ativo']);
											$v_user_admin = simNao($r_usuarios['user_admin']);
											$v_user_id = $r_usuarios['user_id'];

											echo '<tr>
											        <td>'.$v_user_name.'</td>
											        <td>'.$v_user_email.'</td>
											        <td>'.$v_user_ativo.'</td>
											        <td>'.$v_user_admin.'</td>
											        <td>';
											if ($v_user_ativo == 'Sim') {
												echo '<a title="remover usuário" id="'.$v_user_id.'" href="usuarios.php?action=remove&id='.$v_user_id.'">Inativar</td>';
											}
											else {
												echo '<a title="ativar usuário" id="'.$v_user_id.'" href="usuarios.php?action=ativa&id='.$v_user_id.'">Ativar</td>';
											}
											
											echo '<td>
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