<?php 
$empObj = new Employee();
$employees = $empObj->get_all();

?>
<div class="col-md-12">
	<div id="feedback_error"></div>
</div>

<div class="col-md-12">
	<div id="dynamic_content">
		<div class="col-md-12">
			<a href="" class="btn btn-default btn-sm" role="button" id="clickNewEditEmployee" data-url="application/views/employees/edit.php?act=edit&item=-1" data-toggle="modal" data-target="#newEditEmployee">
				<span class="glyphicon glyphicon-user"></span> New Employee
			</a>
			<a href="application/controllers/employees/delete.php?act=del_list" class="btn btn-default btn-sm remove" role="button" id="remove" data-url="application/controllers/employees/delete.php?act=del_list">
				<span class="glyphicon glyphicon-trash"></span> Remove
			</a>
			<div class="clear_both"></div>
		</div>

		<div class="table-responsive col-md-12">
			<table class="table table-condensed">
				<thead>
					<tr>
						<th></th>
						<th>#</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$no = 0;
				while ($employee = mysql_fetch_array($employees)) { 
					$no++;
				?>
					<tr>
						<td><input type="checkbox" name="checkedID" value="<?php echo $employee['user_id']; ?>" class="checkedID" /></td>
						<td><?php echo $no; ?></td>
						<td><?php echo ucfirst($employee['first_name']); ?></td>
						<td><?php echo strtoupper($employee['last_name']); ?></td>
						<td><?php echo $employee['email']; ?></td>
						<td><?php echo $employee['gender']; ?></td>
						<td>
						<a href="?detail=employees&item=<?php echo $employee['user_id'] ?>" id="clickViewEmployee" data-url="?detail=employees&item=<?php echo $employee['user_id'] ?>" class="aViewEmployee">
							  <span class="glyphicon glyphicon-eye-open"></span>
						</a>|
						<a href="" id="clickNewEditEmployee" data-url="application/views/employees/edit.php?act=edit&item=<?php echo $employee['user_id'] ?>" class="aEditEployee" data-toggle="modal" data-target="#newEditEmployee">
							  <span class="glyphicon glyphicon-edit"></span>
						</a>|
						<a href="" id="clickDelEmployee" data-url="application/controllers/employees/delete.php?act=del&item=<?php echo $employee['user_id'] ?>" class="aDelEmployee">
							  <span class="glyphicon glyphicon-trash"></span>
						</a>
						</td>
					</tr>
				<?php }
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>