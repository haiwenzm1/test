<?php
namespace Admin\Controller;
use Think\Controller;

class EmptyController extends Controller{
    public function _empty(){
        $this->error('链接不存在','/Admin/Public/login.html');
    }
}