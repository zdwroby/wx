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


class TeachingController extends AdminCommController
{
    /**
     * 章节管理
     * @param  int  $id
     * @return Response
     */
    public function getSection()
    {
        $data = $this->getMenuData('teaching','章节管理');
        return view($this->theme.'.backend.teaching.section',$data);
    }
    /**
     * 讲师管理
     */
    public function getTeacher(){
        $data = $this->getMenuData('teaching','讲师管理');
        return view($this->theme.'.backend.teaching.teacher',$data);
    }
    /**
     * 视频管理
     */
    public function getVideo(){
        $data = $this->getMenuData('teaching','视频管理');
        return view($this->theme.'.backend.teaching.video',$data);
    }

}