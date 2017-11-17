<?php include_once('includes/header.php'); ?>
<div class="col-lg-8 col-lg-offset-2">
	<form action="<?= base_url(); ?>Site_Login/login" method="post">
	  <div class="form-group">
	    <label for="email">Email address:</label>
	    <input type="email" name="email" class="form-control" id="email">
	    <?php echo form_error('email','<span class="text-danger">','</span>'); ?>
	  </div> 
	  <div class="form-group">
	    <label for="pwd">Password:</label>
	    <input type="password" name="password" class="form-control" id="pwd">
	    <?php echo form_error('password','<span class="text-danger">','</span>'); ?>
	  </div>
	  <div class="checkbox">
	    <label><input type="checkbox"> Remember me</label>
	    <a href="<?= base_url(); ?>Site_Login/registration_form">Sign up</a>
	  </div>

	  <button name="login" class="btn btn-default" value="true">Submit</button>
	</form>
</div>

<?php include_once('includes/footer.php'); ?>