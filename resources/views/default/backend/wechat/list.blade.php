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
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">公众号列表</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">新增公众号</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
    </ul>

    <div id="home">aaa</div>
    <div id="profile">bbb</div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>公众号名称</th>
            <th>公众号类型</th>
            <th>接入令牌</th>
            <th>接入地址</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($galist as $ga)
            <tr>
                <td>{{$ga->id}}</td>
                <td>{{$ga->name}}</td>
                <td>{{$ga->type}}</td>
                <td>{{$ga->api_token}}</td>
                <td>{{$ga->api_url}}</td>
                <td>{{$ga->create_time}}</td>
                <td><a href="/onewechat/menu">管理</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop