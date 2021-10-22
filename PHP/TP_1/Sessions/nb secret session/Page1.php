<html>
<head>
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
			$Compteur= 0;
			$NbreAlea = rand(0,100);
			session_start();
			$_SESSION['NbreAlea']= $NbreAlea;
			$_SESSION['Compteur']= $Compteur;
			

		?>
		
		<INPUT Type="Submit" Value="Jouer !">
	</FORM>
	</center>


</body>
</html>