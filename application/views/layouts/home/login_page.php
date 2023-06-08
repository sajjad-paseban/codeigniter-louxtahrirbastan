<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>images/louxtahrirbastan.jpg" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-grid.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-reboot.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/reset.css">
	<script src="<?php echo base_url();?>assets/js/jquery-3.5.1.slim.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.js"></script>

	<title>ورود | لوکس تحریر باستان</title>
</head>
<body class="container-fluid">
<?php if ($this->session->flashdata('log_errors')): ?>
	<div class="row">
		<div class="col">
			<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
				<?php echo $this->session->flashdata('log_errors');?>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if ($this->session->flashdata('log_fail')): ?>
	<div class="row my-2">
		<div class="col">
			<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
				<?php echo $this->session->flashdata('log_fail');?>
			</div>
		</div>
	</div>
<?php endif; ?>
	<div class="row my-3">
		<div class="shadow border border-dark rounded p-3 p-sm-4 offset-1 col-10 offset-md-4 col-md-4 offset-sm-3 col-sm-6">
			<div class="row mb-3">
				<div class="col py-2 text-center">
					<!--<img class="mr-1" src="<?php echo base_url();?>images/book.png" style="width: 50px;height: 50px" alt="">-->
					<img class="mr-1 shadow img-fluid mx-auto img-thumbnail" src="<?php echo base_url();?>images/louxtahrirbastan.jpg" style="height: 200px" alt="">
					<!--<label class="ml-1" for="">لوکس تحریر باستان</label>-->
				</div>
			</div>
			<div class="row">
				<div class="col">
					<?php echo form_open('home/index',['name'=>'login']); ?>
					<div class="form-group">
						<label class="float-right" for="email_login">پست الکترونیکی</label>
						<input type="email" name="email_login" value="<?php echo set_value('email_login');?>" class="form-control form-control-sm" id="email_login" aria-describedby="emailHelp">
					</div>
					<div class="form-group">
						<label class="float-right" for="password_login">گذرواژه</label>
						<input type="password" name="password_login" value="<?php echo set_value('password_login');?>" class="form-control form-control-sm" id="password_login">
					</div>
					<button type="submit" onclick="validation_login();" class="btn btn-primary btn-block btn-sm">ورود به سامانه</button>
					</form>
					<?php echo form_close(); ?>

				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url();?>assets/js/validation.js"></script>
</body>
</html>
