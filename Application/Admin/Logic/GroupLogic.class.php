<?php

namespace Admin\Logic;
use Think\Model;

class GroupLogic extends Model {
    public function getAllInfo(){
        $result = D('Group')->getAllInfo();
        $tmp = get_array($result);
        return $tmp;
    }
}