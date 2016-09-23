<?php
namespace Admin\Controller;
use Think\Controller;

class EmptyController extends Controller{
    public function _empty(){
        echo '<script type="text/javascript">alert("The link does not exist!");window.history.go(-1);</script>';
    }
}