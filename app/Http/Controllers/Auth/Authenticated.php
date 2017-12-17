<?php

/**
 *  Generated by IceTea Framework 0.0.1
 *  Created at 2017-12-14 12:34:36
 *  Namespace App\Http\Controllers\Auth
 */

namespace App\Http\Controllers\Auth;

use App\Login;

class Authenticated
{
    public static function login($code = 404, $redir = false)
    {
        if (! Login::isLoggedIn()) {
        	if (is_string($redir)) {
        		header("location:".$redir);
        	} else {
        		abort($code);
            	exit($code);
        	}
        }
    }
}
