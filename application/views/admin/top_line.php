<div class="top-line bg-light row pt-3">

	<div class="col search">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
                <select name="" id="">
                    <option value="new_word">new word</option>
                    <option value="assoc">assoc</option>
                    <option value="connection">connection</option>
                    <option value="meaning">meaning</option>
                </select>
			</div>
			<input type="text" class="form-control" placeholder="saerch" aria-label="saerch" aria-describedby="basic-addon1">
		</div>
	</div>
	<div class="col-2 user text-right">
		<h3 data-toggle="collapse" data-target="#user_panel" aria-expanded="false" aria-controls="user_panel">
            <i class="fa fa-user mr-3"></i><?=$data["user"]->first_name?>
        </h3>

        <div id="user_panel" class="collapse">
            <a href="<?=base_url('logout')?>" class="btn btn-primary">გამოსვლა</a>
        </div>
	</div>
	<div class="col-2 notifications text-right ">
		<i class="ml-3 fa fa-bell"></i>
		<i class="ml-3 fa fa-envelope-o"></i>
		<a href="<?=base_url('settings')?>"><i class="ml-3 fa fa-cog"></i></a>
	</div>
</div>
