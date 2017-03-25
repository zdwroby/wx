<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="Content-type" content="text/html;charset=utf-8"/>
    <title> @yield('title')</title>
    <meta http-equiv="Content-Style-Type" content="text/css"/>
    <meta http-equiv="Content-Script-Type" content="text/javascript"/>
    <meta name="Author" content="jykj"/>
    <meta name="Version" content="201702281531"/>
    <script type="text/javascript" src="/public/jquery.min.js"></script>
    <script type="text/javascript" src="/public/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="/public/back/js/roby_admin.js"></script>
    <link type="text/css" rel="stylesheet" href="/public/bootstrap/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="/public/back/css/style.css" />
</head>
<body>
<div class="header">
    <div class="header-left"></div>
    <div class="header-center">
        <ul>
            @section('header')
                头部公用菜单
            @show
        </ul>
    </div>
    <div class="header-right">
        <div class="dropdown">
            <a id="dLabel">
                雨后彩虹
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" aria-labelledby="dLabel">
                <li><a href="http://www.baidu.com">修改密码</a></li>
                <li><a href="http://www.baidu.com">修改昵称</a></li>
                <li><a href="http://www.baidu.com">退出</a></li>

            </ul>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="sidebar">
        <ul>
            @section('sidebar')
                侧边栏
            @show




        </ul>
    </div>

    <div class="content">
        @yield('content','主要内容区域')
    </div>
</div>

@section('js')
    js
@show

</body>
</html>
