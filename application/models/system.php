<?php

class System_mod {

	function connect($email, $passwd) {
		// this is statement for selecting data from table
		// $StrSelectLogin = "SELECT * FROM up_users WHERE username='" . $email . "' AND password='" . md5($passwd) . "'"; 
		$StrSelectLogin = "SELECT * FROM up_users AS user
			INNER JOIN up_departments AS department ON user.department_id = department.department_id
			INNER JOIN up_user_types AS type ON user.usertype_id = type.usertype_id
			INNER JOIN up_positions AS position ON user.position_id = position.position_id
			INNER JOIN up_user_profile AS profile ON user.user_id = profile.user_id
			WHERE username='" . $email . "' AND password='" . md5($passwd) . "'"; 

		//this is for executing query data
		return mysql_query($StrSelectLogin); 
	}

}