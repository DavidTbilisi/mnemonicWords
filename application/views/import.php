<?php

if (!isset($datas)){
echo form_open_multipart('import');?>
    <input type="file" name="file" required>
    <input type="submit" class="btn btn-primary">
</form>
<?php }  ?>


<?php
if (isset($error)) {
    print_r($error);
}

if (isset($datas)) {
	// print_r($datas);
	echo "<h1> ფაილი აიტვირთა </h1>";
	echo "<button class='btn btn-default' onclick='location.reload()'> შენახვა მონაცემთა ბაზაში </button>";
}



?>