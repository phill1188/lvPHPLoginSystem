<?php
require_once 'core/init.php';

/*
//$user = DB::getInstance()->getByField('users', array('name', '=', 'mmm6'));

//$user = DB::getInstance()->get('users', array('username', '=', 'mmm'));

$user = DB::getInstance()->query('select * from users');


if(!$user->count()){
     echo 'NO';
}
else{
     foreach($user->results() as $user){
	     echo '<br>'.$user->username;
	 }
	 
	 echo '<br>+++ '.$user->firstResult()->username;
}
*/

$user = DB::getInstance()->update('users', 12, array(
	 'password' => 'newpassword',
	 'name' => 'Dale G'
));