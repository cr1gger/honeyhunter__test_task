<?php
/* @var $messages \app\models\Messages */
?>
<div class="dark-section">
    <div class="container container-small">
        <div class="row">
            <div class="col-md-12">
                <div class="top-logo">
                    <a href="#">
                        <img src="/static/logo1.png" alt="Logo">
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact-image">
                    <img src="/static/contact.png" alt="Contact Image">
                </div>
            </div>
        </div>
        <form id="contactForm">
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formName" class="required-field">Имя</label>
                        <input type="text" class="form-control custom-input" id="formName" name="name">
                    </div>
                    <div class="form-group">
                        <label for="formEmail" class="required-field">Email</label>
                        <input type="text" class="form-control custom-input" id="formEmail" name="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formComment" class="required-field">Комметарий</label>
                        <textarea class="form-control custom-input" id="formComment" rows="6" name="comment"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-danger custom-btn float-right">Записать</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="white-section">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="text-center">
                    <h4>Выводим комметарии</h4>
                </div>
            </div>
        </div>

        <div class="row mt-4 justify-content-center" style="padding: 0 5px;" id="messages">
            <?php foreach($messages as $message):?>
                <?=\app\widgets\Comment::widget([
                        'name' => $message->name,
                        'email' => $message->email,
                        'message' => $message->message,
                ])?>
            <?php endforeach;?>

            <?php if (!$messages):?>
                <p class="mb-5">Вы будете первым! Форма выше =)</p>
            <?php endif;?>
        </div>
    </div>
</div>

<div class="dark-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="footer-logo">
                    <a href="#">
                        <img src="/static/logo2.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6 d-flex flex-row justify-content-end">
                <a href="#">
                    <div class="social">
                        <img class="vk" src="/static/vk.svg" alt="Vk">
                    </div>
                </a>
                <a href="#">
                    <div class="social">
                        <img class="fb" src="/static/fb.svg" alt="Fb">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>