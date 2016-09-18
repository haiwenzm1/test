<?php

function get_array($result,$id=0){
    $r = array();
    $result_num = count($result);
   
    for($i = 0; $i < $result_num; $i++){
        if($result[$i]['pid']==$id){
            $r[] = $result[$i];
        }
    }
    $r_num = count($r);
    $arr = array();
    if($r_num){
        for($i = 0;$i<$r_num;$i++){
            $r[$i]['list'] = get_array($result,$r[$i]['id']);
            $arr[] = $r[$i];
        }
        return $arr;
    }
}