<?php

class Department_mod {
	// Get all positions
	function get_all($limit=1000, $offset=0) {
		$query = "SELECT * FROM up_departments
			ORDER BY department_name ASC
			LIMIT $offset, $limit";
		// return mysql_query($query);
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return mysql_query($query);
		}
		return false;
	}
	function get_info($department_id) {
		// this is statement for selecting data from table
		$query = "SELECT * FROM up_departments 
			WHERE department.department_id='" . $department_id . "'";  
		//this is for executing query data
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return mysql_fetch_array($result);
		}
		return false;
	}

}