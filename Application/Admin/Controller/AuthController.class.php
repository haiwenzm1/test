<?php

namespace Admin\Controller;
use Think\Controller;

class AuthController extends Controller{
    public function _initialize(){
        //$this->error('虽已获得访问授权，但身份类型错误!','/Public/login');
    }
    
    public function _empty(){
        $this->error('链接不存在','/Admin/Auth/index.html');
    }
    
    public function index(){
        $this->meta_title = '权限组列表';
        $this->display('list');
    }
    
    public function getAllInfo(){
        if(IS_POST){
            $result = D('Group','Logic')->getAllInfo();
            if($result['code']){
                $this->success($result['info']);
            }
        }
    }
    
    public function getInfoById(){
        if(IS_POST){
            try{
                $result = D('Group','Logic')->getInfoById($_POST);
                if($result['code']){
                    $this->success($result['info']);
                }
            }catch(\Exception $e){
                $this->error("系统异常");
            }
        }
    }
    
    public function addInfo(){
        if(IS_POST){
            try {
                $result = D('Group','Logic')->addInfo($_POST);
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
    
    public function updateInfoById(){
        if(IS_POST){
            try {
                $result = D('Group','Logic')->updateInfoById($_POST);
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
    
    public function deleteInfoById(){
        if(IS_POST){
            try {
                $result = D('Group','Logic')->deleteInfoById($_POST);
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

    public function updateStatusById(){
        if(IS_POST){
            try {
                $result = D('Group','Logic')->updateStatusById($_POST);
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