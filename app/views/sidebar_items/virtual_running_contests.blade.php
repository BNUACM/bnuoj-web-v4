<?php $contests = Contest::virtual()->running()->orderBy('start_time', 'desc')->take(10)->get(); ?>

@if (sizeof($contests) > 0)
    <h3>Running Virtual Contests</h3>
    <p>
        @foreach ($contests as $contest)
            <a href='{{ action("ContestController@getShow", array("id" => $contest->cid)) }}'>{{ $contest->title }}</a> ends at <span class='display_time'>{{ $contest->final_time }}</span><br />
        @endforeach
    </p>
@endif