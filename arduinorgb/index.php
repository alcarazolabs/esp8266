<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arduinorgb";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("No se puede conectar: " . $conn->connect_error);
}
$sql = "select * from objeto order by id desc";
$resprograma = $conn->query($sql);



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>DashBoard - Arduino RGB</title>
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
     	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	</head>
	<body>

	<div class="container">
		 <div class="row">	
			    <div class="col-sm-12">
			    <h4>Tabla de coles RGB de objetos:</h4>
			    <center>
				    <table class="table">
				    	<?php
					 	  	if ($resprograma->num_rows > 0) {
						   		 while($row = mysqli_fetch_array($resprograma)) {
						    ?>
				    	<tr>
				    		<th>ID</th>
				    		<th>R</th>
				    		<th>G</th>
				    		<th>B</th>
				    		<th>RGB</th>
				    	</tr>
				    <?php echo '<tr>'; ?>
				    <?php echo '<td>'.$row["id"].'</td>'; ?>
				    <?php echo '<td>'.$row["r"].'</td>'; ?>
					<?php echo '<td>'.$row["g"].'</td>'; ?>
					<?php echo '<td>'.$row["b"].'</td>'; ?>
					<?php echo '<td> <div <div style="background-color:rgb('.$row["r"].','.$row["g"].','.$row["b"].')"> &nbsp</div></td>'; ?>
				    <?php echo '</tr>'; ?>
				  
			    	<?php  } } ?>
			     
			    </table>
			</center>
		 </div>

	</div>

	</body>
</html>
