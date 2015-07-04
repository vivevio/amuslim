<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Murottal</h3>
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
        <form action="<?php echo site_url('admin/murottal/save_changes/old-data') ?>" method="post" id="murottal" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="2">Murottal name</label>
              <input type="hidden" name="id" value="<?php echo $post->murottal_id ?>">
              <input type="text" name="name" value="<?php echo $post->nama_murottal ?>" class="form-control" id="2" placeholder="Enter name" required>
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