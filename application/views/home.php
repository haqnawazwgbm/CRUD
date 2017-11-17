<?php include_once('includes/header.php'); ?>

<div class="container">
  <h2>Total Registered Users</h2>
  <a class="pull-right btn btn-primary" href="#" data-toggle="modal" data-target="#myModal">Add</a>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    	<?php
          if (! empty($users)) :
           foreach ($users as $user) : ?>
      <tr>
        <td><?= $user['name']; ?></td>
        <td><?= $user['email']; ?></td>
        <td><?= $user['status']; ?></td>
        <td>
            <a class="edit" href="<?= base_url() . 'Site_Home/edit_form/' . $user['id']; ?>">
                <span data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-edit"></span>
            </a> | 
            <a class="delete" href="<?= base_url() . 'Site_Home/delete/' . $user['id']; ?>">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
                                                
        </td>
      </tr>
  <?php   endforeach;
        endif; ?>

    </tbody>
  </table>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add User</h4>
        </div>
        <div class="modal-body">
          <form id="user-form" action="<?= base_url(); ?>Site_Home/store" method="post">
            <input type="hidden" name="id" id="id" />
            <div class="form-group">
              <label for="email">Name:</label>
              <input type="text" name="name" class="form-control" id="name">
              <?php echo form_error('name','<span class="text-danger">','</span>'); ?>
            </div> 
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" name="email" class="form-control" id="email">
              <?php echo form_error('email','<span class="text-danger">','</span>'); ?>
            </div> 
            <div class="form-group">
              <label for="email">Email address:</label>
              <select class="form-control" name="status" id="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div> 

            <button name="submitUser" value="true" class="btn btn-default" value="true">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php include_once('includes/footer.php'); ?>

