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
			
			function effacer_Table($objPDO){
				$sql = "DELETE FROM `INTERFACES`";
				$objPDO->query($sql);
				$sql = "DELETE FROM `DEVICES`";
				$objPDO->query($sql);
			}
			/*	La fonction is_Present_Type_Device($table,$champ) vérifie si le champ est présent dans la table Type_Device.
				Elle retourne False s'il n'est pas présent sinon elle retourne son ID.*/
			function is_Present_Type_Device($objPDO,$table,$champ){				
				$sql = "SELECT `id_type_DEVICES_TYPE` FROM `".$table."` WHERE `nom_type_DEVICES_TYPE`= '".$champ."';";
               	$res=$objPDO->query($sql);
				$val = false;
				while ($row = $res->fetch()){
					$val = $row[0];								
				}return $val;
			}
			/*	Cette fonction prend en paramètre le nom du type de device à insérer
				Elle retourne l'id de l'enregistrement. */
			function insert_Type_Device($objPDO,$nom){
				$res = is_Present_Type_Device($objPDO,"DEVICES_TYPE",$nom);				
				if($res == false){
					$sql = "INSERT INTO `DEVICES_TYPE` (`id_type_DEVICES_TYPE`, `nom_type_DEVICES_TYPE`) VALUES (NULL, '".$nom."');";
					$res=$objPDO->query($sql);
					$res=$objPDO->lastInsertId();
				}return $res;
			}
			/*	Cette fonction prend en paramètre le nom du type de device à insérer
				Elle retourne l'id de l'enregistrement. */
			function insert_Device($objPDO,$hostname,$id_Type_Device){
					$sql = "INSERT INTO `DEVICES` (`hostname_CLIENT`,`id_type_DEVICES_TYPE`) VALUES ('".$hostname."',".$id_Type_Device.");";
					$res=$objPDO->query($sql);
					$res=$objPDO->lastInsertId();
				return $res;				
			}
			
			/*	Ouvrir le fichier de config */
			$data = file_get_contents("config1.json");
            $obj = json_decode($data);
			
			/*	Effacer la table DEVICES*/
			effacer_Table($db);
			
			foreach($obj->nodes as $node){
					
				//$liste .= "<p>type du  noeud : ".$obj->nodes[$i]->type."</p>";
				
				/*Vérifie si le type_device existe, sinon, elle l'insère dans la table*/
                $id_Type_Device = insert_Type_Device($db,$node->type);
				//echo "<p> l'id est : ".$id_Type_Device."</p>";

				/*Insertion d'un device*/
                //$sql = "INSERT INTO `DEVICES` (`hostname_CLIENT`, `marque_CLIENT`, `modele_CLIENT`, `id_type_DEVICES_TYPE`) VALUES (\'ghgfd\', \'gfhgfh\', \'gfhgfdh\', \'5\');";
				insert_Device($db,$node->hostname,$id_Type_Device);
				
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