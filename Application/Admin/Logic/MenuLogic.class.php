<?php

namespace Admin\Logic;
use Think\Model;

class MenuLogic extends Model{

    public function getAllInfo(){
        $result = D('Menu')->getAllInfo();
        $tmp = get_array($result);
        return $tmp;
    }
}