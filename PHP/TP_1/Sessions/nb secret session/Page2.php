<html>
<head>
	<title>Decouverte nombre secret</title>
</head>
<body>

	<?php
		session_start();	
		echo $_SESSION["NbreAlea"];
		echo "<br>";
		echo $_SESSION["Compteur"];
		/* Verifier que la variable $Alea existe et incr�menter le compteur */
	?>

	<form action="Page3.php" Method="POST">
		Trouvez le nombre secret : 
		<INPUT Type="text" Name="NbreSaisi">
		<?php
		
		?>
		<INPUT Type="Submit" Value="Envoyer">
	</form>

</body>
</html>