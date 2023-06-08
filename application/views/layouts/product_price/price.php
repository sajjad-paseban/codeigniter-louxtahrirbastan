
<script>
	$(document).ready(function(){
		$('.toast').toast('show');
	});
</script>
<div class="row align-items-start flex-column flex-md-row">
	<div class="col-lg-8 col-md-7 col-12">
		<div class="row m-1">
			<div class="col-8 col-sm-10 col-md-9 col-lg-10"><hr></div>
			<div class="col-4 col-sm-2 col-md-3 col-lg-2 text-right"><small class="text-muted"><label for="search_name_price">جست و جو</label></small></div>
		</div>
		<div class="row m-1 pl-3">
			<div class="col-11">
				<?php echo form_open('price/search',array('name'=>'search_price','class'=>'form-row'));?>
					<div class="col-7 col-sm-9 col-md-7 col-lg-10">
						<div class="form-group mx-sm-3 mb-2">
							<input type="text" class="form-control text-right" name="search_name_price" id="search_name_price" placeholder="جست و جو نام محصول">
						</div>
					</div>
					<div class="col-5 col-sm-3 col-md-5 col-lg-2 text-center">
						<button type="submit" onclick="validation_search_price()" class="btn btn-warning border-dark shadow-sm mb-2">جست و جو</button>
					</div>
				<?php echo form_close();?>
			</div>
			<div class="col-1"></div>
		</div>
		<?php if ($this->session->flashdata('search_price_fail')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right m-3" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('search_price_fail');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('update_price_successful')): ?>
			<div class="position-fixed p-3" style="z-index: 5; right: 0; bottom: 480px;">
				<div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
					<div class="toast-header">
						<img style="width: 30px;height: 20px;" src="<?php echo base_url();?>/images/louxtahrirbastan.jpg" class="rounded mr-2"  alt="...">
						<strong class="mr-auto" style="font-family: shadi;">لوکس تحریر باستان</strong>
						<small class="ml-5">ویرایش محصول</small>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body bg-white rounded shadow text-right">
						<p><span>.</span><span> محصول  </span><span class="text-primary"><?php echo $this->session->flashdata('update_price_successful_productName'); ?></span><span class="text-success"> ویرایش شد </span></p>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('update_price_fail')): ?>
			<div class="position-fixed p-3" style="z-index: 5; right: 0; bottom: 480px;">
				<div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
					<div class="toast-header">
						<img style="width: 30px;height: 20px;" src="<?php echo base_url();?>/images/louxtahrirbastan.jpg" class="rounded mr-2"  alt="...">
						<strong class="mr-auto" style="font-family: shadi;">لوکس تحریر باستان</strong>
						<small class="ml-5">ویرایش محصول</small>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body bg-white rounded shadow text-right">
						<p><span>.</span><span> محصول  </span><span class="text-primary"><?php echo $this->session->flashdata('update_price_fail_productName'); ?></span><span class="text-danger"> ویرایش نشد </span></p>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row m-1">
			<div class="col">
				<?php
					if (isset($table)){
						$this->load->view($table);
					}
				?>
			</div>
		</div>
		<div class="row m-1">
			<div class="col-6 col-sm-8 col-md-7 col-lg-9"><hr></div>
			<div class="col-6 col-sm-4 col-md-5 col-lg-3 text-right"><small class="text-muted">قیمت تمامی محصولات</small></div>
		</div>
		<div class="row m-1">
			<div class="col">
				<table dir="rtl" class="table table-sm table-bordered table-hover  table-responsive-sm table-responsive-md table-responsive-lg">
					<thead class="thead-dark text-center" style="font-size: 12px">
						<th style="min-width: 100px">نام محصول</th>
						<th>قیمت خرید</th>
						<th style="min-width: 100px">قیمت فروش</th>
						<th>تاریخ آخرین ویرایش</th>
						<th>ویرایش شده توسط</th>
						<th>تاریخ ثبت</th>
						<th>ثبت شده توسط</th>
					</thead>
					<tbody class="text-center" style="font-size: 13px">
					<?php foreach ($prices as $row): ?>
						<tr>
							<td style="min-width: 100px"><?php echo $row->name;?></td>
							<td><label class="float-left" for="">ریال</label><?php echo ' '.number_format($row->price_purchase);?></td>
							<td style="min-width: 100px;font-size: 13px" class="bg-danger text-light"><span class="float-left">ریال</span><?php echo ' '.number_format($row->price_sell);?></td>
							<td><?php if($row->last_update_date == ""){echo "-";}else{echo $row->last_update_date;}?></td>
							<td><?php if($row->who_updated == ""){echo "-";}else{echo $row->who_updated;}?></td>
							<td><?php echo $row->insert_date ;?></td>
							<td><?php echo $row->who_inserted;?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<?php echo $links;?>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-5 col-12">
		<?php if ($this->session->flashdata('price_errors')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right m-3" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('price_errors');?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('insert_price_successful')): ?>
			<div class="position-fixed p-3" style="z-index: 5; right: 0; bottom: 480px;">
				<div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
					<div class="toast-header">
						<img style="width: 30px;height: 20px;" src="<?php echo base_url();?>/images/louxtahrirbastan.jpg" class="rounded mr-2"  alt="...">
						<strong class="mr-auto" style="font-family: shadi;">لوکس تحریر باستان</strong>
						<small class="ml-5">ثبت محصول</small>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body bg-white rounded shadow text-right">
						<p><span>.</span><span> محصول  </span><span class="text-primary"><?php echo $this->session->flashdata('insert_price_successful_ProductName'); ?></span><span class="text-success"> ثبت شد </span></p>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('insert_price_fail')): ?>
			<div class="position-fixed p-3" style="z-index: 5; right: 0; bottom: 480px;">
				<div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
					<div class="toast-header">
						<img style="width: 30px;height: 20px;" src="<?php echo base_url();?>/images/louxtahrirbastan.jpg" class="rounded mr-2"  alt="...">
						<strong class="mr-auto" style="font-family: shadi;">لوکس تحریر باستان</strong>
						<small class="ml-5">ثبت محصول</small>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body bg-white rounded shadow text-right">
						<p><span> محصول  </span><span class="text-primary"><?php echo $this->session->flashdata('insert_price_fail_ProductName'); ?></span><span class="text-danger"> از قبل ثبت شده است </span></p>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row border border-dark rounded m-3">

			<div class="col my-1">
				<p class="text-center my-2"><span class="bg-success text-light p-2 rounded shadow-sm">ثبت قیمت محصول</span></p>
				<?php echo form_open('price/insert',array('name'=>'insert_price','class'=>'m-3'))?>

					<div class="form-group">
						<label for="insert_name_price" class="float-right">نام محصول</label>
						<input type="text" class="form-control text-right" name="insert_name_price" id="insert_name_price" aria-describedby="emailHelp">
					</div>

					<div class="form-group">
						<label for="insert_purchase_price" class="float-right">قیمت خرید</label>
						<div class="input-group mb-2 mr-sm-2">
							<div class="input-group-prepend">
								<div class="input-group-text">ریال</div>
							</div>
							<input type="text" inputmode="numeric" class="form-control" onkeyup="separateNum(this.value,this)" name="insert_purchase_price" id="insert_purchase_price">
						</div>
					</div>

					<div class="form-group">
						<label for="insert_percent_price" class="float-right"><small style="font-size: 10px" class="text-muted">(اختیاری)</small> درصد </label>
						<div class="input-group mb-2 mr-sm-2">
							<input type="number" class="form-control" onkeyup="insert_percent()" name="insert_percent_price" id="insert_percent_price">
							<div class="input-group-append">
								<div class="input-group-text">%</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="insert_sell_price" class="float-right">قیمت فروش</label>
						<div class="input-group mb-2 mr-sm-2">
							<div class="input-group-prepend">
								<div class="input-group-text">ریال</div>
							</div>
							<input type="text" inputmode="numeric" class="form-control" name="insert_sell_price" onkeyup="separateNum(this.value,this);" id="insert_sell_price">
						</div>
					</div>

<!--					<div class="form-group">-->
<!--						<label for="exampleInputPassword1">Password</label>-->
<!--						<input type="password" class="form-control" id="exampleInputPassword1">-->
<!--					</div>-->

					<button type="submit" <?php if($this->session->userdata('type') == 1){ echo "disabled";}?> onclick="validation_insert_price()" class="btn btn-success btn-sm btn-block">ثبت قیمت</button>

				<?php echo form_close();?>
			</div>
		</div>
		<script>
			document.forms['insert_price'].onsubmit = function (){
				document.forms['insert_price'][1].value = un_seperate_Number(document.forms['insert_price'][1].value);
				document.forms['insert_price'][3].value = un_seperate_Number(document.forms['insert_price'][3].value);
			}
		</script>
<!--		<div class="row border border-dark rounded m-3">-->
<!--			<div class="col my-1">-->
<!--				<p class="text-center my-2"><span class="bg-warning p-2 rounded shadow-sm">ویرایش قیمت محصول</span></p>-->
<!--				<form class="my-3" name="update_price">-->
<!---->
<!--					<div class="form-group">-->
<!--						<label for="update_name_price" class="float-right">نام محصول</label>-->
<!--						<input type="text" class="form-control text-right" name="update_name_price" id="update_name_price" aria-describedby="emailHelp">-->
<!--					</div>-->
<!---->
<!--					<div class="form-group">-->
<!--						<label for="update_purchase_price" class="float-right">قیمت خرید</label>-->
<!--						<div class="input-group mb-2 mr-sm-2">-->
<!--							<div class="input-group-prepend">-->
<!--								<div class="input-group-text">ریال</div>-->
<!--							</div>-->
<!--							<input type="text" class="form-control" onkeyup="separateNum(this.value,this);" id="update_purchase_price">-->
<!--						</div>-->
<!--					</div>-->
<!---->
<!--					<div class="form-group">-->
<!--						<label for="update_percent_price" class="float-right"><small style="font-size: 10px" class="text-muted">(اختیاری)</small> درصد </label>-->
<!--						<div class="input-group mb-2 mr-sm-2">-->
<!--							<input type="number" class="form-control" onkeyup="update_percent()" id="update_percent_price">-->
<!--							<div class="input-group-append">-->
<!--								<div class="input-group-text">%</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!---->
<!--					<div class="form-group">-->
<!--						<label for="update_sell_price" class="float-right">قیمت فروش</label>-->
<!--						<div class="input-group mb-2 mr-sm-2">-->
<!--							<div class="input-group-prepend">-->
<!--								<div class="input-group-text">ریال</div>-->
<!--							</div>-->
<!--							<input type="text" class="form-control" onkeyup="separateNum(this.value,this);" id="update_sell_price">-->
<!--						</div>-->
<!--					</div>-->
<!---->
<!--										<div class="form-group">-->
<!--											<label for="exampleInputPassword1">Password</label>-->
<!--											<input type="password" class="form-control" id="exampleInputPassword1">-->
<!--										</div>-->
<!---->
<!--					<button type="submit" onclick="validation_update_price()" class="btn btn-warning btn-sm btn-block">ویرایش قیمت</button>-->
<!---->
<!--				</form>-->
<!--			</div>-->
<!--		</div>-->
		<?php if ($this->session->flashdata('delete_price_successful')): ?>
			<div class="position-fixed p-3" style="z-index: 5; right: 0; bottom: 480px;">
				<div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
					<div class="toast-header">
						<img style="width: 30px;height: 20px;" src="<?php echo base_url();?>/images/louxtahrirbastan.jpg" class="rounded mr-2"  alt="...">
						<strong class="mr-auto" style="font-family: shadi;">لوکس تحریر باستان</strong>
						<small class="ml-5">حذف محصول</small>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body bg-white rounded shadow text-right">
						<p><span>.</span><span class="text-primary"><?php echo $this->session->flashdata('delete_price_successful_product_name'); ?></span><span class="text-success"> حذف شد </span></p>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('delete_price_fail')): ?>
			<div class="position-fixed p-3" style="z-index: 5; right: 0; bottom: 480px;">
				<div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
					<div class="toast-header">
						<img style="width: 30px;height: 20px;" src="<?php echo base_url();?>/images/louxtahrirbastan.jpg" class="rounded mr-2"  alt="...">
						<strong class="mr-auto" style="font-family: shadi;">لوکس تحریر باستان</strong>
						<small class="ml-5">حذف محصول</small>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body bg-white rounded shadow text-right">
						<p><span>.</span><span class="text-primary"><?php echo $this->session->flashdata('delete_price_fail_product_name'); ?></span><span class="text-danger"> حذف نشد </span></p>
					</div>
				</div>
			</div>
		<?php endif; ?>
<!--		<div class="row border border-dark rounded m-3">-->
<!--			<div class="col my-1">-->
<!--				<p class="text-center my-2"><span class="bg-danger text-light p-2 rounded shadow-sm">حذف قیمت محصول</span></p>-->
<!--				--><?php //echo form_open('price/delete',array('name'=>'delete_price'));?>
<!--				<div class="row my-3">-->
<!--					<div class="col">-->
<!--						<div class="form-group">-->
<!--							<label for="delete_name_price" class="float-right">نام محصول</label>-->
<!--							<input type="text" class="form-control text-right" name="delete_name_price" id="delete_name_price" aria-describedby="emailHelp">-->
<!--						</div>-->
<!--						<button type="button" onclick="validation_delete_price()" class="btn btn-danger btn-sm btn-block" id="delete_price_btn" data-toggle="modal" data-target="#exampleModal">حذف قیمت</button>-->
<!--						 Modal -->
<!--						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--							<div class="modal-dialog">-->
<!--								<div class="modal-content">-->
<!--									<div class="modal-header">-->
<!--										<h5 class="modal-title" id="exampleModalLabel">حذف قیمت محصول</h5>-->
<!--										<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--											<span aria-hidden="true">&times;</span>-->
<!--										</button>-->
<!--									</div>-->
<!--									<div class="modal-body">-->
<!--										<p id="p_delete_price_warning" class="text-right"></p>-->
<!--									</div>-->
<!--									<div class="modal-footer">-->
<!--										<button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>-->
<!--										<button type="button" class="btn btn-primary" onclick="document.forms['delete_price'].submit();">بله</button>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--				--><?php //echo form_close();?>
<!--			</div>-->
<!--		</div>-->
		<?php if ($this->session->flashdata('increase_price_successful')): ?>
			<div class="position-fixed p-3" style="z-index: 5; right: 0; bottom: 480px;">
				<div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
					<div class="toast-header">
						<img style="width: 30px;height: 20px;" src="<?php echo base_url();?>/images/louxtahrirbastan.jpg" class="rounded mr-2"  alt="...">
						<strong class="mr-auto" style="font-family: shadi;">لوکس تحریر باستان</strong>
						<small class="ml-5">افزایش قیمت</small>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body bg-white rounded shadow text-right">
						<p><span>.</span><span> محصولات برند </span><span class="text-primary"><?php echo $this->session->flashdata('increase_price_successful_productName'); ?></span><span class="text-success"> افزایش داده شد </span></p>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('increase_price_fail')): ?>
			<div class="position-fixed p-3" style="z-index: 5; right: 0; bottom: 480px;">
				<div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
					<div class="toast-header">
						<img style="width: 30px;height: 20px;" src="<?php echo base_url();?>/images/louxtahrirbastan.jpg" class="rounded mr-2"  alt="...">
						<strong class="mr-auto" style="font-family: shadi;">لوکس تحریر باستان</strong>
						<small class="ml-5">افزایش قیمت</small>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body bg-white rounded shadow text-right">
						<p><span class="text-danger"><?php echo $this->session->flashdata('increase_price_fail'); ?></span></p>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row border border-dark rounded m-3">
			<div class="col my-1">
				<p class="text-center my-2"><span class="bg-info text-light p-2 rounded shadow-sm">افزایش درصدی محصولات</span></p>
				<?php echo form_open('price/increase',array('name'=>'increase_price','class'=>'my-3'));?>
				    <div class="form-group">
						<label for="increase_brandName_price" class="float-right">نام برند</label>
						<input type="text" class="form-control text-right" name="increase_brandName_price" id="increase_brandName_price" aria-describedby="emailHelp">
					</div>
					<div class="form-group">
						<label for="increase_percent_price" class="float-right">درصد</label>
						<div class="input-group mb-2 mr-sm-2">
							<input type="number" class="form-control" name="increase_percent_price" id="increase_percent_price" aria-describedby="emailHelp">
							<div class="input-group-append">
								<div class="input-group-text">%</div>
							</div>
						</div>
					</div>
					<button type="button" <?php if($this->session->userdata('type') == 1){ echo "disabled";}?> onclick="validation_increase_price()" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#exampleModal2">افزایش قیمت</button>
					<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel2">افزایش درصدی محصولات</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p id="p_increase_price_warning" class="text-right"></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
									<button type="button" class="btn btn-primary" onclick="document.forms['increase_price'].submit();">بله</button>
								</div>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
		 <!-- افزایش درصدی محصولات بر اساس تاریخ -->
		<?php if ($this->session->flashdata('change_price_by_FromDateToDate')): ?>
			<script>
				new Toast({message: "<?php echo $this->session->flashdata("change_price_by_FromDateToDate_message") ?>",type:"success"})
			</script>
		<?php elseif($this->session->flashdata('change_price_by_FromDateToDate') == false): ?>
			<script>
				new Toast({message: "<?php echo $this->session->flashdata("change_price_by_FromDateToDate_message") ?>",type:"danger"})
			</script>
		<?php endif; ?>
		<div class="row border border-dark rounded m-3">
			<div class="col my-1">
				<p class="text-center my-2"><span class="bg-warning text-black p-2 rounded shadow-sm">تغییر درصدی قیمت محصولات بر اساس تاریخ</span></p>
				<?php echo form_open('price/changePriceByFromDateToDate',array('name'=>'increase_price_by_FromDateAndToDate','class'=>'my-3'));?>
			    	<div class="form-row">
						<div class="col">
							<label for="ToDate" class="float-right">تا تاریخ</label>
							<input type="text" onclick="" autocomplete="off" class="form-control text-right" name="ToDate" id="ToDate" aria-describedby="emailHelp">
						</div>
						<div class="col">
							<label for="FromDate" class="float-right">از تاریخ</label>
							<input type="text" onclick="" autocomplete="off" class="form-control text-right" name="FromDate" id="FromDate" aria-describedby="emailHelp">
						</div>
						<script>
							$(document).ready(function() {
								$("#FromDate,#ToDate").pDatepicker({
									format:"l",
									autoClose: true,
									calendar:{
										persian: {
											locale: 'en'
										}
									}
								});
							});
						</script>
					</div>
					<div class="form-group">
						<label for="increase_percent_price_by_FromDateAndToDate" class="float-right">درصد</label>
						<div class="input-group mb-2 mr-sm-2">
							<input type="number" class="form-control" name="increase_percent_price_by_FromDateAndToDate" id="increase_percent_price_by_FromDateAndToDate" aria-describedby="emailHelp">
							<div class="input-group-append">
								<div class="input-group-text">%</div>
							</div>
						</div>
					</div>
					<button type="button" <?php if($this->session->userdata('type') == 1){ echo "disabled";}?> onclick="validation_change_price_by_FromDateAndToDate()" class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#increase_percent_price_by_FromDateAndToDate_Modal">تغییر قیمت</button>
					<div class="modal" id="increase_percent_price_by_FromDateAndToDate_Modal" tabindex="-1" aria-labelledby="increase_percent_price_by_FromDateAndToDate_ModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="increase_percent_price_by_FromDateAndToDate_ModalLabel">تغییر درصدی قیمت محصولات</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p id="increase_percent_price_by_FromDateAndToDate_warning" class="text-right"></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" onclick="document.forms['increase_price_by_FromDateAndToDate'].reset()" data-dismiss="modal">خیر</button>
									<button type="button" class="btn btn-primary" onclick="document.forms['increase_price_by_FromDateAndToDate'].submit();">بله</button>
								</div>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
<!--		--><?php //if ($this->session->flashdata('decrease_price_successful')): ?>
<!--			<div class="row mt-2">-->
<!--				<div class="col">-->
<!--					<div class="alert alert-success text-right m-3" style="font-family: mainfont;" role="alert">-->
<!--						--><?php //echo $this->session->flashdata('decrease_price_successful');?>
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		--><?php //endif; ?>
<!--		--><?php //if ($this->session->flashdata('decrease_price_fail')): ?>
<!--			<div class="row mt-2">-->
<!--				<div class="col">-->
<!--					<div class="alert alert-danger text-right m-3" style="font-family: mainfont;" role="alert">-->
<!--						--><?php //echo $this->session->flashdata('decrease_price_fail');?>
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		--><?php //endif; ?>
<!--		<div class="row border border-dark rounded m-3">-->
<!--			<div class="col my-1">-->
<!--				<p class="text-center my-2"><span class="bg-dark text-light p-2 rounded shadow-sm">کاهش درصدی تمام محصولات</span></p>-->
<!--				--><?php //echo form_open('price/decrease',array('name'=>'decrease_price','class'=>'my-3'));?>
<!--					<div class="form-group">-->
<!--						<label for="decrease_name_price" class="float-right">درصد</label>-->
<!--						<div class="input-group mb-2 mr-sm-2">-->
<!--							<input type="number" class="form-control" name="decrease_percent_price" id="decrease_percent_price" aria-describedby="emailHelp">-->
<!--							<div class="input-group-append">-->
<!--								<div class="input-group-text">%</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<button type="button" onclick="validation_decrease_price()" class="btn btn-dark btn-sm btn-block" data-toggle="modal" data-target="#exampleModal3">کاهش قیمت</button>-->
<!--					 Modal -->
<!--					<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">-->
<!--						<div class="modal-dialog">-->
<!--							<div class="modal-content">-->
<!--								<div class="modal-header">-->
<!--									<h5 class="modal-title" id="exampleModalLabel3">کاهش درصدی تمام محصولات</h5>-->
<!--									<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--										<span aria-hidden="true">&times;</span>-->
<!--									</button>-->
<!--								</div>-->
<!--								<div class="modal-body">-->
<!--									<p id="p_decrease_price_warning" class="text-right"></p>-->
<!--								</div>-->
<!--								<div class="modal-footer">-->
<!--									<button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>-->
<!--									<button type="button" class="btn btn-primary" onclick="document.forms['decrease_price'].submit();">بله</button>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				--><?php //echo form_close();?>
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->


<script type="text/javascript">
	$(document).ready(function(){
		$('#search_name_price').keyup(function (){
			$.ajax({
				url: '<?= base_url();?>Price/fetch_price',
				type: 'post',
				dataType: 'json',
				data: {
					search: $('#search_name_price').val()
				},
				success: function(data){
					$('#search_name_price').autocomplete({
						source:data
					});
				}
			});
		});
		$('#delete_name_price').keyup(function (){
			$.ajax({
				url: '<?= base_url();?>Price/fetch_price',
				type: 'post',
				dataType: 'json',
				data: {
					search: $('#delete_name_price').val()
				},
				success: function(data){
					$('#delete_name_price').autocomplete({
						source:data
					});
				}
			});
		});
	});
</script>
