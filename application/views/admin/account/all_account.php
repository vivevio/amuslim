<section class="content">
	<div class="row">
	    <div class="col-xs-12">
	      <?php echo $msg; ?>
	      <div class="box">
	        <div class="box-header">
	          <h3 class="box-title">All Accounts</h3>
	          <div class="box-tools">
	          	<a href="<?php echo site_url('admin/account/add') ?>" class="btn btn-sm btn-primary">Add New User</a>
	          </div>
	        </div><!-- /.box-header -->
	        <div class="box-body table-responsive no-padding">
	          <table class="table table-hover">
	            <tbody><tr>
	              <th>Username</th>
	              <th>Email</th>
	              <th>Role</th>
	              <th>Created on</th>
	              <th>Action</th>
	            </tr>
	            <?php foreach( $users as $user ) : ?>
			            <tr>
			              <td><?php echo $user->username ?></td>
			              <td><?php echo $user->email ?></td>
			              <td><?php echo get_user_group_desc( $user->id ) ?></td>
			              <td><?php echo date('d M Y', $user->created_on) ?></td>
			              <td>
			              	<a href="<?php echo site_url( 'admin/account/index/' . $user->id )  ?>" class="btn btn-info btn-sm">Change</a>
				            <?php if( $user->id !== $current_user ) : ?>
				              	<a href="<?php echo site_url( 'admin/account/delete/' . $user->id )  ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">Delete</a>
					        <?php endif; ?>
			              </td>
			            </tr>
		        <?php endforeach; ?>
	          </tbody>
	         </table>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div>
	  </div>
</section>