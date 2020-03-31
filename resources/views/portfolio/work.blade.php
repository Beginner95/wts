<section class="center section project_header">
    <figure class="section_item">
        <picture class="section_item-img">
            <source srcset='/images/{{ config('settings.portfolio_path') . '/' . $work->image }}' type='image/webp'>
            <img src="/images/{{ config('settings.portfolio_path') . '/' . $work->image }}" alt="">
        </picture>

        <div class="d-flex section_item-top">
            <h1 class="page_name">{{ $work->name }}</h1>
            <a href="{{ $work->link }}" class="section_item-link">{{ $work->link }}</a>
        </div>
        <div class="section_item-info">
            <p class="section_item-description">{{ $work->description }}</p>
        </div>
    </figure>

    <div class="project_about">
        <h3 class="project_about-type">
            @if($work->categories)
                @foreach($work->categories as $category)
                    {{ $category->name }}
                @endforeach
            @endif
        </h3>
        @if($work->stacks)
            @foreach($work->stacks as $stack)
                <div class="btn btn-bordered">
                    <img src="img/stack/{{ $stack->icon }}" alt="#">
                    <span>{{ $stack->name }}</span>
                </div>
            @endforeach
        @endif
    </div>
</section>

<div class="center project_wrap trigger">
    <section class="section_content project_wrap_content">
        {!! $work->body !!}
    </section>
    @if($headings)
    <aside class="section_sidebar section_sidebar-project">
        <div class="target">
            <h4 class="sidebar-steps_heading">Этапы работы</h4>
            <ul class='sidebar-steps_list'>
                @foreach($headings as $heading)
                    <li>
                        <a href="#proto" class='active sidebar-steps_list-link'>{{ $heading }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </aside>
    @endif
</div>

<!-- similar -->
@if($lastWorks)
<section class="last_projects-page center">
    <h3 class="section_subeading">Последние проекты</h3>
    <div class="last_projects_wrap last_projects_wrap-page section_content">
        @foreach($lastWorks as $lastWork)
            <figure class="section_item">
                <picture class="section_item-img">
                    <source srcset='/images/{{ $lastWork->image }}' type='image/webp'>
                    <img src="/images/{{ $lastWork->image }}" alt="">
                </picture>
                <p class="section_item-type">
                    @foreach($work->categories as $category)
                        {{ $category->name }}
                    @endforeach
                </p>
                <div class="section_item-info">
                    <time class="section_item-year">{{ $lastWork->year }}</time>
                    <h3 class="section_item-name">{{ $lastWork->name }}</h3>
                    <p class="section_item-description">{{ $lastWork->description }}</p>
                </div>
            </figure>
        @endforeach
    </div>
    <a href="{{ route('portfolio.index') }}" class="btn btn-filled">Все проекты</a>
    <button class="btn btn-filled btn-filled_orange show_modal">Начать сотрудничество</button>
</section>
@endif
<!-- similar -->