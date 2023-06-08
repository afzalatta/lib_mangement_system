<?php $__env->startSection('content'); ?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="card card-custom card-transparent">
				<div class="card-body p-0">
					<div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="true">
						<div class="card card-custom card-shadowless rounded-top-0">
							<div class="card-body p-0">
								<div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
									<div class="col-xl-12 col-xxl-10">
										<form class="form" action="<?php echo e(url('admin/setting/edit')); ?>" method="post" enctype="multipart/form-data">
										<?php echo e(csrf_field()); ?>

											<div class="row justify-content-center">
												<div class="col-xl-9">
													<?php if(\Session::has('success')): ?>
														<div class="alert alert-success">
															<button type="button" class="close" data-dismiss="alert">×</button>
																<?php echo \Session::get('success'); ?>

														</div>
													<?php endif; ?>
													<?php if(\Session::has('danger')): ?>
														<div class="alert alert-danger">
															<button type="button" class="close" data-dismiss="alert">×</button>
																<?php echo \Session::get('danger'); ?>

														</div>
													<?php endif; ?>

													<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
														<h5 class="text-dark font-weight-bold mb-10">Settings</h5>


														    <?php $__currentLoopData = $all_settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single_setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label"><?php echo e(ucwords(str_replace('_',' ', $single_setting->key))); ?></label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div class="form-group<?php echo e($errors->has($single_setting->key) ? ' has-error' : ''); ?>">
                                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="<?php echo e($single_setting->key); ?>" id="<?php echo e($single_setting->key); ?>" value="<?php echo e($single_setting->value); ?>" placeholder="<?php echo e(ucwords(str_replace('_',' ', $single_setting->key))); ?>" >
																		<?php if($errors->has('<?php echo e($single_setting->key); ?>')): ?>
                                                                            <span class="help-block" style="color:red">
                                                                                <strong><?php echo e($errors->first($single_setting->key)); ?></strong>
                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>

														    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


															<button type="submit" class="btn blue-color-bg font-weight-bolder px-9 py-4" >Submit</button>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');

		// if ($(this).is(":checked")) {
        //         $("#txtPassportNumber").removeAttr("disabled");
        //         $("#txtPassportNumber").focus();
        //     } else {
        //         $("#txtPassportNumber").attr("disabled", "disabled");
        //     }

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "<?php echo e(url('/admin/setting/status')); ?>",
            data: {'status': status, 'id': id},
            success: function(data){
				$(this).addClass('alert-success');
              console.log(data.success)
            }
        });
    })
  })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\installed Xampp\htdocs\my_projects\Library ManagmentV3\Library Managment\resources\views/admin/settings/edit_settings.blade.php ENDPATH**/ ?>