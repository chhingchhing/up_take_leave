<?php 
include("application/core/constance.php");
include("application/controllers/system.php");
include("application/core/assets.php");
include("application/controllers/main.php");
include("application/models/employee.php");

/**
* Index class
*/
class Index extends Main
{
	
	/*function show_dashboard() {
		echo "Hello dashboard";
	}*/

}

// Own object
$ownObj = new Index();
// Create object
$mainObj = new Main();
// Declare object from Assets class
$assetsObj = new Assets();
// Declare object from System class
$sysObj = new System();

include("application/views/partials/header.php"); 
// $sysObj->load_page("application/views/partials/header");

// $select_menu = "main.php";
?>
<div class="container">
<?php 
if ( !isset($_SESSION['logged_id']) ) {
	// include("application/views/login.php");
	$sysObj->load_page("application/views/login");
	// header('Location: '.$_SERVER['PHP_SELF']);
} else {
?>
	<div class="col-md-3">
		<?php $sysObj->load_page("application/views/partials/nav-left"); ?>
	</div>
	<div class="col-md-9">
	<?php
	/*if ( !isset($_SESSION['logged_id']) ) {
		// include("application/views/login.php");
		$sysObj->load_page("application/views/login");
		// header('Location: '.$_SERVER['PHP_SELF']);
	} else {*/

		/*$mainObj->index();
		$mainObj->show_dashboard();*/

		// Loading main page of management
		if (isset($_GET['views'])) {
			/*if ($_GET['views'] == "employee") {
				$sysObj->load_page("application/views/employees/manage");
			}*/
			$sysObj->load_page("application/views/".$_GET['views']."/manage");
		} else {
			$empObj = new Employee();
			$info = $empObj->get_info($_SESSION['logged_id']);
			// var_dump($info['usertype_name']); die();

			// First is loading dashboard page
			$sysObj->load_page("application/views/dashboard");
		}

		// Logout and destroy all sessions
		if (isset($_GET['act'])) {
			if ($_GET['act'] == "logout") {
				$logout = $sysObj->logout_system();
				if ($logout) {
					header("Location: index.php");
				}
			}
		}
	// }
	?>
	</div>

<?php }
?>
</div>



<?php include("application/views/partials/footer.php"); ?>