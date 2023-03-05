<html>
<?php

function table2string($tab){
$string = " "; $string_end = " ";


foreach($tab as $i => $row){
	foreach($row as $j => $cell){
			$string[$j] = decbin($cell);
} 
$string_end[$i] = dechex(bindec($string));
} 
return $string_end;
}

$tab = array(); $tab1= array();

for ($i=0; $i<15; $i++){
	for ($j=0; $j<15; $j++){
	  $tab[$j]=rand(0,1);
	 //echo "$tab[j]<br>";  
	}
	$tab1[$i] = $tab;

}
foreach($tab1 as $row){
	foreach($row as $cell){
		echo "$cell";
		}
		echo "<br>";
}

	$yellowswag = $table2string($tab1);
		echo " <br>$yellowswag<br>";

?>
</html>
