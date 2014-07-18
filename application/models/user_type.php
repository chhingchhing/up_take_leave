<?php

class User_type_mod {
	// Get all positions
	function get_all($limit=1000, $offset=0) {
		$query = "SELECT * FROM up_user_types AS user_type
			ORDER BY usertype_name ASC
			LIMIT $offset, $limit";

		// return mysql_query($query);
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return mysql_query($query);
		}
		return false;
	}

}