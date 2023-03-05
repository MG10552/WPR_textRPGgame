<?php
  header("Content-type: image/png");
  $im = imagecreatetruecolor(320,200);
  $color = imagecolorallocate($im,255,255,0);
  imagestring($im,1,10,10,"Hello world",$color);
  imageellipse($im, 200, 150, 300, 200, $color);
  imagepng($im);
  imagedestroy($im);
?>



