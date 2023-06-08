<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Library Management</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family =Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">


    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/bootstrap.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/font-awesome.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/elegant-icons.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/nice-select.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/jquery-ui.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/owl.carousel.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/slicknav.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/style.css')); ?>" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
     <?php echo $__env->make('student.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php echo $__env->yieldContent('content'); ?>
     <?php echo $__env->make('student.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Js Plugins -->
    <script src="<?php echo e(asset('front_end/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/jquery.nice-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/jquery.slicknav.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/mixitup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/main.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH D:\installed Xampp\htdocs\my_projects\Library ManagmentV3\Library Managment\resources\views/student/layout/app.blade.php ENDPATH**/ ?>