<?php 

abstract class database {

public $servername;
public $username;
public $password ;
public $dbname;




//abstract public function accessingDb();

public function connect(){
	$this -> servername = "localhost";
	$this -> username = "root";
	$this -> password = "";
	$this -> dbname = "newAaditya"; 


	 $this->conn = new mysqli($this -> servername, $this -> username, $this -> password, $this-> dbname );

	if ($this->conn -> connect_error){
		die("connection failed: ". $this->conn -> connect_error);
	}



}

/*
public function createDb(){
	$sql = "CREATE DATABASE newAaditya";
	if($this->conn -> query($sql) === TRUE){
		echo "Database connected successfully";
	}else{
		echo "Error creating database: ". $this->conn -> error;
	}
} */


public function Insert($tableName, $data){

	$sql = 'INSERT INTO '.$tableName.' SET ';
	foreach ($data as $key => $value) {
		$sql .= $key.'="'.$value.'",';
	}
	$sql = rtrim($sql, ',');
	
	
	 
	 if($this->conn -> query($sql) === TRUE){
	 	echo "New record created successfully";
	 }else{
	 	echo "Error:". $sql. "<br>". $this->conn-> error;
	}
 }

 public function select($tableName, $data, $condition ){
 	$sql = 'SELECT ';
 	foreach($data as $value){
 		$sql .= $value. "," ;
 	}  
 	$sql = rtrim($sql, ',');
 	$sql .= ' FROM '. $tableName;

 	if (!empty($condition) ){
 			$sql .= " WHERE ";
 		foreach ($condition as  $key=> $value) {
 			$sql .= $key. '='. '"' .$value. '"'. ',';
 		}

 		$sql = rtrim($sql, ',');

 	}
 	//echo($sql);
 
 	 $r =mysqli_query($this->conn, $sql);
 	 $result = mysqli_fetch_assoc($r);
 	 print_r($result);

 }

public function update($tableName, $data, $condition){
	$sql = 'UPDATE '. $tableName. ' SET ';
	foreach ($data as $key=> $value){
		$sql .= $key . ' = '. '"'. $value. '"' . ',' ;
	}
	$sql = rtrim($sql, ',');

	$sql .= ' WHERE ';
		foreach ($condition as $key => $value) {
		  	$sql .= $key. '='. '"'.$value.'"'; 
		  }  
		 
	//echo ($sql);
	$r =mysqli_query($this->conn, $sql);
 	// $result = mysqli_fetch_assoc($r);


}


public function delete($tableName, $condition){
	$sql = 'DELETE FROM '. $tableName . ' WHERE ';
	foreach ($condition as $key => $value) {
		$sql .= $key. '='. '"'.$value. '"';  
	}

$r = mysqli_query($this->conn, $sql);
}


}

?>