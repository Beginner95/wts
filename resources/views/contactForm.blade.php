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
<form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data" class="contact_form center">
    @csrf

    <label class="input_wrap">
        <input type="text" name="name" class="input" required>
        <span class="input_label">Имя</span>
    </label>

    <label class="input_wrap">
        <input type="tel" name="phone" class="input">
        <span class="input_label">Телефон</span>
    </label>

    <label class="input_wrap">
        <input type="email" name="email" class="input" required>
        <span class="input_label">Почта</span>
    </label>

    <label class="input_wrap input_wrap-wide">
        <textarea rows="3" name="message" class="input" required></textarea>
        <span class="input_label">Сообщение</span>
    </label>

    <label class="input_wrap input_wrap-file input_wrap-wide">
        <input type="file" name="file" class='visually_hidden' accept=".pdf, .doc, .docx, .xls, .xlsx, .txt, .ppt, .pptx">
        <span class="input_label btn-filled">📎 Прикрепить файл</span>
    </label>
    <button class="btn btn-filled input_wrap-wide">Отправить</button>
    <p class="input_wrap-wide policy text_center">
        Нажимая на кнопку «Отправить», вы соглашаетесь с <a href="#">политикой конфиденциальности</a>
    </p>
</form>