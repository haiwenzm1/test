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
    
    public function add(){
        if(IS_GET){
            $id = intval($_GET['pid']);
            $last = intval($_GET['last']);
            $result = D('Menu','Logic')->getNameById($id);
            
            if(empty($last)){
                $this->meta_title = '增加菜单组';
            }else{
                $this->meta_title = '增加菜单';
            }
            $this->assign('id',$id);
            $this->assign('last',$last);
            $this->assign('classname',$result['info'][0]['name']);
            $this->display();
        }
        
        if(IS_POST){
            try {
                $result = D('Menu','Logic')->addInfo($_POST);
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
    
    public function edit(){
        if(IS_GET){
            if(trim($_GET['model']) == 'hide'){
                try {
                    $result = D('Menu','Logic')->updateIsHideById($_GET);
                    if($result['code']){
                        $this->success($result['msg']);
                    }else{
                        $this->error($result['msg']);
                    }
                } catch (\Exception $e) {
                    $this->error('系统异常');
                }
            }
            
            if(trim($_GET['model']) == 'delete'){
                try {
                    $result = D('Menu','Logic')->updateIsDeleteById($_GET);
                    if($result['code']){
                        $this->success($result['msg']);
                    }else{
                        $this->error($result['msg']);
                    }
                } catch (\Exception $e) {
                    $this->error('系统异常');
                }
            }
            
            if(trim($_GET['model']) == 'status'){
                try {
                    $result = D('Menu','Logic')->updateStatusById($_GET);
                    if($result['code']){
                        $this->success($result['msg']);
                    }else{
                        $this->error($result['msg']);
                    }
                } catch (\Exception $e) {
                    $this->error('系统异常');
                }
            }
            
            if(trim($_GET['model']) == 'info'){
                $id = intval($_GET['id']);
                $result = D('Menu','Logic')->getInfoById($id);
                $this->meta_title = '编辑菜单';
                $this->assign('data',$result['info'][0]);
                $this->display();
            }
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