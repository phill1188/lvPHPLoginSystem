<?php
class Validate{
     private $_passed = false,
	         $_errors = array(),
			 $_db = null;
	 
	 
	 public function __construct(){
	     $this->_db = DB::getInstance();
	 }//__construct()
	 
	 
	 public function check($source, $items = array()){
	     foreach($items as $item => $rules){
		     foreach($rules as $rule => $rule_value){
			     //echo "{$item} {$rule} must be {$rule_value}<br>";
				 $value = trim($source[$item]);
				 
				 //echo $value.'<br>';
				 
				 //this method doesn't work properly if "required" is set to "false"
				 if($rule === 'required' && empty($value)){ 
				     $this->addError("{$item} is required");
				 }//if
				 else if(!empty($value)){
				     switch($rule){
					     case 'min':
						     if(strlen($value) < $rule_value){
							     $this->addError("{$item} must be a minimum of {$rule_value} characters");
							 }//if
						 break;
						 case 'max':
						     if(strlen($value) > $rule_value){
							     $this->addError("{$item} must be a maximum of {$rule_value} characters");
							 }//if
						 break;
						 case 'matches':
						     if($value != $source[$rule_value]){
							     $this->addError("{$item} must match {$rule_value}");
							 }//if
						 break;
						 case 'unique':
						     $check = $this->_db->get($rule_value, array($item, '=', $value));
							 if($check->count()){
							     $this->addError("{$item} already exists");
							 }//if
						 break;
					 }//switch
				 }//else if
			 }//foreach
		 }//foreach
		 
		 if(empty($this->errors())){
		     $this->_passed = true;
		 }//if
		 
		 return $this;
	 }//check()
	 
	 
	 public function passed(){
	     return $this->_passed;
	 }//passed()
	 
	 
	 private function addError($error){
	     $this->_errors[] = $error;
	 }//addError()
	 
	 
	 public function errors(){
	     return $this->_errors;
	 }//errors()
}//class Validate