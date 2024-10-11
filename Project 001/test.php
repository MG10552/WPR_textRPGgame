<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
	<html>
		<head>
			<title>Untitled</title></head>
		<body>
			<?
				$new = 0;
				$original = 0;
				$x = 1;

				echo $x,"<BR>";

				while($x <= 100) {
					$original = (100 * $x);
					echo "<BR>", $new, " + ", $original, "<BR>";
					$new = $new + $original;
					$x++;
				}

				echo "<BR>",$new,"<BR>";
				echo "<BR>",$x;
			?>
		</body>
	</html>