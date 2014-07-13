<?php 
$empObj = new Employee();
$employees = $empObj->get_all();
// var_dump($employees); die();

?>
<div class="col-md-12">
	<a href="" class="btn btn-default btn-sm" role="button" data-toggle="modal" data-target="#newEditEmployee">
		<span class="glyphicon glyphicon-star"></span> New
	</a>
	<!-- <a href="" class="btn btn-default btn-sm" role="button">
		<span class="glyphicon glyphicon-star"></span> Star
	</a>
	<a href="" class="btn btn-default btn-sm" role="button">
		<span class="glyphicon glyphicon-star"></span> Star
	</a> -->
</div>
<div class="col-md-12">
	<div class="table-responsive">
		<table class="table table-condensed">
			<thead>
				<tr>
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
					<td><?php echo $no; ?></td>
					<td><?php echo ucfirst($employee['first_name']); ?></td>
					<td><?php echo strtoupper($employee['last_name']); ?></td>
					<td><?php echo $employee['email']; ?></td>
					<td><?php echo $employee['gender']; ?></td>
					<td>
					View | 
					<a href="" id="clickNewEditEmployee" data-url="application/views/employees/edit.php?act=edit&item=<?php echo $employee['user_id'] ?>" class="btn btn-p" data-toggle="modal" data-target="#newEditEmployee">
						<button type="button" class="btn btn-default btn-xs">
						  <span class="glyphicon glyphicon-edit"></span> Edit
						</button>
					</a> |
					 Delete
					</td>
				</tr>
			<?php }
			?>
			</tbody>
		</table>
	</div>
</div>
