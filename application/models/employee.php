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
			LEFT JOIN up_managers AS manager ON user.user_id = manager.subdonate_id
			WHERE user.user_id='" . $user_id . "'"; 

		//this is for executing query data
		// return mysql_query($query); 
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return mysql_fetch_array($result);
		}
		return false;
	}

	// Get all employees
	function get_all($limit=50, $offset=0) {
		$query = "SELECT * FROM up_users AS user
			INNER JOIN up_departments AS department ON user.department_id = department.department_id
			INNER JOIN up_user_types AS type ON user.usertype_id = type.usertype_id
			INNER JOIN up_positions AS position ON user.position_id = position.position_id
			INNER JOIN up_user_profile AS profile ON user.user_id = profile.user_id
			LEFT JOIN up_managers AS manager ON user.user_id = manager.subdonate_id
			ORDER BY profile.last_name ASC
			LIMIT $offset, $limit";

		// return mysql_query($query);
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			// return mysql_fetch_array($result);
			return mysql_query($query);
		}
		return false;
	}

	// Get employees position as manager not subordinate
	function get_as_manager($limit=10000, $offset=0) {
		$query = "SELECT * FROM up_users AS user
			INNER JOIN up_departments AS department ON user.department_id = department.department_id
			INNER JOIN up_user_types AS type ON user.usertype_id = type.usertype_id
			INNER JOIN up_positions AS position ON user.position_id = position.position_id
			INNER JOIN up_user_profile AS profile ON user.user_id = profile.user_id
			LEFT JOIN up_managers AS manager ON user.user_id = manager.subdonate_id
			WHERE position_name = 'Manager'
			-- OR WHERE position_name = 'Admin'
			ORDER BY profile.last_name ASC
			LIMIT $offset, $limit";

		// return mysql_query($query);
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			// return mysql_fetch_array($result);
			return mysql_query($query);
		}
		return false;
	}

	// Save employee
	function save(&$profile_data, &$user_data, $user_id=false) {
		$success = false;
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$configObj = new Config();
		$configObj->begin();

		if (!$user_id OR $this->check_user_exist($user_id)) {
			if ($this->save_user($user_data, $user_id)) {
				
			}
		}
		
	}

	// Save profile information
	function save_user(&$user_data, $user_id) {
		$columns = implode(", ",array_keys($user_data));
		$escaped_values = array_map('mysql_real_escape_string', array_values($user_data));
		$values  = implode(", ", $escaped_values);

		if (!$user_id OR !$this->check_user_exist($user_id)) {
			$query = "INSERT INTO `up_users`($columns) VALUES ($values)";
			if ($query) {
				$user_data['user_id'] = mysql_insert_id();
				return true;
			} else {
				return false;
			}
		} else {
			$string = '';
			foreach ($user_data as $key => $value) {
				$string .= "$key=$value, ";
			}
			// Remove last character from string set new value
			$string = rtrim($string, ", ");
			$query = "UPDATE up_users SET $string WHERE user_id = $user_id";
			if ($query) {
				return true;
			}
			return false;
		}

		/*$id1 = $_POST['id'];
		$test_result1 = $_POST['test_result'];

		foreach( $id1 as $key => $value ) {
		  $query = "UPDATE tbl_lab_item SET test_result='$test_result1[$key]' WHERE lab_item_id = '$key' ";
		}  */

		/*$columns = implode(", ",array_keys($insData));
		$escaped_values = array_map('mysql_real_escape_string', array_values($insData));
		$values  = implode(", ", $escaped_values);
		$sql = "INSERT INTO `fbdata`($columns) VALUES ($values)";*/
	}

	// Check user exist
	function check_user_exist($user_id) {
		// this is statement for selecting data from table
		$query = "SELECT * FROM up_users AS user
			INNER JOIN up_departments AS department ON user.department_id = department.department_id
			INNER JOIN up_user_types AS type ON user.usertype_id = type.usertype_id
			INNER JOIN up_positions AS position ON user.position_id = position.position_id
			INNER JOIN up_user_profile AS profile ON user.user_id = profile.user_id
			LEFT JOIN up_managers AS manager ON user.user_id = manager.subdonate_id
			WHERE user.user_id='" . $user_id . "'"; 

		//this is for executing query data
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return true;
		}
		return false;
	}

	
}