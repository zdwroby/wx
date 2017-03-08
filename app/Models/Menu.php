<?php
/**
 * 公用模型获取查询数据
 * @author roby <zdwroby@gmail.com>
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Menu extends Model {
    //use SoftDeletes;
    static function getOne($id){
        $row = DB::table('one_menu')->where('id', $id)->first();
        //$row = DB::select("SELECT * FROM news WHERE id='$id'");
        return $row;
    }
}