<section class="content">
	<div class="row">
	    <div class="col-xs-12">
	      <?php echo $msg; ?>
	      <div class="box">
	        <div class="box-header">
	          <h3 class="box-title">All Surah Audio</h3>
	          <div class="box-tools">
	          	<a href="<?php echo site_url('admin/surah_hafalan/add') ?>" class="btn btn-sm btn-primary">Add New</a>
	          </div>
	        </div><!-- /.box-header -->
	        <div class="box-body table-responsive no-padding">
	          <table class="table table-hover">
	            <tbody><tr>
	              <th>Surah name</th>
	              <th>Murotttal name</th>
	              <th>Audio URl</th>
	              <th>Action</th>
	            </tr>
	            <?php if( ! empty( $posts ) ) : foreach( $posts as $post ) : ?>
			            <tr>
			              <td><?php echo $post->nama_ayat ?></td>
			              <td><?php echo $post->nama_murottal ?></td>
			              <td><?php echo $post->url_audio ?></td>
			              <td>
			              	<a href="<?php echo site_url( 'admin/surah_hafalan/change/' . $post->surah_hafalan_id )  ?>" class="btn btn-info btn-sm">Change</a>
			              	<a href="<?php echo site_url( 'admin/surah_hafalan/delete/' . $post->surah_hafalan_id )  ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">Delete</a>
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