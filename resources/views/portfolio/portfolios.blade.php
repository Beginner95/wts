<div class="section_header section_header-portfolio center d-flex">
    <div class='section_header-item'>
        <h3 class='page_name'>Портфолио</h3>
        <p class="page_description">Мы создаем лучшие digital-проекты, которые аномально эффективны и полезны, а не просто выглядят отлично</p>
    </div>
</div>

@if($selectedWorks)
    <section class="favorites_projects center">
        <h3 class='section_name text_center'>🔥 Избранные проекты</h3>
            <div class="favorites_projects_wrap section_content">
                @foreach($selectedWorks as $selectedWork)
                    <figure class="section_item">
                        <picture class="section_item-img">
                            <source srcset='/images/{{ $selectedWork->image }}' type='image/webp'>
                            <img src="/images/{{ $selectedWork->image }}" alt="">
                        </picture>
                        <div class="d-flex section_item-top">
                            <p class="section_item-type">Онлайн-сервис + Приложение</p>
                            <p class="section_item-stack">Laravel + React.js + Python</p>
                        </div>
                        <div class="section_item-info">
                            <time class="section_item-year">{{ $selectedWork->year }}</time>
                            <h3 class="section_item-name">{{ $selectedWork->name }}</h3>
                            <p class="section_item-description">{{ $selectedWork->description }}</p>
                        </div>
                    </figure>
                @endforeach
            </div>
    </section>
@endif

@if($portfolios)
    <section class="all_projects center">
        <div class="section_header d-flex">
            <div class='section_header-item'>
                <h3 class='section_name'>Все работы</h3>
            </div>
            <div class="filter_wrap d-flex">
                <p class="filter_wrap-label">По дате:</p>
                <button class="btn btn-bordered filter_date">Сначала новые</button>
            </div>
        </div>
        <div class="all_projects_wrap">
            @foreach($portfolios as $portfolio)
                <figure class="section_item">
                    <picture class="section_item-img">
                        <source srcset='img/portfolio_img-1.webp' type='image/webp'>
                        <img src="img/portfolio_img-1.jpg" alt="">
                    </picture>
                    <div class="d-flex section_item-top">
                        <p class="section_item-type">Онлайн-сервис + Приложение</p>
                        <p class="section_item-stack">Laravel + React.js + Python</p>
                    </div>
                    <div class="section_item-info">
                        <time class="section_item-year">{{ $portfolio->year }}</time>
                        <h3 class="section_item-name">{{ $portfolio->name }}</h3>
                        <p class="section_item-description">{{ $portfolio->description }}</p>
                    </div>
                </figure>
            @endforeach
        </div>
        <button class="btn btn-filled load_more">
            Загрузить ещё
        </button>
    </section>
@endif