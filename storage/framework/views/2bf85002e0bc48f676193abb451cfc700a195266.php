<?php $__env->startSection('header_scripts'); ?>
<link rel="stylesheet" type="text/css" href="/css/select2.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
			<div class="container-fluid">
				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo e(PREFIX); ?>"><i class="mdi mdi-home"></i></a> </li>
							<li><a href="<?php echo e(URL_SETTINGS_LIST); ?>"><?php echo e(getPhrase('settings')); ?></a> </li>
							<li class="active"><?php echo e(isset($title) ? $title : ''); ?></li>
						</ol>
					</div>
				</div>
					<?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<!-- /.row -->
				
			 <div class="panel panel-custom col-lg-8 col-lg-offset-2">
					<div class="panel-heading">
						<div class="pull-right messages-buttons">
							<a href="<?php echo e(URL_SETTINGS_LIST); ?>" class="btn  btn-primary button" ><?php echo e(getPhrase('list')); ?></a>
						</div>
					<h1><?php echo e($title); ?>  </h1>
					</div>
					<div class="panel-body" ng-controller="angTopicsController">
					<?php $button_name = getPhrase('create'); ?>
					<?php if($record): ?>
					 <?php $button_name = getPhrase('update'); ?>
						<?php echo e(Form::model($record, 
						array('url' => URL_SETTINGS_EDIT.$record->slug, 
						'method'=>'patch' ,'novalidate'=>'','name'=>'formSettings', 'files'=>'true'))); ?>

					<?php else: ?>
						<?php echo Form::open(array('url' => URL_SETTINGS_ADD, 'method' => 'POST', 
						'novalidate'=>'','name'=>'formSettings ', 'files'=>'true')); ?>

					<?php endif; ?>

					 <?php echo $__env->make('mastersettings.settings.form_elements', 
					 array('button_name'=> $button_name), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
					 
					<?php echo Form::close(); ?>

					 

					</div>
				</div>
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
	
	<?php echo $__env->make('common.validations' , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
	
<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layouts.admin.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>