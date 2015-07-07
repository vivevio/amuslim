<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Surah</h3>
        </div><!-- /.box-header -->
        
        <div class="box-body">
          <?php echo $msg; ?>
        </div>

        <!-- form start -->
        <?php echo form_open_multipart('admin/surah_hafalan/save_changes/old-data', array('id'=>'surah','role'=>'form')); ?>
          <div class="box-body">
            <div class="form-group">
              <label for="2">Surah name</label>
              <input type="hidden" name="id" value="<?php echo $post->surah_hafalan_id ?>">
              <?php echo dropdown_surah( $post->ayat_id ); ?>
            </div>

            <div class="form-group">
              <label for="3">Murottal name</label>
              <?php echo dropdown_murottal( $post->murottal_id ); ?>
            </div>

            <div class="form-group">
              <label for="4">Old Url audio</label>
              <input type="text" name="oldfile" value="<?php echo $post->url_audio ?>" class="form-control" readonly="readonly">
            </div>

            <div class="form-group">
              <label for="4">Upload new audio</label>
              <input type="file" name="file" accept="audio/*">
              <p class="help-block">If you would not change the audio, just leave it empty.</p>
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