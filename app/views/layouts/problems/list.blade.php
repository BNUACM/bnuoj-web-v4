@extends('layouts.without_sidebar')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if (Auth::check())
                <div class="btn-group">
                    <button class="btn btn-info active" id="showall" unsolved='0'>All</button>
                    <button class="btn btn-info" id="showunsolve" unsolved='1'>Unsolved</button>
                </div>
            @endif
            <div class="btn-group">
                <button class="btn btn-info active" id="showlocal" stat='0'>Local Stat</button>
                <button class="btn btn-info" id="showremote" stat='1'>Remote Stat</button>
                <button class="btn btn-info" id="showremu" stat='2'>Remote User Stat</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped table-hover" id="problist">
                <thead>
                    <tr>
                        <th>Flag</th>
                        <th>PID</th>
                        <th class="title" width="25%">Title</th>
                        <th class="source" width="23%">Source</th>
                        <th>AC</th>
                        <th>All</th>
                        <th>AC</th>
                        <th>All</th>
                        <th>AC(U)</th>
                        <th>All(U)</th>
                        <th class="selectoj">OJ</th>
                        <th>VID</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@stop