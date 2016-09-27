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
    
    public function getAllInfoByPid($data){
        $map = array();
        $map['pid'] = intval($data['pid']);
        $result = D('Menu')->getAllInfo($map);
        return array('code'=> 1, 'msg'=>'操作成功', 'info'=> $result);
    }
    
    public function getInfoById($data){
        $map = array();
        $map['id'] = $data['id'];
        $result = D('Menu')->getInfoById($map);
        $map['id'] = $result[0]['pid'];
        $pname = D('Menu')->getFieldById('name',$map);
        $result[0]['pname'] = $pname[0]['name'];
        return array('code'=> 1, 'msg'=>'操作成功', 'info'=> $result);
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
    
    public function updateInfoById($data){
        $map = array();
        $map['id'] = $data['id'];
        $field = D('Menu')->getFieldById('version',$map);
        if($field[0]['version'] == $data['version']){
            $map['name'] = $data['name'];
            $map['url'] = $data['url'];
            $map['description'] = $data['description'];
            $map['sort'] = intval($data['sort']);
            $map['is_hide'] = intval($data['hide']);
            $map['status'] = intval($data['status']);
            $map['version'] = intval($data['version'])+1;
            $map['update_time'] = time();
            $map['updater'] = -1;
            $result = D('Menu')->updateInfoById($map);
            return array('code'=> 1, 'msg'=>'操作成功', 'info'=> $result);
        }else{
            return array('code'=> 0, 'msg'=>'请刷新重试', 'info'=> '');
        }
    }
    
}