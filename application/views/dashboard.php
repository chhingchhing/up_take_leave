<?php 
/**
* Home page for admin
*/
class Dashboard extends Dashboard_mod
{
	
	function index() {
		echo "Hello index function";
	}

	function get_all_take_leave() {
		return $this->get_all_take_leave_mod();
	}
}

$empObj = new Employee();
$info = $empObj->get_info($_SESSION['logged_id']);
// echo $info['usertype_name']; 

// Declare object from System class
$sysObj = new System();

// Declare object from Dashboard
$dashObj = new Dashboard();
$all_take_leaves = $dashObj->get_all_appending_leave_mod();
$amount_leave_appending = mysql_num_rows($all_take_leaves);

$all_approved_leave = $dashObj->get_all_approve_leave_mod();
$amount_leave_approved = mysql_num_rows($all_approved_leave);

?>

<!-- <h4>Welcome Page</h4> -->

<div class="col-md-12">
	<a href="" class="btn btn-primary btn-sm" role="button" id="clickNewLeaveRequest" data-url="application/views/leave_requests/new.php?act=new&item=-1" data-toggle="modal" data-target="#newLeaveRequet">
		<span class="glyphicon glyphicon-tasks"></span> Do request
	</a>
	<a href="application/controllers/employees/delete.php?act=del_list" class="btn btn-danger btn-sm remove" role="button" id="remove" data-url="application/controllers/employees/delete.php?act=del_list">
		<span class="glyphicon glyphicon-remove"></span> Deny
	</a>
	<div class="clear_both"></div>
</div>

<div class="table-responsive">
	<div class="col-md-12">
		<div id="feedback_error"></div>
	</div>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
	  <li class="active"><a href="#allAppending" role="tab" data-toggle="tab">Appending <span class="badge"><?php echo $amount_leave_appending; ?></span></a></li>
	  <li><a href="#allApproval" role="tab" data-toggle="tab">Approval <span class="badge"><?php echo $amount_leave_approved; ?></span></a></li>
	  <!-- <li><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
	  <li><a href="#settings" role="tab" data-toggle="tab">Settings</a></li> -->
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane active" id="allAppending">
	  	<?php 
	  		$sysObj->load_page("application/views/partials/dashboards/all_take_leave");
	  	?>
	  </div>
	  <div class="tab-pane" id="allApproval">
	  	<?php 
	  		$sysObj->load_page("application/views/partials/dashboards/all_approval");
	  	?>
	  </div>
	  <!-- <div class="tab-pane" id="messages">
	  	message
	  </div>
	  <div class="tab-pane" id="settings">
	  	setting
	  </div> -->
	</div>

</div>