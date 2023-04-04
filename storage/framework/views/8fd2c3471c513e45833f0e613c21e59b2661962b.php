<?php $__env->startSection('content'); ?>

 <!-- Page Banner -->
    <section class="cs-primary-bg cs-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="cs-page-banner-title"><?php echo e(ucfirst($title)); ?></h2>
                </div>
            </div>
        </div>
    </section>
    <!-- /Page Banner -->

<?php 
   
   $current_theme = getDefaultTheme();
   
  
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-content">
             <?php echo $page->content; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sitelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>