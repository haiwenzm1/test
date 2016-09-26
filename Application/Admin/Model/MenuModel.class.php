<?php

namespace Admin\Model;
use Think\Model;

class MenuModel extends Model{
    
    public function getAllInfo($map){
        $map['is_delete'] = 0;
        return $this->where($map)->select();
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