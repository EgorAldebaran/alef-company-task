<?php

echo 'hello';



echo "****************************************************************************************************";
$numbers = array ( 3279, 920, 4181, 8, 337, 13, 918, 4923, 4448, 8, 4756, 4012,
7467, 89, 21, 2400, 4409, 6005, 3172, 55, 5, 6367, 8, 9970, 144, 1,
4360, 407, 7010, 9160, 7149, 9038, 9196, 8625, 662, 1597, 21, 2592, 1597, 5424,
2584, 2937, 1597, 9835, 7960, 2254, 3531, 8034, 9393, 807, 3225, 6765, 399, 3230,
34, 153, 2, 3980, 2093, 9238, 2326, 6453, 89, 4606, 3413, 3, 9950, 2098,
                   8579, 4914, 7204, 8875 );

sort($numbers);
$size = count($numbers)-1;
echo '<br>';
echo $numbers[0];
echo '<br>';
echo $numbers[$size];


$num = 0;
$n1 = 0;
$n2 = 1;

echo '<br>';
echo '<br>';

echo "<h2>fibonacci series for first 12 numbers: </h2>";
echo '<br>';
echo $n1.'  '.$n2.' ';

$system = array();



 while ($num < 20) {


    $n3 = $n2 + $n1;
    echo $n3;
    $system[] .= $n3;
    echo " ";
    $n1 = $n2;
    $n2 = $n3;
    $num += 1;

}
echo '<br>';
echo "****************************";
echo '<br>';

foreach ($system as $sys) {
    if ($sys < $numbers[$size]) {
    echo $sys;
    echo '<br>';
    }
}