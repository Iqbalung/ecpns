<?php $__env->startSection('content'); ?>

<style>
	.install-dn{
		display: none;
	}
</style>

<div class="login-content installation-page" >

		<div class="logo text-center"><img src="<?php echo e(IMAGES); ?>logo.png" alt=""></div>
		<?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo Form::open(array('url' => URL_UPDATE_INSTALLATATION_DETAILS, 'method' => 'GET', 'name'=>'registrationForm ', 'novalidate'=>'', 'class'=>"loginform", 'id'=>"install_form")); ?>


<div class="row" >
<?php $isInstallable = 1;
?>
	 <div class="col-md-12">
	 <table class="table">
  <thead>
    <tr>

      <th>Requirement</th>
      <th>Status</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">PHP Version >= 7.0.0 </th>

      <td>
	      	<?php if(version_compare(phpversion(), '7.0.0', '>')): ?>
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	<?php else: ?>
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	<?php endif; ?>
      </td>

    </tr>

    <tr>
      <th scope="row">.env Writable</th>
      <td>
	      	<?php if( is_writable( base_path() . '/.env' ) ): ?>
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	<?php else: ?>
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	<?php endif; ?>
      </td>
    </tr>

    <tr>
      <th scope="row">Storage folder Writable</th>

      <td>
	      	<?php if( is_writable( base_path() . '/storage' ) ): ?>
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	<?php else: ?>
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	<?php endif; ?>
      </td>
    </tr>

    <tr>
      <th scope="row">max_execution_time</th>

      <td>
	      	<?php if(ini_get('max_execution_time')): ?>
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	<?php else: ?>
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	<?php endif; ?>
      </td>
    </tr>

    <tr>
      <th scope="row">zip</th>

      <td>
	      	<?php if(extension_loaded('zip')): ?>
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	<?php else: ?>
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	<?php endif; ?>
      </td>
    </tr>
    <tr>
      <th scope="row">fileinfo</th>

      <td>
	      	<?php if(extension_loaded('fileinfo')): ?>
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	<?php else: ?>
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	<?php endif; ?>
      </td>
    </tr>
    <tr>
      <th scope="row">openssl</th>

      <td>
	      	<?php if(extension_loaded('openssl')): ?>
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	<?php else: ?>
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	<?php endif; ?>
      </td>
    </tr>
    <tr>
      <th scope="row">mbstring</th>

      <td>
	      	<?php if(extension_loaded('mbstring')): ?>
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	<?php else: ?>
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	<?php endif; ?>
      </td>
    </tr>
    <tr>
      <th scope="row">tokenizer</th>

      <td>
	      	<?php if(extension_loaded('tokenizer')): ?>
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	<?php else: ?>
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	<?php endif; ?>
      </td>
    </tr>
    <tr>
      <th scope="row">allow_url_fopen</th>

      <td>
	      	<?php if( ini_get('allow_url_fopen') ): ?>
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	<?php else: ?>
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	<?php endif; ?>
      </td>
    </tr>

  </tbody>
</table>

	 </div>

</div>







			<?php if($isInstallable): ?>

			<div class="text-center buttons">

				<button type="button"  class="btn button btn-success btn-lg"

				ng-disabled='!registrationForm.$valid' onclick="submitForm();" >Next</button>

			</div>
			<?php else: ?>
			<p class="text-danger">Note: Please install/enable the above requirements to continue... </p>
			<?php endif; ?>

		<?php echo Form::close(); ?>



		 <div class="loadingpage text-center install-dn"  id="after_display">

		 	<p>Please Wait...</p>

		 	<img width="50" src="<?php echo IMAGES;?>loading.gif">
		 </div>

	</div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer_scripts'); ?>

	<?php echo $__env->make('common.validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<script src="<?php echo e(JS); ?>bootstrap-toggle.min.js"></script>
 <script>
 	function submitForm() {
 		$('#install_form').hide();
 		$('#after_display').show();
 		$('#install_form').submit();
 	}
 </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('install.install-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>