<?php
	// Abrindo conexão

	include 'conexao_bd.php';

	$conn = OpenCon();

	$emp_id = $_POST['emp_id'];
	$razao_social = $_POST['razao_social'];
	$nome_fantasia = $_POST['nome_fantasia'];
	$cnpj = $_POST['cnpj'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];
	$cep = $_POST['cep'];
	$bairro = $_POST['bairro'];
	$rua = $_POST['rua'];
	$numero = $_POST['numero'];
	$logradouro = $_POST['logradouro'];
	$tel = $_POST['tel'];
	$cel = $_POST['cel'];
	$msg = '';


	if (isset( $emp_id ) && !empty($emp_id)){
		$q_emp_update = "UPDATE empresa
							SET emp_estado = '$estado',
								emp_cidade = '$cidade',
								emp_cep = '$cep',
								emp_bairro = '$bairro',
								emp_rua = '$rua',
								emp_numero = '$numero',
								emp_logradouro = '$logradouro',
								emp_tel = '$tel',
								emp_cel = '$cel'
						  WHERE emp_id = ".$emp_id;

		if(mysqli_query($conn, $q_emp_update)){
	    	$msg = 'Empresa Atualizada!';
			header("Location: ../empresas.php?message=".$msg);
		} 
		else {
		    echo "Erro: Não foi possível executar o update: " . mysqli_error($conn);
		}		
	}
	else {
		//Verifica se a razão social já existe
		$q_verifica_rsocial = "SELECT DISTINCT 1
								 FROM empresa
								WHERE emp_razao_social = '".$razao_social."'";
		//Verifica se o CNPJ já existe
		$q_verifica_cnpj = "SELECT DISTINCT 1
							   FROM empresa
							  WHERE emp_cnpj = '".$cnpj."'";

		$f_verifica_rsocial = mysqli_query($conn, $q_verifica_rsocial);

		$f_verifica_cnpj = mysqli_query($conn, $q_verifica_cnpj);

		if (mysqli_num_rows($f_verifica_rsocial) > 0) {
			$msg = 'Razão Social já existe!';
			header("Location: ../cadastrar_empresa.php?message=".$msg);
		}
		else if (mysqli_num_rows($f_verifica_cnpj) > 0){
			$msg = 'CNPJ já existe!';
			header("Location: ../cadastrar_empresa.php?message=".$msg);
		}
		else {

			$q_emp_insert = "INSERT INTO empresa (emp_razao_social, emp_nome_fantasia, emp_cnpj, emp_estado, emp_cidade, emp_cep, emp_bairro, emp_rua, emp_numero, emp_logradouro, emp_data_criacao, emp_ativo, emp_tel, emp_cel) VALUES (
							                     '$razao_social', '$nome_fantasia',   '$cnpj',  '$estado',  '$cidade',  '$cep',  '$bairro',  '$rua',  '$numero',  '$logradouro',  sysdate(),        'S',       '$tel',  '$cel')";

			if(mysqli_query($conn, $q_emp_insert)){
		    	$msg = 'Empresa cadastrada!';
				header("Location: ../cadastrar_empresa.php?message=".$msg);
			} 
			else {
			    echo "Erro: Não foi possível executar a inserção: " . mysqli_error($conn);
			}			         
		}

	}
	CloseCon($conn);

?>