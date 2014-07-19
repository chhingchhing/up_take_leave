<?php
require_once('../../connection/config.php');
include("../../models/employee.php");
include("../../models/position.php");
include("../../models/department.php");
include("../../models/user_type.php");

$department_name = "";
$description = "";
$department_id ="";

if (isset($_GET['act'])) {
	if ($_GET['act'] == "edit" && $_GET['item'] != -1) {
		$empObj = new Employee();
    $info = $empObj->get_info($_GET['item']);
  	// echo $info['usertype_name'];
    $department_name = $info['department_name'];
    $description = $info['description'];
    $department_id  = $info['department_id'];
	}
}

?>
  <input type="hidden" name="department_id" value="<?php echo $department_id; ?>">
  <div class="form-group">
    <label for="inputFname" class="col-sm-4 control-label">Department Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputFname" placeholder="department_name" name="txtFname" value="<?php echo $department_name; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="address" class="col-sm-4 control-label">Description:</label>
    <div class="col-sm-8">
    	<textarea class="form-control" rows="3" cols="40" name="description"><?php echo $description; ?></textarea>
    </div>
    
  </div>