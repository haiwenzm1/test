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
            $datas = D('Group','Logic')->getAllInfo();
            $data['info'] = $datas;
            $data['status'] = 1;
            $data['url'] = "";
            $this->ajaxReturn($data);
        }
     }

    public function getInfoById(){
        if(IS_POST){
            try{
                $datas = D('Group','Logic')->getInfoById($_POST);
                $data['info'] = $datas;
                $data['status'] = 1;
                $data['url'] = "";
                $this->ajaxReturn($data); 
            }catch(\Exception $e){
                $this->error("操作异常");
            }
        }
     }

    public function addInfo(){
        if(IS_POST){
            try {
                $data = D('Group','Logic')->addInfo($_POST);
                if($data){
                    $this->success("操作成功");
                }else{
                    $this->error("操作失败"); 
                }
            } catch (\Exception $e) {
                $this->error("操作异常");
            }
        }
    }

    public function updateInfoById(){
        if(IS_POST){
            try {
                $data = D('Group','Logic')->updateInfoById($_POST);
                if($data){
                    $this->success("操作成功");
                }else{
                    $this->error("操作失败"); 
                }
            } catch (\Exception $e) {
                $this->error("操作异常");
            }
        }
    }

    public function deleteInfoById(){
        if(IS_POST){
            try {
                $data = D('Group','Logic')->deleteInfoById($_POST);
                if($data){
                    $this->success("操作成功");
                }else{
                    $this->error("操作失败"); 
                }
            } catch (\Exception $e) {
                $this->error("操作异常");
            }
        }
    }
}