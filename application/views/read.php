<div class="row">
    <div class="col"><?php $this->load->view('admin/nav'); ?></div>
</div>

<div class="row">
    <div class="col">


        <div class="words">
        <div class="row">
            <div class="col-1">#</div>
            <div class="col">ახალი სიტყვა</div>
            <div class="col d-none d-md-block">ასოციაცია</div>
            <div class="col-4  d-none d-md-block">კავშირი</div>
            <div class="col">მნიშვნელობა</div>
            <div class="col-1"> <i class="fa fa-pencil-square" aria-hidden="true"></i> </div>
            <div class="col-1"> <i class="fa fa-trash-o" aria-hidden="true"></i> </div>

        </div>
	    <?php foreach ( $words as $index => $word ) : ?>

        <div class="row" data-id="<?php echo $word->id ?>">
            <div class="col-1"> <?php echo ++$index ?></div>
            <div class="id editable d-none"><?php echo $word->id ?></div>
            <div class="newWord editable col "> <?php echo $word->newWord ?></div>
            <div class="assoc editable col d-none d-md-block"> <?php echo $word->assoc ?></div>
            <div class="connection editable col-4  d-none d-md-block"> <?php echo $word->connection ?></div>
            <div class="meaning editable col"> <?php echo $word->meaning ?></div>

            <div class="col-1">
                <a class="edit" href="<?php echo site_url() . '/edit/' . $word->id ?>">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                </a></div>
            <div class="col-1">
                <a class="delete" href="<?php echo site_url() . '/delete/' . $word->id ?>">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
            </div>

        </div>
	    <?php endforeach; ?>

        </div>
<?php $this->load->view('add-word')?>


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