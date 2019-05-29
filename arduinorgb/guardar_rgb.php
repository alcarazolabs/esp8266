<?php 
echo @$_GET["rgb"];
if(isset($_GET["rgb"])){
		$valores = explode("-", $_GET["rgb"]);

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "arduinorgb";


		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "INSERT INTO objeto (r,g,b) VALUES(".$valores[0].", ".$valores[1].", ".$valores[2].")";
		$result = $conn->query($sql);

		
		if($result){
			echo 'Codigo RGB guardado';
		}else{
			echo 'No se pudo guardar en la base de datos..';
		}
		
	}


?>