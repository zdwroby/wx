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


class ExamController extends AdminCommController
{
    /**
     * 章节管理
     * @param  int  $id
     * @return Response
     */
    public function getIndex()
    {
        $data = $this->getMenuData('exam','题库管理');
        return view($this->theme.'.backend.exam.index',$data);
    }

}