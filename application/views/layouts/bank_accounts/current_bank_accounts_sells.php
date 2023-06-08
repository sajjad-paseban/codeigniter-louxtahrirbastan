<div class="row my-2">
	<div class="col">
		<?php if ($this->session->flashdata('delete_sell_in_bank_sell_by_id_success')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-success text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('delete_sell_in_bank_sell_by_id_success');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('delete_sell_in_bank_sell_by_id_fail')): ?>
			<div class="row mt-2">
				<div class="col">
					<div class="alert alert-danger text-right" style="font-family: mainfont;" role="alert">
						<?php echo $this->session->flashdata('delete_sell_in_bank_sell_by_id_fail');?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<table class="table table-bordered table-sm table-hover">
			<thead class="thead-dark text-center">
			<tr>
				<th>انتقال</th>
				<th>حذف فروش</th>
				<th>مبلغ</th>
				<th>بانک</th>
				<th>فروشگاه</th>
				<th>تاریخ</th>
			</tr>
			</thead>
			<tbody class="text-center">
			<?php foreach ($sells_of_bank as $row): ?>
				<tr>
					<td>
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-sm btn-outline-success btn-block" data-toggle="modal" data-target="#staticBackdrop">
							انتقال به بانک
						</button>

						<!-- Modal -->
						<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										...
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Understood</button>
									</div>
								</div>
							</div>
						</div>
					</td>
					<td><a class="btn btn-sm btn-danger btn-block" href="<?php echo base_url();?>sell/delete_sell_from_bank/<?php echo $row->bs_id;?>/<?php echo $this->uri->segment(3);?>">حذف</a></td>
					<td style="font-size: 18px; font-family: mainfont;"><?php echo number_format($row->bs_price);?></td>
					<td><?php echo $row->b_name;?></td>
					<td><?php echo $row->s_name;?></td>
					<td><?php echo $row->bs_date;?></td>
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
