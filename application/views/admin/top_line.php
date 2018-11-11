<div class="top-line bg-light row pt-3">

	<div class="col search">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
			</div>
			<input type="text" class="form-control" placeholder="saerch" aria-label="saerch" aria-describedby="basic-addon1">
		</div>
	</div>
	<div class="col-2 user text-right">
		<h3><i class="fa fa-user mr-3"></i><?=$user->first_name?></h3>
	</div>
	<div class="col-2 notifications text-right ">
		<i class="ml-3 fa fa-bell"></i>
		<i class="ml-3 fa fa-envelope-o"></i>
		<a href="<?=base_url('settings')?>"><i class="ml-3 fa fa-cog"></i></a>
	</div>
</div>
