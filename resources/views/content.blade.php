<!--block portfolio-->
<section class="portofio_block center d-flex">
    <h2 class='visually_hidden'>Портфолио</h2>
    <aside class='section_sidebar section_sidebar-index'>
        <button class="btn btn-bordered show_modal">
            Заказать
        </button>
        <h3 class='section_heading'>
            Портфолио
        </h3>
        <p class="section_description">
            Cоздаем лучшие digital-проекты, которые аномально эффективны
            и полезны
        </p>
        <ul class="portfolio_nav">
            <li><a href="#">Лендинги</a></li>
            <li><a href="#">Корпоративные сайты</a></li>
            <li><a href="#">Интернет-магазины</a></li>
            <li><a href="#">Онлайн-сервисы</a></li>
            <li><a href="#">Мобильные приложения</a></li>
        </ul>
    </aside>
    @if ($portfolios && count($portfolios) > 0)
    <article class='section_content'>
        @foreach ($portfolios as $portfolio)
            <figure class="section_item">
                <picture class="section_item-img">
                    <source srcset="/images/{{ $portfolio->image }}" type='image/webp'>
                    <a href="{{ route('portfolio.show', ['slug' => $portfolio->slug]) }}">
                        <img src="/images/{{ $portfolio->image }}" alt="">
                    </a>
                </picture>
                <p class="section_item-type">$portfolio->category->type</p>
                <div class="section_item-info">
                    <time class="section_item-year">{{ $portfolio->year }}</time>
                    <h3 class="section_item-name">{{ $portfolio->name }}</h3>
                    <p class="section_item-description">{{ $portfolio->description }}</p>
                </div>
            </figure>
        @endforeach
    </article>
    @endif
    <a href="#" class="btn btn-filled mobile_btn">
        Все работы
    </a>
</section>
<!--End portfolio block-->


<!-- blog_block -->
<section class="blog_block center d-flex">
    <h2 class='visually_hidden'>Блог</h2>
    <aside class='section_sidebar'>
        <h3 class='section_heading'>
            Наш блог
        </h3>
        <p class="section_description">
            Делимся новостями компании,
            а также статьями и кейсами которые будут полезны
        </p>
        <ul class="media_links">
            <li>Популярные издания о нас:</li>
            <li><a href="#" class='btn btn-bordered d-flex'>
                    <img src="img/vc.ru-logo.png" alt='vc.ru'>
                    <span>
						VC.RU
					</span>
                </a></li>
            <li><a href="#" class='btn btn-bordered d-flex'>
                    <img src="img/cossas-logo.png" alt='cossa'>
                    <span>
						cossa
					</span>
                </a></li>
            <li><a href="#" class='btn btn-bordered d-flex'>
                    <img src="img/RBK_logo.png" alt="rbk">
                    <span>
						РБК
					</span>
                </a></li>
        </ul>
        <button class="btn btn-bordered">
            Ещё
        </button>
    </aside>
    <article class='section_content'>
        <figure class="section_item">
            <picture class="section_item-img">
                <source srcset='img/blog_img-1.webp' type='image/webp'>
                <img src="img/blog_img-1.jpg" alt="">
            </picture>
            <p class="section_item-type">
                Мобильная разработка
            </p>
            <h3 class="section_item-name">
                Мобильные приложения: <br>
                как и где заказать
            </h3>
            <p class="section_item-description">
                Бизнес стремительно переходит в смартфоны: это тенденция стала особенно заметной в последние пару лет
            </p>
        </figure>
        <figure class="section_item">
            <picture class="section_item-img">
                <source srcset='img/blog_img-2.webp' type='image/webp'>
                <img src="img/blog_img-2.jpg" alt="">
            </picture>
            <p class="section_item-type">
                Наша компания
            </p>
            <h3 class="section_item-name">
                Почему большинство онлайн-проектов
                так и не запускается?
            </h3>
            <p class="section_item-description">
                Статья Олега Шевцова о том, как запустить свой онлайн-сервис
                и избежать большинства ошибок
            </p>
        </figure>
        <figure class="section_item">
            <picture class="section_item-img">
                <source srcset='img/blog_img-3.webp' type='image/webp'>
                <img src="img/blog_img-3.jpg" alt="">
            </picture>
            <p class="section_item-type">
                SMM
            </p>
            <h3 class="section_item-name">
                Как оформить страницу в Инстаграм для бизнеса
            </h3>
            <p class="section_item-description">
                Подробно рассказываем об оформлении страницы для бизнеса
            </p>
        </figure>
        <figure class="section_item">
            <picture class="section_item-img">
                <source srcset='img/blog_img-4.webp' type='image/webp'>
                <img src="img/blog_img-4.jpg" alt="">
            </picture>
            <p class="section_item-type">
                SEO
            </p>
            <h3 class="section_item-name">
                Сниппет в Яндекс
                с высоким CTR
            </h3>
            <p class="section_item-description">
                Подробно рассказываем об оформлении страницы для бизнеса
            </p>

        </figure>
        <figure class="section_item section_item-download">
            <picture class="section_item-img">
                <source srcset='img/blog_img-5.webp' type='image/webp'>
                <img src="img/blog_img-5.jpg" alt="">
            </picture>
            <h3 class="section_item-name">
                Стратегия SEO-продвижения
            </h3>
            <p class="section_item-description">
                Детальное пошаговое руководство, собранное за годы работы студии
            </p>
            <a href="#" download="" class="btn btn-filled btn_orange-hover">
                Скачать книгу
            </a>
        </figure>
    </article>
    <a href="#" class="btn btn-filled mobile_btn">
        Все записи
    </a>
</section>
<!-- blog_block -->

<!-- services_block -->
<section class="services_block center">
    <div class="section_header d-flex">
        <h3 class='section_heading'>
            Услуги
        </h3>
        <p class="section_description">
            Любим свое дело и всегда поможем реализовать самую оригинальную идею для вашего бизнеса
        </p>
    </div>
    <div class="services_list">
        <div class="services_item">
            <h3 class="services_item-name">
                <a href="#">Веб-сервисы</a>
                <button class="services_item-toggler">
                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8713 0.972632C19.7614 0.331788 20.8849 1.38411 20.3036 2.31416L11.348 16.6432C10.9563 17.2699 10.0437 17.2699 9.652 16.6432L0.696354 2.31416C0.115068 1.38411 1.23859 0.331787 2.12866 0.972632L9.91569 6.5793C10.2647 6.83059 10.7353 6.83059 11.0843 6.5793L18.8713 0.972632Z" fill="#E27A50"/>
                    </svg>
                </button>
            </h3>
            <p class="services_item-description">
                Предлагаем  удачные решения, обоснованные нашим опытом. В портфолио нашей компании более 600 сайтов, выполненных для крупных и небольших брендов
            </p>
        </div>
        <div class="services_item">
            <h3 class="services_item-name">
                <a href="#">Мобильные приложения</a>
                <button class="services_item-toggler">
                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8713 0.972632C19.7614 0.331788 20.8849 1.38411 20.3036 2.31416L11.348 16.6432C10.9563 17.2699 10.0437 17.2699 9.652 16.6432L0.696354 2.31416C0.115068 1.38411 1.23859 0.331787 2.12866 0.972632L9.91569 6.5793C10.2647 6.83059 10.7353 6.83059 11.0843 6.5793L18.8713 0.972632Z" fill="#E27A50"/>
                    </svg>
                </button>
            </h3>
            <p class="services_item-description">
                Разрабатываем приложения для Android и iOS любой сложности от корпоративного решения
                до социальных сетей и мессенджеров, а так же любого типа: гибридные и нативные
            </p>
        </div>
        <div class="services_item">
            <h3 class="services_item-name">
                <a href="#">Брендинг и фирменный стиль</a>
                <button class="services_item-toggler">
                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8713 0.972632C19.7614 0.331788 20.8849 1.38411 20.3036 2.31416L11.348 16.6432C10.9563 17.2699 10.0437 17.2699 9.652 16.6432L0.696354 2.31416C0.115068 1.38411 1.23859 0.331787 2.12866 0.972632L9.91569 6.5793C10.2647 6.83059 10.7353 6.83059 11.0843 6.5793L18.8713 0.972632Z" fill="#E27A50"/>
                    </svg>
                </button>
            </h3>
            <p class="services_item-description">
                Формируем образ вашего бренда в глазах потребителя. За счет правильного позиционирования, мы помогаем компании
                стать лидером в своей сфере
            </p>
        </div>
        <div class="services_item">
            <h3 class="services_item-name">
                <a href="#">SEO-продвижение︎</a>
                <button class="services_item-toggler">
                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8713 0.972632C19.7614 0.331788 20.8849 1.38411 20.3036 2.31416L11.348 16.6432C10.9563 17.2699 10.0437 17.2699 9.652 16.6432L0.696354 2.31416C0.115068 1.38411 1.23859 0.331787 2.12866 0.972632L9.91569 6.5793C10.2647 6.83059 10.7353 6.83059 11.0843 6.5793L18.8713 0.972632Z" fill="#E27A50"/>
                    </svg>
                </button>
            </h3>
            <p class="services_item-description">
                Помогаем сотням компаний с продвижением сайта, используя инновационный подход, основанный на удобной структуре, продающем контенте и грамотной оптимизации
            </p>
        </div>
        <div class="services_item">
            <h3 class="services_item-name">
                <a href="#">Контекстная реклама</a>
                <button class="services_item-toggler">
                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8713 0.972632C19.7614 0.331788 20.8849 1.38411 20.3036 2.31416L11.348 16.6432C10.9563 17.2699 10.0437 17.2699 9.652 16.6432L0.696354 2.31416C0.115068 1.38411 1.23859 0.331787 2.12866 0.972632L9.91569 6.5793C10.2647 6.83059 10.7353 6.83059 11.0843 6.5793L18.8713 0.972632Z" fill="#E27A50"/>
                    </svg>
                </button>
            </h3>
            <p class="services_item-description">
                Опытные сертифицированные специалисты по настройке контекстной рекламы в Яндекс.Директ
                и Google Adwords, которые cделают рекламу эффективной и успешной
            </p>
        </div>
        <div class="services_item">
            <h3 class="services_item-name">
                <a href="#">Телеграм-боты</a>
                <button class="services_item-toggler">
                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8713 0.972632C19.7614 0.331788 20.8849 1.38411 20.3036 2.31416L11.348 16.6432C10.9563 17.2699 10.0437 17.2699 9.652 16.6432L0.696354 2.31416C0.115068 1.38411 1.23859 0.331787 2.12866 0.972632L9.91569 6.5793C10.2647 6.83059 10.7353 6.83059 11.0843 6.5793L18.8713 0.972632Z" fill="#E27A50"/>
                    </svg>
                </button>
            </h3>
            <p class="services_item-description">
                Повышаем эффективность вашего бизнеса
                и снижаем дополнительные затраты на поддержку клиентов. Наши боты умеют отвечать на вопросы клиентов, выставлять счета и многое другое
            </p>
        </div>
        <div class="services_item services_item-text">
            Скачать наше приложение:
        </div>
        <div class="services_item services_item-link">
            <a href="#">
                <img src="img/appstore-logo.png" alt="#">
            </a>
        </div>
        <div class="services_item services_item-link">
            <a href="#">
                <img src="img/googleplay-logo.png" alt="#">
            </a>
        </div>
        <div class="services_item text_center">
            <a href="#">
                🚀 Познакомиться с командой
            </a>
        </div>
    </div>
</section>
<!-- services_block -->