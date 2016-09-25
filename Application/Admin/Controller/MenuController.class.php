<?php

namespace Admin\Controller;
use Think\Controller;

class MenuController extends Controller{
    
    public function _initialize(){
        //$this->error('虽已获得访问授权，但身份类型错误!','/Public/login');
    }
    
    public function _empty(){
        echo '<script type="text/javascript">alert("The link does not exist!"); window.location.href = "/";</script>';
    }
    
    public function index(){
        $this->meta_title = '菜单列表';
        $this->display('list');
    }
    
    public function getAllInfo(){
        if(IS_POST){
            $datas = D('Menu','Logic')->getAllInfo();
            $this->success($datas);
        }
    }
    
    public function addInfo(){
        if(IS_POST){
            try {
                $result = D('Menu','Logic')->addInfo($_POST);
                if($result['code']){
                    $this->success($result['msg']);
                }else{
                    $this->error($result['msg']);
                }
            } catch (\Exception $e) {
                $this->error("系统异常");
            }
        }
    }
}