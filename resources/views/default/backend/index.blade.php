<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="Content-type" content="text/html;charset=utf-8"/>
    <title>时尚教练数据管理中心{{$title}}</title>
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
            <?php
            //print_r($menu);
            foreach($top_menu as $k=>$v){
            ?>
                <li><a href="<?php echo $v->url;?>"><?php echo $v->title;?></a></li>
            <?php
            }
            ?>

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
            <?php
            foreach($child_menu as $key=>$obj){
            ?>
                <li>
                    <span class="glyphicon glyphicon-plus"><em class="pl5"></em><?php echo $key?></span>
                    <ul>
                        <?php
                            foreach($obj as $k=>$o){
                            ?>
                            <li><a href=""><?php echo $o->title;?></a></li>
                            <?php
                            }
                        ?>
                    </ul>
                </li>

            <?php
            }
            ?>



        </ul>
    </div>

    <div class="content">
        fff
    </div>
</div>

</body>
</html>
