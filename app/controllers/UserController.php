<?php

class UserController extends \BaseController {

    /**
     * Initialize
     */
    public function __construct() {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    /**
     * User login
     * @return Response 200 or 403
     */
    public function login() {
        $hashedPassword = OJLib::hashPassword(Input::get('password'));
        $remember = Input::get('cksave');

        $user = User::where('username', Input::get('username'))->where('password', $hashedPassword)->get()->first();
        if ($user) {
            Auth::login($user, $remember);
            return Response::json(array('msg' => 'Logged in.'));
        } else {
            return Response::json(array('msg' => 'Username or password doesn\'t match.'), 403);
        }
    }

    public function logout() {
        if (!Auth::check()) {
            return Response::make(null);
        }
        Auth::logout();
        return Redirect::intended('/');
    }
}