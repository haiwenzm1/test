<?php

namespace Admin\Model;
use Think\Model;

class GroupModel extends Model{
    public function getAllInfo(){
        $results = $this->where('is_delete=0')->select();
        return $results;
    }
	
	public function add(){
        $results = $this->where('status=1')->select();
        return $results;
    }
}