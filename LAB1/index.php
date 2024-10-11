<html>
    <p> Hello World </p>
    <?php
        $zmienna= 1;
        $imie= 'Jannaj';
        echo " xXx ";
        echo "Hello <b> world </b>";
        echo "Hello <p class=\"myclass\"> world </p>";
        echo "Hello <p class='myclass'> world </p>";
        echo 'Hello <p class="myclass"> world, how are you? </p>';
        echo $imie;
        echo " hello ".$imie."</br> bye ";
        echo " helloween $imie</br> goodbye ";
        echo ' helloween $imie</br> goodbye. ';
    ?>
    <br/>

    <form method="GET" action="done.php">
    <b>OD:</b><input name="od" type="text"/>
    <br><b>DO:</b><input name="do" type="text"/></br>
    <br><button type="submit"> Zobacz jak rosnie jak Pan placi... </button></br></form>

    <?php
        $a[0]= 1;
        $a[1]= 2;
        $a[2]= 3;
        $a[3]= 4;
        $a[4]= 5;
        $a[5]= 6;
        $a[6]= 7;
        $a[7]= 8;
        $a[8]= 9;
        $a[9]= 10;
        $b

        foreach ($a as $x) {
            echo "<br>$x";
        }
?>
</html>