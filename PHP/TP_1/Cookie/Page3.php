<?php
	$P3C=true; //Temoin Page 3 chargé
	if(isset($_POST['VP1'])) {//Viens page 1
		$VP1=$_POST['VP1'];
	}else {header('Location: Page1.php');}
	setcookie('P3C', $P3C, time() + 365*24*3600, null, null, false, true);
	if(isset($_COOKIE['P2C'])) {
		$P2C=$_COOKIE['P2C'];
	}else {header('Location: Page1.php');}//Redirect =====P2C====Page1
	if(isset($_COOKIE['NbreAlea'])) {
		$NbreAlea=$_COOKIE['NbreAlea'];
	}else {header('Location: Page1.php');}//Redirect =====NbreAlea====Page1
	if(isset($_COOKIE['NbreTy'])) {
		$NbreTy=$_COOKIE['NbreTy'];
		$NbreTyR=3-$NbreTy;
		echo "Voici le Nombre d'essaie qu'il te reste : ".$NbreTyR."</br>";
	}else {header('Location: Page1.php');}//Redirect =====NbreTy=======Page1
	if(isset($_POST['NbreSaisi'])) {
		$NbreSaisi=$_POST['NbreSaisi'];
	}else {header('Location: Page1.php');}
	//echo 'Voici le cookie : 2='.$_COOKIE['P2C'].'// 1='.$_COOKIE['P1C'].'</br>';
	//echo 'Voici le cookie : '.$_COOKIE['NbreAlea'].'</br>';
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Nombre Secret</title>
</head>
<body>

	<?php
		$NbreTy++;
		$_INPUTRePlay='<FORM Action="Page1.php">
							<INPUT Type="Submit" Value="Tu veux rejoué ?">
						</FORM>';
		$_INPUT_ReTy='<FORM Action="Page2.php" Method="POST">
						<input type="hidden" name="VP1" value="'.$VP1.'"/>
						<INPUT Type="Submit" Value="Essaie encore ^_^">
					</FORM>';
		if($NbreTy<4) {
		if($_COOKIE['NbreAlea'] == $NbreSaisi){
			echo 'Bravo, tu as trouver !!';
			echo $_INPUTRePlay;
		}
		if($_COOKIE['NbreAlea'] < $NbreSaisi) {
		    echo "Votre nombre est trop grand !!</br>";
			setcookie('NbreTy', $NbreTy, time() + 365*24*3600, null, null, false, true);
			echo $_INPUT_ReTy;
		}
		if($_COOKIE['NbreAlea'] > $NbreSaisi){
			echo "Votre nombre est trop petit !!";
			setcookie('NbreTy', $NbreTy, time() + 365*24*3600, null, null, false, true);
			echo $_INPUT_ReTy;
		}} else {
			echo "Désolé, mais tu as atteind le nombre d'essaie max ^_^ </br>";
			echo $_INPUTRePlay;
		}
	?>
</body>
</html>