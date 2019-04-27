<!-- Button trigger modal -->
<button @click="addWord" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	<?=$this->lang->line('add_button')?>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">{{modal.title}}<?=$this->lang->line('add_title')?></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="add-words">
					<form :action="`<?=site_url() . '/save' ?>/${modal.url}`" method="post">
						<div class="flex">
							<input class="form-control form-control-lg"
                                   placeholder="<?=$this->lang->line('add_word')?>"
                                   name="new_word"
                                   type="text"
                                   title="ახალი (უცნობი) სიტყვა"
                            v-model="modal.newWord">

							<input class="form-control form-control-lg"
                                   placeholder="<?=$this->lang->line('add_assoc')?>"
                                   name="assoc"
                                   type="text"
                                   v-model="modal.assoc"
                                   title="შეიყვანეთ ახალ სიტყვასთან დაკავშირებული ასოციაცია">

							<input class="form-control form-control-lg"
                                   placeholder="<?=$this->lang->line('add_word')?>"
                                   name="connection"
                                   type="text"
                                   v-model="modal.connection"
                                   title="გააერთიანეთ ახალი სიტყვა, ასოციაცია და მნიშვნელობა">

							<input class="form-control form-control-lg"
                                   placeholder="<?=$this->lang->line('add_meaning')?>"
                                   name="meaning"
                                   type="text"
                                   v-model="modal.meaning"
                                   title="ახალი სიტყვის მნიშვნელობა">

							<input class="btn btn-primary mb-2"
                                   type="submit"
                                   name="save"
                                   value="<?=$this->lang->line('save')?>">
						</div>
					</form>
				</div>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$this->lang->line('close')?></button>
			</div>
		</div>
	</div>
</div>