<?php
include_once 'core/init.php';

if(!$db = DB::getInstance()){
     throw new Exception('DB error');
}
else{
     echo 'Success DB<br>';
}

/*$db->insert('users', array(
     'username' => 'aaa',
	 'password' => '5ff82b8a67c82f40fbbe866ea033562de62fb658271efea6bce856c96bef45cf',
	 'salt' => 'pИe>б™0ЂD iфR¤shЉ@$У(^џ#щ<',
	 'name' => 'aaa',
	 'joined' => '2014-11-21 11:53:56',
	 'group' => 1
));
*/
$db->insert('users', array(
     'username' => 'aaa',
	 'password' => '5ff82b8a67c82f40fbbe866ea033562de62fb658271efea6bce856c96bef45cf',
	 'salt' => 'pИe>б™0ЂD iфR¤shЉ@$У(^џ#щ<',
	 'name' => 'aaa',
	 'joined' => '2014-11-21 11:53:56',
	 'groups' => 1
));