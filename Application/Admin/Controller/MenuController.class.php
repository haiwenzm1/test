<?php

namespace Admin\Controller;
use Think\Controller;

class MenuController extends Controller{
    public function index(){
        $datas = D('AuthGroup')->getlist();
        $this->assign('datas',$datas);
        $this->display();
    }

    public function add(){
        if(IS_POST){
            //print_r($_POST);
			
			
            $this->success("操作成功");
        }else{
            $this->meta_title = '增加权限组';
            $this->display();
        }
    }
}