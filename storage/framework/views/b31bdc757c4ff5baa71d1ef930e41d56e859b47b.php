<?php $__env->startSection('content'); ?>



<link href="<?php echo e(CSS); ?>animate.css" rel="dns-prefetch"/>
<style>
  .im-hei{
    max-height:200px;
  }
</style>


<div id="page-wrapper" class="examform" ng-controller="angExamScript" ng-init="initAngData(<?php echo e(json_encode($bookmarks)); ?>)">

    <div class="container-fluid">



        <div class="row">


        </div>



        <!-- /.row -->

        <!-- /.row -->

        <?php echo Form::open(array('url' => URL_FRONTEND_FINISH_EXAM.$quiz->slug, 'method' => 'POST', 'id'=>'onlineexamform')); ?>


        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-custom">

                    <div class="panel-heading">

                        <div class="pull-right exam-duration">

            <?php echo $__env->make('student.exams.languages',['quiz'=>$quiz], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>




                        </div>



                        <h1>

                            <span class="text-uppercase">

                                <?php echo e($title); ?>


                            </span>

                            : <?php echo e(getPhrase('question')); ?>


                            <span id="question_number">

                                1

                            </span>

                            of <?php echo e(count($questions)); ?>


                        </h1>



                    </div>

                    <div class="panel-body question-ans-box">

                        

                        <div id="questions_list">



                        <?php



                        $questionHasVideo = FALSE; ?>

                            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                            <?php if(!$questionHasVideo)

                            {

                                if($question->question_type=='video')

                                $questionHasVideo = TRUE;

                            } ?>

                            <?php

                                    $image_path = PREFIX.(new App\ImageSettings())->

                                    getExamImagePath();



                                    ?>




                            <div
                            class="question_div subject_<?php echo e($question->subject_id); ?>"
                            name="question[<?php echo e($question->id); ?>]"
                            id="<?php echo e($question->id); ?>"
                            style="display:none;" value="0">



                            <input type="hidden" name="time_spent[<?php echo e($question->id); ?>]" id="time_spent_<?php echo e($question->id); ?>" value="0">


                                <div class="questions">

                                   <span class="language_l1"> <?php echo $question->question; ?>   </span>
                                   <?php if($question->question_l2): ?>
                                     <?php if($question->question_type == 'radio' || $question->question_type == 'checkbox' || $question->question_type == 'blanks' || $question->question_type == 'match'): ?>
                                   <span class="language_l2" style="display: none;"> <?php echo $question->question_l2; ?>   </span>
                                   <?php else: ?>
                                   <span class="language_l2" style="display: none;"> <?php echo $question->question; ?>   </span>
                                     <?php endif; ?>
                                   <?php else: ?>
                                   <span class="language_l2" style="display: none;"> <?php echo $question->question; ?>   </span>
                                   <?php endif; ?>

                                    <div class="row">
  <div class="col-md-8 text-center">
  <?php if($question->question_type!='audio' && $question->question_type !='video'): ?>
  <?php if($question->question_file): ?>
  <img class="image im-hei" src="<?php echo e($image_path.$question->question_file); ?>">
  <?php endif; ?>
  <?php endif; ?>
  </div>
  <div class="col-md-4">
   <span class="pull-right"> <?php echo e($question->marks); ?> Mark(s)</span>
                         </div>
                      </div>



                                    <div class="option-hints pull-right default" data-placement="left" data-toggle="tooltip" ng-show="hints" title="<?php echo e($question->hint); ?>">

                                        <i class="mdi mdi-help-circle">

                                        </i>

                                    </div>

                                </div>

                                <hr>

                                    <?php

                                    $image_path = PREFIX.(new App\ImageSettings())->

                                    getExamImagePath();



                                    ?>



								<?php echo $__env->make('student.exams.question_'.$question->question_type, array('question', $question, 'image_path' => $image_path ), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                                </hr>

                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                        



                        <hr>

                            <div class="row">

                                <div class="col-md-12">

                                    <button class="btn btn-lg btn-success button prev" type="button">

                                        <i class="mdi mdi-chevron-left ">

                                        </i>

                                        <?php echo e(getPhrase('previous')); ?>


                                    </button>

                                    <button class="btn btn-lg btn-dark button next" id="markbtn" type="button">

                                        <?php echo e(getPhrase('mark_for_review')); ?> & <?php echo e(getPhrase('next')); ?>


                                    </button>

                                    <button class="btn btn-lg btn-success button next" type="button">

                                        <?php echo e(getPhrase('next')); ?>


                                        <i class="mdi mdi-chevron-right">

                                        </i>

                                    </button>

                                    <button class="btn btn-lg btn-dark button clear-answer" type="button">

                                        <?php echo e(getphrase('clear_answer')); ?>


                                    </button>

                                    <button class="btn btn-lg btn-danger button   finish" type="submit">

                                        <?php echo e(getPhrase('finish')); ?>


                                    </button>

                                </div>

                            </div>

                        </hr>

                    </div>

                </div>

            </div>

            <?php echo Form::close(); ?>


        </div>

    </div>

</div>

<!-- /#page-wrapper -->

<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer_scripts'); ?>



<?php echo $__env->make('front-exams.scripts.js-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('common.editor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<!--JS Control-->

<?php if($questionHasVideo): ?>

<?php echo $__env->make('common.video-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php endif; ?>



<script type="text/javascript">

/**

 * intilizetimer(hours, minutes, seconds)

 * This method will set the values to defaults

 */


$(document).ready(function () {
  "use strict";
     intilizetimer(<?php echo e($time_hours); ?>,<?php echo e($time_minutes); ?>,1);

    // intilizetimer(5,20,0);

});


function languageChanged(language_value)
    {
      if(language_value=='language_l2')
      {
        $('.language_l1').hide();
        $('.language_l2').show();
      }
      else {
        $('.language_l2').hide();
        $('.language_l1').show();
      }

    }




</script>

<?php $__env->stopSection(); ?>








<?php echo $__env->make('front-exams.examlayout-front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>