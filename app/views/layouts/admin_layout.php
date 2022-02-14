<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo (!empty($page_title)) ? $page_title : 'admin' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo _WEB_ROOT; ?>/public/assets/admin/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- App css -->
    <link href="<?php echo _WEB_ROOT; ?>/public/assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="<?php echo _WEB_ROOT; ?>/public/assets/admin/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo _WEB_ROOT; ?>/public/assets/admin/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

</head>

<body>
    <div id="wrapper">
        <?php
        $this->render('admin/header');
        $this->render('admin/sidebar');
        $this->render($connent, $sub_connent);
        $this->render('admin/footer');
        ?>
    </div>
    <script src="<?php echo _WEB_ROOT; ?>/public/assets/admin/js/vendor.min.js"></script>
    <script src="<?php echo _WEB_ROOT; ?>/public/assets/admin/libs/morris-js/morris.min.js"></script>
    <script src="<?php echo _WEB_ROOT; ?>/public/assets/admin/libs/raphael/raphael.min.js"></script>
    <script src="<?php echo _WEB_ROOT; ?>/public/assets/admin/js/pages/dashboard.init.js"></script>
    <script src="<?php echo _WEB_ROOT; ?>/public/assets/admin/js/app.min.js"></script>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
</body>

</html>