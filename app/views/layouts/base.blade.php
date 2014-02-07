<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="BNU Online Judge, A simple, full-featured Online Judge." />
    <meta name="keywords" content="Online Judge, BNU, OJ, BNUOJ, BOJ, Virtual Judge, Replay Contest, Problem Category" />
    <meta name="author" content="51isoft">
    <link rel="shortcut icon" href="favicon.ico" />
    <title>{{{ $pagetitle or "BNU Online Judge" }}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        var currentTime = '{{ time() }}';
    </script>
    <?= stylesheet_link_tag() ?>
    <?= javascript_include_tag() ?>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
@include("layouts.navbar")
    <marquee class="hidden-xs" direction="left" behavior="alternate" scrollamount="2" style="position:absolute;width:100%;"></marquee>
    <div class="hidden-xs" id="marqueepos"></div>
    <div class="container" id="page-content">
        <div class="row">
@yield('content')
        </div>    
        <hr />
        <footer id="footer">
            <p>
                Distributed under GPLv3. | <a href='https://github.com/51isoft/bnuoj' target="_blank">Project Homepage</a> | Developer: <a href="mailto:yichaonet#gmail.com">51isoft</a>.
            </p>
        </footer>
    </div>

@unless (Auth::check())
    @include("layouts.dialogs.login")
    @include("layouts.dialogs.register")
@else
    @include("layouts.dialogs.modify_userinfo")
@endunless

@include("layouts.dialogs.news")

</body>
</html>

