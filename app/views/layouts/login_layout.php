<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo _WEB_ROOT; ?>/public/assets/admin/images/favicon.ico">
    <!-- App css -->
    <link href="<?php echo _WEB_ROOT; ?>/public/assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="<?php echo _WEB_ROOT; ?>/public/assets/admin/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo _WEB_ROOT; ?>/public/assets/admin/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

</head>

<body>
    <?php
        $this->render($connent, $sub_connent);
    ?>
    <!-- Vendor js -->
    <script src="<?php echo _WEB_ROOT; ?>/public/assets/admin/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?php echo _WEB_ROOT; ?>/public/assets/admin/js/app.min.js"></script>

</body>

</html>