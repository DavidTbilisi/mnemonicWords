<div class="admin row">
	<?php $this->load->view('admin/admin_nav')  ?>
	<div class="col content">
		<?php $this->load->view('admin/top_line')  ?>

		<div class="row" >
			<div class="col-12">სახელი: <input v-model="admin.user.first_name"></div>
			<div class="col-12">გვარი: <input v-model="admin.user.last_name"></div>
			<div class="col-12">ელ.ფოსტა:  <input v-model="admin.user.email"></div>

		</div>
		<div class="row">
			<div class="col-12">ტელეფონი: <input v-model="admin.user.phone"></div>
			<div class="col-12">დამატებით სახელი: <input v-model="admin.user.username"></div>
			<div class="col-12">ძველი პაროლი: <input v-model="admin.user.password"></div>
		</div>
		<div class="row">
			<div class="col-12">ახალი პაროლი: <input v-model="admin.user.email"></div>
			<div class="col-12">დამახსოვრება</div>
		</div>
	</div>
</div>