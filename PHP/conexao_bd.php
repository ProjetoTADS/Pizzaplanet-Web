<?php
   

  function OpenCon()
   {

   // $dbhost = "sql312.epizy.com";
   // $dbuser = "epiz_20967590";
   // $dbpass = "uninove2016";
   // $db = "epiz_20967590_pizzago";

   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $db = "pizzago";


   $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexão falhou: %s\n". $conn -> error);

   
   return $conn;
   }
   
  function CloseCon($conn)
   {
   $conn -> close();
   }

?>