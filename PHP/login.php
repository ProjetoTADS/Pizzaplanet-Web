<?php
	$msg = '';
	// Abrindo conexão
	include 'conexao_bd.php';
	$conn = OpenCon();

	$login = $_POST['login'];
	$senha = $_POST['password'];

	// Validação do usuário/senha digitados
	$sql = "SELECT user_id id, 
					 user_name nome, 
					 user_admin nivel
				FROM usuario 
			   WHERE (user_name = '".$login."')
			     AND (user_senha = '".md5($senha)."') 
			   LIMIT 1";
	$query = mysqli_query($conn, $sql);
	if (mysqli_num_rows($query) != 1) {

	  $msg = 'Usuário não existe!';
	  header("Location: ../index.php?message=".$msg);

	} 
	else {
	    // Salva os dados encontados na variável $resultado
	    $resultado = mysqli_fetch_assoc($query);
	    // Verifica usuário ativo
	    $q_verifica_ativo = "SELECT IFNULL(user_ativo, 'S') ativo
	    					   FROM usuario
	    					  WHERE user_id = '".$resultado['id']."'
	    					  LIMIT 1";

	   	$f_verifica_ativo = $conn->query($q_verifica_ativo);

	    $r_verifica_ativo = $f_verifica_ativo->fetch_assoc();
	    if ($r_verifica_ativo['ativo'] == 'S') {

		    if (!isset($_SESSION)) session_start();

		        // Salva os dados encontrados na sessão
		        $_SESSION['UsuarioID'] = $resultado['id'];
		        $_SESSION['UsuarioNome'] = $resultado['nome'];
		        $_SESSION['UsuarioNivel'] = $resultado['nivel'];

		    header("Location: ../index.php"); exit;
		}
		else {
			$msg = 'Usuário está desativado!';
			header("Location: ../index.php?message=".$msg);
		}
	}


	CloseCon($conn);

?>