content of dashboard is over there!
<ul>
	<li><a href="?views=employees">Employees Management</a></li>
	<li><a href="?views=departments">Department Management</a></li>
	<li><a href="?views=take_leaves">Take Leave Management</a></li>
	<li><a href="?views=reports">Report</a></li>
	<li><a href="?act=logout">Logout</a></li>
</ul>
<?php 
$empObj = new Employee();
$info = $empObj->get_info($_SESSION['logged_id']);
echo $info['usertype_name']; ?>

<h3>Welcome Page</h3>