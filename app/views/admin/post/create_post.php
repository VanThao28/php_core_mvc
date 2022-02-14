<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h4 class="header-title mb-3">Create Post!</h4>
                    </div>
                </div>
            </div>
            <?php
            echo (!empty($dataFieldsPost['msgCreatePost'])) ? '<div class="alert alert-danger" role="alert">' . $dataFieldsPost['msgCreatePost'] . '</div>' : false;
            echo (!empty($dataFieldsPost['msgCreatePosts'])) ? '<div class="alert alert-info" role="alert">' . $dataFieldsPost['msgCreatePosts'] . '</div>' : false;
            ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mt-5">
                        <form class="form-horizontal mt-3" action="<?php echo _WEB_ROOT ?>/post/storePost" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-md-3 control-label">User</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="form_input_user">
                                        <?php
                                        foreach ($dataUser as $dataUsers) {
                                        ?>
                                            <option value="<?php echo $dataUsers['id'] ?>"><?php echo $dataUsers['tbl_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Title</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="form_input_title" rows="4" cols="50" placeholder="Name"><?php echo !empty($dataFieldsPost['oldCreatePost']['form_input_title']) ? $dataFieldsPost['oldCreatePost']['form_input_title'] : false ?></textarea>
                                    <?php echo (!empty($dataFieldsPost['errorsCreatePost']) && array_key_exists('form_input_title', $dataFieldsPost['errorsCreatePost'])) ? '<span style="color:red;">' . $dataFieldsPost['errorsCreatePost']['form_input_title'] . '</span><br>' : false ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Connent</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="form_input_connent" rows="4" cols="50" placeholder="Connent"><?php echo !empty($dataFieldsPost['oldCreatePost']['form_input_connent']) ? $dataFieldsPost['oldCreatePost']['form_input_connent'] : false ?></textarea>
                                    <?php echo (!empty($dataFieldsPost['errorsCreatePost']) && array_key_exists('form_input_connent', $dataFieldsPost['errorsCreatePost'])) ? '<span style="color:red;">' . $dataFieldsPost['errorsCreatePost']['form_input_connent'] . '</span><br>' : false ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Upload file</label>
                                <div class="col-md-9">
                                    <input type="file" accept="image/*" name="form_input_image" onchange="loadFile(event)">
                                    <img id="output" width="250px" height="250px" /></br>
                                    <?php echo (!empty($dataFieldsPost['msgCreatePostImage'])) ? '<span style="color:red;">' . $dataFieldsPost['msgCreatePostImage'] . '</span><br>' : false ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Category</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="form_input_category" placeholder="Category" value="<?php echo !empty($dataFieldsPost['oldCreatePost']['form_input_category']) ? $dataFieldsPost['oldCreatePost']['form_input_category'] : false ?>">
                                    <?php echo (!empty($dataFieldsPost['errorsCreatePost']) && array_key_exists('form_input_category', $dataFieldsPost['errorsCreatePost'])) ? '<span style="color:red;">' . $dataFieldsPost['errorsCreatePost']['form_input_category'] . '</span><br>' : false ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <div class="radio radio-success">
                                        <input type="radio" name="form_input_is_public" id="radio4" value="0">
                                        <label for="radio4">
                                            Hiện
                                        </label>
                                    </div>
                                    <div class="radio radio-danger">
                                        <input type="radio" name="form_input_is_public" id="radio6" value="1">
                                        <label for="radio6">
                                            Ẩn
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end mb-0" style="margin-top: 15px;">
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-info">ADD POST</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>