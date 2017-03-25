@extends('default.backend.layout.base')

@section('title')
    {{$title}}
@stop

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
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="/wechat/source" aria-controls="home" role="tab" data-toggle="tab">资源列表</a></li>
        <li role="presentation"><a href="/wechat/source?act=add">新增资源</a></li>
    </ul>
    <table class="table table-bordered" style="margin-top: 20px;">
        <thead>
        <tr>
            <th>id</th>
            <th>资源名称</th>
            <th>资源类型</th>
            <th>资源描述</th>
            <th>创建时间</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($source_list as $ga)
            <tr>
                <td>{{$ga->id}}</td>
                <td>{{$ga->title}}</td>
                <td><?php echo ($ga->type==1) ? '微信文本' : '微信图文'; ?></td>
                <td>{{$ga->description}}</td>
                <td><?php echo date('Y-m-d H:i:s',$ga->create_time);?></td>
                <td>{{$ga->sort}}</td>
                <td>
                    <a href="/wechat/source?act=edit&id={{$ga->id}}">修改</a>
                    <a href="/wechat/source?act=delete&id={{$ga->id}}">删除</a>
                </td>
            </tr>
        @endforeach
    </table>

@stop