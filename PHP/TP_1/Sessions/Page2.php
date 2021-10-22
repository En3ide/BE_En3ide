<html>
<head>
	<title>Decouverte nombre secret</title>
</head>
<body>
	<?php
		$NbreAlea=$_POST['NbreAlea'];
		if(isset($_POST['NbreTy'])) {
			$NbreTy=$_POST['NbreTy'];
			$NbreTyR=4-$NbreTy;
			echo "Voici le Nombre d'essaie qu'il te reste : ".$NbreTyR."</br>";
		} else {
			$NbreTy=1;
		}
		/*
		//NbreAlea
		if(isset($_POST['NbreAlea'])) {
			echo 'Variable NbreAlea present !</br>';
		}
		else {
			echo 'Variable NbreAlea Absente !</br>';
		}
		//NbreTy
		if(isset($_POST['NbreTy'])) {
			echo 'Variable NbreTy present !</br>';
		} else {
			echo 'Variable NbreTy Absente !</br>';
		}
		echo 'Nombre Aleatoire : '.$NbreAlea.'</br>';
		*/
	?>
	<form action="Page3.php" Method="POST">
		Trouvez le nombre secret : 
		<INPUT Type="text" Name="NbreSaisi">
		<?php
			echo '<input type="hidden" name="NbreAlea" value="'.$NbreAlea.'"/>';
			echo '<input type="hidden" name="NbreTy" value="'.$NbreTy.'"/>';
		?>
		<INPUT Type="Submit" Value="Envoyer">
	</form>
</body>
</html>