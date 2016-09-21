<?php

namespace Admin\Model;
use Think\Model;

class GroupModel extends Model{

    public function getAllInfo(){
        return $this->where('is_delete=0')->select();
    }

    public function getInfoById($map){
        return $this->where($map)->select();
    }

    public function getVersionById($map){
        return $this->field("version")->where($map)->select();
    }

    public function getNameByPid($map){
        return $this->field("name")->where($map)->select();
    }

    public function getRoleidById($map){
        return $this->field('roleid')->where($map)->select();
    }
	
	public function addInfo($map){
        return $this->data($map)->add();
    }

    public function updateInfoById($map){
        return $this->data($map)->save();
    }

    public function deleteInfoById($map){
        return $this->data($map)->save();
    }
}