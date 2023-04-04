<?php $__env->startSection('home_css_scripts'); ?>
<link rel="stylesheet" href="<?php echo e(themes('site/css/blogs/style.css')); ?>">
<?php $__env->stopSection(); ?>

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



<section class="wrapper">
    <div class="container-fostrap">
        
        <?php if($blogs): ?>
        <div class="content">
            <div class="container">

                <?php $i=0;?>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php $i++;
                
                ?>


                <?php if($i/9==0): ?>
                <div class="row">
                <?php endif; ?>

                <div class="col-xs-12 col-sm-4">
                    <div class="card">
                        <a class="img-card" href="<?php echo e(URL_BLOG_VIEW); ?><?php echo e($blog->slug); ?>">
                        <img src="<?php echo e(getBlogImgPath($blog->image)); ?>" alt="<?php echo e($blog->title); ?>" class="img-responsive"/>
                      </a>
                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="<?php echo e(URL_BLOG_VIEW); ?><?php echo e($blog->slug); ?>">
                                 <?php echo e($blog->title); ?>

                              </a>
                            </h4>
                            <p class="">
                                <?php echo \Illuminate\Support\Str::words($blog->content, 10,'....'); ?>

                            </p>
                        </div>
                        <div class="card-read-more">
                            <a href="<?php echo e(URL_BLOG_VIEW); ?><?php echo e($blog->slug); ?>" class="btn btn-link btn-block">
                                <?php echo e(getPhrase('read_more')); ?>

                            </a>
                        </div>
                    </div>
                </div>

                <?php if($i/9==0): ?>
                </div>
                <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



              

                <div class="row">
                    <div class="col-xs-12">
                        <?php echo e($blogs->links()); ?>

                    </div>
                </div>


            </div>
        </div>


        <?php else: ?>
        <h2 class="text-center">No FAQs Available...</h2>
        <?php endif; ?>



    </div>
</section>



<?php $__env->stopSection(); ?>






<?php echo $__env->make('layouts.sitelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>