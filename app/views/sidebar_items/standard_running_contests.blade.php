<?php $contests = Contest::standard()->running()->orderBy('start_time', 'desc')->take(5)->get(); ?>

@if (sizeof($contests) > 0)
    <h3>Running Contests</h3>
    <p>
        @foreach ($contests as $contest)
            <a href='contest/{{ $contest->cid }}'>{{ $contest->title }}</a> ends at <span class='display_time'>{{ $contest->final_time }}</span><br />
        @endforeach
    </p>
@endif