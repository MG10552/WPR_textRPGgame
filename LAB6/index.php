<?php
  
$x = 30; $y = 20;
for ($i=0; $i<$x; $i++)
{
	for ($j=0; $j<$y; $j++)
	{
	$subtable[$j] = '';
	}
 $ship_table[$i] =$subtable;
}
 $ship_table[12][15] = '<img src="Fighter012.png">';
 $ship_table[10][10] = '<img src="Fighter012.png">';
 $ship_table[9][1] = '<img src="Fighter012.png">';
 $ship_table[5][5] = '<img src="Fighter012.png">';
 
echo "<table border=\"1\" cellspacing=\"1\" width=\"6000\">";
	for ($i=0; $i<$x; $i++)
{
	echo "<tr>";

	for ($j=0; $j<$y; $j++)
	{
	echo "<td background=\"backg.jpg\" width=\"300\" height=\"198\">";
	echo $ship_table[$i][$j];
	echo "</td>";
	}
echo "</tr>";
}
echo "</table>";
?>






