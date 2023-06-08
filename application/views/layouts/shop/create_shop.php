<?php if ($this->session->flashdata('delete_shop_success')): ?>
	<div class="row mt-2">
		<div class="col">
			<div class="alert alert-success text-right" style="font-family: mainfont;" role="alert">
				<?php echo $this->session->flashdata('delete_shop_success');?>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if ($this->session->flashdata('delete_shop_fail')): ?>
	<div class="row mt-2">
		<div class="col">
			<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
				<?php echo $this->session->flashdata('delete_shop_fail');?>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="row px-3">
	<div class="col border rounded shadow-sm">
		<?php if ($this->session->flashdata('create_shop_errors')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('create_shop_errors');?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('create_shop_success')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-success text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('create_shop_success');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('create_shop_fail')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('create_shop_fail');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row my-1">
			<div class="col text-center">
				<label class="bg-info text-light m-3 p-2 rounded shadow-sm border">ایجاد فروشگاه</label>
			</div>
		</div>
		<div class="row">
			<div class="col pb-3">
				<?php echo form_open('shop/index',array('name'=>'create_shop')); ?>
					<div class="form-group">
						<label class="float-right" for="name_of_shop_create">نام فروشگاه</label>
						<input type="text" name="name_of_shop_create" class="form-control text-right" id="name_of_shop_create" aria-describedby="emailHelp">
					</div>
					<button type="submit" onclick="validation_create_shop();" class="btn btn-outline-info btn-block btn-sm">ایجاد فروشگاه</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
