<?php

namespace Admin\Logic;
use Think\Model;

class GroupLogic extends Model {
    
    public function getAllInfo(){
        $data = D('Group')->getAllInfo();
        $result = get_array($data);
        return array('code'=> 1, 'msg'=>'操作成功', 'info'=> $result);
    }
    
    public function getInfoById($data){
        $map = array();
        $map['id'] = $data['id'];
        $result = D('Group')->getInfoById($map);
        $map['id'] = $result[0]['pid'];
        $pname = D('Group')->getFieldById('name',$map);
        $result[0]['pname'] = $pname[0]['name'];
        return array('code'=> 1, 'msg'=>'操作成功', 'info'=> $result);
    }
    
    public function addInfo($data){
        $map = array();
        $map['id'] = $data['pid'];
        $field = D('Group')->getFieldById('roleid',$map);
        if($field[0]['roleid']){
            $map = array();
            $map['pid'] = $data['pid'];
            $map['name'] = $data['name'];
            $map['is_last'] = $data['last'];
            $map['description'] = $data['description'];
            $map['creator'] = -1;
            $map['create_time'] = time();
            $map['updater'] = -1;
            $map['update_time'] = $map['create_time'];
            $map['roleid'] = $field[0]['roleid'];
            $result = D('Group')->addInfo($map);
            return array('code'=> 1, 'msg'=>'操作成功', 'info'=> $result);
        }else{
            return array('code'=> 0, 'msg'=>'获取角色失败,请重试', 'info'=> '');
        }
    }
    
    public function updateInfoById($data){
        $map = array();
        $map['id'] = $data['id'];
        $field = D('Group')->getFieldById('version',$map);
        if($field[0]['version'] == $data['version']){
            $map['name'] = $data['name'];
            $map['description'] = $data['description'];
            $map['version'] = intval($data['version'])+1;
            $map['update_time'] = time();
            $map['updater'] = -1;
            $result = D('Group')->updateInfoById($map);
            return array('code'=> 1, 'msg'=>'操作成功', 'info'=> $result);
        }else{
            return array('code'=> 0, 'msg'=>'请刷新重试', 'info'=> '');
        }
    }
    
    public function deleteInfoById($data){
        $map = array();
        $map['id'] = $data['id'];
        $field = D('Group')->getFieldById('version',$map);
        if($field[0]['version'] == $data['version']){
            $map['is_delete'] = 1;
            $map['update_time'] = time();
            $map['updater'] = -1;
            $map['version'] = intval($data['version'])+1;
            $result = D('Group')->updateInfoById($map);
            return array('code'=> 1, 'msg'=>'操作成功', 'info'=> $result);
        }else{
            return array('code'=> 0, 'msg'=>'请刷新重试', 'info'=> '');
        }
    }
    
    public function updateStatusById($data){
        $map = array();
        $map['id'] = $data['id'];
        $field = D('Group')->getFieldById('status,version',$map);
        if($field[0]['version'] == $data['version']){
            $map['status'] = $field[0]['status']?0:1;
            $map['update_time'] = time();
            $map['updater'] = -1;
            $map['version'] = intval($data['version'])+1;
            $result = D('Group')->updateInfoById($map);
            return array('code'=> 1, 'msg'=>'操作成功', 'info'=> $result);
        }else{
            return array('code'=> 0, 'msg'=>'请刷新重试', 'info'=> '');
        }
    }
    
    public function getMenuByRoleid($data){
        $map = array();
        $map['id'] = $data['id'];
        $field = D('Group')->getFieldById('roleid',$map);
        if($field[0]['roleid']){
            $map = array();
            $map['roleid'] = $field[0]['roleid'];
            $info = D('Menu')->getAllInfo($map);
            $result = get_array($info);
            return array('code'=> 1, 'msg'=>'操作成功', 'info'=> $result);
        }else{
            return array('code'=> 0, 'msg'=>'获取角色失败,请重试', 'info'=> '');
        }
    }
}