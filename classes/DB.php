<?php
class DB{
     private static $_instance = null;
	 static $_pdo,
	        $_error = false,
			$_results,
			$_count = 0;
}//class DB