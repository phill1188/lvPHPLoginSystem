<?php
class Hash{
     
	 public static function make($string, $salt = ''){
	     return hash('sha256', $string.$salt);
	 }//make()
	 
	 
	 public static function salt($length){
	     return mcrypt_create_iv($length);
	 }//salt()
	 
	 
	 public static function unique(){
	     return self::make(uniqid());
	 }//unique()
}//class Hash