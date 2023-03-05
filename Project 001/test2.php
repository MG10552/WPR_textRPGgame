<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>
<?

$x = 1;
$total = 0;
$totalxp = 0;

while($x <= 100) {
	$original = (100 * ($x * $x));
	$new = ($original / ((int)($x * 10)));
	$totalxp = $totalxp + $original;
	$total = $total + $new;
	echo "<BR>",$original,"<BR>",$x,"<BR>",$new,"<BR>";
	$x++;
}

echo "<BR>XP: ",$totalxp,"<BR>";
echo "<BR>",$x,"<BR>";
echo "<BR>Time: ",$total;

?>


</body>
</html>
