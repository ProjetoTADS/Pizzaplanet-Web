<?php
	// Abrindo conexão

	include 'conexao_bd.php';

	$conn = OpenCon();

	$login = $_POST['login'];
	$senha = $_POST['password'];
	$senha = md5($senha);
	$email = $_POST['email'];
	$empresa = $_POST['empresa'];
	$msg = '';

	//Verifica se o usuário já existe
	$q_verifica_usuario = "SELECT DISTINCT 1
							 FROM usuario
							WHERE user_name = '".$login."'";
	//Verifica se o e-mail já existe
	$q_verifica_email = "SELECT DISTINCT 1
						   FROM usuario
						  WHERE user_email = '".$email."'";

	$f_verifica_usuario = mysqli_query($conn, $q_verifica_usuario);

	$f_verifica_email = mysqli_query($conn, $q_verifica_email);

	if (mysqli_num_rows($f_verifica_usuario) > 0) {
		$msg = 'Usuário já existe!';
		header("Location: ../cadastrar_user.php?message=".$msg);
	}
	else if (mysqli_num_rows($f_verifica_email) > 0){
		$msg = 'E-mail já existe!';
		header("Location: ../cadastrar_user.php?message=".$msg);
	}
	else {

		$q_user_insert = "INSERT INTO usuario (user_name, user_senha, user_email, user_emp_id, user_data_criacao, user_ativo, user_admin) VALUES (
						                       '$login',  '$senha',   '$email',   '$empresa',  sysdate(),         'S',        'N')";

		if(mysqli_query($conn, $q_user_insert)){
	    	$msg = 'Usuário cadastrado!';
			header("Location: index.php?message=".$msg);
		} 
		else {
		    echo "Erro: Não foi possível executar a inserção: " . mysqli_error($link);
		}			         
	}
	CloseCon($conn);

?>