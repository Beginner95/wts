<!DOCTYPE html>
<html lang="ru">
<head>
    <title>
        WayToStart Главная
    </title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<!-- header -->
@yield('header')
<!-- header -->

<!-- page_header -->
<section class="page_header page_header-index text_center center">
    <h1 class='page_name'>
        Cоздание и продвижение сайтов
    </h1>
    <p class="page_description">
        83% наших клиентов обращаются к нам повторно на протяжении многих лет
    </p>
</section>
<!-- page_header -->

<!-- portofio_block -->
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
            <li><a href="#">
                    Лендинги
                </a></li>
            <li><a href="#">
                    Корпоративные сайты
                </a></li>
            <li><a href="#">
                    Интернет-магазины
                </a></li>
            <li><a href="#">
                    Онлайн-сервисы
                </a></li>
            <li><a href="#">
                    Мобильные приложения
                </a></li>
        </ul>
    </aside>
    <article class='section_content'>
        <figure class="section_item">
            <picture class="section_item-img">
                <source srcset='img/portfolio_img-1.webp' type='image/webp'>
                <img src="img/portfolio_img-1.jpg" alt="">
            </picture>
            <p class="section_item-type">
                Корпоративный сайт
            </p>
            <div class="section_item-info">
                <time class="section_item-year">
                    2020
                </time>
                <h3 class="section_item-name">
                    CTIG
                </h3>
                <p class="section_item-description">
                    Услуги по международной перевозке грузов
                </p>
            </div>
        </figure>
        <figure class="section_item">
            <picture class="section_item-img">
                <source srcset='img/portfolio_img-2.webp' type='image/webp'>
                <img src="img/portfolio_img-2.jpg" alt="">
            </picture>
            <p class="section_item-type">
                Онлайн-сервис
            </p>
            <div class="section_item-info">
                <time class="section_item-year">
                    2020
                </time>
                <h3 class="section_item-name">
                    FRESH & FREE
                </h3>
                <p class="section_item-description">
                    Натуральные продукты
                    для здоровго образа жизни
                </p>
            </div>
        </figure>
        <figure class="section_item">
            <picture class="section_item-img">
                <source srcset='img/portfolio_img-3.webp' type='image/webp'>
                <img src="img/portfolio_img-3.jpg" alt="">
            </picture>
            <p class="section_item-type">
                Интернет-магазин
            </p>
            <div class="section_item-info">
                <time class="section_item-year">
                    2019
                </time>
                <h3 class="section_item-name">
                    STOLICHNAYA VODKA
                </h3>
                <p class="section_item-description">
                    Витрина самой знаменитой российской водочной компании
                </p>
            </div>
        </figure>
        <figure class="section_item">
            <picture class="section_item-img">
                <source srcset='img/portfolio_img-4.webp' type='image/webp'>
                <img src="img/portfolio_img-4.jpg" alt="">
            </picture>
            <p class="section_item-type">
                Лендинг
            </p>
            <div class="section_item-info">
                <time class="section_item-year">
                    2019
                </time>
                <h3 class="section_item-name">
                    СОГАЗ — МЕДСЕРВИС
                </h3>
                <p class="section_item-description">
                    Крупнейшая сервисная компания медицинских услуг
                </p>
            </div>
        </figure>
        <figure class="section_item">
            <picture class="section_item-img">
                <source srcset='img/portfolio_img-5.webp' type='image/webp'>
                <img src="img/portfolio_img-5.jpg" alt="">
            </picture>
            <p class="section_item-type">
                Интернет-магазин + Лендинг
            </p>
            <div class="section_item-info">
                <time class="section_item-year">
                    2019
                </time>
                <h3 class="section_item-name">
                    СПАССКИЙ
                </h3>
                <p class="section_item-description">
                    Изготовитель специй и приправ для ежедневного использования
                </p>
            </div>
        </figure>
    </article>
    <a href="#" class="btn btn-filled mobile_btn">
        Все работы
    </a>
</section>
<!-- portofio_block -->

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

<!-- page_header -->
<section class="page_header text_center center">
    <h2 class='page_name'>
        Остались вопросы?
    </h2>
    <p class="page_description text_center">
        Напишите нам и мы постараемся ответить на любой ваш вопрос
    </p>
</section>
<!-- page_header -->

<!-- contact_form -->
<form class="contact_form center">
    <label class="input_wrap">
        <input type="text" name="name" class="input">
        <span class="input_label">
				Имя
			</span>
    </label>
    <label class="input_wrap">
        <input type="tel" name="phone" class="input">
        <span class="input_label">
				Телефон
			</span>
    </label>
    <label class="input_wrap">
        <input type="email" name="email" class="input">
        <span class="input_label">
				Почта
			</span>
    </label>
    <label class="input_wrap input_wrap-wide">
        <textarea rows="3" name="comment" class="input"></textarea>
        <span class="input_label">
				Сообщение
			</span>
    </label>
    <label class="input_wrap input_wrap-file input_wrap-wide">
        <input type="file" name="file" class='visually_hidden'>
        <span class="input_label btn-filled">
				📎 Прикрепить файл
			</span>
    </label>
    <button class="btn btn-filled input_wrap-wide">
        Отправить
    </button>
    <p class="input_wrap-wide policy text_center">
        Нажимая на кнопку «Отправить», вы соглашаетесь с <a href="#">политикой конфиденциальности</a>
    </p>
</form>
<!-- contact_form -->

<!-- footer -->
<footer class="footer center">
    <div class="footer_contacts">
        <a href="#" class="btn btn-bordered">
            info@waytostart.ru
        </a>
        <a href="#" class="btn btn-bordered address_link">
            Москва, Цветной бульвар, 7-11
        </a>
        <a href="#" class="btn btn-filled">
            +7 (499) 372 - 27 - 02
        </a>
        <a href="#" class="btn btn-bordered">
            IG
        </a>
        <a href="#" class="btn btn-bordered">
            FB
        </a>
        <a href="#" class="btn btn-bordered">
            VK
        </a>
        <a href="#" class="btn btn-bordered">
            TG
        </a>
        <a href="#" class="btn btn-bordered">
            WA
        </a>
        <a href="#" class="btn btn-bordered">
            ZEN
        </a>
    </div>
    <ul class="footer_nav d-flex">
        <li><a href="#">
                Портфолио
            </a></li>
        <li><a href="#">
                Услуги
            </a></li>
        <li><a href="#">
                О нас
            </a></li>
        <li><a href="#">
                Блог
            </a></li>
        <li><a href="#">
                Отзывы
            </a></li>
        <li><a href="#">
                Вакансии
            </a></li>
        <li><a href="#">
                Контакты
            </a></li>
    </ul>
    <a href="#" class="btn btn-bordered goTop">
        ↑ Наверх
    </a>
    <div class="copyright">
        WAYTOSTART.RU • 2020
    </div>
</footer>
<!-- footer -->

<!-- modals -->
<div class="modal center">
    <div class="section_header d-flex">
        <div class='section_header-item'>
            <h3 class='page_name'>
                Заявка
            </h3>
            <p class="page_description">
                Напишите нам и мы постараемся ответить на любой ваш вопрос
            </p>
        </div>
        <button class="btn btn-filled hide_modal">
            Свернуть
        </button>
    </div>
    <form class="contact_form">
        <label class="input_wrap">
            <input type="text" name="name" class="input">
            <span class="input_label">
					Имя
				</span>
        </label>
        <label class="input_wrap">
            <input type="tel" name="phone" class="input">
            <span class="input_label">
					Телефон
				</span>
        </label>
        <!-- <label class="input_wrap">
            <input type="email" name="email" class="input">
            <span class="input_label">
                Почта
            </span>
        </label> -->
        <label class="input_wrap input_wrap-wide">
            <textarea rows="3" name="comment" class="input"></textarea>
            <span class="input_label">
					Сообщение
				</span>
        </label>
        <label class="input_wrap input_wrap-file input_wrap-wide">
            <input type="file" name="file" class='visually_hidden'>
            <span class="input_label">
					📎 Прикрепить файл
				</span>
        </label>
        <button class="btn btn-filled input_wrap-wide">
            Отправить
        </button>
        <p class="input_wrap-wide policy text_center">
            Нажимая на кнопку «Отправить», вы соглашаетесь с <a href="#">политикой конфиденциальности</a>
        </p>
    </form>
</div>
<!-- modals -->

<!-- scripts -->
<script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous">
</script> <!-- jQuery -->

<script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    function slidersInit() {
        $('.section_content').slick({
            slidesToShow: 1,
            mobileFirst: true,
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

<!-- <input type="phone" required="" pattern="7[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}"> -->