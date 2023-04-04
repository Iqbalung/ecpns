<?php $__env->startSection('content'); ?>

<style>
.cf-sty{
	margin-top: 180px;
}

.cf-color{
	color: red; 
}

.cf-mtp{
	margin-top: 15px;
}
.back-image{
  background-image: url(<?php echo e(IMAGES); ?>login-bg.png);background-repeat: no-repeat;background-color: #f8fafb;
}
</style>

  <!-- Login Section -->
  <div  class="back-image">
    <div class="container">
         <div class="row cs-row cf-sty">
             
            <div class="col-md12">
                <div class="cs-box-resize-sign login-box">
                   <h4 class="text-center login-head"><?php echo e(getPhrase('create_account')); ?></h4>
                    <!-- Form Login/Register -->
                    	<?php echo Form::open(array('url' => URL_USERS_REGISTER, 'method' => 'POST', 'name'=>'formLanguage ', 'novalidate'=>'', 'class'=>"loginform", 'name'=>"registrationForm")); ?>


                        <?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

                        <div class="form-group">

                        	<label for="name"><?php echo e(getPhrase('name')); ?></label><span class="cf-color">*</span>

						   <?php echo e(Form::text('name', $value = null , $attributes = array('class'=>'form-control',

									'placeholder' => getPhrase("name"),

									'ng-model'=>'name',

									'ng-pattern' => getRegexPattern('name'),

									'required'=> 'true', 

									'ng-class'=>'{"has-error": registrationForm.name.$touched && registrationForm.name.$invalid}',

									'ng-minlength' => '4',

								))); ?>


									<div class="validation-error" ng-messages="registrationForm.name.$error" >

										<?php echo getValidationMessage(); ?>


										<?php echo getValidationMessage('minlength'); ?>


										<?php echo getValidationMessage('pattern'); ?>


									</div>

                        </div>

                        <div class="form-group">

                          <label for="username"><?php echo e(getPhrase('username')); ?></label><span class="cf-color">*</span>

                         <?php echo e(Form::text('username', $value = null , $attributes = array('class'=>'form-control',

								'placeholder' => getPhrase("username"),

								'ng-model'=>'username',

								'required'=> 'true', 

								'ng-class'=>'{"has-error": registrationForm.username.$touched && registrationForm.username.$invalid}',

								'ng-minlength' => '4',

							))); ?>


						<div class="validation-error" ng-messages="registrationForm.username.$error" >

							<?php echo getValidationMessage(); ?>


							<?php echo getValidationMessage('minlength'); ?>


							<?php echo getValidationMessage('pattern'); ?>


						</div>

                        </div>


                         <div class="form-group">
                        	
                          <label for="email"><?php echo e(getPhrase('email')); ?></label><span class="cf-color">*</span>

                        <?php echo e(Form::email('email', $value = null , $attributes = array('class'=>'form-control',

									'placeholder' => getPhrase("email"),

									'ng-model'=>'email',

									'required'=> 'true', 

									'ng-class'=>'{"has-error": registrationForm.email.$touched && registrationForm.email.$invalid}',

								))); ?>


							<div class="validation-error" ng-messages="registrationForm.email.$error" >

								<?php echo getValidationMessage(); ?>


								<?php echo getValidationMessage('email'); ?>


							</div>


                        </div>


                          <div class="form-group">
                        	
                          <label for="password"><?php echo e(getPhrase('password')); ?></label><span class="cf-color">*</span>

					    <?php echo e(Form::password('password', $attributes = array('class'=>'form-control instruction-call',

								'placeholder' => getPhrase("password"),

								'ng-model'=>'registration.password',

								'required'=> 'true', 

								'ng-class'=>'{"has-error": registrationForm.password.$touched && registrationForm.password.$invalid}',

								'ng-minlength' => 5

							))); ?>


						<div class="validation-error" ng-messages="registrationForm.password.$error" >

							<?php echo getValidationMessage(); ?>


							<?php echo getValidationMessage('password'); ?>


						</div>



                        </div>


                          <div class="form-group">
                        	
                       <label for="password_confirmation"><?php echo e(getPhrase('password_confirmation')); ?></label><span class="cf-color">*</span>

                       <?php echo e(Form::password('password_confirmation', $attributes = array('class'=>'form-control instruction-call',

								'placeholder' => getPhrase("password_confirmation"),

								'ng-model'=>'registration.password_confirmation',

								'required'=> 'true', 

								'ng-class'=>'{"has-error": registrationForm.password_confirmation.$touched && registrationForm.password_confirmation.$invalid}',

								'ng-minlength' => 5,

								'compare-to' =>"registration.password"

							))); ?>


						<div class="validation-error" ng-messages="registrationForm.password_confirmation.$error" >

							<?php echo getValidationMessage(); ?>


							<?php echo getValidationMessage('minlength'); ?>


							<?php echo getValidationMessage('confirmPassword'); ?>


						</div>


                        </div>

                        <?php $parent_module = getSetting('parent', 'module'); ?>

							<?php if(!$parent_module): ?>

						<input type="hidden" name="is_student" value="0">

							<?php else: ?>

                          <div class="form-group">


                           
                             <div class="col-md-12">


							</div>

							<div class="col-md-12">

							<ul class="login-links mt-2">
                              	 <li>
                              	 	
							<?php echo e(Form::radio('is_student', 0, true, array('id'=>'free'))); ?>


								

								<label for="free"> <span class="  radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('i_am_a_student')); ?></label> 
                              	 </li>
                              	 <li>
                              	 	<?php echo e(Form::radio('is_student', 1, false, array('id'=>'paid' ))); ?>


								<label for="paid"> 

								<span class="  radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('i_am_a_parent')); ?> </label>
                              	 </li>
                            </ul>

							

							</div>

                          </div>

                          <?php endif; ?>


                         <div class="form-group">

                             <?php if($rechaptcha_status == 'yes'): ?>


		               

				          <div class="col-md-12 form-group<?php echo e($errors->has('g-recaptcha-response') ? ' has-error' : ''); ?> cf-mtp" >
		                           

		                           
		                                <?php echo app('captcha')->display(); ?>


		                          

                               </div>


                             <?php endif; ?>


                        </div>

                      	<div class="text-center mt-2">
                      		<button type="submit" class="btn button btn-primary btn-lg" ng-disabled='!registrationForm.$valid'><?php echo e(getPhrase('register_now')); ?></button>
                      	</div>

                    </form>
                    <!-- Form Login/Register -->
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Login Section -->

<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer_scripts'); ?>

	<?php echo $__env->make('common.validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		     	
		     		<script src='https://www.google.com/recaptcha/api.js'></script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sitelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>