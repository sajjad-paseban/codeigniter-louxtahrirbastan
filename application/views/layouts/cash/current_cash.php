<div class="row border mx-1 rounded shadow-sm">
	<div class="col pt-1">
		<?php if ($this->session->flashdata('delete_cash_success')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-success text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('delete_cash_success');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('delete_cash_fail')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('delete_cash_fail');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col">
				<img src="<?php echo base_url(); ?>/images/cash.png" style="width: 50px;height: 50px;" alt="">
				<span class="float-right mt-3 mr-3" for="">مدیریت صندوق ها</span>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col py-2">
				<div class="accordion" id="accordionExample">
					<?php foreach ($get_cashes as $row): ?>
						<button class="btn btn-warning btn-block my-2 shadow- border border-dark" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row->c_id;?>" aria-expanded="true" aria-controls="collapse<?php echo $row->c_id;?>">
							<span style="font-size: 8px" class="badge float-left my-1 py-1 badge-light mr-1"><?php echo"فروشگاه : ".$row->s_name;?></span><?php echo '<span style="font-size: 12px" class="float-right">'.$row->c_name.'</span>';?>
						</button>
						<div id="collapse<?php echo $row->c_id;?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
							<div class="card-body">
								<a class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#staticBackdrop<?php echo $row->c_id;?>">حذف صندوق</a>
								<div class="modal fade" id="staticBackdrop<?php echo $row->c_id;?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel">حذف صندوق</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body text-right">
												<?php echo "آیا قصد حذف صندوق ' ".$row->c_name." ' را دارید؟"?>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
												<a href="<?php echo base_url();?>cash/delete/<?php echo $row->c_id;?>" class="btn btn-primary">بله</a>
											</div>
										</div>
									</div>
								</div>
								<a href="<?php echo base_url();?>cash/show_sell_in_cashes/<?php echo $row->c_id.'/'.$row->s_id;?>" class="btn btn-sm btn-success btn-block my-1">
									<span style="font-size: 8px" class="badge float-left my-1 py-1 badge-light mr-1"><?php echo $row->c_name;?></span>نمایش فروش ها
								</a>
							</div>
						</div>

					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
