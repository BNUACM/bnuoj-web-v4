@extends('layouts.without_sidebar')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Welcome to BNUOJ 4.0!</h1>
            <p>
                Enjoy and have fun! <br />
                If you have prefer the old OJ, click <a href='../bnuoj'>here</a> for BNUOJ 2.0.<br />
            </p>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            @include('sidebar_items.judger_status')
        </div>
        <div class="col-sm-4">
            @include('sidebar_items.recent_news')
            <h3>Todo list</h3>
            We are working/will work on following functions:
            <ol>
                <li>Virtual Judge on many other OJs</li>
                <li>Class/Interactive Module</li>
                <li>AI Battle Module</li>
                <li>SNS link</li>
            </ol>
        </div>
        <div class="col-sm-5">
            @include('sidebar_items.standard_running_contests')
            @include('sidebar_items.virtual_running_contests')
            @include('sidebar_items.standard_scheduled_contests')
            @include('sidebar_items.virtual_scheduled_contests')
        </div>
    </div>
@stop