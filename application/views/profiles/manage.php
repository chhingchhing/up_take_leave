<?php 
$sysObj = new System();
if (!$sysObj->is_logged()) {
	echo "No permission to do it.";
} else {
	$empObj = new Employee();
	$user_info = $empObj->get_info($_SESSION['logged_id']);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">

		    <div class="panel panel-default">
		        <div class="panel-heading">
		            <!-- <i class="fa fa-bar-chart-o fa-fw"></i> -->
		        	<i class="glyphicon glyphicon-user"></i> Profile's Information
		            <div class="pull-right">
		            	<div class="btn-group">
		                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
		                        Actions
		                        <span class="caret"></span>
		                    </button>
		                    <ul class="dropdown-menu pull-right" role="menu">
		                    	<li>
		                        	<a href="?views=employees">
										  <span class="glyphicon glyphicon-home"></span> Management
									</a>
		                        </li>
		                        <li>
		                        	<a href="" id="clickNewEditEmployee" data-url="application/views/employees/edit.php?act=edit&item=<?php echo $user_info['user_id'] ?>" class="aEditEployee" data-toggle="modal" data-target="#newEditEmployee">
										  <span class="glyphicon glyphicon-edit"></span> Edit
									</a>
		                        </li>
		                        <!-- <li class="divider"></li>
		                        <li>
			                        <a href="" id="clickDelEmployee" data-url="application/controllers/employees/delete.php?act=del&item=<?php echo $user_info['user_id'] ?>" class="aDelEmployee">
										  <span class="glyphicon glyphicon-trash"></span> Delete
									</a>
		                        </li> -->
		                    </ul>
		                </div>
		            </div>
		        </div>
		        <!-- /.panel-heading -->
		        <div class="panel-body">
		        </div>
		        <!-- Table -->
			  	<table class="table">
			    	<tbody>
			    		<tr>
			    			<th>First Name</th>
			    			<td><?php echo $user_info['first_name'] ?></td>
			    		</tr>
			    		<tr>
			    			<th>Last Name</th>
			    			<td><?php echo $user_info['last_name']; ?></td>
			    		</tr>
			    		<tr>
			    			<th>Gender</th>
			    			<td><?php echo $user_info['gender']; ?></td>
			    		</tr>
			    		<tr>
			    			<th>DOB</th>
			    			<td><?php echo $user_info['dob']; ?></td>
			    		</tr>
			    		<tr>
			    			<th>Email</th>
			    			<td><?php echo $user_info['email']; ?></td>
			    		</tr>
			    		<tr>
			    			<th>Phone 1</th>
			    			<td><?php echo $user_info['phone1']; ?></td>
			    		</tr>
			    		<tr>
			    			<th>Phone 2</th>
			    			<td><?php echo $user_info['phone2']; ?></td>
			    		</tr>
			    		<tr>
			    			<th>Title</th>
			    			<td><?php echo $user_info['position_name']; ?></td>
			    		</tr>
			    		<tr>
			    			<th>Department</th>
			    			<td><?php echo $user_info['department_name']; ?></td>
			    		</tr>
			    		<tr>
			    			<th>Address</th>
			    			<td><?php echo $user_info['address']; ?></td>
			    		</tr>
			    	</tbody>
			  	</table>

		        <!-- /.panel-body -->
		    </div>
	    </div>
    </div>
    <!-- /.row -->
</div>

<?php
}
?>