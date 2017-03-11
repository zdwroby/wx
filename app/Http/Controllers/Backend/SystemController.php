<?php
/**
 * Created by PhpStorm.
 * User: roby <zdwroby@gmail.com>
 * Date: 2017/2/28
 * Time: 10:05
 */

namespace App\Http\Controllers\Backend;

use App\models\Menu;
use App\Http\Controllers\Backend\AdminCommController;
use Illuminate\Http\Request;
use DB;


class SystemController extends AdminCommController
{
    /**
     * 系统设置  分类管理
     * @param  int  $id
     * @return Response
     */
    public function getCat()
    {
        $data = $this->getMenuData('system','分类管理');
        $rows = DB::table('one_category')->get();
        $arr = stdObjectToArray($rows);
        $cat_list = getSubTree($arr);
        foreach($cat_list as $k=>$row){         //判断当前行是否有子分类
            $flag = DB::table('one_category')->where('pid', '=', $row['id'])->first();
            if(count($flag)>0){
                $cat_list[$k]['haschild'] = 1;
            }else{
                $cat_list[$k]['haschild'] = 0;
            }
        }
        $data['cat_list'] = $cat_list;


        return view($this->theme.'.backend.system.cat',$data);
    }

}