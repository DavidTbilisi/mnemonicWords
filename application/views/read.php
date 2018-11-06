<div class="row">
    <div class="col"><?php $this->load->view( 'admin/nav' ); ?></div>
</div>
<hr>
<div>
<?php $this->load->view( 'add-word' ) ?>
    <span class="words-count"> სულ: <?=$words_count?></span>
</div>
<div class="row">
    <div class="col">


        <div class="words-mobile">
            <div class="row">
                <div class="col-1 hv-center">
                    <div class="circle hv-center">
                        #
                    </div>
                </div>
                <div class="col">
                    <ul class="list-unstyled">
                        <li class="col-12"> სიტყვა      </li>
                        <li class="col-12"> ასოციაცია   </li>
                        <li class="col-12"> კავშირი     </li>
                        <li class="col-12"> მნიშვნელობა </li>
                    </ul>
                </div>
            </div>

	        <?php
            if (count($words) > 0 ) :

            foreach ( $words as $index => $word ) :
                ?>
                <div class="row lang-item-container position-relative">
                    <div class="col-1 hv-center">
                        <a href="<?= base_url("/details/{$word->id}")  ?>">
                        <div class="circle hv-center">
							<?php  echo isset($start)?  ++$start:++$index;?>
                        </div>
                        </a>
<!--                        <input class="ml-5" type="checkbox">-->
                    </div>
                    <div class="col">
                        <ul class="lang-items list-unstyled">
                            <li> <?= $word->newWord ?>      </li>
                            <li> <?= $word->assoc ?>        </li>
                            <li> <?= $word->connection ?>   </li>
                            <li> <?= $word->meaning ?>      </li>
                        </ul>
                    </div>
                    <div class="covered" data-id="<?php echo $word->id ?>">
                        <a
                            class="edit-word"
                            data-toggle="modal"
                            data-target="#exampleModal"
                            href="<?php echo site_url() . '/save/' . $word->id ?>"
                        >
                            <i class="fa fa-pencil"></i>
                        </a>

                        <a class="delete-word" href="<?php echo site_url() . '/delete/' . $word->id ?>">
                            <i class="icon-trash"></i>
                        </a>
                    </div>
                </div>

			<?php
            endforeach;
			else:
                echo "<h1>ასეთი სიტყვა ვერ მოიძებნა</h1>";
			endif;
            ?>
        </div>
        <div class="load_more">
            <buttom class="btn btn-primary">Load More</buttom>
        </div>

<?php $this->load->view('instruction')  ?>

    </div>
</div>