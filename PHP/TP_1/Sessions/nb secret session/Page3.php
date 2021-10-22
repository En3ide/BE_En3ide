<html>
<head>
	<title>Nombre Secret</title>
</head>
<body>

	<?php
		session_start();
		$Compteur =$_SESSION["Compteur"];
		$NbreAlea=$_SESSION['NbreAlea'];
		$NbreSaisi = $_POST['NbreSaisi'];
	?>
	
		<?PHP

		  if($NbreAlea == $NbreSaisi){
				echo "bien joue le nb mystere est $NbreSaisi ";
				echo "vous avez reussi en $Compteur essai(s)";
				echo '<FORM Action="Page1.php" Method="POST">';
				echo '<INPUT Type="Submit" Value="retour !">';
				echo '</FORM>';
		  }
		  if($NbreAlea < $NbreSaisi){
		    echo "Votre nombre est trop grand !!";
			echo '<FORM Action="Page2.php" Method="POST">';
				
					$Compteur= $Compteur+1;
			
					$_SESSION['NbreAlea']= $NbreAlea;
					$_SESSION['Compteur']= $Compteur;
				
			
			echo '<INPUT Type="Submit" Value="retour !">';
			echo '</FORM>';
			 }
		  if($NbreAlea > $NbreSaisi){
			echo "Votre nombre est trop petit !!";
			echo '<FORM Action="Page2.php" Method="POST">';
				
					$Compteur= $Compteur+1;
				
					$_SESSION['NbreAlea']= $NbreAlea;
					$_SESSION['Compteur']= $Compteur;
				
			
			echo '<INPUT Type="Submit" Value="retour !">';
			echo '</FORM>';
			 }
		  
		?>
	

</body>
</html>