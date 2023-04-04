<?php $__env->startSection('content'); ?>


<style>
 ul {
    padding: 0;
    list-style-type: none !important;
    margin-top: 0;
    margin-bottom: 0px;
}
.lms-mr{
    margin-top: 101px;
}.lms-fr{
    float-right;
}
</style>



   <div class="cs-gray-bg lms-mr">
        <div class="container">
            <div class="row cs-row">
                <!-- Side Bar -->
                <div class="col-md-3">
                    <!-- Icon List  -->
                    <ul class="cs-icon-list">

                    <?php if(count($lms_cates)): ?>

                         <?php $__currentLoopData = $lms_cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <li id=<?php echo e($category->slug); ?>><a href="<?php echo e(URL_VIEW_ALL_LMS_CATEGORIES.'/'.$category->slug); ?>"><?php echo e($category->category); ?></a></li>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	                   <?php else: ?>

	                     <h4><?php echo e(getPhrase('no_categories_are_available')); ?></h4> 

	               <?php endif; ?> 
                       
                    </ul>
                    <!-- /Icon List  -->
                </div>
                <!-- Main Section -->
                 <?php if(count($all_series)): ?>
                <div class="col-md-9">


                     <!--search-->
                    <div class="row">
                        <div class="col-sm-12">

                            <?php if($lms_cat_slug): ?>
                                <form action="<?php echo e(URL_VIEW_ALL_LMS_CATEGORIES); ?>/<?php echo e($lms_cat_slug); ?>" method="GET" role="search">
                            <?php else: ?>
                                <form action="<?php echo e(URL_VIEW_ALL_LMS_CATEGORIES); ?>" method="GET" role="search">
                            <?php endif; ?>
                                
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_term"
                                        placeholder="Search LMS.." value="<?php echo e($search_term); ?>" onfocus="this.value=''"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--search-->




                    <!-- Product Filter Bar -->
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="cs-filter-bar clearfix">
                                <li class="active"><a href="#"><?php echo e($title); ?> <?php echo e(getPhrase('series')); ?></a></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Products Grid -->
                    <div class="row">
                
                    <?php $__currentLoopData = $all_series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $series): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
                        <div class="col-md-4 col-sm-6">
                        <!-- Product Single Item -->
                       <div class="cs-product cs-animate">


                          <div class="info-box ribbon_box same_height">
                                <?php if($series->is_paid): ?>
                                <div class="ribbon green"><span> Paid Series  </span></div>
                                <?php else: ?>
                               <div class="ribbon yellow"><span> Free Series </span></div>
                                <?php endif; ?>  


                            <a href="<?php echo e(URL_VIEW_LMS_CONTENTS.$series->slug); ?>">
                                <div class="cs-product-img">
                                    <?php if($series->image): ?>
                                    <img src="<?php echo e(IMAGE_PATH_UPLOAD_LMS_SERIES.$series->image); ?>" alt="exam" class="img-responsive">
                                    <?php else: ?>
                                    <img src="<?php echo e(IMAGE_PATH_EXAMS_DEFAULT); ?>" alt="exam" class="img-responsive">
                                    <?php endif; ?>
                                </div>
                            </a>

                            <ul class="cs-product-content mt-0">
                             <li><a href="<?php echo e(URL_VIEW_LMS_CONTENTS.$series->slug); ?>" class="cs-product-title"><?php echo e(ucfirst($series->title)); ?></a></li>

                                <?php if($series->is_paid): ?>

                                     <li> <a href="#" class="lms-fr"><?php echo e(getPhrase('price')); ?> : <?php echo e(getCurrencyCode()); ?> <?php echo e((int)$series->cost); ?>

                                      </a></li>

                                      <?php endif; ?>

                                        <li>Total Items : <?php echo e($series->total_items); ?></li>

                               <div class="text-center mt-2">
                                 <a href="<?php echo e(URL_VIEW_LMS_CONTENTS.$series->slug); ?>" class=" btn btn-blue btn-sm btn-radius">View </a>
                            </div>
                            </ul>




                          </div>

                            
                        </div>
                        <!-- /Product Single Item -->
                    </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                   
                       
                       
                    </div>
                    <!-- Pagination -->
              
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <ul class="pagination cs-pagination ">
                                <?php echo e($all_series->links()); ?>

                            </ul>
                        </div>
                    </div>
                    <!-- /Pagination -->
                    
                </div>

                <?php else: ?>

                <div class="col-sm-9">
                    <h4 class="text-center search-no">No Series Available..</h4>
                </div>

                 <?php endif; ?>
            </div>
        </div>
    </div>


  

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

<script>
	var my_slug  = "<?php echo e($lms_cat_slug); ?>";

	if(!my_slug){

        $(".cs-icon-list li").first().addClass("active");
    }
    else{

    	$("#"+my_slug).addClass("active");
    }


    

</script>
 
 
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sitelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>