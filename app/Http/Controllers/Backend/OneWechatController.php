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


class OneWechatController extends AdminCommController
{
    /**
     * 自定义菜单管理
     */
    public function getMenu(){
        $data = $this->getMenuData('onewechat','公众号管理');
        return view($this->theme.'.backend.onewechat.menu',$data);
    }
    /**
     * 关键词回复
     */
    public function getKeyword(){
        $data = $this->getMenuData('onewechat','公众号管理');
        return view($this->theme.'.backend.onewechat.keyword',$data);
    }
    /**
     * 事件回复
     */
    public function getEvent(){
        $data = $this->getMenuData('onewechat','公众号管理');
        return view($this->theme.'.backend.onewechat.event',$data);
    }
}