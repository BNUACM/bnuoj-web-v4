<?php

class StatusController extends \BaseController {

    public function getIndex() {
        return View::make('layouts.statuses.list', array('pagetitle' => 'Status List'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        // if (App::environment('local')) {
            $statuses = Status::join('language_name', 'status.language', '=', 'language_name.id')
                ->select(array('username', 'runid', 'pid', 'result', 'name', 'time_used', 'memory_used', 'source', 'time_submit', 'isshared'));
        // } else {
            // TODO: investigate
            // following scope causes performance problem in local, need more testing
        //     $statuses = Status::join('language_name', 'status.language', '=', 'language_name.id')
        //         ->select(array('username', 'runid', 'pid', 'result', 'language', 'time_used', 'memory_used', 'source', 'time_submit', 'isshared'))->public();
        // }
        
        return Datatables::of($statuses)
            // length
            ->edit_column('source', '{{ strlen($source) }}')
            // visible
            ->edit_column('isshared', '
                          @if ($isshared == 1 || (Auth::check() && (Auth::user()->is_admin || strcasecmp(Auth::user()->username, $username) == 0)))
                            1
                          @else
                            0
                          @endif
                          ')
            ->make();
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