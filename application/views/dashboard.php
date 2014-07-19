
content of dashboard is over there!
<ul>
	<li><a href="?views=employees">Employees Management</a></li>
	<li><a href="?views=departments">Department Management</a></li>
	<li><a href="?views=take_leaves">Take Leave Management</a></li>
	<li><a href="?views=reports">Report</a></li>
	<li><a href="?act=logout">Logout</a></li>
</ul>

</ul>
<?php 
$empObj = new Employee();
$info = $empObj->get_info($_SESSION['logged_id']);
// echo $info['usertype_name']; 
?>

<h3>Welcome Page</h3>

<div class="table-responsive">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
	  <li class="active"><a href="#home" role="tab" data-toggle="tab">Home</a></li>
	  <li><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
	  <li><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
	  <li><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane active" id="home">
	  	home
	  </div>
	  <div class="tab-pane" id="profile">
	  	profile
	  </div>
	  <div class="tab-pane" id="messages">
	  	message
	  </div>
	  <div class="tab-pane" id="settings">
	  	setting
	  </div>
	</div>

</div>
