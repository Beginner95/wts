@csrf
<div class="section_header section_header-portfolio center d-flex">
    <div class='section_header-item'>
        <h3 class='page_name'>Портфолио</h3>
        <p class="page_description">Мы создаем лучшие digital-проекты, которые аномально эффективны и полезны, а не просто выглядят отлично</p>
    </div>
    <button class="btn btn-filled filter_toggler">Фильтрация</button>
</div>

@php
    if(Request::get('sort') === 'asc') {
        $dateFilter = !empty(Request::get('filterStack') ) ? '&filterStack=' . Request::get('filterStack') : '';
        $sort = '?sort=desc' . $dateFilter;
        $txtDesc = 'Сначала новые';
        $param = '?sort=asc&filterStack=';
    } elseif (Request::get('sort') === 'desc') {
        $dateFilter = !empty(Request::get('filterStack') ) ? '&filterStack=' . Request::get('filterStack') : '';
        $sort = '?sort=asc' . $dateFilter;
        $txtDesc = 'Сначала старые';
        $param = '?sort=desc&filterStack=';
    } elseif (Request::get('filterStack') != '') {
        $dataSort = !empty(Request::get('sort')) ? '&sort=' . Request::get('sort') : '&sort=asc';
        $txtDesc = 'Сначала старые';
        $sort = '?filterStack=' . Request::get('filterStack') . $dataSort;
        $param = '?filterStack=' . Request::get('filterStack');
    } else {
        $txtDesc = 'Сначала старые';
        $sort = '?sort=asc';
        $param = '?filterStack=';
    }
@endphp
<div class="filters_wrap center d-flex">
    <div class="filters_stack_wrap">
        @if($stacks['mobiles'])
            <ul class="filters_stack-item filters_stack-mob d-flex">
                <li><a href="#">Мобильные приложения:</a></li>
                @foreach($stacks['mobiles'] as $mobile)
                    <li>
                        <a
                            href="/portfolio{{ $param . $mobile->slug }}" class='btn btn-bordered'>
                            <img src="img/stack/{{ $mobile->icon }}" alt="{{ $mobile->name }}">
                            <span>{{ $mobile->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
        @if($stacks['cms'])
            <ul class="filters_stack-item">
                <li><a href="#">CMS:</a></li>
                @foreach($stacks['cms'] as $cms)
                    <li>
                        <a href="/portfolio{{ $param . $cms->slug }}" class='btn btn-bordered'>
                            <img src="img/stack/{{ $cms->icon }}" alt="{{ $cms->name }}">
                            <span>{{ $cms->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
        @if($stacks['frontends'])
            <ul class="filters_stack-item">
                <li><a href="#">Front end:</a></li>
                @foreach($stacks['frontends'] as $frontend)
                    <li>
                        <a href="/portfolio{{ $param . $frontend->slug }}" class='btn btn-bordered'>
                            <img src="img/stack/{{ $frontend->icon }}" alt="{{ $frontend->name }}">
                            <span>{{ $frontend->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
        @if($stacks['backends'])
            <ul class="filters_stack-item">
                <li><a href="#">Back end:</a></li>
                @foreach($stacks['backends'] as $backend)
                    <li>
                        <a href="/portfolio{{ $param . $backend->slug }}" class='btn btn-bordered'>
                            <img src="img/stack/{{ $backend->icon }}" alt="{{ $backend->name }}">
                            <span>{{ $backend->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
        @if($stacks['frameworks'])
            <ul class="filters_stack-item">
                <li><a href="#">Фреймворки:</a></li>
                @foreach($stacks['frameworks'] as $framework)
                    <li>
                        <a href="/portfolio{{ $param . $framework->slug }}" class='btn btn-bordered'>
                            <img src="img/stack/{{ $framework->icon }}" alt="{{ $framework->name }}">
                            <span>{{ $framework->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
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
                            <p class="section_item-type">
                                @if($selectedWork->categories)
                                    @foreach($selectedWork->categories as $category)
                                        <span class="icon-plus">{{ $selectedWork->name }}</span>
                                    @endforeach
                                @endif
                            </p>
                            <p class="section_item-stack">
                                @if($selectedWork->stacks)
                                    @foreach($selectedWork->stacks as $stack)
                                        <span class="icon-plus">{{ $stack->name }}</span>
                                    @endforeach
                                @endif
                            </p>
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
                <a href="/portfolio{{ $sort }}" class="btn btn-bordered filter_date">{{ $txtDesc }}</a>
            </div>
        </div>
        <div class="all_projects_wrap load-more-works">
            @foreach($portfolios as $portfolio)
                <figure class="section_item">
                    <picture class="section_item-img">
                        <source srcset='img/portfolio_img-1.webp' type='image/webp'>
                        <img src="img/portfolio_img-1.jpg" alt="">
                    </picture>
                    <div class="d-flex section_item-top">
                        <p class="section_item-type">
                            @if($portfolio->categories)
                                @foreach($portfolio->categories as $category)
                                    <span class="icon-plus">{{ $category->name }}</span>
                                @endforeach
                            @endif
                        </p>
                        <p class="section_item-stack">
                            @if($portfolio->stacks)
                                @foreach($portfolio->stacks as $stack)
                                    <span class="icon-plus">{{ $stack->name }}</span>
                                @endforeach
                            @endif
                        </p>
                    </div>
                    <div class="section_item-info">
                        <time class="section_item-year">{{ $portfolio->year }}</time>
                        <h3 class="section_item-name">{{ $portfolio->name }}</h3>
                        <p class="section_item-description">{{ $portfolio->description }}</p>
                    </div>
                </figure>
            @endforeach
        </div>
        <button
                class="btn btn-filled load_more_works"
                data-work-id="{{ $portfolio->id }}">
            Загрузить ещё
        </button>
    </section>
@endif