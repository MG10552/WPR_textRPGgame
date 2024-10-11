<?php
    $od= $_GET['od'];
    $do= $_GET['do'];
    echo "<font color='DD55CC' >Podany zakres to ($od do $do). Liczby wypisano ponizej:<br></font>";
    
    for ($i = $od; $i <= $do; $i++) {
        echo "<font color='AA12FF' ><b>$i<br></b></font>";
    }
?>