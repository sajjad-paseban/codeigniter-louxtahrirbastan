<div class="row border mx-1 rounded shadow-sm">
	<div class="col pt-1">
		<?php if ($this->session->flashdata('delete_bank_success')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-success text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('delete_bank_success');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('delete_bank_fail')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('delete_bank_fail');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col">
				<img src="<?php echo base_url(); ?>/images/bank.png" style="width: 50px;height: 50px;" alt="">
				<span class="float-right mt-3 mr-3" for="">مدیریت حساب های بانکی</span>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col py-2">
					<div class="accordion" id="accordionExample">
						<?php foreach ($bank_accounts as $row): ?>
							<button class="btn btn-warning btn-block my-2 text-center shadow- border border-dark" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row->id;?>" aria-expanded="true" aria-controls="collapse<?php echo $row->id;?>">
								<?php echo $row->name;?>
							</button>
							<div id="collapse<?php echo $row->id;?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<a class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#staticBackdrop<?php echo $row->id;?>">حذف حساب بانکی</a>
									<div class="modal fade" id="staticBackdrop<?php echo $row->id;?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="staticBackdropLabel">حذف حساب بانکی</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body text-right">
													<?php echo "آیا قصد حذف حساب بانکی ' ".$row->name." ' را دارید؟"?>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
													<a href="<?php echo base_url();?>bank/delete/<?php echo $row->id;?>" class="btn btn-primary">بله</a>
												</div>
											</div>
										</div>
									</div>
									<a class="btn btn-sm btn-info btn-block my-2" href="<?php echo base_url();?>bank/show_sells_of_bank/<?php echo $row->id;?>">نمایش فروش</a>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
			</div>
		</div>
	</div>
</div>












