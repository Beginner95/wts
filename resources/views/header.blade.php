<header class="header center d-flex">
    <a href="index.html" class="logo">
        <img src="img/logo.svg" alt="">
    </a>
    <nav class="d-flex">
        @if ($menu)
            <ul class="nav d-flex">
                @include('customMenuItems', ['items' => $menu->roots()])
            </ul>
        @endif
        <div class="header_btns d-flex">
            <a href="mailto:info@waytostart.ru" class="btn btn-bordered">info@waytostart.ru</a>
            <a href="tel:+74993722702" class="btn btn-filled">+7 (499) 372 - 27 - 02</a>
        </div>
        <div class="lang_links">
            <a href="#" class="lang_links-item active">ENG</a>
            <a href="#" class="lang_links-item">РУС</a>
        </div>
    </nav>
    <a href="tel:+74993722702" class="mobile_phone">+7 (499) 372 - 27 - 02</a>
    <button class="nav_btn">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>