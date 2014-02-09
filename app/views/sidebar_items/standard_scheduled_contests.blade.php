<?php $contests = Contest::standard()->scheduled()->orderBy('start_time', 'desc')->take(5)->get(); ?>

@if (sizeof($contests) > 0)
    <h3>Upcoming Contests</h3>
    <p>
        @foreach ($contests as $contest)
            <a href='contest/{{ $contest->cid }}'>{{ $contest->title }}</a> at <span class='display_time'>{{ $contest->start_time }}</span><br />
        @endforeach
    </p>
@endif