<?php

require_once 'Users.php';

final class Authorization {

    private static $path = './json/data.json';

    static function registration($data) {
        // Метод для регистрации посетителей сайта

        $users = new Users($_POST['user_name'], $_POST['user_phone'], $_POST['user_email'], hash('md5', $_POST['user_pass'], false));

        $usersSer = serialize($users);

        $data = [];

        if(file_exists(self::$path)) {
            $file = file_get_contents(self::$path);
            $data = json_decode($file, true);
        }

        if (!is_array($data)) $data = [];

        if (array_search($usersSer, $data) === false) {
            array_push($data, $usersSer);
        }
        
        if (count($data) > 0) {
            file_put_contents(self::$path, json_encode($data));
            return true;
        }
    }

    static function login($email,$pass) {
        // Метод для осуществления авторизации на сайте
        
        if(filesize(self::$path) == 0) return;

        foreach(self::get() as $user) {
            if($user['email'] == $email && $user['password'] == hash('md5', $pass, false)) {
                $_SESSION['auth'] = 'true';
            }
        } 
        // print_r($_SESSION);
    }

    static function logout() {
        // Метод закрытия авторизации

        session_destroy();
        header('Location:'. $_SERVER['REQUEST_URI']);
        exit;
    }

    static function get() {
        // Метод для получения всех данных посетителей из файла.
        
        $file = file_get_contents(self::$path);
        $data = json_decode($file, true);

        $usersData = [];
        foreach($data as $user) {
            $user = unserialize($user);

            array_push($usersData, $user->get());
        }
        return $usersData;
    }
}
