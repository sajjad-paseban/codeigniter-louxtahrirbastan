<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>images/louxtahrirbastan.jpg" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-grid.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-reboot.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/reset.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.theme.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.structure.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/Toast/src/Toast.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/DateAssets/css/persian-datepicker.css">
	<!--	<script src="--><?php //echo base_url();?><!--assets/js/jquery-3.5.1.slim.min.js"></script>-->
	<script src="<?php echo base_url();?>assets/js/jquery-3.5.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.js"></script>
	<script src="<?php echo base_url();?>assets/DateAssets/js/persian-date.min.js"></script>
	<script src="<?php echo base_url();?>assets/DateAssets/js/persian-datepicker.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/wordifyfa.js"></script>
	<script src="<?php echo base_url();?>assets/Toast/src/Toast.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#date_of_sell_insert,#date_of_sell_delete").pDatepicker({
				format:"L"
			});

		});
	</script>
	<style>
		.ui-menu .ui-menu-item{
			text-align: right;
			font-family: mainfont;
		}
	</style>
	<title>صفحه اصلی | لوکس تحریر باستان</title>
</head>
<body class="container-fluid">
	
	<header class="fixed-top" >
		<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #626567">
			<a class="navbar-brand" style="font-family: shadi" href="#">
				<img class="mr-1 rounded border border-light shadow-sm" src="<?php echo base_url();?>images/louxtahrirbastan.jpg" style="width: 50px;height: 30px" alt="">

				لوکس تحریر باستان</a>
			<?php if ($this->session->userdata('user_loggedIn') == true): ?>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" dir="rtl" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item my-1 my-sm-0 text-right">
							<img src="<?php echo base_url();?>images/exit.png" style="width: 35px;height: 35px" alt="">
							<a class="nav-link" href="<?php echo base_url();?>user/logout">خروج</a>
						</li>
						<li class="nav-item my-1 my-sm-0 text-right">
							<img src="<?php echo base_url();?>images/home.png" style="width: 37px;height: 34px" alt="">
							<a class="nav-link" href="<?php echo base_url();?>user/index">صفحه اصلی</a>
						</li>
					</ul>
				</div>
			<?php endif; ?>
		</nav>
	</header>
	<section style="margin-top: 60.3px;margin-bottom: 60.3px;">
		<?php if ($this->session->userdata('user_loggedIn') == true): ?>
        <div class="row">
            <div class="col mt-1">
                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle btn-danger btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        میزکار
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-2 w-100 bg-light">
                        <a href="<?php echo base_url();?>shop/index" class="dropdown-item text-center">
                            <button class="btn btn-outline-info btn-block btn-sm">
                                مدیریت فروشگاه
                            </button>
                        </a>

                        <a href="<?php echo base_url();?>bank/index" class="dropdown-item text-center">
                            <button class="btn btn-outline-warning btn-block btn-sm">
                                مدیریت حساب های بانکی
                            </button>
                        </a>

                        <a href="<?php echo base_url();?>cash/index" class="dropdown-item text-center">
                            <button class="btn btn-outline-danger btn-block btn-sm">
                                مدیریت صندوق ها
                            </button>
                        </a>

                        <a href="<?php echo base_url();?>sell/index" class="dropdown-item text-center">
                            <button class="btn btn-outline-success btn-block btn-sm">
                                مدیریت فروش
                            </button>
                        </a>

                        <a href="<?php echo base_url();?>price/index" class="dropdown-item text-center">
                            <button class="btn btn-outline-dark btn-block btn-sm">
                                مدیریت قیمت محصولات
                            </button>
                        </a>
						
						<a href="<?php echo base_url();?>password/index" class="dropdown-item text-center">
                            <button class="btn btn-warning btn-block btn-sm">
                                تغییر گذرواژه
                            </button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col">
				<div class="alert alert-warning my-2 text-right text-dark border-dark" role="alert">
					<?php echo ".".$this->session->userdata('fullname')." به صفحه خود خوش آمدید"; ?>
				</div>
			</div>
		</div>
		<div class="row align-items-start flex-column flex-md-row flex-column-reverse">
			<div class="col-lg-9 col-md-8 offset-md-0 offset-sm-1 col-sm-10 mt-2 mt-md-0">
				<?php if (isset($view_1)): ?>
					<?php $this->load->view($view_1);?>
				<?php endif; ?>
				<?php if (isset($view_4)): ?>
					<?php $this->load->view($view_4);?>
				<?php endif; ?>
			</div>
			<div class="col-lg-3 col-md-4 offset-md-0 offset-sm-1 col-sm-10">
				<?php if (isset($view_2)): ?>
					<?php $this->load->view($view_2);?>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if (isset($view_3)): ?>
			<?php $this->load->view($view_3);?>
		<?php endif; ?>
	</section>
	<footer style="margin-top: 500px" class="row bg-success p-1">
		<div class="col">
			<p class="text-right mt-2 mr-3 text-light">
				<small>.تمامی حقوق مادی و معنوی سایت متعلق به لوکس تحریر باستان می باشد</small>
			</p>
		</div>
	</footer>

	<script src="<?php echo base_url();?>assets/js/validation.js"></script>
</body>
</html>
