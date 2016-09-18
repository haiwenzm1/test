<?php

namespace Admin\Logic;
use Think\Model;

class AuthGroupLogic extends Model {
    public function getAllInfo(){
        $result = D('AuthGroup')->getAllInfo();
        $tmp = get_array($result);
        return $tmp;
    }
}