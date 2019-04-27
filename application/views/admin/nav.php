<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">
    <div class="d-flex search w-100">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <img src="https://cdn.dribbble.com/users/25514/screenshots/1873731/movers-logo-design-branding-identity-ramotion.png"
                 width="30" alt="">
            <span>Learn Words</span>
        </a>

			<?php if ( $this->uri->segment( 1, 'no' ) != "details" ) : ?>
                <div class="d-flex justify-content-start">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <select class="form-control" v-model="whereSearch">
                                <option value="new_word">new word</option>
                                <option value="assoc">assoc</option>
                                <option value="connection">connection</option>
                                <option value="meaning">meaning</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" placeholder="saerch" aria-label="saerch"
                               aria-describedby="basic-addon1" v-model="wordSearch" @change="search">
                    </div>
                </div>
			<?php endif; ?>


            <div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ">

						<?php if ( $isLogged ) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url( 'logout' ) ?>">Logout <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url( 'manage' ) ?>">Admin <span class="sr-only">(current)</span></a>
                            </li>
						<?php else: ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url( 'login' ) ?>">Login <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url( 'register' ) ?>">Register <span class="sr-only">(current)</span></a>
                            </li>

						<?php endif; ?>

                        <li class="nav-item">

                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Import/Export
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?= site_url( 'import' ) ?>">import words</a>
                                <a class="dropdown-item" href="<?= site_url( 'export' ) ?>">Export words</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Sort
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a @click="sortAndOrder('new_word')" class="dropdown-item" href="#">new word</a>
                                <a @click="sortAndOrder('meaning')" class="dropdown-item" href="#">meaning</a>
                                <a @click="sortAndOrder('edited_at')" class="dropdown-item" href="#">edit date</a>
                                <a @click="sortAndOrder('created_at')" class="dropdown-item" href="#">create date</a>
                                <a @click="sortAndOrder('connection')" class="dropdown-item" href="#">connection</a>
                                <a @click="sortAndOrder('')" class="dropdown-item" href="#">assocc</a>
                            </div>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Lang
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item"
                                   href="<?= site_url( 'welcome/setLang/georgian' ) ?>">ქართული</a>
                                <a class="dropdown-item" href="<?= site_url( 'welcome/setLang/english' ) ?>">English</a>
                            </div>
                        </li>
                    </ul>
            </div> <!-- col -->
        </div> <!-- end of row -->
</nav>

<!--<div class="d-flex w-100 bg-danger">-->
<!--    <a href="#"> some link </a>-->
<!--    <div class="d-flex w-100 justify-content-start">start</div>-->
<!--    <div class="d-flex w-100 justify-content-end">end</div>-->
<!--</div>-->