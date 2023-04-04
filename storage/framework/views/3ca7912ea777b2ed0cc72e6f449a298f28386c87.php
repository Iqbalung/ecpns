 

 
<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
			<div class="container-fluid">
				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo e(PREFIX); ?>"><i class="mdi mdi-home"></i></a> </li>
							<?php if(checkRole(getUserGrade(2))): ?>
							<li><a href="<?php echo e(URL_USERS); ?>"><?php echo e(getPhrase('users')); ?></a> </li>
							<li class="active"><?php echo e(isset($title) ? $title : ''); ?></li>
							<?php else: ?>
							<li class="active"><?php echo e($title); ?></li>
							<?php endif; ?>
						</ol>
					</div>
				</div>
					<?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<!-- /.row -->

				<?php 
				$user_options = null;
				if($record->settings)
					$user_options = json_decode($record->settings)->user_preferences;
				?>
	<div class="panel panel-custom col-lg-12" >
					<div class="panel-heading">
					<?php if(checkRole(getUserGrade(2))): ?> 
						<div class="pull-right messages-buttons">
							 
							<a href="<?php echo e(URL_USERS); ?>" class="btn  btn-primary button" ><?php echo e(getPhrase('list')); ?></a>
							 
						</div>
						<?php endif; ?>
					<h1><?php echo e($title); ?>  </h1>
					</div>


					<div class="panel-body">
					 
					 <?php $button_name = getPhrase('update'); ?>
						<?php echo e(Form::model($record, 
						array('url' => URL_USERS_SETTINGS.$record->slug, 
						'method'=>'patch','novalidate'=>'','name'=>'formUsers ', 'files'=>'true' ))); ?>

					
					<h1><?php echo e(getPhrase('quiz_and_exam_series')); ?></h1>

					<div class="row">
					<?php $__currentLoopData = $quiz_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 				<?php 

	 					$checked = '';
	 					if($user_options) {
	 						if(count($user_options->quiz_categories))
	 						{
	 							if(in_array($category->id,$user_options->quiz_categories))
	 								$checked='checked';
	 						}
	 					}
 					?>
					<div class="col-md-3">
						<label class="checkbox-inline" >
							<input type="checkbox" data-toggle="toggle" name="quiz_categories[<?php echo e($category->id); ?>]" data-onstyle="success" data-offstyle="default" <?php echo e($checked); ?>> <?php echo e($category->category); ?>

						</label>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				 
				 </div>

				 	<h1>LMS <?php echo e(getPhrase('categories')); ?></h1>

					<div class="row">
					<?php $__currentLoopData = $lms_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 					<?php 

	 					$checked = '';
	 					if($user_options) {
	 						if(count($user_options->lms_categories))
	 						{
	 							if(in_array($category->id,$user_options->lms_categories))
	 								$checked='checked';
	 						}
	 					}
 					?>
					<div class="col-md-3">
						<label class="checkbox-inline">
							<input 	type="checkbox" 
									data-toggle="toggle" 
									data-onstyle="success" 
									data-offstyle="default"
									name="lms_categories[<?php echo e($category->id); ?>]" 
									<?php echo e($checked); ?>

									> <?php echo e($category->category); ?>

						</label>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				 
				 </div>

				 <div class="buttons text-center">
							<button class="btn btn-lg btn-success button"
							><?php echo e(getPhrase('update')); ?></button>
						</div>
				 
					<?php echo Form::close(); ?>

					</div>
				</div>
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
 <?php echo $__env->make('common.validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
 <script src="<?php echo e(JS); ?>bootstrap-toggle.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>