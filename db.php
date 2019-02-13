<?php 
include ('database.php');
class db extends database{



	
}

$obj = new db ();

$data = array(
'name' => 'Raja',
'address' => 'lawane desh',
'email' => 'r@gmail.com',
'country' => 'Republica of lawane'

);


$obj -> connect();

//$obj -> createDb();

//$obj->Insert('myNaya',$data);


$data1 = array(
	'name',
	'address'
	
);

$condition = array(
	'id'=>1
	

);
$obj -> select('myNaya', $data1, $condition );



$data2 = array (
'country'=>'lawane'
);

$condition1 = array(
'id' => 3
);

//$obj -> update('myNaya', $data2, $condition1);


$condition2 = array (
'id'=>1
);

//$obj -> delete('myNaya', $condition2);
?>