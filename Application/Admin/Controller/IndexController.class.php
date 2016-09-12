<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
        echo 'ok';
    }
    
    public function login(){
        $this->meta_title = '后台管理系统';
        //$this->assign('meta_title','后台管理系统');
        $this->display();
    }

     public function verify(){
        $config = array(
            'fontSize' => 30, // 验证码字体大小
            'length' => 3, // 验证码位数
            'useCurve' => false,
            'useNoise' => true // 关闭验证码杂点
        );
        $verify = new \Think\Verify($config);
        $verify->entry(1);
    }
}