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
    
    public function addInfo($data){
        $map = array();
        $map['id'] = $data['pid'];
        $field = D('Menu')->getFieldById('roleid',$map);
        if($field[0]['roleid']){
            $datas = array();
            $datas['pid'] = $data['pid'];
            $datas['name'] = $data['name'];
            $datas['url'] = $data['url'];
            $datas['is_last'] = $data['last'];
            $datas['is_hide'] = $data['hidden'];
            $datas['sort'] = trim($data['sort'])?intval($data['sort']):1;
            $datas['description'] = $data['description'];
            $datas['creator'] = -1;
            $datas['create_time'] = time();
            $datas['update_time'] = $datas['create_time'];
            $datas['updater'] = -1;
            $datas['roleid'] = $field[0]['roleid'];
            $result = D('Menu')->addInfo($datas);
            return array('code'=> 1, 'msg'=>'操作成功', 'info'=> $result);
        }else{
            return array('code'=> 0, 'msg'=>'获取角色失败,请重试', 'info'=> '');
        }
    }
    
}