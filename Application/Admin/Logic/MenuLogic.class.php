<?php

namespace Admin\Logic;
use Think\Model;

class MenuLogic extends Model{
    
    public function getAllInfo(){
        $map = array();
        $info = D('Menu')->getAllInfo($map);
        $result = get_array($info);
        return $result;
    }
    
}