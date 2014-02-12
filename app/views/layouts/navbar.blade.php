<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}">BNUOJ</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav" id="main_navbar">
                <li class="dropdown" id="problem">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{ action('ProblemController@getList') }}">Problem <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li id="localp"><a href="{{ action('ProblemController@getList') }}?oj=BNU">Local Problems</a></li>
                        <li id="allp"><a href="{{ action('ProblemController@getList') }}">All Problems</a></li>
                        <li id="categoryp"><a href="problem_category.php">Problem Category</a></li>
                    </ul>
                </li>
                <li id="status"><a href="{{ action('StatusController@getList') }}">Status</a></li>
                <li class="dropdown" id="contest">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="contest.php?type=50">Contest <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li id="stdcontest"><a href="contest.php?type=50">Standard Contests</a></li>
                        <li id="icpccontest"><a href="contest.php?type=0">Contests (ICPC format)</a></li>
                        <li id="cfcontest"><a href="contest.php?type=1">Contests (CF format)</a></li>
                        <li id="repcontest"><a href="contest.php?type=99">Replay Contests</a></li>
                        <li id="vcontest"><a href="contest.php?virtual=1">Virtual Contests</a></li>
                    </ul>
                </li>
                <li class="dropdown" id="more">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="teaminfo.php">More <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="ranklist.php">Ranklist</a></li>
                        <li><a href="discuss.php">Discuss</a></li>
                        <li><a href="news.php">News</a></li>
                        <li class="divider"></li>
                        <li><a href="teaminfo.php">Our Team</a></li>
                        <li class="divider"></li>
                        <li><a href="recent_contest.php">Recent Contests</a></li>
                        <li class="divider"></li>
                        <li class="disabled"><a>Coming Soon...</a></li>
                    </ul>
                </li>
            </ul>
@unless (Auth::check())
            <ul id="loginbar" class="nav navbar-nav navbar-right">
                <li id="loginbutton"><a href="#" data-toggle="modal" data-target="#logindialog">Login</a></li>
                <li id="register"><a href="#" data-toggle="modal" data-target="#regdialog">Register</a></li>
            </ul>
@else
            <ul id="logoutbar" class="nav navbar-nav navbar-right">
                <li class="dropdown" id="userspace">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="" id="displayname">
                        {{{ Auth::user()->username }}}
                        @if (Auth::user()->unread_message_count > 0)
                        <b style='color:#F00'> ({{ Auth::user()->unread_message_count }}) <b class="caret"></b></a>
                        @endif
                    <ul class="dropdown-menu">
                        <li><a href="">Show My Information</a></li>
                        <li><a href="#" id="modify" data-toggle="modal" data-target="#modifydialog">Modify My Information</a></li>
                        <li><a href="mail.php" id="mail">
                            Mail
                            @if (Auth::user()->unread_message_count > 0)
                            <b style='color:#F00'> ({{ Auth::user()->unread_message_count }}) <b class="caret"></b></a>
                            @endif
                        </a></li>
    @if (Auth::user()->is_admin)
                        <li><a href="admin_index.php" id="admin">Administration</a></li>
    @endif
                        <li id="logoutbutton"><a href="{{ route('logout') }}" id="logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
@endunless
            <p class="navbar-text navbar-right"><span id="servertime">{{ date("Y-m-d H:i:s") }}</span>&nbsp;</p>
        </div><!--/.navbar-collapse -->
    </div>
</div>