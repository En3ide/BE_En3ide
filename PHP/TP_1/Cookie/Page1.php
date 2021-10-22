<?php
	$NbreAlea = rand(0,100);//Nombre Aleatoire
	$NbreTy = 1; //Number Try
	$VP1=true; //Viens page 1
	$P2C=false; //Temoin Page 2 chargé
	$P3C=false; //Temoin Page 3 chargé
	setcookie('NbreAlea', $P2C, time() + 365*24*3600, null, null, false, true);
	setcookie('NbreAlea', $P3C, time() + 365*24*3600, null, null, false, true);
	setcookie('NbreAlea', $NbreAlea, time() + 365*24*3600, null, null, false, true);
	setcookie('NbreTy', $NbreTy, time() + 365*24*3600, null, null, false, true);
	//echo 'Presence page 1 chargée : '.$_COOKIE['P1C'];
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Le nombre Secret</title>
</head>
<body>
	
	<center>
	<H1>Le nombre secret</H1>
	<P>
	Devinez le nombre genere aleatoirement avec le minimum d'essai possible.
	</P>

	<FORM Action="Page2.php" Method="POST">
		<?php
			echo '<input type="hidden" name="VP1" value="'.$VP1.'"/>';
		?>
		<INPUT Type="Submit" Value="Jouer !">
	</FORM>
	<?php
		//echo 'Voici le nombreAlea : '.$NbreAlea.'</br>';
	?>
	</center>

</body>
</html>