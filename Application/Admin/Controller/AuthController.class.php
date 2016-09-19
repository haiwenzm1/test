<?php

namespace Admin\Controller;
use Think\Controller;

class AuthController extends Controller{
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
}