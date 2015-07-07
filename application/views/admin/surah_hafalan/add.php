<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add new</h3>
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

          <?php echo $msg; ?>
        </div>

        <!-- form start -->
        <?php echo form_open_multipart('admin/surah_hafalan/save_changes/new-data', array('id'=>'surah','role'=>'form')); ?>
          <div class="box-body">
            <div class="form-group">
              <label for="2">Surah name</label>
              <?php echo dropdown_surah(); ?>
            </div>

            <div class="form-group">
              <label for="3">Murottal name</label>
              <?php echo dropdown_murottal(); ?>
            </div>

            <div class="form-group">
              <label for="4">Upload audio</label>
              <input type="file" name="file" accept="audio/*">
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