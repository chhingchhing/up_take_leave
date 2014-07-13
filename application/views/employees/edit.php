<?php
require_once('../../connection/config.php');
include("../../models/employee.php");
include("../../models/position.php");
include("../../models/department.php");
include("../../models/user_type.php");

$first_name = "";
$last_name = "";
$dob = "";
$email = "";
$phone = "";
$phone2 = "";
$gender = "";
$position = "";
$manager = "";
$department = "";
$user_type = "";
$address = "";
$picture = "";
$user_id = -1;

if (isset($_GET['act'])) {
	if ($_GET['act'] == "edit" && $_GET['item'] != -1) {
		$empObj = new Employee();
    $info = $empObj->get_info($_GET['item']);
  	// echo $info['usertype_name'];
    $first_name = $info['first_name'];
    $last_name = $info['last_name'];
    $dob = $info['dob'];
    $email = $info['email'];
    $phone = $info['phone1'];
    $phone2 = $info['phone2'];
    $gender = $info['gender'];
    $position = $info['position_id'];
    $manager = $info['manager_id'];
    $department = $info['department_id'];
    $user_type = $info['usertype_id'];
    $address = $info['address'];
    $picture = $info['photo'];
    $user_id = $info['user_id'];
	}
}

?>

  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
  <div class="form-group">
    <label for="inputFname" class="col-sm-4 control-label">First Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputFname" placeholder="First Name" name="txtFname" value="<?php echo $first_name; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputLname" class="col-sm-4 control-label">Last Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputLname" placeholder="Last Name" name="txtLname" value="<?php echo $last_name; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="dob" class="col-sm-4 control-label">Date Of Birth</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="dob" placeholder="Date Of Birth" name="txtDOB" value="<?php echo $dob; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-sm-4 control-label">Email</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="txtEmail" value="<?php echo $email; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPass" class="col-sm-4 control-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPass" placeholder="Password" name="txtPass">
    </div>
  </div>
  <div class="form-group">
    <label for="inputConPass" class="col-sm-4 control-label">Confirm Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputConPass" placeholder="Confirm Password" name="txtConPass">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPhone" class="col-sm-4 control-label">Phone</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputPhone" placeholder="Phone" name="txtPhone" value="<?php echo $phone; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPhone2" class="col-sm-4 control-label">Phone 2</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputPhone2" placeholder="Phone" name="txtPhone2" value="<?php echo $phone2; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="profilePic" class="col-sm-4 control-label">Profile Picture</label>
    <div class="col-sm-8">
    	<input type="file" id="profileUpload">
    	<p class="help-block">Please upload picture for profile.</p>
    </div>
  </div>

  <div class="form-group">
    <label for="gender" class="col-sm-4 control-label">Gender</label>
    <div class="col-sm-8">
      <select class="form-control" name="gender">
      <?php 
      $arrGender = array(
        "" => "-- Select --",
        "Female" => "Female",
        "Male" => "Male"
        );
      foreach ($arrGender as $key => $value) {
        if ($key == $gender) {
          ?>
          <option value="<?php echo $key; ?>" selected="selected"><?php echo $value; ?></option>
          <?php
        } else {
        ?>
        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php
        }
      }
      ?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="position" class="col-sm-4 control-label">Position</label>
    <div class="col-sm-8">
    	<select class="form-control" name="position">
			<option selected="selected" value="">-- Select --</option>
      <?php 
      $posObj = new Position_mod();
      $positions = $posObj->get_all();
      while ($positionRows = mysql_fetch_array($positions)) {
        if ($positionRows['position_id'] == $position) {
          ?>
          <option value="<?php echo $positionRows['position_id']; ?>" selected="selected"><?php echo $positionRows['position_name']; ?></option>
          <?php
        } else {
        ?>
        <option value="<?php echo $positionRows['position_id']; ?>"><?php echo $positionRows['position_name']; ?></option>
      <?php
        }
      }
      ?>
		</select>
    </div>
  </div>
  <div class="form-group">
    <label for="manager" class="col-sm-4 control-label">Manager</label>
    <div class="col-sm-8">
    	<select class="form-control" name="manager">
			<option selected="selected" value="">-- Select --</option>
      <?php 
      $empObj = new Employee();
      $managers = $empObj->get_as_manager();
      while ($managerRows = mysql_fetch_array($managers)) {
        if ($managerRows['user_id'] == $manager) {
          ?>
          <option value="<?php echo $managerRows['user_id']; ?>" selected="selected"><?php echo ucfirst($managerRows['last_name']).' '.$managerRows['first_name']; ?></option>
          <?php
        } else {
        ?>
        <option value="<?php echo $managerRows['user_id']; ?>"><?php echo ucfirst($managerRows['last_name']).' '.$managerRows['first_name']; ?></option>
      <?php
        }
      }
      ?>
		</select>
    </div>
  </div>
  <div class="form-group">
    <label for="department" class="col-sm-4 control-label">Department</label>
    <div class="col-sm-8">
    	<select class="form-control" name="department">
			<option selected="selected" value="">-- Select --</option>
      <?php 
      $deptObj = new Department_mod();
      $departments = $deptObj->get_all();
      while ($departmentRow = mysql_fetch_array($departments)) {
        if ($departmentRow['department_id'] == $department) {
          ?>
          <option value="<?php echo $departmentRow['department_id']; ?>" selected="selected"><?php echo $departmentRow['department_name']; ?></option>
          <?php
        } else {
        ?>
        <option value="<?php echo $departmentRow['department_id']; ?>"><?php echo $departmentRow['department_name']; ?></option>
      <?php
        }
      }
      ?>
		</select>
    </div>
  </div>
  <div class="form-group">
    <label for="user_type" class="col-sm-4 control-label">User Type</label>
    <div class="col-sm-8">
    	<select class="form-control" name="user_type">
			<option selected="selected" value="">-- Select --</option>
      <?php 
      $userTypeObj = new User_type_mod();
      $user_types = $userTypeObj->get_all();
      while ($userTypeRow = mysql_fetch_array($user_types)) {
        if ($userTypeRow['usertype_id'] == $user_type) {
          ?>
          <option value="<?php echo $userTypeRow['usertype_id']; ?>" selected="selected"><?php echo $userTypeRow['usertype_name']; ?></option>
          <?php
        } else {
        ?>
        <option value="<?php echo $userTypeRow['usertype_id']; ?>"><?php echo $userTypeRow['usertype_name']; ?></option>
      <?php
        }
      }
      ?>
		</select>
    </div>
  </div>
  <div class="form-group">
    <label for="address" class="col-sm-4 control-label">Address</label>
    <div class="col-sm-8">
    	<textarea class="form-control" rows="3" cols="40" name="address"><?php echo $address; ?></textarea>
    </div>
    
  </div>