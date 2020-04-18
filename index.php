<?php
//echo "hello";
//phpinfo();

define('YEAR', 2020);

$name = 'Ivan';
$surname = 'Petrov';
$age = 28;
$year = 2020;
//
//echo "My name is " .$name ." " .$surname ."<br />";
//echo "My age " .($year - $age) ."<br />";
//echo "My days " .($age * 365) ."<br />";
//echo "The year is ceil " . ceil($year / 1000) ."<br />";
//echo "The year is floor " . floor( $year / 1000) ."<br />";
//
//
//echo "<br />";
//
//echo "My name is  $name $surname <br />";
//echo 'My name is  $name $surname <br />';
//$born = $year - $age;
//echo "My age  $born <br />";
//echo "<br />";
//$years = $age *365;
//echo "Year  $years <br />";
//echo "<br />";
//$sentc = ceil(YEAR/1000);
//$sentf = floor(YEAR/1000);
//echo "The year is ceil  $sentc <br />";
//echo "The year is floor  $sentf <br />";
//echo "<br />";
//
//define('DOLLARSCOURCES', 27.397);
//$dollars = 100 * DOLLARSCOURCES;
//$grn = 100 / DOLLARSCOURCES;
//echo "100 $ сегодня стоят   $dollars гривен<br />";
//echo '100 грн сегодня стоят ' .round($grn,2) .' долларов<br />';
//
//echo "<br />";
//$bool = true;
//$boolfase = false;
////var_dump($bool);
//echo "<br />";
//var_dump((bool)$age);
//echo "<br />";
//var_dump((int)$age);
//echo "<br />";
//var_dump((array)$age);
//echo "<br />";
//var_dump((string)$age);
//echo "<br />";
//echo "<br />";
//
//echo "<br />";
//$array = [];
//var_dump($array);
//echo "<br />";
//$array[] = $name;
//$array[] = 'Text';
//var_dump($array);
//
//echo "<br />";
//$array[] = $name;
//$array[] = 'Text';
////var_dump($array);
//echo "<br />";
//echo $array[1];
//echo "<br />";
//echo "array <br />";
//
//

//$assoc = [];
//$assoc ['name'] = $name;
//$assoc ['surname'] = $surname;
//$assoc ['age'] = $age;
//$assoc ['year'] = $year;
////var_dump($assoc);
$assoc = [
    'name' => $name,
    'surname' => $surname,
    'age' => $age,
    'year' => $year,
];

echo "<br /><br />";
echo "new output array <br />";
echo "My name is  {$assoc ['name']}  {$assoc ['surname']} <br />";
echo "My year of born " .($assoc ['year'] - $assoc ['age']) ."<br />";
echo "My days " .($age * 365) ."<br />";
echo "The year is ceil " . ceil($assoc ['year'] / 1000) ."<br />";
echo "The year is floor " . floor( $assoc ['year'] / 1000) ."<br />";
echo "<br /><br />";


