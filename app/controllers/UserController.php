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

        $user = User::whereUsername(Input::get('username'))->wherePassword($hashedPassword)->get()->first();
        if ($user) {
            Auth::login($user, $remember);
            return Response::json(array('msg' => 'Logged in.'));
        } else {
            return Response::json(array('msg' => 'Username or password doesn\'t match.'), 403);
        }
    }

    public function logout() {
        if (!Auth::check()) {
            return Response::make(null, 403);
        }
        Auth::logout();
        return Redirect::intended('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}