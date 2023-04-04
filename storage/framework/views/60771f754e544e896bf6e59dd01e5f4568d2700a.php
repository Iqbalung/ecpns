<div class="row">
    <div class="col-md-12">
        <ul class="filling-blank">

            <?php for($i=1; $i <= $question->total_correct_answers; $i++): ?>
            <li>
                <span class="numbers-count">
                    <?php echo e($i); ?>

                </span>
                <fieldset class="form-group">
                    <input class="form-control pull-right" placeholder="Blank <?php echo e($i); ?>" type="text" name="<?php echo e($question->id); ?>[]">
                    </input>
                </fieldset>
            </li>
            <?php endfor; ?>
             
        </ul>
        
    </div>
 
</div>