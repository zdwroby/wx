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
        <li role="presentation" class="active"><a href="/wechat/source?act=add" aria-controls="home" role="tab" data-toggle="tab">{{$sub_title}}</a></li>
    </ul>
    <div style="padding-top:20px;">
        <form class="form-horizontal" method="post" action="/wechat/source">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="<?php echo (!empty($row)) ? $row->id : '';?>">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-1 control-label">资源名称</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" value="<?php echo (!empty($row)) ? $row->title : '';?>" name="title" id="inputEmail3" placeholder="资源名称">
                </div>
            </div>
            <div class="form-group">
                <label for="label" class="col-sm-1 control-label">资源标签</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" value="<?php echo (!empty($row)) ? $row->label : '';?>" name="label" id="label" placeholder="资源标签">
                </div>
            </div>

            <div class="form-group">
                <label for="desc" class="col-sm-1 control-label">资源描述</label>
                <div class="col-sm-2">
                    <textarea id="desc" name="description" style="width:300px;height: 80px;"><?php echo (!empty($row)) ? $row->description : '';?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="sort" class="col-sm-1 control-label">排序号</label>
                <div class="col-sm-2">
                    <input type="text" num_float int name="sort" id="sort" value="<?php echo (!empty($row)) ? $row->sort : '';?> " class="form-control" placeholder="排序号">
                </div>
            </div>
            <div class="form-group">
                <label for="click_num" class="col-sm-1 control-label">点赞数</label>
                <div class="col-sm-2">
                    <input type="text" num_float int name="click_num" id="click_num" value="<?php echo (!empty($row)) ? $row->click_num : '';?>" class="form-control" placeholder="点赞数">
                </div>
            </div>
            <div class="form-group">
                <label for="read_num" class="col-sm-1 control-label">阅读量</label>
                <div class="col-sm-2">
                    <input type="text" num_float int name="read_num" id="read_num" value="<?php echo (!empty($row)) ? $row->read_num : '';?>" class="form-control" placeholder="阅读量">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-1 control-label">资源类型</label>
                <div class="col-sm-2">
                    <select class="change_source" name="type" style="margin-top:5px;height:25px;">

                        @forelse($source_type as $k=>$source)
                            <option value="{{$k+1}}">{{ $source->title }}</option>
                        @empty
                            <p>No source</p>
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="wb">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-1 control-label">资源内容</label>
                    <div class="col-sm-2">
                        <textarea name="contents"> <?php echo (!empty($row)) ? $row->contents : '';?> </textarea>
                    </div>
                </div>
            </div>
            <div class="tw" style="display: none;">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">封面图片</label>
                    <div class="col-sm-2">
                        <div class="controls" >
                            <input type="file" id="upload_picture_img">
                            <input type="hidden" name="img" id="cover_id_img"/>
                            <div class="upload-img-box">
                                <?php
                                if(!empty($row) && $row->img){
                                ?>
                                    <div class="upload-pre-item"><img src="{{$row->img}}"/></div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-1 control-label">资源内容</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control kindEditors" name="contents" value="<?php echo (!empty($row)) ? $row->contents : '';?>" placeholder="content">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="inputEmail3" class="col-sm-1 control-label"></label>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </div>

        </form>

    </div>



@stop

@section('js')
    <script src="/public/plugin/uploadify/jquery.uploadify.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/public/plugin/kindeditor/themes/default/default.css" />
    <script charset="utf-8" src="/public/plugin/kindeditor/kindeditor-all.js?v=334455"></script>
    <script charset="utf-8" src="/public/plugin/kindeditor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="/public/plugin/kindeditor/kindeditor.configs.js"></script>
    <style>
        .uploadify-button {
            color: #fff;
            background-color: #27ae60;
            text-align: center;
        }
        textarea {
            padding: 6px;
            border: 1px solid #ccc;
            background-color: #fff;
            transition: all .3s linear;
            display: block;
            min-height: 100px;
            min-width: 300px;
        }
        .upload-img-box .upload-pre-item {
            padding: 1px;
            width: 120px;
            max-height: 120px;
            overflow: hidden;
            text-align: center;
            cursor: pointer;
            border: 1px solid #ccc;
            transition: all .3s linear;
        }
        .upload-img-box .upload-pre-item img {
            vertical-align: top;
        }
        img {
            max-width: 100%;
            border: 0 none;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            //编辑时，默认要选一下
            <?php
            if(!empty($row)){
            ?>
            var init_id = '{{$row->type}}';
            $('.change_source option').each(function(){
                var obj = $(this);
                if(obj.val()==init_id){
                    obj.attr('selected','selected');
                    if(init_id=='2'){
                        $('.tw').show();
                        $('.tw input').removeAttr('disabled');
                        $('.wb input').attr('disabled',true);
                        $('.wb').hide();
                    }else{
                        $('.tw').hide();
                        $('.tw input').attr('disabled',true);
                        $('.wb input').removeAttr('disabled');
                        $('.wb').show();
                    }
                }
            })

            <?php
            }
            ?>


            $('.change_source').on('change',function(){
                var source = $(this).val();
                console.log(source);
                if(source=='1'){
                    $('.wb').show();
                    $('.tw').hide();
                }else{
                    $('.wb').hide();
                    $('.tw').show();
                }
            })
        })
        //上传图片
        /* 初始化上传插件 */
        $("#upload_picture_img").uploadify({
            'formData'     : {
                '_token'     : '{{ csrf_token() }}',
                'dir'		: 'goods_thumg',
            },
            "height"          : 30,
            "swf"             : "/public/plugin/uploadify/uploadify.swf",
            "fileObjName"     : "download",
            "buttonText"      : "上传图片",
            "uploader"        : "/file/upload?is_thumg=1&thumg_width=120&thumg_height=58",
            "width"           : 120,
            'removeTimeout'	  : 1,
            'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
            "onUploadSuccess" : uploadPictureimg,
            'onFallback' : function() {
                alert('未检测到兼容版本的Flash.');
            }
        });
        function uploadPictureimg(file, data){
            var data = $.parseJSON(data);
            var src = '';
            console.log(data);

            if(data.status){
                $("#cover_id_img").val(data.thumg);
                src = data.dest || data.thumg;
                $("#cover_id_img").parent().find('.upload-img-box').html(
                    '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                );
            } else {
                setTimeout(function(){
                    $('#top-alert').find('button').click();
                    $(that).removeClass('disabled').prop('disabled',false);
                },1500);
            }

        }
    </script>
@stop