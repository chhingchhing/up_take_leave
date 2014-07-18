<?php
require_once('../../connection/config.php');
include("../../models/employee.php");

class Delete_employee extends Employee {

	function deleting($user_id) {
		if ($this->delete($user_id)) {
			$arr_errors = array(
                "success" => true,
                "sms_type" => "success",
                "sms_title" => "Congradulation!",
                "sms_value" => "You have deleted employee with successfully.",
            );
		} else {
			$arr_errors = array(
                "success" => false,
                "sms_type" => "danger",
                "sms_title" => "Sorry!",
                "sms_value" => "You have deleted employee with un-successfully.",
            );
		}
		echo json_encode($arr_errors);
	}

	/*function delete() {
        $this->check_action_permission('delete');
        $items_to_delete = $this->input->post('checkedID');

        if ($this->ticket->delete_list($items_to_delete)) {                                                                                          
            echo json_encode(array('success' => true, 'message' => lang('tickets_successful_deleted')));
        } else {
            echo json_encode(array('success' => false, 'message' => lang('tickets_cannot_be_deleted')));
        }
    }*/

    function delete_multi() {
    	$items_to_delete = $_POST['checkedID'];
    	$string_items_to_delete = implode($items_to_delete, ",");
    	if ($this->delete_list($string_items_to_delete)) {
    		$arr_errors = array(
                "success" => true,
                "sms_type" => "success",
                "sms_title" => "Congradulation!",
                "sms_value" => "You have deleted ".count($items_to_delete)." employee(s) with successfully.",
            );
		} else {
			$arr_errors = array(
                "success" => false,
                "sms_type" => "danger",
                "sms_title" => "Sorry!",
                "sms_value" => "You have deleted employee(s) with un-successfully.",
            );
    	}
    	echo json_encode($arr_errors);
    }

}


// Action
$deleteActionEmployee = new Delete_employee();
if (isset($_GET['act'])) {
	if ($_GET['act'] == "del" AND isset($_GET['item'])) {
		$deleteActionEmployee->deleting($_GET['item']);
	} else if ($_GET['act'] == "del_list") {
		$deleteActionEmployee->delete_multi();
	}
}

/*
* End of file: delete.php
* Location of file: application/controllers/employees/delete.php
*/