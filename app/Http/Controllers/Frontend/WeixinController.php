<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/28
 * Time: 10:05
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;

class WeixinController extends Controller
{
    public function getTest(){
        print_r('fff');exit;
    }

    public function getIndex(Request $request)
    {
        DB::insert('insert into one_wechat_log (log) values (?)', ['aaa']);

        $options = [
            'account' => 'gh_21c0109152ba',
            'app_id' => 'wx85ba665b39a0337b',
            'secret' => '0c0092c7050932826a74197a08d2719c',
            'encode' => false,
            'AESKey' => 'sBk1UAzoSJyqbenjYXljLl8UVQvThwkZqvdgpYPfFo3',
            'token' => 'weixin',
            // ...
        ];
        require_once app_path().'/Com/Wechat.php';
        $wechat = new \Wechat($options);
        $arr = array(
            'signature' => $request->get('signature'),
            'timestamp' => $request->get('timestamp'),
            'nonce' => $request->get('nonce'),
        );
        if($wechat->checkSignature($arr)){              //检验消息真实性
            $echoStr = $request->get("echostr");
            if (isset($echoStr)) {                  //微信接入
                exit($echoStr);
            } else {                                //微信交互
                $wechat->response("测试内容", $request->get("nonce"), $type = 'text', $flag = 0);
            }
        }







    }


}