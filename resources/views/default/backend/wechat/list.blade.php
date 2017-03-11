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
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
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

        </div>
        <div role="tabpanel" class="tab-pane" id="profile">bbb</div>
        <div role="tabpanel" class="tab-pane" id="messages">ccc</div>
        <div role="tabpanel" class="tab-pane" id="settings">ddd</div>
    </div>



@stop