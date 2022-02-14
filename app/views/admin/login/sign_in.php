 <div class="account-pages my-5 pt-5">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8 col-lg-6">
                 <div class="card">
                     <div class="card-body">
                         <div class="text-center mb-4 mt-3">
                             <a href="#">
                                 <span><img src="<?php echo _WEB_ROOT; ?>/public/assets/admin/images/logo-dark.png" alt="" height="30"></span>
                             </a>
                         </div>
                         <?php 
                            echo (!empty($data['msg_signIn']))?'<div class="alert alert-danger" role="alert">'.$data['msg_signIn'].'</div>':false;
                            echo (!empty($data['msg_checksignIn']))?'<div class="alert alert-danger" role="alert">'.$data['msg_checksignIn'].'</div>':false;
                         ?>
                         <form action="<?php echo _WEB_ROOT; ?>/login/insetSignIn" method="post" class="p-2">
                             <span>
                             </span>
                             <div class="form-group">
                                 <label for="emailaddress">Email address</label>
                                 <input class="form-control" type="email" id="emailaddress" name="input_login_email" required="" placeholder="john@deo.com" value="<?php echo !empty($data['old_signIn']['input_login_email'])?$data['old_signIn']['input_login_email']:false?>"></br>
                                 <?php echo (!empty($data['errors_signIn']) && array_key_exists('input_login_email',$data['errors_signIn']))?'<span style="color:red;">'.$data['errors_signIn']['input_login_email'].'</span><br>':false?>
                             </div>
                             <div class="form-group">
                                 <label for="password">Password</label>
                                 <input class="form-control" type="password" required="" id="password" name="input_login_password" placeholder="Enter your password" value="<?php echo !empty($data['old_signIn']['input_login_password'])?$data['old_signIn']['input_login_password']:false?>">
                                 <?php echo (!empty($data['errors_signIn']) && array_key_exists('input_login_password',$data['errors_signIn']))?'<span style="color:red;">'.$data['errors_signIn']['input_login_password'].'</span><br>':false?>
                             </div>

                             <div class="mb-3 text-center">
                                 <button class="btn btn-primary btn-block" type="submit"> Sign In </button>
                             </div>
                         </form>
                     </div>
                     <!-- end card-body -->
                 </div>
                 <!-- end card -->
                 <div class="row mt-4">
                     <div class="col-sm-12 text-center">
                         <p class="text-muted mb-0">Don't have an account? <a href="<?php echo _WEB_ROOT; ?>/login/signUp" class="text-dark ml-1"><b>Sign Up</b></a></p>
                     </div>
                 </div>
             </div>
             <!-- end col -->
         </div>
     </div>
     <!-- end container -->
 </div>