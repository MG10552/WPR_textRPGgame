<html>
  <?php
  //$mytable[1] = 0;
  //$mytable[2] = 1;
  //$mytable[3] = 2;
  //$mytable[4] = 3;
  //$mytable[5] = 4;
  //$mytable[6] = 5;
  //echo "<table border='1'>";
  //foreach($mytable as $x){
  //echo "<tr><td><br>$x</tr></td>";} 
  //echo "</table>";

  $array1 = array(4, 3, 3, 5);
  $array2 = array(4, 3, 3, 5);
  $array3 = array(3, 3, 4, 5);
  $array4 = array(3, 3, 4, 5);
  $duzoarr = array($array1, $array2, $array3, $array4); 
  $suma = 0;
  
  echo "<table border='1'>";
    foreach($duzoarr as $onetree) {
      //row = 0; column= 0;
      $wynik = 0;
      echo "<tr>";
    }
    
    foreach ($onetree as $key=>$value) {
      echo "<td>$value</td>"; 
      // $wynik = ($wynik += $value);
    }

    $column[$key] += $value; 
    $row += $value;
  
  //echo "<td>$wynik</td>";  
  echo "</tr>";   
  echo "</table>";
  
  ?>
</html>