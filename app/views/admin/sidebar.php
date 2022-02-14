<div class="left-side-menu">
    <div class="user-box">
        <div class="float-left">
            <img src="<?php echo _WEB_ROOT; ?>/public/assets/admin/images\users\avatar-1.jpg" alt="" class="avatar-md rounded-circle">
        </div>
        <div class="user-info">
            <a href="<?php echo _WEB_ROOT; ?>/admin">
                <?php
                 $sessionData = Session::data('checkLogin');
                 if (!empty($sessionData)) {
                     foreach ($sessionData as $sessionDatas) {
                         echo $sessionDatas['tbl_name'];
                     }
                 }
                ?>
            </a>
            <p class="text-muted m-0">Administrator</p>
        </div>
    </div>

    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li class="menu-title">Navigation</li>

            <li>
                <a href="<?php echo _WEB_ROOT; ?>/admin">
                    <i class="fas fa-users"></i>
                    <span> Users </span>
                </a>
            </li>
            <li>
                <a href="<?php echo _WEB_ROOT; ?>/post">
                    <i class="fas fa-book"></i>
                    <span> Post </span>
                </a>
            </li>

        </ul>

    </div>

    <div class="clearfix"></div>


</div>