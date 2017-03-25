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
use DB;

class WeixinController extends Controller
{
    public function getIndex(Request $request)
    {
        $abc = $request->all();
        DB::insert('insert into one_wechat_log (log) values (?)', [json_encode($abc)]);

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
            }
        }

    }

    public function postIndex(Request $request){
        $abc = $request->all();
        DB::insert('insert into one_wechat_log (log) values (?)', ['post'.json_encode($abc)]);

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
            'signature' => $request->input('signature'),
            'timestamp' => $request->input('timestamp'),
            'nonce' => $request->input('nonce'),
        );
        DB::insert('insert into one_wechat_log (log) values (?)', ['111']);
        if($wechat->checkSignature($arr)){              //检验消息真实性
            $echoStr = $request->input("echostr");
            if (isset($echoStr)) {                  //微信接入
                DB::insert('insert into one_wechat_log (log) values (?)', ['222']);
                exit($echoStr);
            } else {                                //微信交互
                $wx_back = $wechat->request();
                DB::insert('insert into one_wechat_log (log) values (?)', ['333'.json_encode($wx_back)]);
                //$wechat->sendMsg($wx_back['fromusername'],'发送客服信息');
                $image = array(
                    "https://dn-phphub.qbox.me/uploads/images/201609/19/1/pVYzokV0Od.jpg",
                    "412345666",
                    "12233"
                );
                //$wechat->response("https://dn-phphub.qbox.me/uploads/images/201609/19/1/pVYzokV0Od.jpg", $request->input("nonce"), 'image');
                //DB::insert('insert into one_wechat_log (log) values (?)', ['333'.json_encode($wx_back)]);
                //$wechat->response("回复文本", $request->input("nonce"));
                switch($wx_back['content']){
                    case '11':
                        $wechat->response("回复11", $request->input("nonce"));
                        break;
                    case '22':
                        $wechat->response("回复22", $request->input("nonce"));
                        break;
                }
            }
        }
    }

}