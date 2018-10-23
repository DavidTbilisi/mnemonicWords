<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">

    <a class="navbar-brand" href="<?= base_url();  ?>">
        <img src="https://cdn.dribbble.com/users/25514/screenshots/1873731/movers-logo-design-branding-identity-ramotion.png"
             width="30" alt="">
        <span>Learn Words</span>
    </a>

<?php if ($this->uri->segment(1,'no') != "details") :  ?>
    <div class="form-inline">
        <input class="form-control " type="text" placeholder="Search">
    </div>
<?php endif;  ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ">

            <?php if ($isLogged) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('logout')?>">Logout <span class="sr-only">(current)</span></a>
                </li>

            <?php else:  ?>

            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('login')?>">Login <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('register')?>">Register <span class="sr-only">(current)</span></a>
            </li>

            <?php endif;  ?>


           
         <!--   <li class="nav-item">
                <a class="nav-link" aria-disabled="disabled" href="<?= site_url('migrate')?>">Migrate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?/*= site_url('import') */?>">import words</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>-->
        </ul>
    </div>

</nav>

