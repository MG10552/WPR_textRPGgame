<?php
  $src = imagecreatefromjpeg("iconAA1.jpg");
  $dst1 = imagecreatetruecolor(150,70);
  $dst2 = imagecreatetruecolor(150,70);
  
  imagecopyresized($dst1, $src, 10, 10, 10, 10, 23, 165, 240, 200);
  imagecopyresampled($dst2, $src, 10, 10, 10, 10, 23, 165, 140, 100);
  
  imagejpeg($dst1,"iconAA1.jpg",50);
  imagejpeg($dst2,"iconAA1.jpg",50);
	
  echo " <img src=\"iconAA1.jpg\" /><img src=\"iconAA1.jpg\" /><img src=\"iconAA1.jpg\" /><img src=\"iconAA1.jpg\" /> <img src=\"iconAA1.jpg\" />  <br /> <img src=\"iconAA1.jpg\" /> <img src=\"iconAA1.jpg\" /> <img src=\"iconAA1.jpg\" /> <img src=\"iconAA1.jpg\" />";
	echo " <img src=\"iconAA1.jpg\" /><br /><img src=\"iconAA1.jpg\" /><img src=\"iconAA1.jpg\" /><img src=\"iconAA1.jpg\" /> <img src=\"iconAA1.jpg\" />";
	echo " <img src=\"iconAA1.jpg\" /><br /><img src=\"iconAA1.jpg\" /><img src=\"iconAA1.jpg\" /><img src=\"iconAA1.jpg\" /> <img src=\"iconAA1.jpg\" />";
	echo " <img src=\"iconAA1.jpg\" /><br /><img src=\"iconAA1.jpg\" /><img src=\"iconAA1.jpg\" /><img src=\"iconAA1.jpg\" /> <img src=\"iconAA1.jpg\" />";
	echo " <img src=\"iconAA1.jpg\" /><br />";
  
  imagedestroy($src);
  imagedestroy($dst1);
  imagedestroy($dst2);
?>