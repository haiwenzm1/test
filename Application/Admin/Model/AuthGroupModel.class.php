<?php

namespace Admin\Model;
use Think\Model;

class AuthGroupModel extends Model{
    public function getlist(){
        $results = $this->where('status=1')->select();
        return $results;
    }
	
	public function add(){
        $results = $this->where('status=1')->select();
        return $results;
    }
}