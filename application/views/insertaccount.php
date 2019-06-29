<?php
    if(!$this->session->has_userdata('name')){
        echo 'You need login account !!!';
        return;
    }
?>
<div class="box box-danger">
    <form action="<?php echo base_url();?>index.php/home_control/insertAccount" method="POST" role="form" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">UserName</label>
                  <div class="col-sm-10">
                    <input type="text" name = "username" class="form-control" id="inputEmail3" placeholder="UserName">
                  </div>
                  <div class="col-sm-12">
                    <span class="text-danger"><?php echo form_error('username'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                  <div class="col-sm-12">
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="cpassword" class="form-control" id="inputPassword3" placeholder="Confirm Password">
                  </div>
                  <div class="col-sm-12">
                    <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputPassword3" placeholder="Email">
                  </div>
                  <div class="col-sm-12">
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Display Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="displayname" class="form-control" id="inputPassword3" placeholder="Display Name">
                  </div>
                  <div class="col-sm-12">
                    <span class="text-danger"><?php echo form_error('displayname'); ?></span>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name="status">
                      <option>Lock</option>
                      <option>Unlock</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-12 control-label">
                        <?php
                            if(isset($success))
                                echo $success;
                        ?>
                  </label>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="insert" class="btn btn-info pull-right">Add Account</button>
              </div>
              <!-- /.box-footer -->
            </form>
  </div>