<?php

namespace Admin\Model;
use Think\Model;

class MenuModel extends Model{
    public function getAllInfo($map){
        $map['is_delete'] = 0;
        return $this->where($map)->select();
    }
}