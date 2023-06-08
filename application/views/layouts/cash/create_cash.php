<div class="row px-3">
	<div class="col border rounded shadow-sm">
		<?php if ($this->session->flashdata('create_cash_errors')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('create_cash_errors');?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('create_cash_success')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-success text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('create_cash_success');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('create_cash_fail')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('create_cash_fail');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row my-1">
			<div class="col text-center">
				<label class="bg-danger text-light m-3 p-2 rounded shadow-sm border">ایجاد صندوق</label>
			</div>
		</div>
		<div class="row">
			<div class="col pb-3">
				<?php echo form_open('cash/index',array('name'=>'create_cash')); ?>
				<div class="form-group">
					<label class="float-right" for="name_of_cash_create">نام صندوق</label>
					<input type="text" name="name_of_cash_create" class="form-control text-right" id="name_of_cash_create" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
					<label class="float-right" for="name_of_forshop_create">برای فروشگاه</label>
					<select dir="rtl" class="form-control" name="name_of_forshop_create" id="name_of_forshop_create">
						<?php foreach ($get_shops as $row): ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<button type="submit" onclick="validation_create_cash();" class="btn btn-outline-danger btn-block btn-sm">ایجاد صندوق</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
