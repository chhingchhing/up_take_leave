<?php
require_once('../../connection/config.php');
include("../../models/employee.php");

class Save_employee {

	function save($profile_data, $user_data, $user_id=-1) {
		$empModObj = new Employee();
	    if ($empModObj->save($profile_data, $user_data, $user_id)) {
	    	
	    }
	}

}

// $saveObj = new Save_employee();

if (isset($_POST['btnSaveEmployee'])) {
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

    // Manager and subordinate
    $managerSubordinate = array(
    	'manager_id' => '',
    	'subdonate_id' => ''
    );

    $saveActionEmpObj = new Save_employee();
    $saveActionEmpObj->save($profile_data, $user_data, $user_id);

    /*$empObj = new Employee();
    if ($empObj->save($profile_data, $user_data, $user_id)) {
    	# code...
    }*/

	/*echo json_encode(array('success'=>true,'message'=> 'Employee has been added successfully '.
                $user_profile_data['first_name'].' '.$user_profile_data['last_name'],'user_id'=>$user_data['user_id'],
                'actions'=>'add'));*/
}

