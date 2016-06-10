<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- 增加 ajax 请求的 csrf-token -->
    <link rel="icon" href="http://v3.bootcss.com/favicon.ico">
    <title>Laravel-Art —— CMS 简单管理系统</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('style/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('style/css/dashboard.css')}}" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="{{asset('style/js/ie8-responsive-file-warning.js')}}"></script><![endif]-->
    <script src="{{asset('style/js/ie-emulation-modes-warning.js')}}"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="cursor: default;">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> <a class="navbar-brand" href="/article">Laravel-Art</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                <li>
                    <a href="{{url('auth/login')}}">登陆</a>
                </li>
                <li>
                    <a href="{{url('auth/register')}}">注册</a>
                </li>
                    @else
                    <li>
                        <a href="#">{{auth()->user()->name}}</a>
                    </li>
                    <li>
                        <a href="{{url('auth/logout')}}">退出</a>
                    </li>
                @endif
            </ul>
            <form class="navbar-form navbar-right" action="/article">
                <input name="search" type="text" class="form-control" placeholder="善待搜索..." value="">
            </form>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @yield('menu')
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('body')
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('style/js/jquery.min.js')}}"></script>
<script src="{{asset('style/js/bootstrap.min.js')}}"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="{{asset('style/js/holder.min.js')}}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{asset('style/js/ie10-viewport-bug-workaround.js')}}"></script>
<script aria-hidden="true" type="application/x-lastpass" id="hiddenlpsubmitdiv" style="display: none;"></script>
<script>
    try {
        (function() {
            for (var lastpass_iter = 0; lastpass_iter < document.forms.length; lastpass_iter++) {
                var lastpass_f = document.forms[lastpass_iter];
                if (typeof(lastpass_f.lpsubmitorig2) == "undefined") {
                    lastpass_f.lpsubmitorig2 = lastpass_f.submit;
                    if (typeof(lastpass_f.lpsubmitorig2) == 'object') {
                        continue;
                    }
                    lastpass_f.submit = function() {
                        var form = this;
                        var customEvent = document.createEvent("Event");
                        customEvent.initEvent("lpCustomEvent", true, true);
                        var d = document.getElementById("hiddenlpsubmitdiv");
                        if (d) {
                            for (var i = 0; i < document.forms.length; i++) {
                                if (document.forms[i] == form) {
                                    if (typeof(d.innerText) != 'undefined') {
                                        d.innerText = i.toString();
                                    } else {
                                        d.textContent = i.toString();
                                    }
                                }
                            }
                            d.dispatchEvent(customEvent);
                        }
                        form.lpsubmitorig2();
                    }
                }
            }
        })()
    } catch (e) {}
</script>

<script>
    /*
    增加 ajax 的 csrf-token
     */
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
</script>
@yield('script')

</body>

</html>