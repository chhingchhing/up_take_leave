<?php 

class Take_leave_mod {

	function save(&$take_leave_data) {
		$columns = array();
		$values = array();
		foreach (array_keys($take_leave_data) as $key) {
			$columns[] = "`$key`";
			$values[] = "'".mysql_real_escape_string($take_leave_data[$key])."'";
		}
		$columns = implode(",", $columns);
		$values = implode(",", $values);

		$query = "INSERT INTO up_leave_requests ($columns) VALUES ($values)";
		if (mysql_query($query)) {
			$take_leave_data['take_id'] = mysql_insert_id();
			return true;
		}
		return false;
	}

}