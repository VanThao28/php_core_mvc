<div class="content-page">
    <div class="content">

        <!-- Start container-fluid -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h4 class="header-title mb-3">Users !</h4>
                    </div>
                </div>
            </div>
        </div>
        <?php 
           echo (!empty($msgDelete)) ? '<div class="alert alert-info" role="alert">' . $msgDelete . '</div>' : false;
        ?>
        <div class="row">
            <div class="col-12">
                <div>
                    <div>
                        <div class="button-list">
                            <a href="<?php echo _WEB_ROOT;?>/Users/createUser" class="btn btn-icon btn-success" style="margin-bottom: 15px;"> <i class="fas fa-plus"></i> </a>
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
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 168px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 256px;" aria-label="Position: activate to sort column ascending">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 256px;" aria-label="Position: activate to sort column ascending">Date</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 168px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Setting</th>
                        </tr>
                    </thead>
                    <?php
                    $i = 0;
                    foreach ($list_user as $list_users) {
                        $i++;
                    ?>
                        <tbody>
                            <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1"><?php echo $i ?></td>
                                <td><?php echo $list_users['tbl_name'] ?></td>
                                <td><?php echo $list_users['tbl_email'] ?></td>
                                <td><?php echo $list_users['tbl_date'] ?></td>
                                <td>
                                    <a href="<?php echo _WEB_ROOT;?>/Users/editUser/<?php echo $list_users['id']?>" class="btn btn-icon btn-warning" style="margin-bottom: 5px;"> <i class="fas fa-edit"></i> </a>
                                    <a onclick="return confirm('are you want to delete?')" href="<?php echo _WEB_ROOT;?>/Users/deleteUser/<?php echo $list_users['id']?>" class="btn btn-icon btn-danger" style="margin-bottom: 5px;"> <i class="fas fa-trash-alt"></i> </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

</div>