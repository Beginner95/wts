<header class="header center d-flex">
    <a href="/" class="logo">
        <img src="/img/logo.svg" alt="">
    </a>
    <nav class="d-flex">
        @if ($menu)
            <ul class="nav d-flex">
                @include('customMenuItems', ['items' => $menu->roots()])
            </ul>
        @endif
        <div class="header_btns d-flex">
            @if ($contacts)
                <a href="mailto:{{ $contacts[0]->email }}" class="btn btn-bordered">{{ $contacts[0]->email }}</a>
                <a href="tel:{{ $contacts[0]->phone }}" class="btn btn-filled">{{ $contacts[0]->phone }}</a>
            @endif
        </div>
        <div class="lang_links">
            <a href="#" class="lang_links-item active">ENG</a>
            <a href="#" class="lang_links-item">РУС</a>
        </div>
    </nav>
    <a href="tel:{{ $contacts[0]->phone }}" class="mobile_phone">{{ $contacts[0]->phone }}</a>
    <button class="nav_btn">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>