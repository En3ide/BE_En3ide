<head>
    <meta charset='UTF-8'>
    <title> Test_01 </title>
</head>
<?php
include "maLibSQL.pdo.php";
$sql="SELECT nom, prenom ,idArtiste FROM Artiste";
$res = SQLSelect($sql);
//var_dump($res);
echo "<table border=\"1\"><tr><th> Nom </th><th> Prenom</th><th> idArtiste</th></tr>";
/* Affichage de l'ensemble du résultat dans les lignes du tableau */
while($ligne = $res->fetch(PDO::FETCH_BOTH)){
echo '<tr><td>'.$ligne[0].'</td>  <td>'.$ligne[1].'</td>  <td><a href="filmographie.php?idArtiste='.$ligne[2].'&nom='.$ligne[0].'&prenom='.$ligne[1].'">Filmographie</a></td></tr>';
}//code inniter vue/controller
echo "</table>";
/*	SQLUpdate($sql);
	SQLDelete($sql);
	SQLInsert($sql);
	SQLGetChamp($sql);
	SQLSelect($sql);
	parcoursRs($sql);
*/
?>