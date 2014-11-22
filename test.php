<?php
class Prob{
     private static $instance = null;
	     
	 //private function __construct(){
		 //$instance = new Prob();
	 //}
	 
	 public static function start(){
		 if(!self::$instance){
		     self::$instance = new Prob();
		 }
		 return self::$instance;
	 }//start()
	 
	 public function edno(){
	     self::dve();
	 }//edno()
	 
	 public static function dve(){
	     echo 'pdpdp';
	 }//dve()
}//class Prob

Prob::start()->edno();
?>
<br>
<?php
Prob::dve();