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
    
    public function getFieldById($field,$map){
        return $this->field($field)->where($map)->select();
    }
    
    public function addInfo($map){
        return $this->data($map)->add();
    }
    
    public function updateInfoById($map){
        return $this->data($map)->save();
    }
    
}