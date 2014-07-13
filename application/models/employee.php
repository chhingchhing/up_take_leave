<?php 

class Employee {

	// Get Information of employee by id
	function get_info($user_id) {
		// this is statement for selecting data from table
		$query = "SELECT * FROM up_users AS user
			INNER JOIN up_departments AS department ON user.department_id = department.department_id
			INNER JOIN up_user_types AS type ON user.usertype_id = type.usertype_id
			INNER JOIN up_positions AS position ON user.position_id = position.position_id
			INNER JOIN up_user_profile AS profile ON user.user_id = profile.user_id
			WHERE user.user_id='" . $user_id . "'"; 

		//this is for executing query data
		// return mysql_query($query); 
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return mysql_fetch_array($result);
		}
		return false;
	}
}