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
			$NbreAlea = rand(0,100);
			/*..........................*/
			echo '<input type="hidden" name="NbreAlea" value="'.$NbreAlea.'"/>';
		?>
		
		<INPUT Type="Submit" Value="Jouer !">
	</FORM>
	<?php
	//	echo $NbreAlea;
	?>
	</center>

</body>
</html>