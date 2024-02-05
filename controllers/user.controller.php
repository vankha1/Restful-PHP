<?php

include_once(dirname(__FILE__) . '/../models/user.model.php');


class UserController
{
    public static function getAllUsers()
    {
        $temp = new User();

        $users = json_encode($temp->getAllUser());

        // echo json_encode($users);
        return $users;
    }
}
