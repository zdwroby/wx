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
use DB;


class NewsController extends AdminCommController
{
    /**
     * 新闻列表
     * @param  int  $id
     * @return Response
     */
    public function getIndex()
    {
        $data = $this->getMenuData('news','新闻列表');
        return view($this->theme.'.backend.news.index',$data);
    }


}