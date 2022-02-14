<div class="content-page">
    <div class="content">
        <!-- Start container-fluid -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h4 class="header-title mb-3">Create Users !</h4>
                    </div>
                </div>
            </div>
        </div>
        <?php
            echo (!empty($data['msg']))?'<div class="alert alert-danger" role="alert">'.$data['msg'].'</div>':false;
            echo (!empty($data['msgCreate']))?'<div class="alert alert-info" role="alert">'.$data['msgCreate'].'</div>':false;
        ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-5">
                    <form class="form-horizontal mt-3" action="<?php echo _WEB_ROOT;?>/Users/storeUser" method="post">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="form_input_name"  placeholder="Name" value="<?php echo !empty($data['old']['form_input_name'])?$data['old']['form_input_name']:false?>"></br>
                                <?php echo (!empty($data['errors']) && array_key_exists('form_input_name',$data['errors']))?'<span style="color:red;">'.$data['errors']['form_input_name'].'</span><br>':false?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="inputEmail3" name="tbl_email"  placeholder="Email" value="<?php echo !empty($data['old']['tbl_email'])?$data['old']['tbl_email']:false?>"></br>
                                <?php echo (!empty($data['errors']) && array_key_exists('tbl_email',$data['errors']))?'<span style="color:red;">'.$data['errors']['tbl_email'].'</span><br>':false?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="inputPassword3" name="form_input_password"  placeholder="Password" value="<?php echo !empty($data['old']['form_input_password'])?$data['old']['form_input_password']:false?>"></br>
                                <?php echo (!empty($data['errors']) && array_key_exists('form_input_password',$data['errors']))?'<span style="color:red;">'.$data['errors']['form_input_password'].'</span><br>':false?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-md-3 control-label">Confirm Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="inputPassword3" name="form_input_confirm_password"  placeholder="Confirm Password" value="<?php echo !empty($data['old']['form_input_confirm_password'])?$data['old']['form_input_confirm_password']:false?>"></br>
                                <?php echo (!empty($data['errors']) && array_key_exists('form_input_confirm_password',$data['errors']))?'<span style="color:red;">'.$data['errors']['form_input_confirm_password'].'</span><br>':false?>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end mb-0" style="margin-top: 15px;">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-info">ADD USER</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>