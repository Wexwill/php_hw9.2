<?php

require_once 'UsersI.php';

abstract class UsersExt implements UsersI{
     
    abstract function add($data);

    function edit($data) {
        // редактирует информацию о посетителе.
    }
}