<?php

class Report_mod {

	// Get all approved take leave
	function get_all_take_leave_mod () {
		// this is statement for selecting data from table
		$query = "SELECT profile.*, user.*,user.user_id AS uuser_id, leave_approved.app_id AS app_id, leave_approved.employee_id, leave_approved.content AS reason, leave_approved.start_date AS s_date, leave_approved.end_date AS e_date,leave_approved.take_id AS app_take_id, leave_approved.number_of_leave AS app_amount, leave_request.approved_by as approver 
			FROM up_approvals AS leave_approved
			INNER JOIN up_leave_requests AS leave_request ON leave_request.take_id = leave_approved.take_id
			INNER JOIN up_users AS user ON user.user_id = leave_approved.employee_id
			INNER JOIN up_user_profile AS profile ON profile.user_id = user.user_id
			GROUP BY leave_approved.take_id
			"; 

		//this is for executing query data
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return mysql_query($query);
		}
		return false;
	}

}