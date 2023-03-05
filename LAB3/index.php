<html>
<p> zadanie 3</p>
<?php
function yobro()
{
$enter = 0;

$data = " dzem jest niebieski. ";
foreach (count_chars ($data, 1) as $i => $val)
    {
        if ($enter == 1)
        {
            $enter = 0;
            continue;
        }
        if (chr ($i) == "\n")
        {
            echo "<br>There are $val instance(s) of \" Enter \" in the string.";
            $enter = 1;
        }
        else
        {
            echo "<br>There are $val instance(s) of \"" , chr ($i) , "\" in the string.";
        }
    }
}

yobro();
echo "<br></br>---K-o-n-w-e-r-t-e-r--s-z-y-f-r-u--C-e-z-a-r-a---<br></br>";
function Cezar($text, $offset)
{
$s = $_POST['s'];
$k = $_POST['k'];
$i=0;
if ($s and is_numeric($k)) {
$l = strlen ($s);
while ( $l>$i){
$z1 = ord(substr($s, $i, 1));
if(($z1>=97)&&($z1<=122)){
$z1=$z1+$k;
if($z1<97){
$z1=97-$z1;
$z1=123-$z1;
} else
if($z1>122){
$z1=$z1-122;
$z1=96+$z1;
}} else
if(($z1>=65)&&($z1<=90)){
$z1=$z1+$k;
if($z1<65){
$z1=65-$z1;
$z1=91-$z1;
} else
if($z1>90){
$z1=$z1-90;
$z1=64+$z1;
}}

$z2 = chr($z1); 
$w .= $z2; 
$i++; 

}

}
//----------------------------
$cenzura =array('dupa', 'kurewa', 'mufiny', 'debil', 'pierdole');
$ile = count($cenzura);

for ($i=0; $i<$ile; $i++)
{
  if (strstr($s, $cenzura[$i]));
  $dlugosc = strlen($cenzura[$i]);
  $s = str_replace($cenzura[$i], substr($cenzura[$i], 0, 1). '***'.substr($cenzura[$i], $dlugosc-1), $s);
}
//----------------------------


print '<FORM ACTION="" METHOD=POST>';
print '<input type="text" name="s"> Podaj text<br>';
print '<input type="text" name="k"> Klucz<br>';
print '<INPUT TYPE="submit" VALUE="Koduj"><br>';
print "<br></br> Po zakodowaniu <b>' $s '</b> z kluczem <b>' $k '</b> to : <b>' $w '</b> <br> ";
}
Cezar();
//---------------------------------------------------------------------------------------------------------



//----------------------------------------------------------------------------------------------------------
?>

</html>