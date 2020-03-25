<!-- post -->
<section class="post center">
    <div class="post_content dark_mode">
        <figure class="section_item">
            <picture class="section_item-img">
                <source srcset='/images/{{ $article->detail_cover }}' type='image/webp'>
                <img src="/images/{{ $article->detail_cover }}" alt="">
            </picture>
            <p class="section_item-type">{{ $article->category->category }}</p>
            <h3 class="section_item-name">{{ $article->title }}</h3>
            <p class="section_item-post_info">
                <span>Чтение: {{ $readingTime }} мин</span>
                ・
                <span>{{ Date::parse($article->created_at)->format('j F Y г.') }}</span>
            </p>
        </figure>
        <aside class="post_content-sidebar_left">
            <div class="theame_choose d-flex">
					<span class='post_content-sidebar_heading'>
						Фон:
					</span>
                <label class="radio_wrap">
                    <input type="radio" value="dark_bg" name='post_theame' class='visually_hidden' checked="">
                    <span class="radio_bg"></span>
                </label>
                <label class="radio_wrap">
                    <input type="radio" value="white_bg" name='post_theame' class='visually_hidden'>
                    <span class="radio_bg"></span>
                </label>
            </div>
            <ul class="share_list">
                <li>
                    <button class="share_btn">
                        <img src="img/clap.png" alt="#">
                        <span class="share_counter">{{ $article->claps }}</span>
                    </button>
                </li>
            </ul>
        </aside>
        <article class='text_block'>
            {!! $article->body !!}
        </article>
        <button class="btn btn-filled show_text">
            Развернуть текст
        </button>
        <aside class="post_content-sidebar_right">
				<span class='post_content-sidebar_heading'>
					Оглавление:
				</span>
            <ul class="post_nav">
                @if ($headings)
                    @foreach($headings as $heading)
                        <li><a href="#{{$heading}}">{{ $heading }}</a></li>
                    @endforeach
                @endif
            </ul>
        </aside>
    </div>
</section>
<!-- post -->

<section class="similar center">
    <h3 class="section_subeading">
        Статьи в той же тематике
    </h3>
    <div class="similar_wrap section_content">
        @if($topicArticles)
            @foreach ($topicArticles as $topicArticle)
                <a href="{{ route('blog.show', ['slug' => $topicArticle->slug]) }}" class="section_item-wrap_link">
                    <figure class="section_item">
                        <picture class="section_item-img">
                            <source srcset='/images/{{ $topicArticle->main_cover }}' type='image/webp'>
                            <img src="/images/{{ $topicArticle->main_cover }}" alt="">
                        </picture>
                        <p class="section_item-type">{{ $topicArticle->category->category }}</p>
                        <h3 class="section_item-name">{{ $topicArticle->title }}</h3>
                        <p class="section_item-description">{{ $topicArticle->short_desc }}</p>
                    </figure>
                </a>
            @endforeach
        @endif
    </div>
</section>
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
        $('.similar_wrap').slick({
            slidesToShow: 1,
            mobileFirst: true,
            slidesToShow: 1,
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
</body>
</html>
