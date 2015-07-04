<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit ayat</h3>
        </div><!-- /.box-header -->
        
        <div class="box-body">
          <div class="alert alert-danger alert-dismissable hide" id="msgError">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Failed!</h4>
          </div>

          <div class="alert alert-success alert-dismissable hide" id="msgSuccess">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
          </div>
        </div>

        <!-- form start -->
        <form action="<?php echo site_url('admin/ayat/save_changes/old-data') ?>" method="post" id="ayat" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="2">Ayat name</label>
              <input type="hidden" name="id" value="<?php echo $post->ayat_id ?>">
              <input type="text" name="name" value="<?php echo $post->nama_ayat ?>" class="form-control" id="2" placeholder="Enter name" required>
            </div>

            <div class="form-group">
              <label for="3">Knowledge</label>
              <textarea class="textarea" name="info" placeholder="Type information about those ayat here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                <?php echo $post->info ?>
              </textarea>
            </div>

            <div class="form-group">
              <label for="4">Link Source</label>
              <input type="url" name="sumber_info" value="<?php echo $post->sumber_info ?>" class="form-control" id="4" placeholder="Enter URL for source of information if any">
            </div>

          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>