<?php
/**
 * Created by PhpStorm.
 * User: roby <zdwroby@gmail.com>
 * desc:公用函数库，已手动加载过了
 * Date: 2017/3/9
 * Time: 19:35
 */

/**
 * 获取子孙树 无限极分类
 * @param   array        $data   待分类的数据
 * @param   int/string   $id     要找的子节点id
 * @param   int          $lev    节点等级
 */
function getSubTree($data, $id=0, $lev=0)
{
    static $son = array();
    foreach ($data as $key => $value) {
        if ($value['pid'] == $id) {
            $value['lev'] = $lev;
            $son[] = $value;
            getSubTree($data, $value['id'], $lev + 1);
        }
    }
    return $son;
}
/**
 * [std_class_object_to_array 将对象转成数组]
 * @param [stdclass] $stdclassobject [对象]
 * @return [array] [数组]
 */
function stdObjectToArray($stdclassobject){
    $_array = is_object($stdclassobject) ? get_object_vars($stdclassobject) : $stdclassobject;
    foreach ($_array as $key => $value) {
        $value = (is_array($value) || is_object($value)) ? stdObjectToArray($value) : $value;
        $array[$key] = $value;
    }
    return $array;
}