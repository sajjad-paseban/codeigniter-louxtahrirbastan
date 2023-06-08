<div class="row border mx-1 rounded shadow-sm">
	<div class="col pt-1">
		<div class="row">
			<div class="col">
				<img src="<?php echo base_url(); ?>/images/shop.png" style="width: 40px;height: 40px;" alt="">
				<span class="float-right mt-2 mr-3" for="">مدیریت فروشگاها</span>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col py-2">
				<div class="accordion" id="accordionExample">
					<?php foreach ($created_shops as $row): ?>
						<button class="btn my-2 btn-info btn-block text-center" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row->id;?>" aria-expanded="true" aria-controls="collapse<?php echo $row->id;?>">
							<?php echo $row->name; ?>
						</button>
						<div id="collapse<?php echo $row->id;?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
							<a class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#staticBackdrop<?php echo $row->id;?>">حذف فروشگاه</a>
							<div class="modal fade" id="staticBackdrop<?php echo $row->id;?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">حذف فروشگاه</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body text-right">
											<?php echo "آیا قصد حذف فروشگاه ".$row->name." را دارید؟";?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
											<a href="<?php echo base_url();?>shop/delete/<?php echo $row->id;?>" class="btn btn-primary">بله</a>
										</div>
									</div>
								</div>
							</div>
							<a class="btn btn-sm btn-secondary btn-block my-1" href="<?php echo base_url();?>shop/show_all_sells_of_shop/<?php echo $row->id;?>">نمایش فروش</a>
						</div>
					<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
