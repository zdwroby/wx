<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/28
 * Time: 10:05
 */

namespace App\Http\Controllers\Backend;

use App\models\Menu;
use App\Http\Controllers\Backend\AdminCommController;
use DB;


class AdminController extends AdminCommController
{
    /**
     * 显示所给定的用户个人数据。
     *
     * @param  int  $id
     * @return Response
     */
    public function getIndex()
    {
        $data = $this->getMenuData('admin','菜单首页');
        return view($this->theme.'.backend.index',$data);
    }
    public function getCreate(){
        echo "create";exit;
        $results = DB::select('select * from one_wx_token');
        $users = DB::connection('secondDB')->select('select * from one_config');
        print_r($results);
        print_r("<hr>");
        print_r($users);
        exit;
    }
}