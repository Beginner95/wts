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
                <li>
                    <a href="https://vk.com/share.php?url={{ route('blog.show', ['slug' => $article->slug] )}}&title={{ $article->title }}&description={{ $article->short_desc }}&image={{route('home')}}/images/{{ $article->main_cover }}" target="_blank">
                        <button class="share_btn">
                            <svg width="20" height="9" viewBox="0 0 20 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.1024 0.599999L6.50242 9H4.16242L0.574422 0.599999H3.14242L5.42242 6.072L7.75042 0.599999H10.1024ZM14.0741 5.952L13.1861 6.9V9H10.8341V0.599999H13.1861V4.092L16.4381 0.599999H19.0541L15.6221 4.32L19.2341 9H16.4741L14.0741 5.952Z" fill="#E5E5E5"/>
                            </svg>
                        </button>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog.show', ['slug' => $article->slug]) }}" target="_blank">
                        <button class="share_btn">
                            <svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.51506 2.436V4.284H6.22306V6.12H2.51506V9H0.139063V0.599999H6.72706V2.436H2.51506ZM14.5343 4.62C15.0143 4.788 15.3903 5.052 15.6623 5.412C15.9343 5.764 16.0703 6.192 16.0703 6.696C16.0703 7.432 15.7743 8 15.1823 8.4C14.5903 8.8 13.7343 9 12.6143 9H8.07828V0.599999H12.3743C13.4463 0.599999 14.2623 0.799999 14.8223 1.2C15.3823 1.592 15.6623 2.124 15.6623 2.796C15.6623 3.196 15.5623 3.556 15.3623 3.876C15.1703 4.188 14.8943 4.436 14.5343 4.62ZM10.4303 2.316V3.936H12.0623C12.8623 3.936 13.2623 3.664 13.2623 3.12C13.2623 2.584 12.8623 2.316 12.0623 2.316H10.4303ZM12.4223 7.284C13.2543 7.284 13.6703 7 13.6703 6.432C13.6703 5.864 13.2543 5.58 12.4223 5.58H10.4303V7.284H12.4223Z" fill="#E5E5E5"/>
                            </svg>
                        </button>
                    </a>
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
