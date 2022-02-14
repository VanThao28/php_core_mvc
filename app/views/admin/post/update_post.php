<div class="content-page">
    <div class="content">
        <!-- Start container-fluid -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h4 class="header-title mb-3">Update Post!</h4>
                    </div>
                </div>
            </div>
            <?php

            echo (!empty($dataFieldPostUpdate['msgUpdatePost'])) ? '<div class="alert alert-danger" role="alert">' . $dataFieldPostUpdate['msgUpdatePost'] . '</div>' : false;
            echo (!empty($dataFieldPostUpdate['msgUpdateDataPost'])) ? '<div class="alert alert-info" role="alert">' . $dataFieldPostUpdate['msgUpdateDataPost'] . '</div>' : false;
            ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mt-5">
                        <?php
                        foreach ($editPostId as $editPostIds) {
                        ?>
                            <form class="form-horizontal mt-3" action="<?php echo _WEB_ROOT ?>/post/updatePost/<?php echo $editPostIds['id'] ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">User</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="input_user">
                                            <?php
                                            foreach ($listUser as $listUsers) {
                                            ?>
                                                <option <?php if ($listUsers['id'] == $editPostIds['btl_user_id']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $listUsers['id'] ?>"><?php echo $listUsers['tbl_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">Title</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="input_title" rows="4" cols="50" placeholder="Name"><?php echo $editPostIds['tbl_title'] ?></textarea>
                                        <?php echo (!empty($dataFieldPostUpdate['errorUpdatePost']) && array_key_exists('input_title', $dataFieldPostUpdate['errorUpdatePost'])) ? '<span style="color:red;">' . $dataFieldPostUpdate['errorUpdatePost']['input_title'] . '</span><br>' : false ?>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">Connent</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="input_connent" rows="4" cols="50" placeholder="Connent"><?php echo $editPostIds['tbl_connent'] ?></textarea>
                                        <?php echo (!empty($dataFieldPostUpdate['errorUpdatePost']) && array_key_exists('input_connent', $dataFieldPostUpdate['errorUpdatePost'])) ? '<span style="color:red;">' . $dataFieldPostUpdate['errorUpdatePost']['input_connent'] . '</span><br>' : false ?>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">Upload file</label>
                                    <div class="col-md-9">
                                        <input type="file" accept="image/*" name="input_image" onchange="loadFile(event)">
                                        <img id="output" width="250px" height="250px" src="<?php echo _WEB_ROOT; ?>/<?php echo $editPostIds['image_post'] ?>" /></br>
                                        <?php echo (!empty($dataFieldPostUpdate['msgUpdatePostImage'])) ? '<span style="color:red;">' . $dataFieldPostUpdate['msgUpdatePostImage'] . '</span><br>' : false ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">Category</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="input_category" placeholder="Category" value="<?php echo $editPostIds['tbl_category'] ?>">
                                        <?php echo (!empty($dataFieldPostUpdate['errorUpdatePost']) && array_key_exists('input_category', $dataFieldPostUpdate['errorUpdatePost'])) ? '<span style="color:red;">' . $dataFieldPostUpdate['errorUpdatePost']['input_category'] . '</span><br>' : false ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-9">
                                        <div class="radio radio-success">
                                            <input type="radio" name="input_is_public" id="radio4" value="0" 
                                                <?php if ($editPostIds['is_public'] == 0) {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="radio4">
                                                Hiện
                                            </label>
                                        </div>
                                        <div class="radio radio-danger">
                                            <input type="radio" name="input_is_public" id="radio6" value="1" 
                                                <?php if ($editPostIds['is_public'] == 1) {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="radio6">
                                                Ẩn
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end mb-0" style="margin-top: 15px;">
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-info">UPDATE POST</button>
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
</div>