<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4 mt-3">
                            <a href="index.html">
                                <span><img src="<?php echo _WEB_ROOT; ?>/public/assets/admin/images/logo-dark.png" alt="" height="30"></span>
                            </a>
                        </div>
                        <?php 
                            echo (!empty($data_register['msg_register']))?'<div class="alert alert-danger" role="alert">'.$data_register['msg_register'].'</div>':false;
                        ?>
                        <form action="<?php echo _WEB_ROOT?>/login/CreateSignIn" class="p-2" method="post">
                            <div class="form-group">
                                <label for="username">Name</label>
                                <input class="form-control" type="text" id="username" name="register_name" required="" placeholder="Michael Zenaty" value="<?php echo !empty($data_register['old_register']['register_name'])?$data_register['old_register']['register_name']:false?>"></br>
                                <?php echo (!empty($data_register['errors_register']) && array_key_exists('register_name',$data_register['errors_register']))?'<span style="color:red;">'.$data_register['errors_register']['register_name'].'</span><br>':false?>
                            </div>
                            <div class="form-group">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" required="" name="tbl_email" placeholder="john@deo.com" value="<?php echo !empty($data_register['old_register']['tbl_email'])?$data_register['old_register']['tbl_email']:false?>"></br>
                                <?php echo (!empty($data_register['errors_register']) && array_key_exists('tbl_email',$data_register['errors_register']))?'<span style="color:red;">'.$data_register['errors_register']['tbl_email'].'</span><br>':false?>
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input class="form-control" type="password" required="" id="password" name="register_password" placeholder="Enter your password" value="<?php echo !empty($data_register['old_register']['register_password'])?$data_register['old_register']['register_password']:false?>"></br>
                                <?php echo (!empty($data_register['errors_register']) && array_key_exists('register_password',$data_register['errors_register']))?'<span style="color:red;">'.$data_register['errors_register']['register_password'].'</span><br>':false?>

                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input class="form-control" type="password" required="" id="confirm-password" name="register_confirm_password" placeholder="Enter your password" value="<?php echo !empty($data_register['old_register']['register_confirm_password'])?$data_register['old_register']['register_confirm_password']:false?>"></br>
                                <?php echo (!empty($data_register['errors_register']) && array_key_exists('register_confirm_password',$data_register['errors_register']))?'<span style="color:red;">'.$data_register['errors_register']['register_confirm_password'].'</span><br>':false?>
                            </div>
                            <div class="mb-3 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> Sign Up Free </button>
                            </div>
                        </form>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-4">
                    <div class="col-sm-12 text-center">
                        <p class="text-muted mb-0">Already have an account? <a href="<?php echo _WEB_ROOT; ?>/login/signIn" class="text-dark ml-1"><b>Sign In</b></a></p>
                    </div>
                </div>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>