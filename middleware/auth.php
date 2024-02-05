<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth
{
    final public static function authRole($roles)
    {
        $headers = apache_request_headers();
        if (array_key_exists('Authorization', $headers)) {
            
        }
    }
}
