<?php 
require_once './site/header.php';
require_once './site/navigation.php';

if (!function_exists('order') || empty($_COOKIE['cart'])):
    header('Location: /');
    exit;
endif;

if (function_exists('order') && !empty($_COOKIE['cart']) && isset($_POST['send_btn'])):
    order();
endif;
?>

<div class="katalog">
    <div class="container"> 

        <div class="katalog_top">   
                <h1>Введите ваши данные</h1>
        </div>

        <div class="order_bot">
            <form method="POST">
                <p><input type="text" name="name" placeholder="Ваше имя" /></p>
                <p><input type="mail" name="email" placeholder="Ваша почта" /></p>
                <button name="send_btn">Отправить</button>
            </form>
        </div>

    </div>
</div>

<?php
require_once './site/footer.php';


