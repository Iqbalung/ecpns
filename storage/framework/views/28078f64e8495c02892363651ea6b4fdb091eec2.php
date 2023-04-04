<!DOCTYPE html>

<html lang="en" dir="<?php echo e((App\Language::isDefaultLanuageRtl()) ? 'rtl' : 'ltr'); ?>">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php echo e(getSetting('meta_description', 'seo_settings')); ?>">

    <meta name="keywords" content="<?php echo e(getSetting('meta_keywords', 'seo_settings')); ?>">

        <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>">


    <link rel="icon" href="<?php echo e(IMAGE_PATH_SETTINGS.getSetting('site_favicon', 'site_settings')); ?>" type="image/x-icon" />

    <title><?php echo $__env->yieldContent('title'); ?> <?php echo e(isset($title) ? $title : getSetting('site_title','site_settings')); ?></title>

    <!-- Bootstrap Core CSS -->

 <?php echo $__env->yieldContent('header_scripts'); ?>

   

     <link href="<?php echo e(themes('site/css/main.css')); ?>" rel="stylesheet">
     <link href="<?php echo e(themes('css/notify.css')); ?>" rel="stylesheet">
     <link href="<?php echo e(themes('css/angular-validation.css')); ?>" rel="stylesheet">

 <!-- Bootstrap Core CSS -->
   
    <!--FontAwesome-->

    
    <link href="<?php echo e(CSS); ?>sweetalert.css" rel="stylesheet" type="text/css">

     <link href="<?php echo e(themes('css/front-exam.css')); ?>" rel="stylesheet">


     <link href="<?php echo e(themes('css/plugins/morris.css')); ?>" rel="stylesheet">



    <link href="<?php echo e(CSS); ?>materialdesignicons.css" rel="stylesheet" type="text/css">


  

    

    
</head>





<body ng-app="academia">

     <?php echo $__env->make('site.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    

 <?php echo $__env->yieldContent('custom_div'); ?>

 <?php 

 $class = '';

 if(!isset($right_bar))

    $class = 'no-right-sidebar';

$block_class = '';

if(isset($block_navigation))

    $block_class = 'non-clickable';

 ?>

    <div id="wrapper" class="<?php echo e($class); ?> mt-150 " >

        <!-- Navigation -->

        <nav role="navigation">
            
        


        </nav>

         

        
        <?php if(isset($right_bar)): ?>

            

        <aside class="right-sidebar mt-50" id="rightSidebar">

            

            <?php $right_bar_class_value = ''; 

            if(isset($right_bar_class))

                $right_bar_class_value = $right_bar_class;

            ?>

            <div class="panel panel-right-sidebar <?php echo e($right_bar_class_value); ?>">

            <?php $data = '';

            if(isset($right_bar_data))

                $data = $right_bar_data;

            ?>

                <?php echo $__env->make($right_bar_path, array('data' => $data), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </div>

        </aside>

        

    <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>

    </div>

    <?php echo $__env->make('site.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

     <script src="<?php echo e(JS); ?>jquery.min.js"></script>
      <script src="<?php echo e(themes('site/js/bootstrap.min.js')); ?>"></script>
      <script src="<?php echo e(themes('site/js/slider/slick.min.js')); ?>"></script>
      <script src="<?php echo e(themes('site/js/bootstrap.offcanvas.js')); ?>"></script>
      <script src="<?php echo e(themes('site/js/jRate.min.js')); ?>"></script>
      <script src="<?php echo e(themes('site/js/wow.min.js')); ?>"></script>
      <script src="<?php echo e(themes('site/js/main.js')); ?>"></script>
      <script src="<?php echo e(themes('js/notify.js')); ?>"></script>

    

    <script src="<?php echo e(JS); ?>sweetalert-dev.js"></script>
    <script src="<?php echo e(JS); ?>mousetrap.js"></script>

     <script src="<?php echo e(JS); ?>landing-js/all.js"></script>
    

    
    
    <script>
            var csrfToken = $('[name="csrf_token"]').attr('content');

            setInterval(refreshToken, 600000); // 1 hour 

            function refreshToken(){
                $.get('refresh-csrf').done(function(data){
                    csrfToken = data; // the new token
                });
            }

            setInterval(refreshToken, 600000); // 1 hour 

        </script>

    

    <?php echo $__env->make('common.alertify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    

    <?php echo $__env->yieldContent('footer_scripts'); ?>

    <?php echo $__env->make('errors.formMessages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('custom_div_end'); ?>
    <?php echo getSetting('google_analytics', 'seo_settings'); ?>

</body>



</html>