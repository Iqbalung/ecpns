<?php $__env->startSection('content'); ?>
    <style>
        .cffbg{
            margin-top: 101px;
        }
        .cfffr{
            float:right;
        }
    </style>
   <div class="cs-gray-bg cffbg" >
        <div class="container">
            <div class="row cs-row">
                <!-- Side Bar -->
                <div class="col-md-3">
                    <!-- Icon List  -->
                    <ul class="cs-icon-list">

                    <?php if(count($categories)): ?>

                         <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <li id=<?php echo e($category->slug); ?>><a href="<?php echo e(URL_VIEW_ALL_EXAM_CATEGORIES.'/'.$category->slug); ?>"><?php echo e($category->category); ?></a></li>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	                   <?php else: ?>

	                     <h4>No Exams Are Available</h4> 

	               <?php endif; ?> 
                       
                    </ul>
                    <!-- /Icon List  -->
                </div>




                <!-- Main Section -->
            <?php if(count($quizzes)): ?>

                <div class="col-md-9">

                    <!--search-->
                    <div class="row">
                        <div class="col-sm-12">
                           <form action="<?php echo e(URL_VIEW_ALL_EXAM_CATEGORIES); ?>/<?php echo e($quiz_slug); ?>" method="GET" role="search">
                                
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_term"
                                        placeholder="Search Exams.." value="<?php echo e($search_term); ?>" onfocus="this.value=''"> <span class="input-group-btn">
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
                                <li class="active"><a href="#"><?php echo e($title); ?> <?php echo e(getPhrase('exams')); ?></a></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>



                    <!-- Products Grid -->
                    <div class="row">
                  
                    <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	

                        <div class="col-md-4 col-sm-6">
                        <!-- Product Single Item -->
                        <div class="cs-product cs-animate">


                            <div class="info-box ribbon_box same_height">
                                <?php if($quiz->is_paid): ?>
                                <div class="ribbon green"><span> Premium Exam  </span></div>
                                <?php else: ?>
                               <div class="ribbon yellow"><span> Free Exam </span></div>
                                <?php endif; ?>  


                            <a href="">
                                <div class="cs-product-img">
                                    <?php if($quiz->image): ?>
                                    <img src="<?php echo e(IMAGE_PATH_EXAMS.$quiz->image); ?>" alt="exam" class="img-responsive">
                                    <?php else: ?>
                                    <img src="<?php echo e(IMAGE_PATH_EXAMS_DEFAULT); ?>" alt="exam" class="img-responsive">
                                    <?php endif; ?>
                                </div>
                            </a>




                            <div class="cs-product-content">
                             <a href="" class="cs-product-title text-center"><?php echo e(ucfirst($quiz->title)); ?></a>





                              <ul class="cs-card-actions mt-0">
                                    <li>
                                        <a href="#">Marks : <?php echo e((int)$quiz->total_marks); ?></a>
                                    </li>

                                    <li>  </li>

                                   
                                    <li class="cs-right">
                                        <a href="#"><?php echo e($quiz->dueration); ?> mins</a>

                                    </li>


                                </ul>


                                <div class="text-center mt-2">

                                    <?php if( $quiz->is_paid == 1): ?>
                                        
                                         <a href="<?php echo e(URL_START_EXAM_AFTER_LOGIN.$quiz->id); ?>" class="btn btn-blue btn-sm btn-radius"><?php echo e(getPhrase('start_exam')); ?></a>
                                          <?php if($quiz->is_paid): ?>

                                      <a href="#" class="cfffr"><?php echo e(getPhrase('price')); ?> : <?php echo e(getCurrencyCode()); ?> <?php echo e((int)$quiz->cost); ?>

                                      </a>

                                      <?php endif; ?>

                                      <?php else: ?>
                                       
                                       <a href="<?php echo e(URL_FRONTEND_START_EXAM.$quiz->slug); ?>" class="btn btn-blue btn-sm btn-radius"><?php echo e(getPhrase('start_exam')); ?></a>

                                     <?php endif; ?>
                                </div>


                            </div>


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
                                <?php echo e($quizzes->links()); ?>

                            </ul>
                        </div>
                    </div>
                    <!-- /Pagination -->
                </div>
                <?php else: ?>

                <div class="col-sm-9">
                    <h4 class="text-center search-no">No Quizzes Available..</h4>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<script>
	var my_slug  = "<?php echo e($quiz_slug); ?>";

	if(!my_slug){

        $(".cs-icon-list li").first().addClass("active");
    }
    else{

    	$("#"+my_slug).addClass("active");
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sitelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>