<?php

namespace Admin\Controller;
use Think\Controller;

class MenuController extends Controller{
    public function index(){
        $datas = D('AuthGroup','Logic')->getAllInfo();
        $tmp = get_array($datas);
        $this->assign('datas',$tmp);
        $this->meta_title = '增加权限组';
        $this->display();
    }

    public function add(){
        if(IS_POST){
            //print_r($_POST);

            if(!trim($_POST['groupname'])){
                $this->error("权限组名不能为空");
            }

            $this->success("操作成功");
        }else{
            $this->meta_title = '增加权限组';
            $this->display();
        }
    }
}