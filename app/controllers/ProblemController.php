<?php

class ProblemController extends \BaseController {

    public function getIndex() {
        return View::make('layouts.problems.list', array('pagetitle' => 'Problem List'));
    }

    // Followings are for /resource/problem
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // return Problem::userUnsolved()->public()->take(1)->get()->toJson();
        // for datatables
        $problems = Problem::select(array('pid', 'title', 'source', 'total_ac', 'total_submit', 'vacnum', 'vtotalnum', 'vacpnum', 'vtotalpnum', 'vname', 'vid'))->public();
        if (Input::get('unsolved') == '1') {
            $problems = $problems->userUnsolved();
        }

        // use unsolved param to reduce SQL
        return Datatables::of($problems)->add_column('user_stat', '
                                                        @if (Auth::check())
                                                            {{ "" }}
                                                            @if (Input::get("unsolved") != "1" && Auth::user()->isProblemAccepted($pid))
                                                                {{ "Yes" }}
                                                            @elseif (Auth::user()->isProblemSubmitted($pid))
                                                                {{ "No" }}
                                                            @endif
                                                        @endif
                                                        ', 0)->make();
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