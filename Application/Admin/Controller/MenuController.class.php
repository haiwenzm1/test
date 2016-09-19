<?php

namespace Admin\Controller;
use Think\Controller;

class MenuController extends Controller{
    public function index(){
        $this->meta_title = '菜单列表';
        $this->display('list');
    }

    public function getAllInfo(){
        if(IS_POST){
            $datas = D('Menu','Logic')->getAllInfo();
            $data['info'] = $datas;
            $data['status'] = 1;
            $data['url'] = "";
            $this->ajaxReturn($data);
        }
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