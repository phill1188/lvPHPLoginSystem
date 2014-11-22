<?php
class User{
     private $_db;
	 
	 public function __construct($user = null){
	     $this->_db = DB::getInstance();
	 }//__construct()
	 
	 
	 public function create($fields = array()){
	     if(!$this->_db->insert('users', $fields)){
		     throw new Exception('There was a problem creating an account');
		 }//if
		 /*try{
		     $this->_db->insert('users', $fields);
		 }
		 catch(Exception $e){
		     exit($e->getMessage());
		 }*/
	 }//create()
}//class User