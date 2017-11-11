<?php
	// Abrindo conexão
	include 'conexao_bd.php';

	$conn = OpenCon();

	$ingr_id = $_POST['ingr_id'];
	$ingr = $_POST['ingr'];
	$obs = $_POST['obs'];
	$msg = '';

    //Verifica se ingrediente já existe
	$q_verifica_ingr = "SELECT DISTINCT 1
						  FROM ingrediente
					     WHERE ingr_nome = '".$ingr."'
					       AND ingr_id != ".$ingr_id;

	$f_verifica_ingr = mysqli_query($conn, $q_verifica_ingr);

	if (mysqli_num_rows($f_verifica_ingr) > 0) {
		$msg = 'Ingrediente já existe!';
		header("Location: ../cadastrar_ingr.php?message=".$msg);
	}
	else {

		if (isset( $ingr_id ) && !empty($ingr_id)){
			$q_ingr_update = "UPDATE ingrediente
								 SET ingr_nome = '$ingr',
								 	 ingr_obs = '$obs'
							   WHERE ingr_id = ".$ingr_id;

			if(mysqli_query($conn, $q_ingr_update)){
		    	$msg = 'Ingrediente Atualizada!';
				header("Location: ../ingredientes.php?message=".$msg);
			} 
			else {
			    echo "Erro: Não foi possível executar o update: " . mysqli_error($conn);
			}		
		}
		else {

			$q_ingr_insert = "INSERT INTO ingrediente (ingr_nome, ingr_obs, ingr_data_criacao, ingr_ativo) VALUES (
							                           '$ingr',   '$obs',   sysdate(),         'S')";

			if(mysqli_query($conn, $q_ingr_insert)){
		    	$msg = 'Ingrediente cadastrado!';
				header("Location: ../cadastrar_ingr.php?message=".$msg);
			} 
			else {
			    echo "Erro: Não foi possível executar a inserção: " . mysqli_error($conn);
			}
		}			         
	}
	CloseCon($conn);

?>