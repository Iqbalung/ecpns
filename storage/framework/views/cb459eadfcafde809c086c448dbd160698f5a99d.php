 					

 				 

					 <fieldset class="form-group">

						

						<?php echo e(Form::label('title', getphrase('title'))); ?>


						<span class="text-red">*</span>

						<?php echo e(Form::text('title', $value = null , $attributes = array('class'=>'form-control', 'placeholder' => getPhrase('title'),

							'ng-model'=>'title',

							'ng-pattern' => getRegexPattern("name"),

							'required'=> 'true', 

							'ng-class'=>'{"has-error": formSettings.title.$touched && formSettings.title.$invalid}',

						 ))); ?>


						  <div class="validation-error" ng-messages="formSettings.title.$error" >

	    					<?php echo getValidationMessage(); ?>


	    					<?php echo getValidationMessage('pattern'); ?>


	    					</div>

					</fieldset>



 				 

					 <fieldset class="form-group">

						

						<?php echo e(Form::label('key', getphrase('key'))); ?>


						<span class="text-red">*</span>

						<?php echo e(Form::text('key', $value = null , $attributes = array('class'=>'form-control', 'placeholder' =>  getPhrase('Introduction'),

							'ng-model'=>'key',

							'ng-pattern' => getRegexPattern("name"),

							'required'=> 'true', 

							'ng-class'=>'{"has-error": formSettings.key.$touched && formSettings.key.$invalid}',

						 ))); ?>


						  <div class="validation-error" ng-messages="formSettings.key.$error" >

	    					<?php echo getValidationMessage(); ?>


	    					<?php echo getValidationMessage('pattern'); ?>


	    					</div>

					</fieldset>



					<fieldset class='form-group'>

						<?php echo e(Form::label('image', getphrase('image'))); ?>


						<div class="form-group row">

							<div class="col-md-6">

						

					<?php echo Form::file('image', null, array('class'=>'form-control')); ?>


							</div>

							<?php if(isset($record) && $record) { 

								  if($record->image!='') {

								?>

							<div class="col-md-6">

								<img src="<?php echo e(IMAGE_PATH_SETTINGS.$record->image); ?>" height="100" width="100" />



							</div>

							<?php } } ?>

						</div>

					</fieldset>



					<fieldset class="form-group">

						<?php echo e(Form::label('description', getphrase('description'))); ?>


						<?php echo e(Form::textarea('description', $value = null , $attributes = array('class'=>'form-control', 'rows'=>'5', 'placeholder' => getphrase('description_of_the_topic')))); ?>


					</fieldset>

					

					 

 					

 				 

					</div>	



			 



					</fieldset>

						<div class="buttons text-center">

							<button class="btn btn-lg btn-success button" ng-disabled='!formTopics.$valid'

							><?php echo e($button_name); ?></button>

						</div>

		 