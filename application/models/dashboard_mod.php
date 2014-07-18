<?php

class Dashboard_mod {

	/*function get_all_take_leave_mod () {
		// this is statement for selecting data from table
		$query = "SELECT leave_request.content AS l_content, leave_request.start_date AS l_start_date, leave_request.end_date AS l_end_date, leave_request.number_of_leave AS l_amount_day, leave_request.user_id AS l_user_id, leave_request. 
			FROM up_leave_requests AS leave_request.approved_by AS l_approved_by, leave_request.take_id AS l_take_id
			INNER JOIN up_approvals AS approval ON leave_request.take_id = approval.take_id
			INNER JOIN up_users AS user ON user.user_id = leave_request.user_id
			"; 

		//this is for executing query data
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return mysql_query($query);
		}
		return false;
	}*/

	function get_all_appending_leave_mod () {
		// this is statement for selecting data from table
		$query = "SELECT * FROM up_leave_requests AS leave_request
			INNER JOIN up_users AS user ON user.user_id = leave_request.user_id
			-- LEFT JOIN approval ON user.user_id = approval.subdonate_id
			"; 

		//this is for executing query data
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return mysql_query($query);
		}
		return false;
	}

	// Get all approved take leave
	function get_all_approve_leave_mod () {
		// this is statement for selecting data from table
		$query = "SELECT leave_approved.app_id AS app_id, leave_approved.content AS reason, leave_approved.start_date AS s_date, leave_approved.end_date AS e_date,leave_approved.take_id AS app_take_id, leave_approved.number_of_leave AS app_amount, leave_request.approved_by as approver FROM up_approvals AS leave_approved
			INNER JOIN up_users AS user ON user.user_id = leave_approved.employee_id
			INNER JOIN up_leave_requests AS leave_request ON leave_request.take_id = leave_approved.take_id
			-- LEFT JOIN approval ON user.user_id = approval.subdonate_id
			"; 

		//this is for executing query data
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return mysql_query($query);
		}
		return false;
	}



}