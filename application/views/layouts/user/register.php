<div class="row">
	<div class="offset-lg-4 col-lg-4 offset-md-4 col-md-4 offset-sm-3 col-sm-6 col-12 my-2">
		<?php if ($this->session->flashdata('errors')): ?>
		<div class="row">
			<div class="col">
				<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
					<?php echo $this->session->flashdata('errors');?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('reg_success')): ?>
			<div class="row">
				<div class="col">
					<div class="alert alert-success text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('reg_success');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('reg_fail')): ?>
			<div class="row">
				<div class="col">
					<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('reg_fail');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="offset-4 py-3 my-2 col-4 text-center bg-info rounded shadow-sm text-light">
				ثبت نام
			</div>
		</div>
		<?php echo form_open('user/register',['name'=>'register']);?>
		<div class="form-group">
			<label class="float-right" for="fullname_register">نام کامل</label>
			<input type="text" name="fullname_register" value="<?php echo set_value('fullname_register'); ?>" class="form-control text-right" id="fullname_register" aria-describedby="emailHelp">
		</div>

		<div class="form-group">
			<label class="float-right" for="email_register">پست الکترونیکی</label>
			<input type="email" name="email_register" value="<?php echo set_value('email_register'); ?>" class="form-control text-right" id="email_register" aria-describedby="emailHelp">
		</div>

		<div class="form-group">
			<label class="float-right" for="password_register">گذرواژه</label>
			<input type="password" name="password_register" value="<?php echo set_value('password_register'); ?>" class="form-control text-right" id="password_register" aria-describedby="emailHelp">
		</div>

		<div class="form-group">
			<label class="float-right" for="re-password_register">تکرار گذرواژه</label>
			<input type="password" name="re-password_register" value="<?php echo set_value('re-password_register'); ?>" class="form-control text-right" id="re-password_register" aria-describedby="emailHelp">
		</div>

		<div class="form-group">
			<label class="float-right" for="access_level_register">نوع دسترسی</label>
			<select class="form-control" name="access_level_register" id="access_level_register">
				<option>دسترسی کامل</option>
				<option>دسترسی محدود</option>
			</select>
		</div>

		<button type="submit" onclick="validation_register()" class="btn btn-info btn-block btn-sm">ثبت نام</button>
		<?php echo form_close(); ?>
	</div>
</div>
