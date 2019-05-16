
<nav class="uk-navbar uk-navbar-container uk-margin">
    <div class="uk-navbar-left">
        <a class="uk-navbar-toggle"  uk-toggle="target: #offcanvas-nav" href="#">
            <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left" >Menu</span>
        </a>
    </div>


    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="#">Active</a></li>
            <li>
                <a href="#">Parent</a>
                <div class="uk-navbar-dropdown">
                    <p class="uk"></p>
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li><a href="#">Item</a></li>
                        <li><a href="#">Item</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#">Item</a></li>
        </ul>
    </div>
</nav>

<ul class="uk-navbar-nav uk-navbar-transparent">
    <li>
        <a href="#">a</a>
        <div class="uk-navbar-dropdown">
            <ul class="uk-nav uk-navbar-dropdown-nav">...</ul>
        </div>
    </li>
</ul>



<div id="offcanvas-nav" uk-offcanvas="overlay: true; mode: push">
    <div class="uk-offcanvas-bar">

        <ul class="uk-nav uk-nav-default">
            <li class="uk-active"><a href="#">Active</a></li>
            <li class="uk-parent">
                <a href="#">Parent</a>
                <ul class="uk-nav-sub">
                    <li><a href="#">Sub item</a></li>
                    <li><a href="#">Sub item</a></li>
                </ul>
            </li>
            <li class="uk-nav-header">Header</li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Item</a></li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Item</a></li>
            <li class="uk-nav-divider"></li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Item</a></li>
        </ul>

    </div>
</div>