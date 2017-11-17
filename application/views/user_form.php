<?php include_once('includes/header.php'); ?>
<div class="container">
  <h2>Create User</h2>
	<div class="col-lg-8 col-lg-offset-2">
		<form id="user-form" action="<?= base_url(); ?>Site_Home/store" method="post">
		  <div class="form-group">
		    <label for="email">Name:</label>
		    <input type="text" name="name" class="form-control" id="email">
		    <?php echo form_error('name','<span class="text-danger">','</span>'); ?>
		  </div> 
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


		  <button name="submitUser" id="submitUser" class="btn btn-default" value="true">Submit</button>
		  <a href="<?= base_url(); ?>Site_Home">Back</a>
		</form>
	</div>
</div>

<?php include_once('includes/footer.php'); ?>