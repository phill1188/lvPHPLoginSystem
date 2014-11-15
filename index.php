<?php
require_once 'core/init.php';

$user = DB::getInstance()->getByField('users', array('name', '=', 'mmm6'));

//$user = DB::getInstance()->get('users', array('username', '=', 'mmmppp'));


if(!$user->count()){
     echo 'NO';
}
else{
     echo 'YES';
}
