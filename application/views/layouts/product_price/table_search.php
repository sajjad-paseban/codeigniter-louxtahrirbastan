<table class="table table-sm table-bordered table-hover table-responsive-xl">
	<thead class="thead-dark text-center" style="font-size: 12px">
	<?php if($this->session->userdata('type') == 0): ?>
	<th>حذف و ویرایش</th>
	<th>تاریخ آخرین ویرایش</th>
	<th>قیمت فروش</th>
<!--	<th>قیمت خرید</th>-->
	<th>نام محصول</th>
	<?php elseif($this->session->userdata('type') == 1): ?>
	<th>تاریخ آخرین ویرایش</th>
	<th>قیمت فروش</th>
<!--	<th>قیمت خرید</th>-->
	<th>نام محصول</th>
	<?php endif; ?>
	</thead>
	<tbody class="text-center" style="font-size: 13px">
	<?php foreach ($prices1 as $row): ?>
		<tr>
		    <?php if($this->session->userdata('type') == 0): ?>
	        <td>
				<button type="button" class="btn btn-danger border border-dark shadow-sm btn-sm btn-block" data-toggle="modal" data-target="#staticBackdrop<?php echo $row->id;?>">
					حذف
				</button>

				<!-- Modal -->
				<div class="modal fade" id="staticBackdrop<?php echo $row->id;?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel<?php echo $row->id;?>" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel<?php echo $row->id;?>">حذف محصول</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p style="font-size: 15px" class="text-right"><?php echo " آیا قصد حذف محصول "."<span class='text-info'>".$row->name."</span>"." را دارید؟ ";?></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
								<a href="<?php echo base_url();?>price/delete_by_id/<?php echo $row->id;?>" class="btn btn-primary">بله</a>
							</div>
						</div>
					</div>
				</div>
				<button type="button" class="btn btn-warning border border-dark shadow-sm btn-sm btn-block mt-1" data-toggle="modal" data-target="#update<?php echo $row->id;?>">
					ویرایش
				</button>

				<!-- Modal -->
				<div class="modal fade" id="update<?php echo $row->id;?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateLabel<?php echo $row->id;?>" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="updateLabel<?php echo $row->id;?>">ویرایش محصول</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row mx-1">
									<div class="col my-1">
										<p class="text-center my-2"><span class="bg-warning p-2 rounded shadow-sm">ویرایش قیمت محصول</span></p>
										<?php echo form_open('price/edit/'.$row->id,array('class'=>'my-3','name'=>'update_price'.$row->id))?>
											<div class="form-group">
												<label for="update_name_price<?php echo $row->id;?>" class="float-right">نام محصول</label>
												<input type="text" class="form-control text-right" value="<?php echo $row->name;?>" name="update_name_price" id="update_name_price<?php echo $row->id;?>" aria-describedby="emailHelp">
											</div>

											<div class="form-group">
												<label for="update_purchase_price<?php echo $row->id;?>" class="float-right">قیمت خرید</label>
												<div class="input-group mb-2 mr-sm-2">
													<div class="input-group-prepend">
														<div class="input-group-text">ریال</div>
													</div>
													<input type="text" inputmode="numeric" class="form-control" name="update_purchase_price" value="<?php echo number_format($row->price_purchase);?>" onkeyup="separateNum(this.value,this);" id="update_purchase_price<?php echo $row->id;?>">
												</div>
											</div>

											<div class="form-group">
												<label for="update_percent_price<?php echo $row->id;?>" class="float-right"><small style="font-size: 10px" class="text-muted">(اختیاری)</small> درصد </label>
												<div class="input-group mb-2 mr-sm-2">
													<input type="number" class="form-control" onkeyup="update_percent(<?php echo $row->id;?>)" id="update_percent_price<?php echo $row->id;?>">
													<div class="input-group-append">
														<div class="input-group-text">%</div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label for="update_sell_price<?php echo $row->id;?>" class="float-right">قیمت فروش</label>
												<div class="input-group mb-2 mr-sm-2">
													<div class="input-group-prepend">
														<div class="input-group-text">ریال</div>
													</div>
													<input type="text" inputmode="numeric" class="form-control" name="update_sell_price" value="<?php echo number_format($row->price_sell);?>" onkeyup="separateNum(this.value,this);" id="update_sell_price<?php echo $row->id;?>">
												</div>
											</div>

											<!--					<div class="form-group">-->
											<!--						<label for="exampleInputPassword1">Password</label>-->
											<!--						<input type="password" class="form-control" id="exampleInputPassword1">-->
											<!--					</div>-->

											<button type="submit" onclick="validation_update_price(<?php echo $row->id;?>);" class="btn btn-warning btn-sm btn-block">ویرایش قیمت</button>

										<?php echo form_close();?>
										<script>
											document.forms['update_price<?php echo $row->id;?>'].onsubmit = function (){
												document.forms['update_price<?php echo $row->id;?>'][1].value = un_seperate_Number(document.forms['update_price<?php echo $row->id;?>'][1].value);
												document.forms['update_price<?php echo $row->id;?>'][3].value = un_seperate_Number(document.forms['update_price<?php echo $row->id;?>'][3].value);
											}
										</script>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">بستن</button>
							</div>
						</div>
					</div>
				</div>
			</td>
	        <?php endif; ?>
			<td><?php if($row->last_update_date == ""){echo "تاریخ ثبت"."<br/>".$row->insert_date;}else{echo $row->last_update_date;}?></td>
			<td class="bg-danger text-light"><label for="">ریال</label><?php echo ' '.number_format($row->price_sell);?></td>
<!--			<td><label for="">ریال</label>--><?php //echo ' '.number_format($row->price_purchase);?><!--</td>-->
			<td><?php echo $row->name;?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
