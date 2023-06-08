<div class="row px-3">
	<div class="col border rounded shadow-sm">
		<?php if ($this->session->flashdata('insert_sell_errors')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('insert_sell_errors');?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('insert_sell_success')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-success text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('insert_sell_success');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('insert_sell_fail')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('insert_sell_fail');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row my-1">
			<div class="col text-center">
				<label class="bg-success text-light m-3 p-2 rounded shadow-sm border">ثبت فروش</label>
			</div>
		</div>
		<div class="row">
			<div class="col pb-3">
				<?php echo form_open('sell/insert',array('name'=>'insert_sell')); ?>
				<div class="form-group">
					<label class="float-right" for="date_of_sell_insert">تاریخ فروش</label>
					<input type="text" name="date_of_sell_insert" class="form-control text-right" id="date_of_sell_insert" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
					<label class="float-right" for="ShopName_of_sell_insert">نام فروشگاه</label>
					<select dir="rtl" class="form-control" name="ShopName_of_sell_insert" id="ShopName_of_sell_insert">
						<?php foreach ($get_shops as $row): ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label class="float-right" for="MoneyPlace_of_sell_insert">محل پول</label>
					<select dir="rtl" class="form-control" name="MoneyPlace_of_sell_insert" id="MoneyPlace_of_sell_insert">
						<option value="-1">صندوق</option>
						<?php foreach ($get_banks as $row): ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div id="in_which_cash" class="form-group" style="display: none">
					<label class="float-right" for="WhichCash_of_sell_insert">در کدام صندوق</label>
					<select dir="rtl" class="form-control" name="WhichCash_of_sell_insert" id="WhichCash_of_sell_insert">
						<?php foreach ($get_cashes as $row): ?>
							<option value="<?php echo $row->c_id;?>"><?php echo '"'.$row->c_name.'" از فروشگاه '.$row->s_name;?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label class="float-right" for="price_of_sell_insert">مبلغ</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">ریال</div>
						</div>
						<input type="text" onkeyup="separateNum(this.value,this);document.getElementById('numtoletter').innerText = wordifyRials(this.value);if(this.value == ''){document.getElementById('numtoletter').innerText = '';}" name="price_of_sell_insert" class="form-control text-right" id="price_of_sell_insert" aria-describedby="emailHelp">
					</div>
					<small id="numtoletter" class="text-muted float-right my-3"></small>
				</div>
				<button type="submit" onclick="validation_create_sell();" class="btn btn-outline-success btn-block btn-sm">ثبت</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>






<div class="row px-3 my-2">
	<div class="col border rounded shadow-sm">
		<?php if ($this->session->flashdata('delete_sell_errors')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('delete_sell_errors');?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('delete_sell_success')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-success text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('delete_sell_success');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('delete_sell_fail')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('delete_sell_fail');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row my-1">
			<div class="col text-center">
				<label class="bg-success text-light m-3 p-2 rounded shadow-sm border">حذف فروش</label>
			</div>
		</div>
		<div class="row">
			<div class="col pb-3">
				<?php echo form_open('sell/delete',array('name'=>'delete_sell')); ?>
				<div class="form-group">
					<label class="float-right" for="date_of_sell_delete">تاریخ فروش</label>
					<input type="text" name="date_of_sell_delete" class="form-control text-right" id="date_of_sell_delete" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
					<label class="float-right" for="ShopName_of_sell_delete">نام فروشگاه</label>
					<select dir="rtl" class="form-control" name="ShopName_of_sell_delete" id="ShopName_of_sell_delete">
						<?php foreach ($get_shops as $row): ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label class="float-right" for="MoneyPlace_of_sell_delete">محل پول</label>
					<select dir="rtl" class="form-control" name="MoneyPlace_of_sell_delete" id="MoneyPlace_of_sell_delete">
						<option value="-1">صندوق</option>
						<?php foreach ($get_banks as $row): ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div id="in_which_cash_delete" class="form-group" style="display: none">
					<label class="float-right" for="WhichCash_of_sell_delete">در کدام صندوق</label>
					<select dir="rtl" class="form-control" name="WhichCash_of_sell_delete" id="WhichCash_of_sell_delete">
						<?php foreach ($get_cashes as $row): ?>
							<option value="<?php echo $row->c_id;?>"><?php echo '"'.$row->c_name.'" از فروشگاه '.$row->s_name;?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<button type="submit" onclick="validation_delete_sell();" class="btn btn-outline-success btn-block btn-sm">حذف</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
