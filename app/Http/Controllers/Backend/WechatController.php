<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/28
 * Time: 10:05
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\AdminCommController;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;


class WechatController extends AdminCommController
{
    public $data;
    public function __construct(Request $request)
    {
        if(!$request->isMethod('post')){
            $this->data = $this->getMenuData('wechat','公众号管理');
        }
        //exit;
    }

    //公众号管理[页面]
    public function getGa(Request $request){
        $act = $request->input('act','list');
        $id = $request->input('id');
        switch ($act){
            case 'list':
                $this->data['galist'] = DB::table('one_wechat_galist')->where('state', '=', 0)->paginate(10);
                return view($this->theme.'.backend.wechat.galist',$this->data);
                break;
            case 'edit':
                $this->data['sub_title'] = '编辑公众号';
                $this->data['but_act'] = '编辑';
                if(intval($id)){
                    $this->data['row'] = DB::table('one_wechat_galist')->where('id', $id)->first();
                    return view($this->theme.'.backend.wechat.ga',$this->data);
                }
                break;
            case 'add':
                $this->data['sub_title'] = '新增公众号';
                $this->data['but_act'] = '新增';
                return view($this->theme.'.backend.wechat.ga',$this->data);
                break;
            case 'delete':
                if(intval($id)){
                    DB::delete('delete from one_news where id="'.$id.'"');
                    return redirect('wechat/source');
                }
                break;
        }


    }
    //新增、编辑公众号行为
    public function postGa(Request $request){
        $form = $request->except('_token');
        $now_time = time();
        $form['update_time'] = $now_time;
        if(intval($form['id'])){
            $flag = DB::table('one_wechat_galist')->where("id",$form['id'])->update($form);
        }else{
            $form['create_time'] = $now_time;
            $flag = DB::table('one_wechat_galist')->insert($form);
        }

        if($flag){
            return redirect('wechat/list');
        }
    }
    /**
     * 运营活动
     */
    public function getActive(){
        return view($this->theme.'.backend.wechat.active',$this->data);
    }
    /**
     * 资源管理页面
     */
    public function postSource(Request $request){
        $form = $request->except('_token');
        $now_time = time();
        $form['update_time'] = $now_time;
        if(intval($form['id'])){            //编辑
            $flag = DB::table('one_news')->where("id",$form['id'])->update($form);
        }else{
            $form['create_time'] = $now_time;
            $flag = DB::table('one_news')->insert($form);
        }
        if($flag){
            return redirect('wechat/source');
        }
    }

    public function getSource(Request $request){
        $act = $request->input('act','list');
        $id = $request->input('id');
        switch ($act){
            case 'list':
                $list = DB::table('one_news')
                    ->where('type', '=', 1)
                    ->orWhere('type', '=', '2')
                    ->paginate(10);
                $this->data['source_list'] = $list;

                return view($this->theme.'.backend.wechat.sourcelist',$this->data);
                break;
            case 'add':
                $this->data['sub_title'] = '新增资源';
                $this->data['but_act'] = '新增';
                $source_type = $this->getCateType('wechat_source');
                $this->data['source_type'] = $source_type;
                return view($this->theme.'.backend.wechat.source',$this->data);
                break;
            case 'edit':
                $this->data['sub_title'] = '编辑资源';
                $this->data['but_act'] = '编辑';
                $source_type = $this->getCateType('wechat_source');
                $this->data['source_type'] = $source_type;
                if(intval($id)){
                    $this->data['row'] = DB::table('one_news')->where('id', $id)->first();
                    return view($this->theme.'.backend.wechat.source',$this->data);
                }
                break;
            case 'delete':
                if(intval($id)){
                    DB::delete('delete from one_news where id="'.$id.'"');
                    return redirect('wechat/source');
                }
                break;
        }


    }

}