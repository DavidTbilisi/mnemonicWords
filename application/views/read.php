<div class="row">
    <div class="col"><?php $this->load->view( 'admin/nav' ); ?></div>
</div>
<hr>
<div>
	<?php $this->load->view( 'add-word' ) ?>
    <span class="words-count"><?= $this->lang->line( 'all_words' ); ?>: <?= $words_count ?>|</span>
    <span class="dropdown">
        <button href="#"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                class="dropdown-toggle btn btn-primary"
                id="sortinging"><?=$this->lang->line('sort_by')?></button>
          <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button">დამატების მიხედვით</button>
    <button class="dropdown-item" type="button">შეცვლის მიხედვით</button>
    <button class="dropdown-item" @click="newWord" type="button">ანბანის მიხედვით (უცხო სიტყვების)</button>
    <button class="dropdown-item" type="button">ანბანის მიხედვით (მშობლიური სიტყვების)</button>
  </div>
    </span>
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
                        <li class="col-12"> <?= $this->lang->line( 'word' ); ?></li>
                        <li class="col-12"> <?= $this->lang->line( 'assoc' ); ?></li>
                        <li class="col-12"> <?= $this->lang->line( 'connection' ); ?></li>
                        <li class="col-12"> <?= $this->lang->line( 'meaning' ); ?></li>
                    </ul>
                </div>
            </div>


            <div v-cloak class="row lang-item-container position-relative" v-for="(one, index) in sharedData.words">
                <div class="col-1 hv-center">
                    <a :href="`<?=base_url("/details/")?>${sharedData.words[index].id}`">
                        <div v-cloak class="circle hv-center">{{parseInt(index)+1}}</div>
                    </a>
                </div>
                <div class="col">
                    <ul  class="lang-items list-unstyled">
                        <li>   {{sharedData.words[index].new_word}}    </li>
                        <li>   {{sharedData.words[index].assoc}}    </li>
                        <li>   {{sharedData.words[index].connection}}    </li>
                        <li>   {{sharedData.words[index].meaning}}    </li>
                    </ul>
                </div>
                <div class="covered" :data-id="sharedData.words[index].id">
                    <a class="edit-word"
                       data-toggle="modal"
                       data-target="#exampleModal"
                       @click="showEditWordModal($event, sharedData.words[index].id)"
                       :href="`<?=site_url() . '/save/'?>${sharedData.words[index].id}`"
                    > <i class="fa fa-pencil"></i> </a>

                    <a class="delete-word"
                       @click="confirmDelete($event, sharedData.words[index].id)"
                       :href="`<?=site_url() . '/delete/'?>${sharedData.words[index].id}`">
                        <i class="icon-trash"></i>
                    </a>
                </div>
            </div>
        </div>


        <div class="load_more" @click="loadMore">
            <button class="btn btn-primary"><?= $this->lang->line( 'load_more' ) ?></button>
        </div>

		<?php $this->load->view( 'instruction' ) ?>

    </div>
</div>