<section class="content">
	<div class="row">
	    <div class="col-xs-6">
	      <?php echo $msg; ?>
	      <div class="box">
	        <div class="box-header">
	          <h3 class="box-title">All Murottal</h3>
	          <div class="box-tools">
	          	<a href="<?php echo site_url('admin/murottal/add') ?>" class="btn btn-sm btn-primary">Add New Murottal</a>
	          </div>
	        </div><!-- /.box-header -->
	        <div class="box-body table-responsive no-padding">
	          <table class="table table-hover">
	            <tbody><tr>
	              <th>ID</th>
	              <th>Murottal name</th>
	              <th>Action</th>
	            </tr>
	            <?php if( ! empty( $murottals ) ) : foreach( $murottals as $murottal ) : ?>
			            <tr>
			              <td><?php echo $murottal->murottal_id ?></td>
			              <td><?php echo $murottal->nama_murottal ?></td>
			              <td>
			              	<a href="<?php echo site_url( 'admin/murottal/change/' . $murottal->murottal_id )  ?>" class="btn btn-info btn-sm">Change</a>
			              	<a href="<?php echo site_url( 'admin/murottal/delete/' . $murottal->murottal_id )  ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">Delete</a>
			              </td>
			            </tr>
		        <?php endforeach; endif; ?>
	          </tbody>
	         </table>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div>
	  </div>
</section>