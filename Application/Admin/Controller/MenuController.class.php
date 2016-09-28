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
        if(IS_GET){
            $id = intval($_GET['pid']);
            
            if(empty($id)){
                $this->meta_title = '菜单列表';
            }else{
                $result = D('Menu','Logic')->getNameById($id);
                $this->meta_title = $result['info'][0]['name'].'列表';
            }
            
            $this->assign('id',$id);
            $result = D('Menu','Logic')->getAllInfoByPid($id);
            $this->assign('data',$result['info']);
            $this->display('list');
        }
    }
    
    public function edit(){
        if(IS_GET){
            $id = intval($_GET['id']);
            $result = D('Menu','Logic')->getInfoById($id);
            $this->meta_title = '编辑菜单';
            $this->assign('data',$result['info'][0]);
            $this->display();
        }
        
        if(IS_POST){
            try {
                $result = D('Menu','Logic')->updateInfoById($_POST);
                if($result['code']){
                    $this->success($result['msg']);
                }else{
                    $this->error($result['msg']);
                }
            } catch (\Exception $e) {
                $this->error('系统异常');
            }
        }
    }
}