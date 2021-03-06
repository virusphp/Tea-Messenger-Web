<?php

/**
 *  Generated by IceTea Framework 0.0.1
 *  Created at 2017-12-14 12:34:36
 *  Namespace App\Http\Controllers\Auth
 */

namespace App\Http\Controllers\Auth;

trait CSRFToken
{

    private $csrfExpired = 300;

    public function makeCSRF($n = 300)
    {
        setcookie("token", $this->token = rstr(32), time() + ($this->csrfExpired = $n));
    }

    public function csrfValidation($csrf)
    {
        $csrf = json_decode(ice_decrypt($csrf, "tea_messenger123"), true);
        return
            isset($csrf['token'], $csrf['expired'], $_COOKIE['token']) &&
                $csrf['expired'] > time() &&
                    $csrf['token'] === $_COOKIE['token'];
    }

    public function csrf_token()
    {
        return ice_encrypt(
            json_encode(
                [
                    "expired" => time() + $this->csrfExpired,
                    "token"   => $this->token
                ]
            ),
            "tea_messenger123"
        );
    }
}
