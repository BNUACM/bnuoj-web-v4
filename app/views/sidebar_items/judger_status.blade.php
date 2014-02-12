<h3>VJudge Status</h3>
By checking remote status page every 10 minutes.
<table class='table table-hover table-striped table-condensed' width="100%">
    <thead>
        <tr>
            <th width="70%">OJ</th>
            <th width="30%">Status</th>
        </tr>
    </thead>
    <tbody>

    @foreach (OJInfo::where('name', 'NOT LIKE', 'BNU')->get() as $info)
        <tr title='Last Check: {{ $info->lastcheck }}, {{{ $info->status }}}'>
            <td>{{{ $info->name }}}</td>
            @if ($info->status == "Normal")
                <td><img src='{{ asset("assets/green_light.png") }}' /></td>
            @elseif (substr($info->status, 0, 4) == "Down")
                <td><img src='{{ asset("assets/red_light.png") }}' /></td>
            @else
                <td><img src='{{ asset("assets/yellow_light.png") }}' /></td>
            @endif
        </tr>
    @endforeach

    </tbody>
</table>