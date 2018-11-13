<!-- <nav class="navbar navbar-expand-lg navbar-dark sticky-top ">

    <a class="logo navbar-brand" href="<?= base_url();  ?>">
        
    </a>

    <?php if ($this->uri->segment(1,'no') != "details") :  ?>
        <div class="form-inline" id="search">
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


<!--           -->
<!--          <li class="nav-item">-->
<!--                <a class="nav-link" aria-disabled="disabled" href="--><?//= site_url('migrate')?><!--">Migrate</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="--><?///*= site_url('import') */?><!--">import words</a>-->
<!--            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Lang
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?= site_url('welcome/setLang/georgian')  ?>">ქართული</a>
                    <a class="dropdown-item" href="<?= site_url('welcome/setLang/english')  ?>">English</a>
                </div>
<<<<<<< HEAD
            </li>-->
      <!-- </ul> -->
    <!-- </div> -->

<!-- </nav> -->








=======
            </li>
        </ul>
    </div>
>>>>>>> 3133bf639a1bf853eb57a2e932f599d37470dce2





<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
    <a class="navbar-brand logo" href="#">
        <img src="../assets/images/logo/logo.png" width="30" alt="">    
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
        <!-- Navigation menu -->
    </ul>

    <form class="form-inline my-2 my-lg-0" id="search">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    </form>
    </div>
</div>
</nav>