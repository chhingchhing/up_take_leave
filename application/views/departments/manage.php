<?php 
$departmentObj = new Department_mod();
$departements = $departmentObj->get_all();
?>

<div class="col-md-12">
	<div id="feedback_error"></div>
</div>
<div class="col-md-12">
	<div id="dynamic_content">
		<div class="col-md-12">
			<a href="" class="btn btn-primary btn-sm" role="button" id="clickNewEditDepartement" data-url="application/views/departments/edit.php?act=edit&item=-1" data-toggle="modal" data-target="#newEditDepartement">
				<span class="glyphicon glyphicon-user"></span> New Departement
			</a>
			<a href="application/controllers/departments/delete.php?act=del_list" class="btn btn-danger btn-sm remove" role="button" id="remove" data-url="application/controllers/departements/delete.php?act=del_list">
				<span class="glyphicon glyphicon-trash"></span> Remove
			</a>
			<div class="clear_both"></div>
		</div>

		<div class="table-responsive col-md-12">
			<table class="table table-condensed">
				<thead>
					<tr>
						<th></th>
						<th>NO</th>
						<th>Department Name</th>
						<th>Desction</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$no = 0;
				while ($departement = mysql_fetch_array($departements)) { 
					$no++;
				?>
					<tr>
						<td><input type="checkbox" name="checkedID" value="<?php echo $departement['department_id']; ?>" class="checkedID" /></td>
						<td><?php echo $no; ?></td>
						<td><?php echo $departement['department_name']; ?></td>
						<td><?php echo $departement['description']; ?></td>
						<td>
						<a href="?detail=departements&item=<?php echo $departement['department_id'] ?>" id="clickViewEmployee" data-url="?detail=departements&item=<?php echo $departement['department_id'] ?>" class="aViewEmployee">
							  <span class="glyphicon glyphicon-eye-open"></span>
						</a>|
						<a href="" id="clickNewEditEmployee" data-url="application/views/departement/edit.php?act=edit&item=<?php echo $departement['department_id'] ?>" class="aEditEployee" data-toggle="modal" data-target="#newEditDepartement">
							  <span class="glyphicon glyphicon-edit"></span>
						</a>|
						<a href="" id="clickDelEmployee" data-url="application/controllers/departement/delete.php?act=del&item=<?php echo $departement['department_id'] ?>" class="aDelEmployee">
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