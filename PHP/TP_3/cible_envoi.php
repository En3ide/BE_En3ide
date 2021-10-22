<head>
    <title> Upload </title>
    <meta charset='UTF-8'>
</head>
<?php
//==================Debut=================
$FILENAME = '';
$To = 'Upload/';

$FILENAME = _checkfile($To);
$_FILEPATH = $To.$FILENAME;

if($_FILES['config']['type']=='text/xml') {
    echo '!!! xml</br>';
    $_OBJ = _openxml($_FILEPATH);
    json_conf_OR_name($_OBJ);
}if($_FILES['config']['type']=='application/json') {
    echo '!!! json</br></br>';
    $_OBJ = _openjson($_FILEPATH);
    json_conf_OR_name($_OBJ);
}
//===================Fin===================
function _checkfile($to){
    if(isset($_FILES['config'])) {
        if($_FILES['config']['size'] <= 10000) {
            if($_FILES['config']['type'] == 'application/json'
            or $_FILES['config']['type'] == 'text/xml'){
                //move_uploaded_file(c $_FILES['monfichier']['tmp_name']);
                move_uploaded_file($_FILES['config']['tmp_name'], $to.
                basename($_FILES['config']['name']));
                $FILE = $_FILES['config']['name'];
                echo 'Le fichier <span style=\'color: red;\'>'.$FILE.'</span> a bien été upload.</br>';
                return $FILE;
            }else{echo 'Désolé, Mais l\'extension du fichier n\'est pas bonne.'.'</br>';
                _upload();}
        }else{echo 'Désolé, mais la taille ne doit pas dépassé 100 KO.'.'</br>';
            _upload();}
    }else{echo 'Désolé, mais le format du fichier n\'est pas bon ^_^'.'</br>';
        _upload();
    }
}
function _upload(){
    header('Location: upload.html');
}
//=================XML=======================
function _openxml($_FILEPATH) {
    $obj = simplexml_load_file($_FILEPATH);
    return $obj;
}
//=================JSON======================
function _openjson($_FILEPATH){
    $data = file_get_contents($_FILEPATH); // mettre le contenu du fichier dans une variable
    $obj = json_decode($data); // décoder le flux JSON
//    echo $obj;
    return $obj; //echo $data;
}
//=================Fonction commune ==========================
function json_conf_OR_name($Tab_display){
    if(isset($Tab_display->nodes)) {
        DisplayNode($Tab_display);
    }
    try {
        if(is_array($Tab_display)) {
            DisplayName($Tab_display);
        }else{if(isset($Tab_display->row->age)) {
            DisplayName($Tab_display);}
        }
    } catch (Exception $ex) {
       echo $ex->getMessage();
    }
}

function DisplayNode($Tab_display) {
    echo 'Voici la liste des machines du réseaux :<table border = "1">';
    echo '<tr><td>Type</td><td>Interfaces</td><td>IP</td></tr>';
    foreach($Tab_display->nodes as $nodes) {
        echo '<tr><td>'.$nodes->type."</td></tr></br>";
        foreach($nodes->interfaces as $interfaces) {
            echo '<td></td><td>'.$interfaces->name.'</td>';
            foreach($interfaces->addresses as $addresses) {
                echo '<td>'.$addresses->address.'</td>';
            }echo '</br></tr>';
        }
    }echo '</br></table>';
}

function DisplayName($Tab_display) {
    if(isset($Tab_display->row)) {
        echo "Voici la liste des individue dans le JSON :</br>";
        foreach($Tab_display->row as $Tab) {
            echo $Tab->name.' ';
            echo $Tab->age.' ';
            echo $Tab->address.'</br>';
        }
    }else{
        echo "Voici la liste des individue dans le JSON :</br>";
        foreach($Tab_display as $Tab) {
            echo $Tab->name.' ';
            echo $Tab->age.' ';
            echo $Tab->address.'</br>';
        }
    }
}//var_dump($Tab_display->nodes[0]-> interfaces[0]->addresses[0]); 
?>