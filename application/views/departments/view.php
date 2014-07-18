<?php 
// include("../../models/employee.php");

/**
* View employee
*/
class View_department extends Department_mod
{

	function view($department_id) {
		return $this->get_info($department_id);
	}
}

$vDepartmentObj = new View_department();
$departement_info = array();
if (isset($_GET['detail'])) {
	if ($_GET['detail'] == 'departement' && isset($_GET['item'])) {
		$departement_info = $vDepartmentObj->view($_GET['item']);
	}
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">

		    <div class="panel panel-default">
		        <div class="panel-heading">
		            <!-- <i class="fa fa-bar-chart-o fa-fw"></i> -->
		        	<i class="fa fa-user"></i> Employee's Information
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
		                        	<a href="" id="clickNewEditDepartement" data-url="application/views/department/edit.php?act=edit&item=<?php echo $user_info['department_id'] ?>" class="aEditEployee" data-toggle="modal" data-target="#newEditDepartment">
										  <span class="glyphicon glyphicon-edit"></span> Edit
									</a>
		                        </li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		        <!-- /.panel-heading -->
		        <div class="panel-body">
		            <!-- <div id="morris-area-chart"></div> -->
		        </div>
		        <!-- Table -->
			  	<table class="table">
			    	<tbody>
			    		<tr>
			    			<th>No</th>
			    			<td><?php echo $departement_info['department_id'] ?></td>
			    		</tr>
			    		<tr>
			    			<th>Departement Name</th>
			    			<td><?php echo $departement_info['department_name']; ?></td>
			    		</tr>
			    		<tr>
			    			<th>Description</th>
			    			<td><?php echo $departement_info['description']; ?></td>
			    		</tr>
			    	</tbody>
			  	</table>

		        <!-- /.panel-body -->
		    </div>
	    </div>
    </div>
    <!-- /.row -->
</div>