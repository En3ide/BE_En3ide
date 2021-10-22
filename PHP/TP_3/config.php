<meta charset="UTF-8" />
<?php

/* Connexion à la base de données cinematheque depuis le serveur avec le login root
		et sans mot de passe */
		$User = "bailleul";
		$Passwd="1234";
		$db="bailleul";
		$dsn="mysql:host=172.16.154.251;dbname=".$db.""; /* chaine de connexion : data source name */
        
		/* utilisation d'une structure try catch pour se connecter au serveur */
		try{
		$db = new PDO($dsn,$User,$Passwd);
		} catch(PDOException $e){
			echo "<P> La base de données n'est pas accessible ! </p>";
		}

?>