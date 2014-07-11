<!-- <form class="form-signin" role="form" action="<?php echo URL;?>" method="post">
 --><!-- <form class="form-signin" role="form" action="application/controllers/system.php" method="post"> -->
	<!-- <h2 class="form-signin-heading">Please sign in</h2>
	<input type="email" name="email" class="input-control" placeholder="Email address" required autofocus>
	<input type="password" name="password" class="input-control" placeholder="Password" required>
	<label class="checkbox">
	  <input type="checkbox" value="remember-me"> Remember me
	</label>
	<button class="up-btn" type="submit" name="btnSignIn">Sign in</button>
	<button type="button" class="btn btn-primary btn-sm perm_delete" title="delete record as permanent..." data-toggle="tooltip" id="tooltip">Remove Permenent</button>
</form> -->

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to continue to System</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin" role="form" action="<?php echo URL;?>" method="post">
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" name="btnSignIn" type="submit">
                    Sign in</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="#" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>