<?php

namespace Admin\Logic;
use Think\Model;

class GroupLogic extends Model {

    public function getAllInfo(){
        $result = D('Group')->getAllInfo();
        return get_array($result);
    }

    public function getInfoById($data){
        $map = array();
        $map['id'] = $data['id'];
        $result = D('Group')->getInfoById($map);
        
        $map = array();
        $map['id'] = $result[0]['pid'];
        $pname = D('Group')->getNameByPid($map);
        $result[0]['pname'] = $pname[0]['name'];

        return $result;
    }

    public function addInfo($data){
        $map = array();
        $map['id'] = $data['pid'];
        $result = D('Group')->getRoleidById($map);
        if($result[0]['roleid']){
            $datas = array();
            $datas['pid'] = $data['pid'];
            $datas['name'] = $data['name'];
            $datas['is_last'] = $data['last'];
            $datas['description'] = $data['description'];
            $datas['create_time'] = time();
            $datas['update_time'] = $datas['create_time'];
            $datas['roleid'] = $result[0]['roleid'];
            return D('Group')->addInfo($datas);
        }else{
            return false;
        }   
    }

    public function updateInfoById($data){
        $map = array();
        $map['id'] = $data['id'];
        $map['name'] = $data['name'];
        $map['description'] = $data['description'];
        $map['update_time'] = time();
        return D('Group')->updateInfoById($map);
    }

    public function deleteInfoById($data){
        $map = array();
        $map['id'] = $data['id'];
        $map['is_delete'] = 1;
        $map['update_time'] = time();
        return D('Group')->deleteInfoById($map);
    }
}