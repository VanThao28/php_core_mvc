<div class="content-page">
    <div class="content">
        <!-- Start container-fluid -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h4 class="header-title mb-3">Update Users !</h4>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo (!empty($data['msgUserUpdate'])) ? '<div class="alert alert-danger" role="alert">' . $data['msgUserUpdate'] . '</div>' : false;
        echo (!empty($data['msgUpdate'])) ? '<div class="alert alert-info" role="alert">' . $data['msgUpdate'] . '</div>' : false;

        ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-5">
                    <?php
                    foreach ($editUserId as $editUserIds) {
                    ?>
                        <form class="form-horizontal mt-3" action="<?php echo _WEB_ROOT; ?>/Users/updateUser/<?php echo $editUserIds['id'] ?>" method="post">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="input_name" placeholder="name" value="<?php echo $editUserIds['tbl_name']?>"></br>
                                    <?php echo (!empty($data['errorUserUpdate']) && array_key_exists('input_name', $data['errorUserUpdate'])) ? '<span style="color:red;">' . $data['errorUserUpdate']['input_name'] . '</span><br>' : false ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-3 control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" id="inputEmail3" name="tbl_email" placeholder="Email" value="<?php echo $editUserIds['tbl_email'] ?>"></br>
                                    <?php echo (!empty($data['errorUserUpdate']) && array_key_exists('tbl_email', $data['errorUserUpdate'])) ? '<span style="color:red;">' . $data['errorUserUpdate']['tbl_email'] . '</span><br>' : false ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-md-3 control-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" id="inputPassword3" name="input_password" placeholder="Password" value="<?php echo $editUserIds['tbl_password'] ?>"></br>
                                    <?php echo (!empty($data['errorUserUpdate']) && array_key_exists('input_password', $data['errorUserUpdate'])) ? '<span style="color:red;">' . $data['errorUserUpdate']['input_password'] . '</span><br>' : false ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-md-3 control-label">Confirm Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" id="inputPassword3" name="input_confirm_password" placeholder="Confirm Password" value="<?php echo $editUserIds['tbl_password'] ?>"></br>
                                    <?php echo (!empty($data['errorUserUpdate']) && array_key_exists('input_confirm_password', $data['errorUserUpdate'])) ? '<span style="color:red;">' . $data['errorUserUpdate']['input_confirm_password'] . '</span><br>' : false ?>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end mb-0" style="margin-top: 15px;">
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-info">UPDATE USER</button>
                                </div>
                            </div>
                        </form>
                    <?php
                    }
                
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>