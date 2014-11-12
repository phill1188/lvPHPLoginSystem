<?php
class DB{
     private static $_instance = null;
	 static $_pdo,
	        $_error = false,
			$_results,
			$_count = 0;
	 
	 
	 //uses singleton pattern to instantiate DB objects
	 private function __construct(){
	     try{
		     $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
		 }//try
		 catch(PDOException $e){
		     exit($e->getMessage());
		 }//catch
	 }//__construct()
	 
	 
	 public static function getInstance(){
	     if(!isset(selft::$_instance)){
		     self::$_instance = new DB();
		 }//if
		 return self::$_instance;
	 }//getInstance()
}//class DB