<?php

namespace Admin\Model;
use Think\Model;

class GroupModel extends Model{
    public function getAllInfo(){
        $result = $this->where('is_delete=0')->select();
        return $result;
    }

    public function getInfoById($id){
        $map['id']=$id;
        return $this->where($map)->select();
    }

    public function getPinfoByPid($pid){
        $map['id'] = $pid;
        return $this->field("name")->where($map)->select();
    }

    public function getRoleidById($id){
        $map['id'] = $id;
        $result = $this->field('roleid')->where($map)->select();
        return $result;
    }
	
	public function addInfo($data){
        $result = $this->data($data)->add();
        return $result;
    }
}