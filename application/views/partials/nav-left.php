<ul class="list-group">
  <?php 
  $empObj = new Employee();
  $info = $empObj->get_info($_SESSION['logged_id']);
  if ($info['usertype_name'] == "Admin") {
  ?>
    <li class="list-group-item">
      <!-- <span class="badge">14</span> -->
      <a href="index.php">Home</a>
    </li>
    <li class="list-group-item">
      <!-- <span class="badge">14</span> -->
      <a href="?views=employees">Employees Management</a>
    </li>
    <li class="list-group-item">
      <!-- <span class="badge">14</span> -->
      <a href="?views=departments">Department Management</a>
    </li>
    <li class="list-group-item">
      <span class="badge">14</span>
      <a href="?views=take_leaves">Take Leave Management</a>
    </li>
    <li class="list-group-item">
      <span class="badge">14</span>
      <a href="?views=reports">Report</a>
    </li>
  <?php  
  }
  ?>
  <li class="list-group-item">
    <a href="?views=leave_requests">Take Leave</a>
  </li>
  <li class="list-group-item">
    <a href="?views=profiles">Profile</a>
  </li>
  <li class="list-group-item">
    <!-- <span class="badge">14</span> -->
    <a href="?act=logout">Logout</a>
  </li>
</ul>