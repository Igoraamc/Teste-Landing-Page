<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'LeagueOfLegendsDBC');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("Erro ao conectar com o banco de dados.");

   if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
   }
   echo "Connected successfully";
?>