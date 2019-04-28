<div class="header">
    <div class="container">
        <?php $this->load->view( 'admin/nav' ); ?>
    </div>
</div>
<hr>
<div>

<div class="language-container container">
    <div class="row">
        <div class="col">

<div class="container mb-3">
	<?php $this->load->view( 'add-word' ) ?>
    <span class="words-count"><?= $this->lang->line( 'all_words' ); ?>: <?= $words_count ?></span>
</div>

<div class="language-container container">
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
                            <li class="col-12"> სიტყვა</li>
                            <li class="col-12"> ასოციაცია</li>
                            <li class="col-12"> კავშირი</li>
                            <li class="col-12"> მნიშვნელობა</li>
                        </ul>
                    </div>
                </div>

				<?php
				if ( count( $words ) > 0 ) : ?>

                    <div v-for="( word, counter ) in sharedData.words"
                         class="row lang-item-container position-relative">
						 
                        <div class="col-1 hv-center">

                            <a :href="`<?= base_url( "/details/" ) ?>${word.id}`">
                                <div v-cloak class="circle hv-center">
                                    {{++counter}}
                                </div>
                            </a>

                            <!--<input class="ml-5" type="checkbox">-->
                        </div>

                        <div v-cloak class="col">
                            <ul class="lang-items list-unstyled">
                                <li> {{word.new_word}}</li>
                                <li> {{word.assoc}}</li>
                                <li> {{word.connection}}</li>
                                <li> {{word.meaning}}</li>
                            </ul>
                        </div>

                        <div class="covered" :data-id="word.id">

                            <a class="edit-word"
                               @click="showEditWordModal($event,word.id)"
                               data-toggle="modal"
                               data-target="#exampleModal"
                               :href="`<?php echo site_url() ?>/save/${word.id}`">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a @click="confirmDelete($event)" class="delete-word"
                               :href="`<?php echo site_url() . '/delete/' ?>${word.id}`">
                                <i class="icon-trash"></i>
                            </a>

                        </div>
                    </div>


					<?php

				else:
					echo "<h1 @click='loadMore' >{$this->lang->line('not_found')}</h1>";
				endif;
				?>
            </div>
            <div class="load_more clearfix">
                <button class="btn btn-primary"><i class="fa fa-spinner"
                                                   aria-hidden="true"></i> <?= $this->lang->line( 'load_more' ) ?>
                </button>
            </div>

			<?php $this->load->view( 'instruction' ) ?>
        </div>
    </div>
</div>
