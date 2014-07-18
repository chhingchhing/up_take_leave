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

    function approveTakeLeaveByID($take_id, $requester_id) {
        $tleaveModObj = new Take_leave_mod();
        $approverName = $_SESSION['full_name'];
        $approverID = $_SESSION['logged_id'];
        if ($tleaveModObj->approveTakeLeaveByID($take_id, $approverName, $approverID, $requester_id)) {
            $arr_errors = array(
                "success" => true,
                "sms_type" => "success",
                "sms_title" => "Congradulation!",
                "sms_value" => "You have approved on take leave ID $take_id with successfully.",
            );
        } else {
            $arr_errors = array(
                "success" => false,
                "sms_type" => "danger",
                "sms_title" => "Sorry!",
                "sms_value" => "You have approved take leave with un-successfully.",
            );
        }
        echo json_encode($arr_errors);
    }

}


// Declare object of take leave
$saveActionTLObj = new Save_take_leave();
// For do leave request
if (isset($_POST['txtSdate'])) {
	$take_leave_data = array(
        'content' => $_POST['content_reason'],
        'start_date' => $_POST['txtSdate'],
        'end_date' => $_POST['txtEdate'],
        'number_of_leave' => $_POST['txtAmountTakeLeave'],
        'user_id' => $_SESSION['logged_id']
    );
    
    $saveActionTLObj->save($take_leave_data);

} else if (isset($_GET['main'])) {
    if ($_GET['main'] == "take_leave" && $_GET['act'] == "approve" && isset($_GET['item']) && isset($_GET['requester'])) {
        $saveActionTLObj->approveTakeLeaveByID($_GET['item'], $_GET['requester']);
    }
} else {
    $arr_errors = array(
        "success" => false,
        "sms_type" => "warning",
        "sms_title" => "Confirm!",
        "sms_value" => "Please fill the form for all input fields that required.",
    );
    echo json_encode($arr_errors);
}


// For approve
if (isset($_POST['main'])) {
    echo "Main ha";
}

