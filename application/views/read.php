<div class="header">
    <div class="container">
        <?php $this->load->view( 'admin/nav' ); ?>
    </div>
</div>
<hr>
<div>
<?php $this->load->view( 'add-word' ) ?>
    <span class="words-count"><?=$this->lang->line('all_words');?>: <?=$words_count?></span>
</div>
<div class="language-container container">
    <div class="row">
        <div class="col">

<<<<<<< HEAD
=======
        <div class="words-mobile">
            <div class="row">
                <div class="col-1 hv-center">
                    <div class="circle hv-center">
                        #
                    </div>
                </div>
                <div class="col">
                    <ul class="list-unstyled">
                        <li class="col-12"> <?=$this->lang->line('word');?></li>
                        <li class="col-12"> <?=$this->lang->line('assoc');?></li>
                        <li class="col-12"> <?=$this->lang->line('connection');?></li>
                        <li class="col-12"> <?=$this->lang->line('meaning');?></li>
                    </ul>
                </div>
            </div>
>>>>>>> 3133bf639a1bf853eb57a2e932f599d37470dce2

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

<<<<<<< HEAD
                <?php
                endforeach;
                else:
                    echo "<h1>ასეთი სიტყვა ვერ მოიძებნა</h1>";
                endif;
                ?>
            </div>
            <div class="load_more clearfix">
                <button class="btn btn-primary"><i class="fa fa-spinner" aria-hidden="true"></i> Load more items...</button>
            </div>
=======
			<?php
            endforeach;
			else:
                echo "<h1>{$this->lang->line('not_found')}</h1>";
			endif;
            ?>
        </div>
        <div class="load_more">
            <buttom class="btn btn-primary"><?=$this->lang->line('load_more')?></buttom>
        </div>
>>>>>>> 3133bf639a1bf853eb57a2e932f599d37470dce2

<?php $this->load->view('instruction')  ?>
        </div>
    </div>
</div>