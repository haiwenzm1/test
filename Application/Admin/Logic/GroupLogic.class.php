<?php

namespace Admin\Logic;
use Think\Model;

class GroupLogic extends Model {
    public function getAllInfo(){
        $result = D('Group')->getAllInfo();
        $tmp = get_array($result);
        return $tmp;
    }

    public function addInfo($data){
        $result = D('Group')->getRoleidById($data['pid']);
        if($result[0]['roleid']){
            $datas = array();
            $datas['pid'] = $data['pid'];
            $datas['name'] = $data['name'];
            $datas['is_last'] = $data['last'];
            $datas['description'] = $data['description'];
            $datas['create_time'] = time();
            $datas['update_time'] = $datas['create_time'];
            $datas['roleid'] = $result[0]['roleid'];
            
            $result = D('Group')->addInfo($datas);
            return $result;
        }else{
            return false;
        }   
    }
}