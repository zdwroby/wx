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


class OneWechatController extends AdminCommController
{
    public $data;
    public function __construct()
    {
        $this->data = $this->getMenuData('onewechat','公众号管理');
    }
    /**
     * 自定义菜单管理
     */
    public function getMenu(Request $request){
        $ga = $request->input('id');

        return view($this->theme.'.backend.onewechat.menu',$this->data);
    }
    /**
     * 关键词回复
     */
    public function getKeyword(){
        return view($this->theme.'.backend.onewechat.keyword',$this->data);
    }
    /**
     * 事件回复
     */
    public function getEvent(){
        return view($this->theme.'.backend.onewechat.event',$this->data);
    }
}