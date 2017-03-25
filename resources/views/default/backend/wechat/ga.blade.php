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
    <script>
        var parent_url = '<?php echo $parent_url?>';
    </script>
    @include('default.backend.layout.sidebar',$child_menu)
@stop

@section('content')
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{$sub_title}}</a></li>
    </ul>


        <!--新增微信公众号-->
        <div role="tabpanel" class="tab-pane" id="home" style="padding-top:20px;">
            <form class="form-horizontal" method="post" action="/wechat/ga">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="<?php echo (!empty($row)) ? $row->id : '';?>">
                <div class="form-group">
                    <label for="inputName" class="col-sm-1 control-label">公众号名称</label>
                    <div class="col-sm-3">
                        <input type="text" name="name" value="<?php echo (!empty($row)) ? $row->name : '';?>" class="form-control" id="inputName" placeholder="公众号名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="token" class="col-sm-1 control-label">接入令牌</label>
                    <div class="col-sm-3">
                        <input type="text" name="api_token" value="<?php echo (!empty($row)) ? $row->api_token : '';?>" class="form-control" id="token" placeholder="接入令牌">
                    </div>
                </div>
                <div class="form-group">
                    <label for="url" class="col-sm-1 control-label">接入服务器地址</label>
                    <div class="col-sm-3">
                        <input type="text" name="api_url" value="<?php echo (!empty($row)) ? $row->api_url : '';?>" class="form-control" id="url" placeholder="接入服务器地址">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Appid" class="col-sm-1 control-label">Appid</label>
                    <div class="col-sm-3">
                        <input type="text" name="appid" value="<?php echo (!empty($row)) ? $row->appid : '';?>" class="form-control" placeholder="Appid">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Appsecret" class="col-sm-1 control-label">Appsecret</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="<?php echo (!empty($row)) ? $row->appsecret : '';?>" name="appsecret" placeholder="Appsecret">
                    </div>
                </div>
                <div class="form-group">
                    <label for="partnerId" class="col-sm-1 control-label">partnerId</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="<?php echo (!empty($row)) ? $row->partnerId : '';?>" name="partnerId" placeholder="partnerId">
                    </div>
                </div>
                <div class="form-group">
                    <label for="partnerKey" class="col-sm-1 control-label">partnerKey</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="<?php echo (!empty($row)) ? $row->partnerKey : '';?>" name="partnerKey" placeholder="partnerKey">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-3">
                        <button type="submit" class="btn btn-default">{{ $but_act }}</button>
                    </div>
                </div>
            </form>



        </div>

    </div>



@stop