<?php 

class Employee {

	/*protected $configObj;

	public function __contruct() {
		$this->$configObj = new Config();
	}*/

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
	function save(&$profile_data, &$user_data, &$managerSubordinate, $user_id=false) {
		$success = false;
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$configObj = new Config();
		$configObj->begin();

		if ($this->save_user($user_data, $user_id)) {
			$profile_data['user_id'] = $user_data['user_id'];
			// save to profile
			if ($this->save_profile($profile_data, $user_id)) {
				$success = $this->save_manager_subordinate($managerSubordinate, $user_data['user_id']);
			}
		}

		$configObj->commit();
		return $success;
		
	}

	// Save manager + Subordinate
	function save_manager_subordinate(&$managerSubordinate, $user_id) {
		// Check existing manager_id
		$query = "SELECT * FROM up_managers AS manager
			WHERE subdonate_id='" . $user_id . "'"; 

		//this is for executing query data
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			$query_update = "UPDATE up_managers SET manager_id = $managerSubordinate WHERE subdonate_id = $user_id";
			if (mysql_query($query_update)) {
				return true;
			}
			return false;
		} else {
			$query_add = "INSERT INTO up_managers(manager_id, subdonate_id) VALUES ($managerSubordinate, $user_id)";
			if (mysql_query($query_add)) {
				return true;
			}
			return false;
		}
	}

	// Save profile information
	function save_user(&$user_data, $user_id) {
		/*$columns = implode(", ",array_keys($user_data));
		$escaped_values = array_map('mysql_real_escape_string', array_values($user_data));
		var_dump($user_data);
		$values  = implode(", ", $escaped_values);*/
		$columns = array();
		$values = array();
		foreach (array_keys($user_data) as $key) {
			$columns[] = "`$key`";
			$values[] = "'".mysql_real_escape_string($user_data[$key])."'";
		}
		$columns = implode(",", $columns);
		$values = implode(",", $values);

		if (!$user_id OR !$this->check_user_exist($user_id)) {
			$query = "INSERT INTO up_users ($columns) VALUES ($values)";
			if (mysql_query($query)) {
				$user_data['user_id'] = mysql_insert_id();
				return true;
			}
			return false;
		} else {
			$string = '';
			foreach ($user_data as $key => $value) {
				$string .= "$key='$value', ";
			}
			// Remove last character from string set new value
			$string = rtrim($string, ", ");
			$query = "UPDATE up_users SET $string WHERE user_id = $user_id";
			if (mysql_query($query)) {
				$user_data['user_id'] = $user_id;
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

	// Save profile
	function save_profile(&$profile_data, $user_id) {
		/*$columns = implode(", ",array_keys($profile_data));
		$escaped_values = array_map('mysql_real_escape_string', array_values($profile_data));
		$values  = implode(", ", $escaped_values);*/
		$columns = array();
		$values = array();
		foreach (array_keys($profile_data) as $key) {
			$columns[] = "`$key`";
			$values[] = "'".mysql_real_escape_string($profile_data[$key])."'";
		}
		$columns = implode(",", $columns);
		$values = implode(",", $values);

		if (!$user_id OR !$this->check_user_profile_exist($user_id)) {
			$query = "INSERT INTO up_user_profile ($columns) VALUES ($values)";
			if (mysql_query($query)) {
				$profile_data['user_id'] = mysql_insert_id();
				return true;
			} else {
				return false;
			}
		} else {
			$string = '';
			foreach ($profile_data as $key => $value) {
				$string .= "$key='$value', ";
			}
			// Remove last character from string set new value
			$string = rtrim($string, ", ");
			$query = "UPDATE up_user_profile SET $string WHERE user_id = $user_id";
			if (mysql_query($query)) {
				return true;
			}
			return false;
		}
	}

	// Check user exist
	function check_user_exist($user_id) {
		// this is statement for selecting data from table
		$query = "SELECT * FROM up_users AS user
			WHERE user.user_id='" . $user_id . "'"; 

		//this is for executing query data
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return true;
		}
		return false;
	}

	// Check user profile exist
	function check_user_profile_exist($user_id) {
		// this is statement for selecting data from table
		$query = "SELECT * FROM up_user_profile AS profile
			WHERE profile.user_id='" . $user_id . "'"; 

		//this is for executing query data
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return true;
		}
		return false;
	}

	// Delete employee
	protected function delete($user_id) {
		$success = false;
		$configObj = new Config();
		$configObj->begin();
		$this->delete_manager_subordinate($user_id);

		if ($this->delete_profile($user_id)) {
			$success = $this->delete_user($user_id);
		}

		$configObj->commit();
		return $success;
	}

	/*// Delete profile information first
	protected function delete_profile($user_id) {
		$query = "DELETE FROM up_user_profile WHERE user_id = $user_id";
		return mysql_query($query);
	}

	// Delete employee information
	protected function delete_user($user_id) {
		$query = "DELETE FROM up_users WHERE user_id = $user_id";
		return mysql_query($query);
	}

	// Delete manager_subodinate
	protected function delete_manager_subordinate($user_id) {
		$query = "DELETE FROM up_managers WHERE subdonate_id = $user_id";
		return mysql_query($query);
	}*/
	// Delete profile information first
	protected function delete_profile($user_id) {
		$query = "DELETE FROM up_user_profile WHERE user_id IN ($user_id)";
		return mysql_query($query);
	}

	// Delete employee information
	protected function delete_user($user_id) {
		$query = "DELETE FROM up_users WHERE user_id IN ($user_id)";
		return mysql_query($query);
	}

	// Delete manager_subodinate
	protected function delete_manager_subordinate($user_id) {
		$query = "DELETE FROM up_managers WHERE subdonate_id IN ($user_id)";
		return mysql_query($query);
	}

	// Delete multi records from database table
	function delete_list($item_ids) {
		$success = false;
		$configObj = new Config();
		$configObj->begin();
		$this->delete_manager_subordinate($item_ids);

		if ($this->delete_profile($item_ids)) {
			$success = $this->delete_user($item_ids);
		}

		$query = "DELETE FROM up_users WHERE user_id IN ($item_ids)";
		if (mysql_query($query)) {
			$success = true;
		}
		$configObj->commit();
		return $success;
	}

	
}

/* End of file: employee.php */
/* Location of file: application/models/employee.php */