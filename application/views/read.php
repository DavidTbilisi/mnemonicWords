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
                    <li class="col-12"> სიტყვა</li>
                    <li class="col-12"> ასოციაცია</li>
                    <li class="col-12"> კავშირი</li>
                    <li class="col-12"> მნიშვნელობა</li>
                </div>
            </div>
            <hr>
			<?php foreach ( $words as $index => $word ) : ?>
                <div class="row">
                    <div class="col-3 hv-center">
                        <div class="circle hv-center">
							<?php echo ++ $index ?>
                        </div>
                    </div>
                    <div class="col">
                        <ul>
                            <li> <?php echo $word->newWord ?> </li>
                            <li> <?php echo $word->assoc ?> </li>
                            <li> <?php echo $word->connection ?> </li>
                            <li> <?php echo $word->meaning ?> </li>
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

			<?php endforeach; ?>
        </div>


        <div class="instruction">

            <div class="text-block">
                <h1 class="title">უცხო სიტყვების სწავლის ასოციაციიური მეთოდი</h1>
                <p><b>სიტყვების ასოციაციური დამახსოვრებით მეთოდი შედგება 4 შემადგენლისგან</b></p>
                <ul>
                    <li>ახალი სიტყვისგან</li>
                    <li>ახალ სიტყვასთან დაკავშირებული საგანი/სიტყვა რომელიც პირველი ამოტივტივდება თავში ახალი სიტყვის
                        გაგნებისთანავე
                    </li>
                    <li>თავად სიტყვის მნიშვნელობა მშობლიურ ენაზე</li>
                    <li> ახალი სიტყვის ასოციაციის დაკავშირება მშობლიური სიტყვის მნიშვნელობასთან</li>
                </ul>
            </div>
        </div>

    </div>
</div>