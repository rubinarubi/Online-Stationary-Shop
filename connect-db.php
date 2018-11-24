<?php
error_reporting(1);
 $server = 'localhost';
 $user = 'root';
 $pass = '';
 $db = 'stationary_shop';
 $connection = mysql_connect($server, $user, $pass) 
 or die ("Could not connect to server ... \n");
 mysql_select_db($db) 
 or die ("Could not connect to database ... \n");

?>