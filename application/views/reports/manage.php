<?php 
$reportObj = new Report_mod();
$reports = $reportObj->get_all_take_leave_mod();
// var_dump(mysql_fetch_array($reports));
?>
<div class="col-md-12">
	<div id="feedback_error"></div>
</div>

<div class="col-md-12">
	<div id="dynamic_content">
		<div class="col-md-12">
			<div class="col-xs-10 col-md-2">
				<a href="" class="btn btn-primary btn-sm" role="button" id="clickNewEditEmployee" data-url="application/views/employees/edit.php?act=edit&item=-1" data-toggle="modal" data-target="#newEditEmployee">
					<span class="glyphicon glyphicon-file"></span> Report
				</a>
			</div>
			<!-- <a href="application/controllers/employees/delete.php?act=del_list" class="btn btn-danger btn-sm remove" role="button" id="remove" data-url="application/controllers/employees/delete.php?act=del_list">
				<span class="glyphicon glyphicon-trash"></span> Remove
			</a> -->
			 <div class="col-xs-12 col-md-8">
				<form class="form-inline" action="application/views/reports/manage.php">
					<input type="text" name="txtFilterReport" id="idFilterReport" class="form-control">
					<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Filter</button>
				</form>
			</div>

			<!-- <div class="row"> -->
			  <!-- <div class="col-xs-2">
			    <input type="text" class="form-control" placeholder=".col-xs-2">
			  </div>
			  <div class="col-xs-3">
			    <input type="text" class="form-control" placeholder=".col-xs-3">
			  </div>
			  <div class="col-xs-4">
			    <input type="text" class="form-control" placeholder=".col-xs-4">
			  </div> -->
			<!-- </div> -->
			<div class="clear_both"></div>
		</div>

		<div class="table-responsive col-md-12">
			<table class="table table-condensed">
			  	<thead>
					<tr>
						<th></th>
						<th>#</th>
						<th>Staff</th>
						<th>Content/Reason</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Amount</th>
						<th>Approved By</th>
						<!-- <th>Option</th> -->
					</tr>
				</thead>
			    <tbody>
			    	<?php 
					$no = 0;
					while ($take_leaves = mysql_fetch_array($reports)) { 
						$no++;
					?>
						<tr>
							<td><input type="checkbox" name="checkedID" value="<?php echo $take_leaves['app_id']; ?>" class="checkedID" /></td>
							<td><?php echo $no; ?></td>
							<td><?php echo ucwords($take_leaves['first_name'].' '.$take_leaves['last_name']); ?></td>
							<td><?php echo ucfirst($take_leaves['reason']); ?></td>
							<td><?php echo $take_leaves['s_date']; ?></td>
							<td><?php echo $take_leaves['e_date']; ?></td>
							<td><?php echo $take_leaves['app_amount']; ?></td>
							<td><?php echo ucwords($take_leaves['approver']); ?></td>
						</tr>
					<?php }
					?>
			    </tbody>
			  </table>
		</div>
	</div>
</div>