<div class="row border mx-1 rounded shadow-sm">
	<div class="col pt-1">
		<div class="row">
			<div class="col">
				<img src="<?php echo base_url(); ?>/images/online_user.png" style="width: 45px;height: 45px;" alt="">
				<span class="float-right mt-2 mr-3" for="">کاربران آنلاین</span>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<ul id="online_users_list" class="list-group mb-3">
					<li id='online_users_ul' class='list-group-item text-right'><?php echo $this->session->userdata('fullname');?>(شما)<span style='border-radius:50px;width: 30px;height: 30px;display: inline-block;' class='bg-info text-light ml-1 text-center'><?php echo substr($this->session->userdata('fullname'),0,2);?></span></li>
					<?php foreach ($online_users as $row): ?>
						<?php if ($row->id == $this->session->userdata('id')) continue; ?>
						<li class='list-group-item text-right'><?php echo $row->fullname;?><span style='border-radius:50px;width: 30px;height: 30px;display: inline-block;' class='bg-info text-light ml-1 text-center'><?php echo substr($row->fullname,0,2);?></span></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
