<div class="row">
    <div class="col"><?php $this->load->view( 'admin/nav' ); ?></div>
</div>
<hr>
<?php $this->load->view( 'add-word' ) ?>

<div class="row">
    <div class="col">


        <div class="words-mobile">
            <hr>
            <div class="row">
                <div class="col-3 hv-center">
                    <div class="circle hv-center">
                        #
                    </div>
                </div>
                <div class="col-9">
                    <li class="col-12"> სიტყვა      </li>
                    <li class="col-12"> ასოციაცია   </li>
                    <li class="col-12"> კავშირი     </li>
                    <li class="col-12"> მნიშვნელობა </li>
                </div>
            </div>
            <hr>

	        <?php
            if (count($words) > 0 ) :

            foreach ( $words as $index => $word ) :
                ?>
                <div class="row">
                    <div class="col-3 hv-center">
                        <div class="circle hv-center">

							<?php  echo isset($start)?  ++$start:++$index;?>
                        </div>
                    </div>
                    <div class="col">
                        <ul>
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
                            <i class="icon-edit-sign icon-2x"></i>
                        </a>

                        <a class="delete-word" href="<?php echo site_url() . '/delete/' . $word->id ?>">
                            <i class="icon-trash icon-2x"></i>
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