<?php echo form_open_multipart('import');?>
    <input type="file" name="file" required>
    <input type="submit" class="btn btn-primary">
</form>



<?php
if (isset($error)) {
    print_r($error);
}

if (isset($datas)) {
	print_r($datas);
}



?>