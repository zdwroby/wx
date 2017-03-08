<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/28
 * Time: 10:05
 */


namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use DB;

class AdminCommController extends Controller
{
    /**
     * 后台公用函数
     */

    /**
     * @var Film应用bosnadev组件实现数据仓库
     */

    /**
     * 获得一行记录
     * $fieldValArray要查询的字段数组, $queryId查询ID, $queryVal查询值
     */
    public function getRow($table, $fieldValArray, $queryId, $queryVal)
    {
        $row = DB::table($table)->where($queryId, $queryVal)->first($fieldValArray);
        return $row;
    }

    /**
     * 获取多行记录
     */
    public function getAll($table, $where, $fieldValArray)
    {
        $rows = DB::table($table)->where($where)->get($fieldValArray);
        return $rows;
    }

}