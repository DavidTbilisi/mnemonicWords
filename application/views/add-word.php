<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	სიტყვის დამატება
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">დაამატეთ სიტყვა</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="add-words">
					<form action="<?php echo site_url() . '/save' ?>" method="post">
						<div class="flex">

							<input class="form-control form-control-lg"
                                   placeholder="ახალი სიტყვა"
                                   name="newWord"
                                   type="text"
                                   title="ახალი (უცნობი) სიტყვა">

							<input class="form-control form-control-lg"
                                   placeholder="ასოციაცია"
                                   name="assoc"
                                   type="text"
                                   title="შეიყვანეთ ახალ სიტყვასთან დაკავშირებული ასოციაცია">

							<input class="form-control form-control-lg"
                                   placeholder="კავშირი"
                                   name="connection"
                                   type="text"
                                   title="გააერთიანეთ ახალი სიტყვა, ასოციაცია და მნიშვნელობა">

							<input class="form-control form-control-lg"
                                   placeholder="მნიშვნელობა"
                                   name="meaning"
                                   type="text"
                                   title="ახალი სიტყვის მნიშვნელობა">

							<input class="btn btn-primary mb-2"
                                   type="submit"
                                   name="save"
                                   value="დამახსოვრება">
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