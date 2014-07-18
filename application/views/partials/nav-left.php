<ul class="list-group">
  <?php 
  $empObj = new Employee();
  $info = $empObj->get_info($_SESSION['logged_id']);
  if ($info['usertype_name'] == "Admin") {
  ?>
    <li class="list-group-item">
      <!-- <span class="badge">14</span> -->
      <a href="index.php"><span class="glyphicon glyphicon-dashboard"></span> Home</a>
    </li>
    <li class="list-group-item">
      <!-- <span class="badge">14</span> -->
      <a href="?views=employees"><span class="glyphicon glyphicon-user"></span> Employees Management</a>
    </li>
    <li class="list-group-item">
      <!-- <span class="badge">14</span> -->
      <a href="?views=departments"><span class="glyphicon glyphicon-home"></span> Department Management</a>
    </li>
    <!-- <li class="list-group-item">
      <span class="badge">14</span>
      <a href="?views=take_leaves"><span class="glyphicon glyphicon-tasks"></span> Take Leave Management</a>
    </li> -->
    <li class="list-group-item">
      <a href="?views=reports"><span class="glyphicon glyphicon-file"></span> Report</a>
    </li>
  <?php  
  } else { ?>
  <li class="list-group-item">
    <a href="?views=leave_requests"><span class="glyphicon glyphicon-list"></span> Take Leave</a>
  </li>
  <?php }
  ?>
  <li class="list-group-item">
    <a href="?views=profiles"><span class="glyphicon glyphicon-cog"></span> Profile</a>
  </li>
  <li class="list-group-item">
    <!-- <span class="badge">14</span> -->
    <a href="?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
  </li>
</ul>