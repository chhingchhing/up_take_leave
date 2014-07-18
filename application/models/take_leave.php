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

	function approveTakeLeaveByID(&$take_id, &$approverName, &$approverID, $requester_id) {
		$success = false;

		$configObj = new Config();
		$configObj->begin();

		// Copy the record from append table to approval table
		$set_approver_query = "UPDATE up_leave_requests SET approved_by = '$approverName' WHERE take_id = $take_id";

		if (mysql_query($set_approver_query)) {
			$leave_info = $this->cloneTakeAppendToApprove($take_id);
			$leave_info_clone = array(
				'take_id' => $take_id,
				'content' => $leave_info['content'],
				'start_date' => $leave_info['start_date'],
				'end_date' => $leave_info['end_date'],
				'number_of_leave' => $leave_info['number_of_leave'],
				'employee_id' => $leave_info['user_id'],
				'approved_by' => $approverID,
			);

			$success = $this->insertCloneTakeAppendToApprove($leave_info_clone);
		}
		$configObj->commit();
		return $success;

	}

	function cloneTakeAppendToApprove(&$take_id) {
		// Copy the record from append table to approval table
		$query = "SELECT * FROM up_leave_requests WHERE take_id = $take_id";
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0) {
			return mysql_fetch_array($result);
		}
		return false;
	}

	function insertCloneTakeAppendToApprove(&$leave_info_clone) {

		// Copy the record from append table to approval table
		$columns = array();
		$values = array();
		foreach (array_keys($leave_info_clone) as $key) {
			$columns[] = "`$key`";
			$values[] = "'".mysql_real_escape_string($leave_info_clone[$key])."'";
		}
		$columns = implode(",", $columns);
		$values = implode(",", $values);

		$query = "INSERT INTO up_approvals ($columns) VALUES ($values)";
		if (mysql_query($query)) {
			$leave_info_clone['take_id'] = mysql_insert_id();
			return true;
		}
		return false;
	}

}