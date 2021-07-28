<?php
echo "<pre>";
echo"<h1> Array Functions </h1>";
echo"!!!!!!!!!!!!!!!!!!!!! <h2>Ascending</h2>!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$numbers = array("123", "1058", "14066" ,"567", "345" );
sort($numbers);
print_r($numbers);
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!! <h2>Descending</h2> !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$numbers = array("126563", "5671058", "10988066" ,"967", "5345" );
rsort($numbers);
print_r($numbers);
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!<h2> minimum </h2>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
echo "<br>";
echo "the minimum value is".(min(array(4676547,167657567506,6684561,1234567772)));
echo "<br>";
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!! <h2>maximum</h2>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
echo "<br>";
echo "the maximum value is".(max(array(447,106,84561,1234567772)));
echo "<br>";
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!<h2>array_push</h2>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$c=array("12345","56756757575");
print_r($c);
array_push($c,"43545646756","2434367565897436");
print_r($c);
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!!!! <h2>array_pop</h2> !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$a=array("PALAK","ASHISH","121","abcd");
print_r($a);
array_pop($a);
array_pop($a);
print_r($a);
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!<h2>array_change_key_case Lower</h2>!!!!!!!!!!!!!!!!!!";
echo "<br>";
$a= array('fIRSt_name' => 'palak' , 'sECoNd_name' => 'talwar');
print_r(array_change_key_case($a,CASE_LOWER));
echo "<br>";
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!<h2>array_change_key_case UPPER</h2>!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$c= array('fIRSt_name' => 'palak' , 'sECoNd_name' => 'talwar');
print_r(array_change_key_case($c,CASE_UPPER));
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!!!!<h2> array_chunk</h2> !!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$input_array= array('s','a','n','g','e','e','t','a' );
print_r(array_chunk($input_array, 2 , true));
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!!!! <h2>array_column</h2> !!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$records = array(
	array('id' => '45' , 'fIRSt_name' => 'palak' , 'Last_name' => 'talwar'),

	array('id' => '145' , 'fIRSt_name' => 'preetika' , 'Last_name' => 'pal'),

	array('id' => '2045' , 'fIRSt_name' => 'Rohit' , 'Last_name' => 'Sunaina'),

	array('id' => '3145' , 'fIRSt_name' => 'komal' , 'Last_name' => 'Rohella')
);
$fIRSt_name = array_column($records, 'Last_name');
print_r($fIRSt_name);
echo "<br>";
$Last_name = array_column($records, 'fIRSt_name', 'id');
print_r($Last_name);
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!!!! <h2>array_combine</h2> !!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$x = array('sky','moon','sun','stars');
$y = array('blue','white','yellow','cyan or mixture of all' );
$z = array_combine($x, $y);
print_r($z);
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!!!! <h2>array_count_values</h2> !!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$array = array ('priya','payal','sonalika',23,32,45,'priya','sonalika',23,45,67,78,90);
print_r(array_count_values($array));
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!!!! <h2>array_fill_keys</h2> !!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$keys = array('payal',3,4,'krishma');
print_r(array_fill_keys($keys, 'Mehra'));
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!!!! <h2>array_fill</h2> !!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$value = array_fill(7, 12, 'laravel');
print_r($value);
echo "<br>";
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!!!! <h2>array_fill</h2> !!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$value = array_fill(-5, 12, 'Php');
print_r($value);
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!! <h2>array_fill_keys with range</h2>!!!!!!!!!!!!!!!!!!";
echo "<br>";
print_r(array_fill_keys(range(-7, 7), 'coding'));
echo "<br>";
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!!!! <h2>array_filter</h2> !!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
function odd($var)
{
	return $var & 1;
}
function even($var)
{
	return !($var & 1);
}
$m = array('palak' =>27 , 'krishma' =>16 ,'ASHISH' => 45 , 'sonam'=> 78,'singh' => 9,
	'kerry' => 567);
$n = array(5,89,56,77,678);
echo "Odd :\n";
print_r(array_filter($m ,"odd"));
echo "Even :\n";
print_r(array_filter($n ,"even"));
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!!!! <h2>array_flip</h2> !!!!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$b = array('house','car','bike','activa');
print_r(array_flip($b));
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!! <h2>array_intersect_assoc</h2> !!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$var1 = array('k' => 'green' , 'a' => 'blue' ,'S' => 'black','white');
$var2 = array('k'=> 'green','cyan' , 'h' => 'orange' , 'S' => 'black','brown');
print_r(array_intersect_assoc($var1, $var2));
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!! <h2>array_intersect_key</h2> !!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$num1 = array('blue' => 1, 'cyan' => 2, 'green' => 3, 'pink' => 4);
$num2 = array('blue' => 5, 'black' => 6, 'brown' => 7, 'cyan' => 8);
var_dump (array_intersect_key($num1, $num2));
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!! <h2>array_intersect_uassoc</h2> !!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$number1 = array('blue' => 'a', 'cyan' => 'b', 'green' => 'c', 'pink' => 'd');
$number2 = array('Blue' => 'a', 'CYAN' => 'b', 'black','brown' => 'f');
print_r(array_intersect_uassoc($number1, $number2,"strcasecmp"));
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!! <h2>array_intersect_ukey</h2> !!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
function key_compare($key1 , $key2)
{
	if($key1 == $key2)
	{
		return 0;
	}
	elseif ($key1 > $key2)
	{
		return 1;
	}
	else
	{
		return -1;
	}
}
$vars1 = array('blue' => 1, 'cyan' => 2, 'green' => 3, 'pink' => 4);
$vars2 = array('blue' => 5, 'black' => 6, 'brown' => 7, 'cyan' => 8);
var_dump (array_intersect_ukey($vars1, $vars2 ,"key_compare"));
echo "<br>";
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!! <h2>array_intersect</h2> !!!!!!!!!!!!!!!!!!!!!!!!";
$s = array(1 => 'purple', 2 => 'pink', 3 => 'red' , 4 => 'white');
$d = array(5 => 'pista', 6 => 'pink', 7 => 'green' , 8 => 'white');
print_r(array_intersect($s, $d));
echo "<br>";
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!! <h2>array_key_first</h2> !!!!!!!!!!!!!!!!!!!!!!!!";
echo "<br>";
$search_array = array('first' => 1, 'second' => 2, 'third' => 79);
print_r(array_key_first($search_array));
echo "<br>";
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!! <h2>array_map</h2> !!!!!!!!!!!!!!!!!!!!!!!!";
function cube($n)
{
   return($n*$n*$n);
}
$a = array(2,5,9,34,67);
print_r(array_map('cube',$a));
echo "<br>";
echo "<br>";
echo"!!!!!!!!!!!!!!!!!!!!!! <h2>array_map</h2> !!!!!!!!!!!!!!!!!!!!!!!!";
function my ($value)
{
   return($value * 2);
}
print_r(array_map('my',range(18,35)));
echo "</pre>";
?>


