<?php
/**
 * Created by PhpStorm.
 * User: roby <zdwroby@gmail.com>
 * Desc: 文件管理
 * Date: 2017/2/28
 * Time: 10:05
 */


namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Intervention\Image\ImageManagerStatic as Image;

class FileController extends Controller
{
    /**
     * 上传图片 post
     */
    public function postUpload(Request $request){
        $dir = $request->input('dir');
        if($dir){
            $targetFolder = '/public/uploads/'.$dir.'/'; // Relative to the root
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            if (!file_exists($targetPath)) {
                mkdir($targetPath);
            }
        }else{
            $targetFolder = '/public/uploads/'; // Relative to the root
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
        }
        $targetUrl = 'http://'.$_SERVER['SERVER_NAME'] . $targetFolder;

        //$this->ajaxReturn($_FILES);
        if (!empty($_FILES)) {
            $tempFile = $_FILES['download']['tmp_name'];

            // Validate the file type
            $fileTypes = array('jpeg','jpg','png');
            $fileParts = pathinfo($_FILES['download']['name']);

            $new_file_name = date("YmdHis") . '_' . rand(10000, 99999).'.'.$fileParts['extension'];
            $thumg_file_name = 'thumg_'.date("YmdHis") . '_' . rand(10000, 99999).'.'.$fileParts['extension'];


            if (in_array($fileParts['extension'],$fileTypes)) {

                $targetFile = rtrim($targetPath,'/') . '/'.$new_file_name;
                move_uploaded_file($tempFile,$targetFile);

                $is_thumg = $request->input('is_thumg');
                if($is_thumg){
                    $thumgFile = rtrim($targetPath,'/') . '/'.$thumg_file_name;
                    Image::make($targetFile)->resize(120, 58)->save($thumgFile);
                }
                $arr = array('status'=>1,'dest'=>$targetUrl.$new_file_name, 'thumg'=>$targetUrl.$thumg_file_name);
            } else {
                $arr = array('status'=>0,'msg'=>'不合法的文件');
            }
        }

        $this->ajaxReturn($arr);
    }
    private function alert($msg) {
        header('Content-type: text/html; charset=UTF-8');
        echo json_encode(array('error' => 1, 'message' => $msg));
        exit;
    }
    public function postUploadjson(Request $request){
        $php_path = public_path('uploads');
        $php_url = 'http://'.$_SERVER['SERVER_NAME'];

        //文件保存目录路径
        $save_path = $php_path.'/'.config('app.admin_uploads').'/';
        //文件保存目录URL
        $save_url = $php_url.'/public/uploads/'.config('app.admin_uploads').'/';
        //定义允许上传的文件扩展名
        $ext_arr = array(
            'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
            'flash' => array('swf', 'flv'),
            'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
            'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2'),
        );

        //最大文件大小
        $max_size = config('app.admin_max_upload_size');;

        $save_path = realpath($save_path) . '/';

        //PHP上传失败
        if (!empty($_FILES['imgFile']['error'])) {
            switch($_FILES['imgFile']['error']){
                case '1':
                    $error = '超过php.ini允许的大小。';
                    break;
                case '2':
                    $error = '超过表单允许的大小。';
                    break;
                case '3':
                    $error = '图片只有部分被上传。';
                    break;
                case '4':
                    $error = '请选择图片。';
                    break;
                case '6':
                    $error = '找不到临时目录。';
                    break;
                case '7':
                    $error = '写文件到硬盘出错。';
                    break;
                case '8':
                    $error = 'File upload stopped by extension。';
                    break;
                case '999':
                default:
                    $error = '未知错误。';
            }
            $this->alert($error);
        }
        //有上传文件时
        if (empty($_FILES) === false) {
            //原文件名
            $file_name = $_FILES['imgFile']['name'];
            //服务器上临时文件名
            $tmp_name = $_FILES['imgFile']['tmp_name'];
            //文件大小
            $file_size = $_FILES['imgFile']['size'];
            //检查文件名
            if (!$file_name) {
                $this->alert("请选择文件。");
            }
            //检查目录
            if (@is_dir($save_path) === false) {
                $this->alert("上传目录不存在。".$save_path);
            }
            //检查目录写权限
            if (@is_writable($save_path) === false) {
                alert("上传目录没有写权限。");
            }
            //检查是否已上传
            if (@is_uploaded_file($tmp_name) === false) {
                $this->alert("上传失败。");
            }
            //检查文件大小
            if ($file_size > $max_size) {
                $this->alert($file_size."上传文件大小超过限制。".$max_size);
            }
            //检查上传文件类型 //默认为上传image
            $dir_name = empty($request->input['dir']) ? 'image' : trim($request->input['dir']);
            if (empty($ext_arr[$dir_name])) {
                $this->alert("上传文件类型不合要求。");
            }

            //获得文件扩展名
            $temp_arr = explode(".", $file_name);
            $file_ext = array_pop($temp_arr);
            $file_ext = trim($file_ext);
            $file_ext = strtolower($file_ext);
            //检查扩展名
            if (in_array($file_ext, $ext_arr[$dir_name]) === false) {
                $this->alert("上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $ext_arr[$dir_name]) . "格式。");
            }
            //创建文件夹
            $folder = $_GET['folder'];
            if ($folder !== '') {
                $save_path .= $folder . "/";
                $save_url .= $folder . "/";
                if (!file_exists($save_path)) {
                    mkdir($save_path);
                }
            }
            $ymd = date("Ymd");
            $save_path .= $ymd . "/";
            $save_url .= $ymd . "/";
            if (!file_exists($save_path)) {
                mkdir($save_path);
            }

            //新文件名
            $file_before = date("YmdHis") . '_' . rand(10000, 99999);
            $new_file_name = $file_before . '.' . $file_ext;
            $thumg_file_name = 'thumg_'.$file_before . '.' . $file_ext;
            //移动文件
            $file_path = $save_path . $new_file_name;
            $thumg_path = $save_path . $thumg_file_name;
            if (move_uploaded_file($tmp_name, $file_path) === false) {
                $this->alert("上传文件失败。");
            }

            if(isset($_GET['is_thumg'])){           //是否生成缩略图
                Image::make($file_path)->resize(300, 200)->save($thumg_path);
            }



            @chmod($file_path, 0644);
            $file_url = $save_url . $new_file_name;

            header('Content-type: text/html; charset=UTF-8');

            echo json_encode(array('error' => 0, 'url' => $file_url));
            exit;
        }


    }
    public function getManager(Request $request)
    {
        $php_path = public_path('uploads');
        $php_url = 'http://'.$_SERVER['SERVER_NAME'];
        //文件保存目录路径
        $root_path = $php_path .'/'.config('app.admin_uploads').'/';
        //根目录URL，可以指定绝对路径，比如 http://www.yoursite.com/attached/
        $root_url = $php_url.'/public/uploads/'.config('app.admin_uploads').'/';



        //图片扩展名
        $ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');

        //创建文件夹
        $folder = $_GET['folder'];
        if ($folder !== '') {
            $root_path .= $folder . "/";
            $root_url .= $folder . "/";
            if (!file_exists($root_path)) {
                mkdir($root_path);
            }
        }

        //根据path参数，设置各路径和URL
        if (empty($_GET['path'])) {
            $current_path = realpath($root_path) . '/';
            $current_url = $root_url;
            $current_dir_path = '';
            $moveup_dir_path = '';
        } else {
            $current_path = realpath($root_path) . '/' . $_GET['path'];
            $current_url = $root_url . $_GET['path'];
            $current_dir_path = $_GET['path'];
            $moveup_dir_path = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);
        }
        echo realpath($root_path);
        //排序形式，name or size or type
        $order = empty($_GET['order']) ? 'name' : strtolower($_GET['order']);

        //不允许使用..移动到上一级目录
        if (preg_match('/\.\./', $current_path)) {
            echo 'Access is not allowed.';
            exit;
        }
        //最后一个字符不是/
        if (!preg_match('/\/$/', $current_path)) {
            echo 'Parameter is not valid.';
            exit;
        }
        //目录不存在或不是目录
        if (!file_exists($current_path) || !is_dir($current_path)) {
            echo 'Directory does not exist.';
            exit;
        }

        //遍历目录取得文件信息
        $file_list = array();
        if ($handle = opendir($current_path)) {
            $i = 0;
            while (false !== ($filename = readdir($handle))) {
                if ($filename{0} == '.') continue;
                $file = $current_path . $filename;
                if (is_dir($file)) {
                    $file_list[$i]['is_dir'] = true; //是否文件夹
                    $file_list[$i]['has_file'] = (count(scandir($file)) > 2); //文件夹是否包含文件
                    $file_list[$i]['filesize'] = 0; //文件大小
                    $file_list[$i]['is_photo'] = false; //是否图片
                    $file_list[$i]['filetype'] = ''; //文件类别，用扩展名判断
                } else {
                    $file_list[$i]['is_dir'] = false;
                    $file_list[$i]['has_file'] = false;
                    $file_list[$i]['filesize'] = filesize($file);
                    $file_list[$i]['dir_path'] = '';
                    $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $file_list[$i]['is_photo'] = in_array($file_ext, $ext_arr);
                    $file_list[$i]['filetype'] = $file_ext;
                }
                $file_list[$i]['filename'] = $filename; //文件名，包含扩展名
                $file_list[$i]['datetime'] = date('Y-m-d H:i:s', filemtime($file)); //文件最后修改时间
                $i++;
            }
            closedir($handle);
        }


        usort($file_list, 'cmp_func');

        $result = array();
        //相对于根目录的上一级目录
        $result['moveup_dir_path'] = $moveup_dir_path;
        //相对于根目录的当前目录
        $result['current_dir_path'] = $current_dir_path;
        //当前目录的URL
        $result['current_url'] = $current_url;
        //文件数
        $result['total_count'] = count($file_list);
        //文件列表数组
        $result['file_list'] = $file_list;

        //输出JSON字符串
        header('Content-type: application/json; charset=UTF-8');
        echo json_encode($result);

    }
    public function getIndex(){
        //$manager = new ImageManager();
        $image = Image::make(public_path('uploads/LaravelAcademy.jpg'))->resize(400, 400);
        $image->insert(public_path('uploads/logo.png'), 'bottom-right', 20, 20);        //添加水印
        //$image->greyscale();                                                            //变灰处理
        $image->save(public_path('uploads/abcnnkk.jpg') );

    }


}