<html>
<head>
	<meta charset="UTF-8">
	<title>Nombre Secret</title>
</head>
<body>

	<?php
		$NbreTy=$_POST['NbreTy'];
		$NbreTy++;
		$NbreAlea=$_POST['NbreAlea'];
		$NbreSaisi=$_POST['NbreSaisi'];
		$_INPUTRePlay='<FORM Action="Page1.php">
							<INPUT Type="Submit" Value="Tu veux rejoué ?">
						</FORM>';
		$_INPUT_ReTy='<FORM Action="Page2.php" Method="POST">
						<input type="hidden" name="NbreTy" value="'.$NbreTy.'"/>
						<input type="hidden" name="NbreAlea" value="'.$NbreAlea.'"/>
						<INPUT Type="Submit" Value="Essaie encore ^_^">
					</FORM>';
		/* recuperer les valeurs passer par la m�thode POST */
		//echo "Nombre aleatoire : ".$NbreAlea."</br>";
		//echo "Nombre saisie : ".$NbreSaisi."</br>";
		if($NbreTy<4) {
		if($NbreAlea == $NbreSaisi){
			echo 'Bravo, tu as trouver !!';
				/* A compl�ter */
			echo $_INPUTRePlay;
		}
		if($NbreAlea < $NbreSaisi) {
		    echo "Votre nombre est trop grand !!</br>";
			echo $_INPUT_ReTy;
		}
		if($NbreAlea > $NbreSaisi){
			echo "Votre nombre est trop petit !!";
			echo $_INPUT_ReTy;
		}} else {
			echo "Désolé, mais tu as atteind le nombre d'essaie max ^_^ </br>";
			echo $_INPUTRePlay;
		}
	?>
</body>
</html>