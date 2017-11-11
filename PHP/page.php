
<?php

$ingredientes = $_POST['ingredientes'];


	foreach ($ingredientes as $key => $ing) {
		echo $ing."<br>";
	}

exit();




$con=mysqli_connect("localhost","root","123456","cnx");
// Check connection
if (mysqli_connect_errno())
  {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform a query, check for error
if (!mysqli_query($con,"INSERT INTO jira (nome, email, telefone,massa,ingredientes) VALUES ('".$nome."', '".$email."', '".$numero."','".$massa."','".$ingredientes."')"))
	{
  		echo("Não foi possivel salvar os dados ");
  		echo ("<a href=\"".$page."\">Voltar</a>");
  	}
else{
  	echo ("Dados salvos ");
  	echo ("<a href=\"".$page."\">Voltar</a>");
}
mysqli_close($con);
?>