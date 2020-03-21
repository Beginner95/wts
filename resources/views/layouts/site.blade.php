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


@yield('header')

@yield('content')

@include('footer')

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