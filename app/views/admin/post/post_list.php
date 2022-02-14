<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h4 class="header-title mb-3">Post !</h4>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo (!empty($msgDe)) ? '<div class="alert alert-info" role="alert">' . $msgDe . '</div>' : false;
        ?>
        <div class="row">
            <div class="col-12">
                <div>
                    <div>
                        <div class="button-list">
                            <a href="<?php echo _WEB_ROOT ?>/post/createPost" class="btn btn-icon btn-success" style="margin-bottom: 15px;"> <i class="fas fa-plus"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 168px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 168px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Title</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 168px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">User</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 256px;" aria-label="Position: activate to sort column ascending">Connent</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 100px;" aria-label="Position: activate to sort column ascending">image</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 256px;" aria-label="Position: activate to sort column ascending">Category</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 256px;" aria-label="Position: activate to sort column ascending">Is public</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 256px;" aria-label="Position: activate to sort column ascending">Date</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 256px;" aria-label="Position: activate to sort column ascending">Show</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 168px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($list_post as $list_posts) {
                            $i++;
                        ?>
                            <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1"><?php echo $i ?></td>
                                <td><?php echo $list_posts['tbl_title'] ?></td>
                                <td><?php echo $list_posts['tbl_name'] ?></td>
                                <td><?php echo substr($list_posts['tbl_connent'], 0, 200) ?>...</td>
                                <td><img src="<?php echo _WEB_ROOT; ?>/<?php echo $list_posts['image_post'] ?>" style="width: 100px;" alt=""></td>
                                <td><?php echo $list_posts['tbl_category'] ?></td>
                                <td>
                                    <?php
                                    if ($list_posts['is_public'] == 0) {
                                        echo 'hiện';
                                    } else {
                                        echo 'ẩn';
                                    }
                                    ?>
                                </td>
                                <td><?php echo $list_posts['tbl_date'] ?></td>
                                <td><a href="<?php echo _WEB_ROOT; ?>/home/singleBlog/<?php echo $list_posts['id'] ?>" class="btn btn-icon btn-success" style="margin-bottom: 5px;"> <i class="fas fa-eye"></i> </a></td>
                                <td>
                                    <a href="<?php echo _WEB_ROOT ?>/post/editPost/<?php echo $list_posts['id'] ?>" class="btn btn-icon btn-warning" style="margin-bottom: 5px;"> <i class="fas fa-edit"></i> </a>
                                    <a onclick="return confirm('bạn có muốn xóa không?')" href="<?php echo _WEB_ROOT; ?>/Post/deletePost/<?php echo $list_posts['id'] ?>" class="btn btn-icon btn-danger" style="margin-bottom: 5px;"> <i class="fas fa-trash-alt"></i> </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>