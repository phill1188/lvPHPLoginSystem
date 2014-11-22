<?php
class Token{
     
	 public static function generate(){
	     return Session::put(Config::get('session/token_name'), md5(uniqid()));
	 }//generate()
	 
	 
	 public static function check($token){
	     $tokenName = Config::get('session/token_name');
		 
		 if(Session::exists($tokenName) && $token === Session::get($tokenName)){
		     Session::delete($tokenName);
			 return true;
		 }//if
		 
		 return false;
	 }//check()
	 
	 
}//class Token