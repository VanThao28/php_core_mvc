<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo _WEB_ROOT;?>/public/assets/clients/img/favicon.png">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/slick.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/style.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/public/assets/clients/css/responsive.css">

    <title><?php echo (!empty($page_title)) ? $page_title : 'trang chu' ?></title>
</head>

<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?php echo _WEB_ROOT;?>/public/assets/clients/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    
    <?php
        $this->render('blog/header');
        $this->render($content, $sub_content);
        $this->render('blog/footer');
    ?>
    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/popper.min.js"></script>
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/owl.carousel.min.js"></script>
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/wow.min.js"></script>
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/animated.headline.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/jquery.sticky.js"></script>
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/contact.js"></script>
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/jquery.form.js"></script>
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/jquery.validate.min.js"></script>
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/mail-script.js"></script>
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/plugins.js"></script>
    <script src="<?php echo _WEB_ROOT;?>/public/assets/clients/js/main.js"></script>
</body>

</html>