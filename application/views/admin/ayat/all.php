<section class="content">
	<div class="row">
	    <div class="col-xs-8">
	      <?php echo $msg; ?>
	      <div class="box">
	        <div class="box-header">
	          <h3 class="box-title">All Ayat</h3>
	          <div class="box-tools">
	          	<a href="<?php echo site_url('admin/ayat/add') ?>" class="btn btn-sm btn-primary">Add New Murottal</a>
	          </div>
	        </div><!-- /.box-header -->
	        <div class="box-body table-responsive no-padding">
	          <table class="table table-hover">
	            <tbody><tr>
	              <th>Ayat name</th>
	              <th>Ayat Knowledge</th>
	              <th>Action</th>
	            </tr>
	            <?php if( ! empty( $posts ) ) : foreach( $posts as $post ) : ?>
			            <tr>
			              <td><?php echo $post->nama_ayat ?></td>
			              <td><?php echo substr( $post->info, 0, 60) ?>[...]</td>
			              <td>
			              	<a href="<?php echo site_url( 'admin/ayat/change/' . $post->ayat_id )  ?>" class="btn btn-info btn-sm">Change</a>
			              	<a href="<?php echo site_url( 'admin/ayat/delete/' . $post->ayat_id )  ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">Delete</a>
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