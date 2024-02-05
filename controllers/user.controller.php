<?php

include_once(dirname(__FILE__) . '/../models/user.model.php');

use Firebase\JWT\JWT;

class UserController
{
    public static function getAllUsers()
    {
        $temp = new User();

        $users = json_encode($temp->getAllUser());

        // echo json_encode($users);
        return $users;
    }

    public static function login($info)
    {
        $user = new User();
        $user = $user->getUser($info['username']);

        if (count($user) == 1) {
            if ($user[0]['password'] == $info['password']) {
                $key = strval($_SERVER['SECRET_KEY']);

                $getDate = new DateTimeImmutable();
                $user['created_time'] = $getDate->modify('+1 hour')->getTimestamp();
                $jwt = JWT::encode($user, $key, 'HS256');
                return json_encode(["data" => [
                    'type' => 'user',
                    'id' => $user[0]['id'],
                    'firstname' => $user[0]['firstname'],
                    'lastname' => $user[0]['lastname'],
                    'address' => $user[0]['address'],
                    'email' => $user[0]['email'],
                    'phone' => $user[0]['phone'],
                    'token' => $jwt
                ]]);
            }
            // throw new FileNotFoundError("Incorrect password!!!");
        } 
    }
}
