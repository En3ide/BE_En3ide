<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>Insertion config 1 </title>
    </head>
    <body>
        <?php 
			include "config.php";
			
			/* Ouvrir le fichier de config */
			$data = file_get_contents("Upload/config1.json");
            $obj = json_decode($data);
			
			foreach($obj->nodes as $node){
				//$liste .= "<p>type du  noeud : ".$obj->nodes[$i]->type."</p>";

				/*Insertion d'un device*/
                //$sql = "INSERT INTO `DEVICES` (`hostname_CLIENT`, `marque_CLIENT`, `modele_CLIENT`, `id_type_DEVICES_TYPE`) VALUES (\'ghgfd\', \'gfhgfh\', \'gfhgfdh\', \'5\');";
				$sql = "INSERT INTO `DEVICES` (`hostname_CLIENT`) VALUES ('".$node->hostname."');";
                $db->query($sql);

				/*Insertion des interfaces*/
				$sql = "INSERT INTO `".$User."`.`INTERFACES` (`id_interface_INTERFACES`, `nom_interface_INTERFACES`, `hostname_CLIENT`) VALUES (NULL, \'lo\', \'172.16.128.129\', \'RouterA\');";
				foreach($node->interfaces as $inter){
					$sql = "INSERT INTO `INTERFACES` (`id_interface_INTERFACES`, `nom_interface_INTERFACES`, `hostname_CLIENT`) VALUES (NULL, '".$inter->name."', '".$node->hostname."');";
					$db->query($sql);
					//echo "insertion interfaces !!!";
					echo "<p>".$sql."</p>";
				}	
			}
		?>
    </body>
</html>