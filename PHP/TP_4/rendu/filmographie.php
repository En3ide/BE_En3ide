<head>
    <title> Filmographie </title>
    <meta charset='UTF-8'>
</head>
<?php
include "maLibSQL.pdo.php";

$sql="SELECT DISTINCT titre, genre, nomRole FROM Film, Role WHERE Role.idFilm = Film.idFilm AND Role.idActeur = ".$_GET['idArtiste']." LIMIT 0, 500;";
$Taille_listeOperateurs = SQLUpdate($sql);
$res = SQLSelect($sql);
if($res==false) {
    echo '<span style="color:brown">'.$_GET['prenom'].' '.$_GET['nom'].'</span>'.' n\'a joué dans aucun film, mais c\'était un metteur en scène et/ou un réal.</p>';
}else {
    echo "<table border=\"1\"><tr><th> Titre</th> <th> Genre</th> <th> Role</th></tr>";
    while($ligne = $res->fetch(PDO::FETCH_BOTH)){
    echo'<tr><td>'.$ligne[0].'</td> <td>'.$ligne[1].'</td> <td>'.$ligne[2].'</td></tr>';
    }
    echo "</table>";
}
/*	SQLUpdate($sql);
	SQLDelete($sql);
	SQLInsert($sql);
	SQLGetChamp($sql);
	SQLSelect($sql);
	parcoursRs($sql);*/
?>