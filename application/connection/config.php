<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'assigment');

$connect = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die ('Error hosting!');
mysql_select_db(DB_DATABASE, $connect) or die ('SQL Error!');

session_start();