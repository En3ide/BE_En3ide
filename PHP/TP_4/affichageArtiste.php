<head>
    <title> BDD </title>
    <meta charset='UTF-8'>
</head>
<?php
$Host="172.16.154.251";
$User = "cinematheque";
$Passwd="1234";
$BD="cinematheque";
$connexion= mysqli_connect($Host,$User,$Passwd,$BD);
$requete = "SELECT `nom`, `prenom` , `idArtiste` FROM `Artiste`;";
$listeOperateurs = mysqli_query($connexion,$requete);
/* Affichage de la premiere ligne du tableau */
echo "<table border=\"1\"><tr><th> Nom </th><th> Prenom</th><th> idArtiste</th></tr>";
/* Affichage de l'ensemble du résultat dans les lignes du tableau */
while($ligne = mysqli_fetch_row($listeOperateurs)){
echo "<tr><td>$ligne[0]</td><td>$ligne[1]</td><td>$ligne[2]</td></tr>";
}
/* fin du tableau */
echo "</table>";
?>