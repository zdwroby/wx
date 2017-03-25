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
    protected $theme = "default";
    public $data;
    /**
     * 得到分类表中的各种类型
     */
    public function getCateType($name){
        $row = DB::table('one_category')->where('name', $name)->select('id')->first();
        $list = DB::table('one_category')->where('pid',$row->id)->select('id','title')->get();
        return $list;
    }
    /**
     * 根据当前顶部菜单<按分组>获取菜单数组
     */
    private function getMenuArr($curr_top_id){
        $list = DB::table('one_menu')->where('pid', '=', 0)->get(['url','id','title']);
        $data['top_menu'] = $list;
        $sub_menu = DB::table('one_menu')
            ->orderBy('sort', 'desc')
            ->having('pid', '=', $curr_top_id)
            ->having('is_dev', '=', 0)
            ->get();
        $child_menu = array();
        foreach($sub_menu as $k=>$obj){
            if(!is_numeric($obj->group)){
                $child_menu[$obj->group][] = $obj;
            }
        }
        $data['child_menu'] = $child_menu;
        return $data;
    }
    //当前url地址获取当前所属顶级菜单，再获取菜单信息并进行组合
    public function getMenuData($curr_mode,$title)
    {
        //查找当前头部菜单ID
        $parent_url = '';
        $action = $this->getCurrentAction();
        $url = "/".$curr_mode."/".$action['method'];
        $row = $this->getRow('one_menu', ['id','pid','url'], "url", $url);
        if($row->pid == 0){             //是头部顶级菜单
            $this->curr_top_id = $row->id;
            $parent_url = $row->url;
        }else{                          //是左侧菜单

            $is_exist_child =  DB::table('one_menu')->where('id', '=', $row->pid)->first();
            if($is_exist_child->pid==0){        //当前菜单为二级菜单
                $this->curr_top_id = $row->pid;
                $parent_url = $row->url;
            }else{                              //当前菜单为三级菜单
                $this->curr_top_id = $is_exist_child->pid;
                $parent_url = $is_exist_child->url;
            }
        }
        $data = $this->getMenuArr($this->curr_top_id);
        $data['title'] = $title;
        $data['parent_url'] = $parent_url;
        $data['curr_top_id'] = $this->curr_top_id;
        return $data;
    }


    /**
     * [std_class_object_to_array 将对象转成数组]
     * @param [stdclass] $stdclassobject [对象]
     * @return [array] [数组]
     */
    public function std_class_object_to_array($stdclassobject)
    {
        $_array = is_object($stdclassobject) ? get_object_vars($stdclassobject) : $stdclassobject;
        foreach ($_array as $key => $value) {
            $value = (is_array($value) || is_object($value)) ? $this->std_class_object_to_array($value) : $value;
            $array[$key] = $value;
        }
        return $array;
    }

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


    /**
     * 获取当前控制器与方法
     * @return array
     */
    public function getCurrentAction()
    {
        $action = \Route::current()->getActionName();
        list($class, $method) = explode('@', $action);
        //本系统将路由改成了getIndex形式故加下面一行
        $method = str_replace("get",'', strtolower($method));
        return ['method'=>$method];
        //return ['controller' => $class, 'method' => $method];
    }


    /**
     * 公用删除
     */
    public function getDelete(Request $request){
        print_r($request->input('id').'fff');
    }


}