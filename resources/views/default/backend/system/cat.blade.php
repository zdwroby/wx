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
    <table class="table table-striped table-cat">
        <tbody>
            <tr>
                <th>折叠</th>
                <th>排序</th>
                <th>名称</th>
                <th>标志</th>
                <th>操作</th>
            </tr>
            @foreach ($cat_list as $cat)
                <tr>
                    <td>
                        <?php
                        if($cat['haschild']==1){
                        ?>
                            <div class="fold"><i class="icon-unfold"></i></div></td>
                        <?php
                        }
                        ?>

                    <td>{{$cat['sort']}}</td>
                    <td>
                        <div class="lev<?php echo $cat['lev'];?>">
                            <span class="tab-sign"></span>
                            <input type="hidden" name="id" value="186">
                            <input type="text" name="title" class="text" value="<?php echo $cat['title']?>">
                            <a class="add-sub-cate" title="添加子分类" href="/admin.php?s=/Category/add/pid/186.html">
                                <i class="icon-add"></i>
                            </a>
                            <span class="help-inline msg"></span>
                        </div>
                    </td>
                    <td><?php echo $cat['name'];?></td>
                    <td>

                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
@stop