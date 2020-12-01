<?php 
require_once './site/header.php';
require_once './site/navigation.php';
require_once './classes/Users.php';
require_once './classes/Authorization.php';


if (isset($_POST['user_name']) && isset($_POST['user_phone']) && isset($_POST['user_email']) && isset($_POST['user_pass'])) {
    Authorization::registration($data);
}

if (isset($_POST['login_email']) && isset($_POST['login_pass'])) {
    Authorization::login($_POST['login_email'], $_POST['login_pass']);
}
if (isset($_POST['exit'])) {
    Authorization::logout();
}
?>

<div class="usersPage">
    <div class="container">
        <div class="usersWraper">
            <?php if(isset($_SESSION['auth'])): ?>
                <form method="POST">
                    <div class="exit">
                        <h2>Вы вошли в аккаунт</h2>
                        <button type="submit" name="exit">Выйти</button>
                    </div>
                </form>
            <?php else: ?>

            <form method="POST">
                <div class="logIn">
                    
                    <h2>Вход в аккаунт</h2>

                    <input required placeholder="Электронная почта *" type="email" minlength="5" maxlength="50" name="login_email" />
                    <input required placeholder="Пароль *" type="password" minlength="6" maxlength="50" name="login_pass" />
                    <button type="submit">Войти</button>
                    
                </div>
            </form>

            <form method="POST">
                <div class="registration">
                    <h2>Регистрация</h2>

                    <input required placeholder="Имя*" type="text" minlength="2" maxlength="50" name="user_name" />
                    <input required placeholder="Телефон *" type="tel" minlength="5" maxlength="50" name="user_phone" />
                    <input required placeholder="Электронная почта *" type="email" minlength="5" maxlength="50" name="user_email" />
                    <input required placeholder="Пароль *" type="password" minlength="6" maxlength="50" name="user_pass" />
                    <button type="submit">Регистрация</button>
                </div>
            </form>

            <?php endif; ?>
        </div>
    </div>
</div>

<?php 
require_once './site/footer.php';
?>