<?php 

require_once 'UsersExt.php';

class Users extends UsersExt {

   protected $data = [];

   function __construct($name = '', $phone = '', $email = '', $password = '') {
      $this->add([
         'name' => $name,
         'phone' => $phone,
         'email' => $email,
         'password' => $password
      ]);
   }

   function add($data) {
      // добавляет данные о посетителе в св-во $data, например: “name”, “email”, “phone”, “password” — ассоциативные индексы массива.

      if (!empty($data)) $this->data = $data;
  }

   function get() {

    return $this->data;

   }
}
