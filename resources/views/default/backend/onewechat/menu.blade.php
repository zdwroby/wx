@extends('default.backend.layout.base')

@section('header')
    <?php
    $data['top_menu'] = $top_menu;
    $data['curr_top_id'] = $curr_top_id;
    ?>
    @include('default.backend.layout.header',$data)
@stop

@section('sidebar')
    @include('default.backend.layout.sidebar',$child_menu)
@stop

@section('content')
    <style>
        .top_menu,.child_menu{padding-bottom:10px;}
    </style>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">微信自定义菜单</a></li>
    </ul>
    <div role="tabpanel" class="tab-pane" id="home" style="padding-top:20px;">
        <form class="form-inline" method="post" action="/wechat/ga">
            <div class="top_menu dj1">
                <label for="token" class="control-label">菜单名称：</label>
                <input type="text" name="api_token" id="token" placeholder="菜单名称">&nbsp;&nbsp;
                <label for="token" class="control-label">菜单级别：</label>
                <select style="height: 26px;" class="jq_menu_dj">
                    <option value="1">一级菜单</option>
                    <option value="2">二级菜单</option>
                </select> &nbsp;&nbsp;
                <span class="jq_has_more">
                    <label for="token" class="control-label">菜单类型：</label>
                    <select style="height: 26px;" class="jq_menu_type">
                        <option value="1">直接跳转</option>
                        <option value="2">回复消息</option>
                    </select>&nbsp;&nbsp;
                    <span class="jq_write_html">
                        <label for="token" class="control-label">跳转地址：</label>
                        <input type="text" name="api_token" id="token" placeholder="跳转地址">&nbsp;&nbsp;

                    </span>
                </span>
                <a href="">删除</a>
                <button type="button" class="btn btn-info add_parent_menu">添加主菜单</button>
            </div>
        </form>
    </div>

@stop


@section('js')
    <script>
        $(document).ready(function(){
            $.fn.self = function() {
                return $($('<div></div>').html($(this).clone())).html();
            }



var child_menu_html = '<div class="child_menu" style="padding-left:30px;">'+
            '<label for="token" class="control-label">子菜单名称：</label>'+
            '<input type="text" name="api_token" id="token" placeholder="子菜单名称">&nbsp;&nbsp;'+
            '<label for="token" class="control-label">菜单类型：</label>'+
            '<select style="height: 26px;">'+
                '<option>直接跳转</option>'+
                '<option>回复消息</option>'+
                '</select>&nbsp;&nbsp;'+
            '<span id="write_html">'+
                '<label for="token" class="control-label">跳转地址：</label>'+
            '<input type="text" name="api_token" id="token" placeholder="跳转地址">&nbsp;&nbsp;'+
            '</span>'+
            '<button type="button" class="btn btn-info add_child_menu">添加子菜单</button>'+
'</div>';
var menu_1_type = '<label for="token" class="control-label">跳转地址：</label>'+
                 '<input type="text" name="api_token" id="token" placeholder="跳转地址">&nbsp;&nbsp;';
var menu_2_type = '<select style="height: 26px;" class="jq_menu_type">'+
                '<option value="1">回复一</option>'+
                '<option value="2">回复二</option>'+
              '</select>&nbsp;';

            //添加主菜单，注意显示主菜单中默认有的选项
            $(document).on('click','.add_parent_menu',function(){
            //$('.add_parent_menu').on('click',function(){
                var num = $('.top_menu').length;
                if(num>=3){
                    alert('主菜单最多三个');
                    return false;
                }
                var obj = $(this);
                var parent_obj = obj.parent();
                var parent_obj_html = parent_obj.self();

                parent_obj.find('.add_parent_menu').remove();
                if(parent_obj.next('.child_menu').length>0){
                    $('.child_menu:last').after(parent_obj_html);
                    $('.child_menu:last').next('.top_menu').find('.jq_has_more').show();
                }else{
                    parent_obj.after(parent_obj_html);
                    console.log('无子菜单');
                }
                //parent_obj.find('.jq_has_more').show();
            })

            //添加子菜单
            $(document).on('click','.add_child_menu',function(){
                //$('.add_parent_menu').on('click',function(){
                var num = $('.child_menu').length;
                if(num>=5){
                    alert('子菜单最多五个');
                    return false;
                }
                var obj = $(this);
                var parent_obj = obj.parent();
                var parent_obj_html = parent_obj.self();

                parent_obj.find('.add_child_menu').remove();
                parent_obj.after(parent_obj_html);
                //parent_obj.find('.jq_has_more').show();
            })

            $(document).on('change','.jq_menu_dj',function(){
                var obj = $(this);
                var tr = obj.parent();
                var dj = obj.val();
                if(dj==2){
                    tr.after(child_menu_html);
                    tr.find('.jq_has_more').hide()
                }else{
                    tr.next('.child_menu').remove();
                    tr.find('.jq_has_more').show()
                }
            })
            $(document).on('change','.jq_menu_type',function(){
                var obj = $(this);
                var tr = obj.parent();
                var dj = obj.val();
                if(dj==2){
                    obj.next('.jq_write_html').html(menu_2_type);
                }else{
                    obj.next('.jq_write_html').html(menu_1_type);
                }
            })



        })
    </script>
@stop
