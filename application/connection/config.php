<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'up_take_leave');

$connect = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die ('Error hosting!');
mysql_select_db(DB_DATABASE, $connect) or die ('SQL Error!');

session_start();

class Config {

	// Start Transaction
	function begin() {
		mysql_query("BEGIN");
	}

	// Commit Transaction
	function commit() {
		mysql_query("COMMIT");
	}

	// Rollback Transaction
	function rollback() {
		mysql_query("ROLLBACK");
	}
}
