<?php
namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller {
    public function index(){
        
    }
    
    public function login(){
        if(IS_POST){
            
        }else{
            $this->meta_title = '后台管理系统';
            $this->display();
        }
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