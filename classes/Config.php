<?php

class Config{
     
	 public static function get($path = null){
	     if($path){
		     $config = $GLOBALS['config'];
			 $path = explode('/', $path);
			 
			 foreach($path as $bit){
			     if(isset($config[$bit])){
				     $config = $config[$bit];
				 }//if
			 }//foreach
			 
			 return $config;
		 }//if
		 
		 return false;
	 }//get()
	 
	 
}//class Config