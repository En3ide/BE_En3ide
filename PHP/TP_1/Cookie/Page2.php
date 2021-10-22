<?php
	$P2C=true; //Temoin Page 2 chargé
	setcookie('P2C', $P2C, time() + 365*24*3600, null, null, false, true);
	if(isset($_POST['VP1'])) { //Viens page 1
		$VP1=$_POST['VP1'];
	}else {header('Location: Page1.php');}
	if(isset($_COOKIE['NbreTy'])) {
		$NbreTy=$_COOKIE['NbreTy'];
		$NbreTyR=4-$NbreTy;
		echo "Voici le Nombre d'essaie qu'il te reste : ".$NbreTyR."</br>";
	}else {$NbreTy=1;}
	if(isset($_COOKIE['NbreAlea'])) {
		$NbreAlea=$_COOKIE['NbreAlea'];
	}else {header('Location: Page1.php');}//Redirect =====NbreAlea====Page1
	//echo 'Voici le cookie : 2='.$_COOKIE['P2C'].'// 1='.$_COOKIE['P1C'].'</br>';
	//echo 'Voici le cookie NombreAlea : '.$_COOKIE['NbreAlea'];
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Decouverte nombre secret</title>
</head>
<body>
	<form action="Page3.php" Method="POST">
		Trouvez le nombre secret : 
		<?php echo '<input type="hidden" name="VP1" value="'.$VP1.'"/>';?>
		<INPUT Type="text" Name="NbreSaisi">
		<INPUT Type="Submit" Value="Envoyer">
	</form>
</body>
</html>