<?php

class DB{
     private $_pdo;
	 
	 
	 public function __construct(){
	     try{
		     $this->_pdo = new PDO('mysql:host=127.0.0.1;dbname=logtest', 'root', 'system11');
		     echo 'Connected<br>';
		 }//try
		 catch(PDOException $e){
		     exit($e->getMessage());
		 }//catch
	 }//__construct()
	 
	 public function query(){
	     $sql = 'select name from users where username = ?';
		 $query = $this->_pdo->prepare($sql);
		 $query->bindValue(1, 'mmm');
		 if($query->execute()){
		     echo 'Success<br>';
			 $result = $query->fetchAll(PDO::FETCH_OBJ);
		     print_r($result);
		 }
	 }//query()
}//class DB

$worker = new DB();
$worker->query();