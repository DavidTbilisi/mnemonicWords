<div class="row">
    <div class="col"><?php $this->load->view( 'admin/nav' ); ?></div>
</div>

<div class="details">
    <div class="row mt-5 mb-5 pt-5">
        <div class="col-sm-12 col-md-6 col-lg-3 border">სიტყვა: <span class="summernote"><?= $word->newWord ?></span></div>
        <div class="col-sm-12 col-md-6 col-lg-3 border">ასოციაცია: <span class="summernote"><?= $word->assoc ?></span></div>
        <div class="col-sm-12 col-md-6 col-lg-3 border">კავშირი: <span class="summernote"><?= $word->connection ?></span></div>
        <div class="col-sm-12 col-md-6 col-lg-3 border">მნიშვნელობა: <span class="summernote"><?= $word->meaning ?></span></div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col">
            <h1>ჩანიშვნები</h1>
        </div>
    </div>

	<?php

	$items = [
		[ 'tab' => [ "text" => 'ტექსტები', 'id' => 'text' ] ],
//		[ 'tab' => [ "text" => 'სურათები', 'id' => 'images' ] ],
	];
	?>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
		<?php foreach ( $items as $i => $item ): ?>
            <li class="nav-item">
                <a class="nav-link <?= $i == 0 ? 'active' : ''; ?>"
                   id="<?= $item['tab']['id'] ?>-tab"
                   data-toggle="tab"
                   href="#<?= $item['tab']['id'] ?>"
                   role="tab"
                   aria-controls="<?= $item['tab']['id'] ?>"
                   aria-selected="true">
					<?= $item['tab']['text'] ?>
                </a>
            </li>
		<?php endforeach; ?>
    </ul>

    <div class="tab-content border mb-5" id="myTabContent">
		<?php foreach ( $items as $i => $item ): ?>
            <div class="tab-pane fade <?= $i == 0 ? 'show active' : ''; ?> h-50"
                 id="<?= $item['tab']['id'] ?>"
                 role="tabpanel"
                 aria-labelledby="<?= $item['tab']['id'] ?>">
<!--                <form action="" method="post">-->
                    <textarea class="d-none" name="word" id="editor<?= $item['tab']['id']?>"><?=$word->text?></textarea>
<!--                    <input type="button" value="შენახვა" class="btn btn-outline-success btn-lg float-right det-save" >-->
                <button class="btn btn-outline-success btn-lg float-right det-save" > შენახვა </button>
<!--                </form>-->
            </div>
		<?php endforeach; ?>
    </div>

</div>