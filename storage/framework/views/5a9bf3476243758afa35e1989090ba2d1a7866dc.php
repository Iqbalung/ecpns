<?php $answers = json_decode($question->answers); 
$leftdata     =  $answers->left;
$rightdata    =  $answers->right;

$leftl2  = null;
$rightl2  = null;
if(isset($leftdata->optionsl2) && isset($rightdata->optionsl2)){
$leftl2       =  $leftdata->optionsl2;
$rightl2      =  $rightdata->optionsl2;
}


?>
<div class="match-questions row">
    <div class="col-md-6">
        <h4><span class="language_l1"><?php echo e($leftdata->title); ?></span></h4>
        <?php if(isset($leftdata->titlel2)): ?>
        <h4><span class="language_l2" style="display: none;"><?php echo e($leftdata->titlel2); ?></span></h4>
        <?php else: ?>
        <h4><span class="language_l2" style="display: none;"><?php echo e($leftdata->title); ?></span></h4>
        <?php endif; ?>
    </div>
    <div class="col-md-6">
        <h4><span class="language_l1"><?php echo e($rightdata->title); ?></span></h4>
         <?php if(isset($rightdata->titlel2)): ?>
        <h4><span class="language_l2" style="display: none;"><?php echo e($rightdata->titlel2); ?></span></h4>
        <?php else: ?>
        <h4><span class="language_l2" style="display: none;"><?php echo e($rightdata->title); ?></span></h4>

        <?php endif; ?>
    </div>

    <div class="col-md-6">
        
        <ul class="option option-left">
        <?php $i=1;?>
        <?php $__currentLoopData = $leftdata->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <span class="numbers-count">
                   <?php echo e($i++); ?>

                </span>
                 <span class="language_l1"><?php echo $value; ?> </span>
                 <?php if($leftl2 && isset($leftl2[$key] )): ?>
                 <span class="language_l2" style="display: none;"><?php echo $leftl2[$key]; ?> </span>
                 <?php else: ?>
                 <span class="language_l2" style="display: none;"><?php echo $value; ?> </span>
                 <?php endif; ?>
            </li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>


       

    </div>
    <div class="col-md-6">
      
        
        <ul class="option option-right">
        <?php $i=1;?>
        <?php $__currentLoopData = $rightdata->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <fieldset class="form-group">
                    <input class="form-control pull-right" id="ans" max="2" maxlength="2" min="1" placeholder="2" name="<?php echo e($question->id); ?>[]" type="text">
                        <p class="language_l1">
                            <?php echo $value; ?>

                        </p>
                        <?php if($rightl2 && isset($rightl2[$key])): ?>
                        <p class="language_l2" style="display: none;">
                          <?php echo $rightl2[$key]; ?>

                        </p>
                        <?php else: ?>
                         <p class="language_l2" style="display: none;">
                          <?php echo $value; ?>

                        </p>
                        <?php endif; ?>
                    </input>
                </fieldset>

            </li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
        </ul>

      
    </div>
</div>