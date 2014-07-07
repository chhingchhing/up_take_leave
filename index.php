<?php 
include("application/core/constance.php");
include("application/controllers/system.php");
include("application/core/assets.php");

include("application/views/partials/header.php"); 

// $select_menu = "main.php";

if ( !isset($_SESSION['full_name']) ) {
	include("application/views/login.php");
} else {
	// include('pages/' . $select_menu);
	echo "You have logged in already.";
	header("location:application/apps.php");
}
?>

<?php include("application/views/partials/footer.php"); ?>