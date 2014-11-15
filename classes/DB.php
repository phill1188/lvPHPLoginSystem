<?php
class DB{
     private static $_instance = null;
	 static $_pdo,
	        $_query,
	        $_error = false,
			$_results,
			$_count = 0;
	 
	 
	 //uses singleton pattern to instantiate DB object only once
	 private function __construct(){
	     try{
		     $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
		 }//try
		 catch(PDOException $e){
		     exit($e->getMessage());
		 }//catch
	 }//__construct()
	 
	 
	 public static function getInstance(){
	     if(!isset(self::$_instance)){
		     self::$_instance = new DB();
		 }//if
		 return self::$_instance;
	 }//getInstance()
	 
	 
	 public function query($sql, $params = array()){
	     
		 $this->_error = false;
		 
		 if($this->_query = $this->_pdo->prepare($sql)){
		     $questionMark = 1;
			 if(count($params)){ //check if $params is empty
			     foreach($params as $param){
				     echo $param.'<br>';
					 echo $questionMark.'<br>';
				     $this->_query->bindValue($questionMark, $param);
					 $questionMark++;
				 }//foreach
			 }//if
			 
			 
			 if($this->_query->execute()){
			     echo 'Success';
				 $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ); //returns object instead of array
				 $this->_count = $this->_query->rowCount();
				 print_r($this->_results);
				 echo '<br>'.$this->_count;
			 }//if
			 else{
			     $this->_error = true;
			 }//else
		 }//if
		 
		 return $this;
	 }//query()
	 
	 
	 public function action($action, $table, $where = array()){
	     if(count($where) === 3){ //check if $where consists field, operator, value
		     $operators = array('=', '>', '<', '>=', "<=");
			 
			 $field = $where[0];
			 $operator = $where[1];
			 $value = $where[2];
			 
			 if(in_array($operator, $operators)){
			     $sql = "{$action} from {$table} where {$field} {$operator} ?";
				 echo $sql.'<br>';
				 if(!$this->query($sql, array($value))->error()){
				     return $this;
				 }//if
			 }//if
		 }//if
		 return false;
	 }//action()
	 
	 
	 public function get($table, $where){
	     return $this->action('select *', $table, $where);
	 }//get()
	 
	 
	 //this method prevents possible performance issues related to "select *"
	 public function getByField($table, $where){
	     $action = "select {$where[0]}";
	     return $this->action($action, $table, $where);
	 }//getByField()
	 
	 
	 public function delete($table, $where){
	     
	 }//delete()
	 
	 
	 public function count(){
	     return $this->_count;
	 }//count()
	 
	 
	 public function error(){
	     return $this->_error;
	 }//error()
}//class DB