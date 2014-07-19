<?php
require_once('../../connection/config.php');
include("../../models/employee.php");

class Save_employee {

	function save($profile_data, $user_data, $managerSubordinate, $user_id=-1) {
		$empModObj = new Employee();
	    if ($empModObj->save($profile_data, $user_data, $managerSubordinate, $user_id)) {
	    	$arr_errors = array(
                "success" => true,
                "sms_type" => "success",
                "sms_title" => "Congradulation!",
                "sms_value" => "You have added employee with successfully.",
            );
	    } else {
            $arr_errors = array(
                "success" => false,
                "sms_type" => "danger",
                "sms_title" => "Sorry!",
                "sms_value" => "You have added employee with un-successfully.",
            );
        }
        echo json_encode($arr_errors);
	}

}

// $saveObj = new Save_employee();

if (isset($_POST['txtFname'])) {
	$user_id = $_POST['user_id'];
	// User Info
	if ($_POST['txtPass'] != '') {
		$user_data = array(
            'username' => $_POST['txtEmail'],
            'password' => md5($_POST['txtPass']),
            'position_id' => $_POST['position'],
            'department_id' => $_POST['department'],
            'usertype_id' => $_POST['user_type']
        );
	} else {
		$user_data = array(
            'username' => $_POST['txtEmail'],
            'position_id' => $_POST['position'],
            'department_id' => $_POST['department'],
            'usertype_id' => $_POST['user_type']
        );
	}

	// Profile Info
	$profile_data = array(
        'first_name'=>$_POST['txtFname'],
        'last_name'=>$_POST['txtLname'],
        'email'=>$_POST['txtEmail'],
        'gender'=>$_POST['gender'],
        'address'=>$_POST['address'],
        'phone1'=>$_POST['txtPhone'],
        'phone2'=>$_POST['txtPhone2'],
        'dob'=>$_POST['txtDOB'],
        'photo' => ''
    );

    $managerSubordinate = $_POST['manager'];

    $saveActionEmpObj = new Save_employee();
    $saveActionEmpObj->save($profile_data, $user_data, $managerSubordinate, $user_id);

    /*$empObj = new Employee();
    if ($empObj->save($profile_data, $user_data, $user_id)) {
    	# code...
    }*/

	/*echo json_encode(array('success'=>true,'message'=> 'Employee has been added successfully '.
                $user_profile_data['first_name'].' '.$user_profile_data['last_name'],'user_id'=>$user_data['user_id'],
                'actions'=>'add'));*/
} else {
    echo "Nothing";
    $arr_errors = array(
        "success" => false,
        "sms_type" => "warning",
        "sms_title" => "Confirm!",
        "sms_value" => "Please fill the form for all input fields that required.",
    );
    echo json_encode($arr_errors);
}

