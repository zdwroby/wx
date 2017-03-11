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


class WechatController extends AdminCommController
{
    /**
     * 公众号列表
     * @param  int  $id
     * @return Response
     */
    public function getList()
    {
        $data = $this->getMenuData('wechat','公众号管理');
        $data['galist'] = DB::table('one_wechat_galist')->where('state', '=', 0)->get(['id','name','type','appid','appsecret','api_token','api_url','create_time']);
        return view($this->theme.'.backend.wechat.list',$data);
    }
    /**
     * 运营活动
     */
    public function getActive(){
        $data = $this->getMenuData('wechat','公众号管理');
        return view($this->theme.'.backend.wechat.active',$data);
    }
    /**
     * 资源配置
     */
    public function get(){
        $data = $this->getMenuData('wechat','公众号管理');
        return view($this->theme.'.backend.wechat.source',$data);
    }

}