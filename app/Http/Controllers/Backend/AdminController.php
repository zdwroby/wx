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
        $data = array('title'=>'Hello World2');
        $list = DB::table('one_menu')->where('pid', '=', 0)->get(['url','title']);
        $data['top_menu'] = $list;
        $curr_top_id = 2;
        $sub_menu = DB::table('one_menu')
            ->orderBy('sort', 'desc')
            ->having('pid', '=', $curr_top_id)
            ->get();
        $child_menu = array();
        foreach($sub_menu as $k=>$obj){
            if(!is_numeric($obj->group)){
                $child_menu[$obj->group][] = $obj;
            }

        }
        $data['child_menu'] = $child_menu;

        return view('backend.index', $data);
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