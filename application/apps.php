<?php 
include("core/constance.php");
include("views/partials/header.php"); 
include("controllers/system.php");
session_start();

class Apps extends System {

	function test() {
		echo "hello wrold";
	}

	function logout() {
		session_destroy();
		// $this->logout_system();
	}
}
?>

<?php 
	$appsObj = new Apps();
	$appsObj->test();

	if (isset($_GET['act'])) {
		if ($_GET['act'] == "logout") {
			$appsObj->logout();
		}
	}
?>

<ul>
	<li><a href="">Staffs Management</a></li>
	<li><a href="">Department Management</a></li>
	<li><a href="">Take Leave Management</a></li>
	<li><a href="?act=logout">Logout</a></li>
</ul>



<?php include("views/partials/footer.php"); ?>