/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


$(document).on('click', '.sidebar-steps_list-link', function(event){
    event.preventDefault();
    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top - 100
    }, 700);
    $('.sidebar-steps_list-link').removeClass('active');
});

function clickHandler(e) {
    if (e.target.classList.contains('nav_btn')) {
        e.target.classList.toggle('active');
        document.querySelector('nav').classList.toggle('active');
    }
    if (e.target.classList.contains('services_item-toggler')) {
        e.target.parentNode.parentNode.classList.toggle('services_item-active');
    }
    if (e.target.classList.contains('show_modal')) {
        document.querySelector('.modal').classList.add('modal-active');
    }
    if (e.target.classList.contains('hide_modal')) {
        document.querySelector('.modal-active').classList.remove('modal-active');
    }
    if (e.target.classList.contains('filter_toggler')) {
        if (e.target.innerText == 'Фильтрация') {
            e.target.innerText = 'Скрыть';
        }
        else if (e.target.innerText == 'Скрыть') {
            e.target.innerText = 'Фильтрация';
        }
        document.querySelector('.filters_wrap').classList.toggle('filters_wrap-active');
    }
    if (e.target.classList.contains('radio_bg') && e.target.previousElementSibling.value == 'dark_bg') {
        document.querySelector('.post_content').classList.add('dark_mode');
    }
    if (e.target.classList.contains('radio_bg') && e.target.previousElementSibling.value == 'white_bg') {
        document.querySelector('.post_content').classList.remove('dark_mode');
    }
    if (e.target.classList.contains('sidebar-steps_list-link')) {

        e.target.classList.add('active');
    }
    if (e.target.classList.contains('show_text')) {
        if (e.target.previousElementSibling.classList.contains('text_block-showed')) {
            e.target.innerText = 'Развернуть текст';
            e.target.previousElementSibling.classList.remove('text_block-showed')
        }
        else {
            e.target.innerText = 'Свернуть текст';
            e.target.previousElementSibling.classList.add('text_block-showed');
            var timeout = setTimeout(function (){
                e.target.previousElementSibling.style.maxHeight = 'auto';
            },500)
        }
    }
    if (e.target.classList.contains('show_second_lvl')) {
        e.target.nextElementSibling.classList.toggle('active');
        e.target.classList.toggle('active');
    }

    if (e.target.classList.contains('load_more_blog')) {
        let _token = $('input[name="_token"]').val();
        let article_id = $('.load_more_blog').attr('data-article-id');
        load_more_blog(article_id, _token);
    }
}

document.addEventListener('click', clickHandler);

function scrollHandler(e) {
    if (document.querySelector('.trigger')) {
        var trigger = document.querySelector('.trigger');
        var fixer = document.querySelector('.target');
        if (trigger.getBoundingClientRect().top < 0) {
            var heightBlock = window.getComputedStyle(fixer).height;
            var heightWrap = window.getComputedStyle(trigger).height;
            var distanceToTop = trigger.getBoundingClientRect().top * -1 + 150;
            var distanceToBottom = parseInt(heightWrap) - parseInt(heightBlock) - parseInt(distanceToTop);
            if (distanceToBottom <= 50 ) {
                fixer.style.top = 'unset';
                fixer.style.bottom = '50px';
            }
            else {
                fixer.style.top = distanceToTop + 'px'; // задаем положение блок сверху
                fixer.style.bottom = 'unset';
            }

        }
        else {
            fixer.style.top = 0;
        }
    }

    document.querySelectorAll('.section_name-step').forEach(function(item){
        if (item.getBoundingClientRect().top <= 150 ) {
            document.querySelectorAll('.sidebar-steps_list-link').forEach(function(link) {
                link.classList.remove('active');
                if (link.getAttribute('href').slice(1) == item.id) {
                    link.classList.add('active');
                }
            })
        } else {

        }
    })
}

document.addEventListener('scroll', scrollHandler);


function load_more_blog(id, _token) {
    $.ajax({
        url:"/blog/load-more",
        method: "POST",
        data:{id:id, _token:_token},
        success:function (data) {
            $('.more-content-blog').append(data);
            $('.load_more_blog').attr('data-article-id', $('input[name="last-id"]').val());
            $('input[name="last-id"]').remove();
        }
    })
}