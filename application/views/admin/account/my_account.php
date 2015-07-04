<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Your Account</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" id="triggerEditAccount"><i class="fa fa-pencil-square-o"></i> Change</button>
          </div>
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
        <form action="<?php echo site_url('admin/account/save_changes') ?>" id="account" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="1">Username</label>
              <input type="hidden" name="id" value="<?php echo $user->id ?>">
              <input type="text" name="username" class="form-control" id="1" placeholder="Enter email" value="<?php echo $user->username ?>" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $user->email ?>" readonly>
            </div>
            <div class="form-group">
              <label for="2">First name</label>
              <input type="text" name="first_name" class="form-control" id="2" placeholder="Enter first name" value="<?php echo $user->first_name ?>" readonly>
            </div>
            <div class="form-group">
              <label for="3">Last name</label>
              <input type="text" name="last_name" class="form-control" id="3" placeholder="Enter last name" value="<?php echo $user->last_name ?>" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" readonly>
              <p class="help-block hidden-element hide">If you would not change the password, just leave it empty.</p>
            </div>
            <div class="form-group hidden-element hide">
              <label for="exampleInputPassword1">Confirm-Password</label>
              <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer hidden-element hide">
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>