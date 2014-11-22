<?php
class Session{
     
	 public static function exists($name){
	     return (isset($_SESSION[$name])) ? true : false;
	 }//exists()
	 
	 
	 public static function put($name, $value){
	     return $_SESSION[$name] = $value;
	 }//put()
	 
	 
	 public static function get($name){
	     return $_SESSION[$name];
	 }//get()
	 
	 
	 public static function delete($name){
	     if(self::exists($name)){
		     unset($_SESSION[$name]);
		 }//if
	 }//delete()
	 
	 
	 public static function flash($name, $string = ''){
	     if(self::exists($name)){
		     $session = self::get($name);
			 self::delete($name);
			 return $session;
		 }//if
		 else{
		     self::put($name, $string);
		 }//else
	 }//flash()
	 
	 
}//class Session