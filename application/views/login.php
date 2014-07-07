<form class="form-signin" role="form" action="<?php echo URL;?>" method="post">
<!-- <form class="form-signin" role="form" action="application/controllers/system.php" method="post"> -->
	<h2 class="form-signin-heading">Please sign in</h2>
	<input type="email" name="email" class="input-control" placeholder="Email address" required autofocus>
	<input type="password" name="password" class="input-control" placeholder="Password" required>
	<label class="checkbox">
	  <input type="checkbox" value="remember-me"> Remember me
	</label>
	<button class="up-btn" type="submit" name="btnSignIn">Sign in</button>
</form>