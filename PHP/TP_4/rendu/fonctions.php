<?php
generer_select($nom,$liste);
function generer_select($nom,$liste){

	$str ="<select name=\"".$nom."\">";

	for($i=0;$i<count($liste);$i++){
		$str .= "<option value=\"".$liste[$i][0]."\">".$liste[$i][0]."</option>"; 		
	}
	$str .= "</select>";
	
	return $str;
}

?>