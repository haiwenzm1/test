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
            $datas = array();
            $datas['pid'] = $data['pid'];
            $datas['name'] = $data['name'];
            $datas['is_last'] = $data['last'];
            $datas['description'] = $data['description'];
            $datas['create_time'] = time();
            $datas['update_time'] = $datas['create_time'];
            $datas['roleid'] = $field[0]['roleid'];
            $result = D('Group')->addInfo($datas);
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
            $map['version'] = intval($data['version'])+1;
            $result = D('Group')->updateInfoById($map);
            return array('code'=> 1, 'msg'=>'操作成功', 'info'=> $result);
        }else{
            return array('code'=> 0, 'msg'=>'请刷新重试', 'info'=> '');
        }
    }
}