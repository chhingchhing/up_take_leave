<?php
require_once('../../connection/config.php');
include("../../models/take_leave.php");

class Save_take_leave {

	function save($take_leave_data) {
		$tleaveModObj = new Take_leave_mod();
	    if ($tleaveModObj->save($take_leave_data)) {
	    	$arr_errors = array(
                "success" => true,
                "sms_type" => "success",
                "sms_title" => "Congradulation!",
                "sms_value" => "You have requested take leave with successfully.",
            );
	    } else {
            $arr_errors = array(
                "success" => false,
                "sms_type" => "danger",
                "sms_title" => "Sorry!",
                "sms_value" => "You have requested take leave with un-successfully.",
            );
        }
        echo json_encode($arr_errors);
	}

}


if (isset($_POST['txtSdate'])) {
	$take_leave_data = array(
        'content' => $_POST['content_reason'],
        'start_date' => $_POST['txtSdate'],
        'end_date' => $_POST['txtEdate'],
        'number_of_leave' => $_POST['txtAmountTakeLeave'],
        'user_id' => $_SESSION['logged_id']
    );
    $saveActionTLObj = new Save_take_leave();
    $saveActionTLObj->save($take_leave_data);

} else {
    $arr_errors = array(
        "success" => false,
        "sms_type" => "warning",
        "sms_title" => "Confirm!",
        "sms_value" => "Please fill the form for all input fields that required.",
    );
    echo json_encode($arr_errors);
}

