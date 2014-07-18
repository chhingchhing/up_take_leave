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
<div id="wrapper">
<!-- <div class="container"> -->
<div class="col-md-12"> 
<?php if ( !isset($_SESSION['logged_id']) ) {
	// include("application/views/login.php");
	$sysObj->load_page("application/views/login");
	// header('Location: '.$_SERVER['PHP_SELF']);
} else {
?>  
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
		<?php //$sysObj->load_page("application/views/partials/nav_toggle"); ?>
		<?php //$sysObj->load_page("application/views/partials/nav_top"); ?>
	</nav>
		header

	</div>
	<div class="col-md-3">
		<?php $sysObj->load_page("application/views/partials/nav_left"); ?>
	</div>
	<div class="col-md-9">

	<?php
		// Loading main page of management
		if (isset($_GET['views'])) {
			$sysObj->load_page("application/views/".$_GET['views']."/manage");
		} else if (isset($_GET['detail'])) {
			$sysObj->load_page("application/views/".$_GET['detail']."/view");
		} else {

			//$empObj = new Employee();
			//$info = $empObj->get_info($_SESSION['logged_id']);
			// var_dump($info['usertype_name']); die();

			$empObj = new Employee();
			$info = $empObj->get_info($_SESSION['logged_id']);
			// First is loading dashboard page
			//$sysObj->load_page("application/views/dashboard");
			?>
        <!-- /.row -->
        <div class="row">
        	<div class="col-lg-12">
            <?php $sysObj->load_page("application/views/partials/table"); ?>
            <!-- /.col-lg-8 -->
            <?php //$sysObj->load_page("application/views/partials/nav_right"); ?>
        </div>
        <!-- /.row -->
    	</div>
			<?php
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
	?>
	</div>

<?php }
?>
</div>
<div style="clear:both;">&nbsp;</div>
           <div class="row clearfix footer">
           <center><p>Copy@right By: <a href="#">Codingate Team</a></p></center>
    </div>
<?php $sysObj->load_page("application/views/partials/modals/view_modal"); ?>
<?php include("application/views/partials/footer.php"); ?>