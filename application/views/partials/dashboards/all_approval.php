<?php 

$dashObj = new Dashboard();

// echo $dashObj->index();

$all_take_leaves = $dashObj->get_all_approve_leave_mod();

?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <!-- <div class="panel-heading">Panel heading</div>
  <div class="panel-body">
    <p>...</p>
  </div> -->

  <!-- Table -->
  <table class="table">
  	<thead>
		<tr>
			<th></th>
			<th>#</th>
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
		while ($take_leaves = mysql_fetch_array($all_take_leaves)) { 
			$no++;
		?>
			<tr>
				<td><input type="checkbox" name="checkedID" value="<?php echo $take_leaves['app_id']; ?>" class="checkedID" /></td>
				<td><?php echo $no; ?></td>
				<td><?php echo ucfirst($take_leaves['reason']); ?></td>
				<td><?php echo strtoupper($take_leaves['s_date']); ?></td>
				<td><?php echo $take_leaves['e_date']; ?></td>
				<td><?php echo $take_leaves['app_amount']; ?></td>
				<td><?php echo $take_leaves['approver']; ?></td>
				<!-- <td>
				<a href="?main=take_leave&act=approve&item=<?php echo $take_leaves['app_id'] ?>" id="clickViewEmployee" data-url="?main=take_leave&act=approve&item=<?php echo $take_leaves['app_id'] ?>" class="theTooltip" data-toggle="tooltip" data-placement="top" title="Approve, click it to approve this take leave that is appending to approval.">
					  <span class="glyphicon glyphicon-ok"></span>
				</a>|
				<a href="" id="clickNewEditEmployee" data-url="application/views/employees/edit.php?act=edit&item=<?php echo $take_leaves['app_id'] ?>" class="theTooltip" data-toggle="tooltip" data-placement="top" title="Deny, click it to reject this take leave that is appending to approval.">
					  <span class="glyphicon glyphicon-remove"></span>
				</a>
				</td> -->
			</tr>
		<?php }
		?>
    </tbody>
  </table>
</div>