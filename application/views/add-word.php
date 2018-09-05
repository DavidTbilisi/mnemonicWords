<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	სიტყვის დამატება
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">დაამატეთ სიტყვა</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<div class="add-words">
					<form action="<?php echo site_url() . '/save' ?>" method="post">
						<div class="flex">
							<input placeholder="ახალი სიტყვა" name="newWord" type="text">
							<input placeholder="ასოციაცია" name="assoc" type="text">
							<input placeholder="კავშირი" name="connection" type="text">
							<input placeholder="მნიშვნელობა" name="meaning" type="text">
							<input type="submit" name="save" value="დამახსოვრება">
						</div>
					</form>
				</div>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">დახურვა</button>
			</div>
		</div>
	</div>
</div>