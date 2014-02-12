<?php

class StatusController extends \BaseController {

    public function getList() {
        return View::make('layouts.statuses.list', array('pagetitle' => 'Status List'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // manually handle status table instead of using bllim's datatables package
        // since performance is crucial here and COUNT is too slow

        $columns = array('username', 'runid', 'pid', 'result', 'name', 'time_used', 'memory_used', 'source', 'time_submit', 'isshared');
        $statuses = Status::join('language_name', 'status.language', '=', 'language_name.id')
            ->select($columns)
            ->public()
            ->orderBy('runid', 'desc');

        // username filter
        if (Input::get('sSearch_0') != '') {
            $statuses = $statuses->whereUsername(Input::get('sSearch_0'));
        }

        // pid filter
        if (Input::get('sSearch_2') != '') {
            $statuses = $statuses->wherePid(Input::get('sSearch_2'));
        }

        // result filter
        if (Input::get('sSearch_3') != '') {
            $statuses = $statuses->whereResult(Input::get('sSearch_3'));
        }

        // language filter
        if (Input::get('sSearch_4') != '') {
            $statuses = $statuses->where('status.language', '=', Input::get('sSearch_4'));
        }

        $offset = intval(Input::get('iDisplayStart'));
        $length = intval(Input::get('iDisplayLength'));

        // limit max length
        if ($length > 100) $length = 100;

        $statuses = $statuses->offset($offset)->take($length);
        $result_array = $statuses->get()->toArray();
        $output_array = array();

        foreach ($result_array as $value) {
            $value['source'] = strlen($value['source']);
            $output_array[] = array_values($value);
        }

        $result = array(
            "sEcho" => intval(Input::get('sEcho')),
            "iTotalRecords" => '100000000',
            "iTotalDisplayRecords" => '100000000',
            "aaData" => $output_array,
            "sColumns" => $columns
        );

        if(Config::get('app.debug', false)) {
            $result['aQueries'] = DB::getQueryLog();
        }

        return $result;

        // return Datatables::of($statuses)
        //     // length
        //     ->edit_column('source', '{{ strlen($source) }}')
        //     // visible
        //     ->edit_column('isshared', '
        //                   @if ($isshared == 1 || (Auth::check() && (Auth::user()->is_admin || strcasecmp(Auth::user()->username, $username) == 0)))
        //                     1
        //                   @else
        //                     0
        //                   @endif
        //                   ')
        //     ->make();
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