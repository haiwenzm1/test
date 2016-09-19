<?php

namespace Admin\Model;
use Think\Model;

class MenuModel extends Model{
    public function getAllInfo(){
        $results = $this->where('is_delete=0')->select();
        return $results;
    }
}