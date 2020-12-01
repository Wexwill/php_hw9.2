<?php 
require_once './site/header.php';
require_once './site/navigation.php';

if (!function_exists('showCart') || empty($_COOKIE['cart']) || !isset($_SESSION['auth'])):
    header('Location: /');
    exit;
endif;

if (function_exists('cartClear') && isset($_POST['cart_clear'])):
    cartClear();
endif;

?>

<div class="katalog">
    <div class="container"> 

        <div class="katalog_top">   
            <h1>Корзина товаров</h1>
        </div>

        <div class="cart_bot">
            <form method="POST">

            <?php 
            if (function_exists('showCart') && !empty($_COOKIE['cart'])):
                showCart();   
            endif;
            ?>

            </form>
        </div>


    </div>
</div>


<?php
require_once './site/footer.php';


