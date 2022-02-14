<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="<?php echo _WEB_ROOT; ?>/public/assets/admin/images\users\avatar-1.jpg" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    <?php
                    $sessionData = Session::data('checkLogin');
                    if (!empty($sessionData)) {
                        foreach ($sessionData as $sessionDatas) {
                            echo $sessionDatas['tbl_name'];
                        }
                    }
                    ?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <a href="<?php echo _WEB_ROOT ?>/login/signIn" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout-variant"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>

    </ul>
    <div class="logo-box">
        <a href="<?php echo _WEB_ROOT; ?>/admin" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="<?php echo _WEB_ROOT; ?>/public/assets/admin/images\logo-dark.png" alt="" height="26">
            </span>
            <span class="logo-sm">
                <img src="<?php echo _WEB_ROOT; ?>/public/assets/admin/images\logo-sm.png" alt="" height="22">
            </span>
        </a>

        <a href="<?php echo _WEB_ROOT; ?>/admin" class="logo text-center logo-light">
            <span class="logo-lg">
                <img src="<?php echo _WEB_ROOT; ?>/public/assets/admin/images\logo-light.png" alt="" height="26">
            </span>
            <span class="logo-sm">
                <img src="<?php echo _WEB_ROOT; ?>/public/assets/admin/images\logo-sm.png" alt="" height="22">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
    </ul>
</div>