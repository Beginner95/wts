<!-- page_header -->
<div class="section_header section_header-reviews center d-flex">
    <div class='section_header-item'>
        <h3 class='page_name'>
            Блог
        </h3>
    </div>
    <button class="btn btn-filled filter_toggler">
        Рубрикатор
    </button>
</div>
<div class="filters_wrap filters_wrap-blog center">
    <button class="btn btn-filled">Все</button>
    <button class="btn btn-bordered">Наша компания</button>
    <button class="btn btn-bordered">Веб-разработка</button>
    <button class="btn btn-bordered">Мобильная разработка</button>
    <button class="btn btn-bordered">SEO</button>
    <button class="btn btn-bordered">Клиентский сервис</button>
    <button class="btn btn-bordered">SMM</button>
    <button class="btn btn-bordered">Боты</button>
    <button class="btn btn-bordered">Дизайн</button>
    <button class="btn btn-bordered"> Маркетинг</button>
    <button class="btn btn-filled">Еще</button>
</div>
<!-- page_header -->

<!-- blog -->
<section class=" center blog">
    @if ($articles)
        <div class="blog_page section_content">
        @foreach (array_slice($articles, 0, 7) as $article)
            <figure class="section_item @if (empty($article->main_cover)) section_item-vacancy @endif">
                @if (!empty($article->main_cover))
                    <picture class="section_item-img">
                        <source srcset='images/{{ $article->main_cover }}' type='image/webp'>
                        <img src="images/{{ $article->main_cover }}" alt="">
                    </picture>
                @endif
                <p class="section_item-type">{{ $article->category->category }}</p>
                <h3 class="section_item-name">{{ $article->title }}</h3>
                <p class="section_item-description">{{ $article->short_desc }}</p>
            </figure>
        @endforeach
        </div>
    @endif


    <div class="blog_page section_content">
        <figure class="section_item section_item-announcement">
            <h3 class="section_item-name">
                🎉  Поздравляем наших клиентов с Новым годом!
            </h3>
        </figure>
        @if ($articles && count($articles) > 7)
            @foreach (array_slice($articles, 7, 6) as $article)
                <figure class="section_item @if (empty($article->main_cover)) section_item-vacancy @endif">
                    @if (!empty($article->main_cover))
                        <picture class="section_item-img">
                            <source srcset='images/{{ $article->main_cover }}' type='image/webp'>
                            <img src="images/{{ $article->main_cover }}" alt="">
                        </picture>
                    @endif
                    <p class="section_item-type">{{ $article->category->category }}</p>
                    <h3 class="section_item-name">{{ $article->title }}</h3>
                    <p class="section_item-description">{{ $article->short_desc }}</p>
                </figure>
            @endforeach
        @endif
    </div>

    @if ($articles && count($articles) > 13)
        <div class="blog_page section_content more-content-blog">
            @foreach (array_slice($articles, 13) as $article)
                <figure class="section_item @if (empty($article->main_cover)) section_item-vacancy @endif">
                    @if (!empty($article->main_cover))
                        <picture class="section_item-img">
                            <source srcset='images/{{ $article->main_cover }}' type='image/webp'>
                            <img src="images/{{ $article->main_cover }}" alt="">
                        </picture>
                    @endif
                    <p class="section_item-type">{{ $article->category->category }}</p>
                    <h3 class="section_item-name">{{ $article->title }}</h3>
                    <p class="section_item-description">{{ $article->short_desc }}</p>
                </figure>
            @endforeach
        </div>
        @csrf
        <button class="btn btn-filled load_more_blog" data-article-id="{{ $article->id }}">Загрузить ещё</button>
    @endif
</section>
<!-- blog -->

<!-- scripts -->
<script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous">
</script> <!-- jQuery -->
<script src="js/main.js"></script> <!-- main scripts -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    function slidersInit() {
        $('.last_projects_wrap').slick({
            slidesToShow: 1,
            mobileFirst: true,
            responsive: [
                {
                    breakpoint: 510,
                    settings: 'unslick',
                }
            ]
        });
        $('.stack').slick({
            slidesToShow: 1,
            mobileFirst: true,
            slidesToShow: 1,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 510,
                    settings: 'unslick',
                }
            ]
        });
        $('.pricelist').slick({
            slidesToShow: 1,
            mobileFirst: true,
            slidesToShow: 1,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 510,
                    settings: 'unslick',
                }
            ]
        });
    }
    window.onresize = function() {
        slidersInit()
    }
    slidersInit()
</script>
<!-- scripts -->
