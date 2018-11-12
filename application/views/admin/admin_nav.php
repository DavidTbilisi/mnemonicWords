
<nav class="col-5 col-sm-4 col-md-3 nav">
	<ul class="list-unstyled">
		<li><img class="img-fluid logo mb-4" src="https://via.placeholder.com/250x150" alt=""></li>
		<li v-for="item in admin.nav"><a class="mb-5" :href="`<?=base_url()?>index.php/${item.link}`"><i :class="item.icon"></i> {{item.name}} </a></li>
	</ul>
</nav>