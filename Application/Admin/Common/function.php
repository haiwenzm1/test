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
/*
function get_array($id=0){
$sql = "select id,title from class where pid= $id";
$result = mysql_query($sql);//查询子类
$arr = array();
if($result && mysql_affected_rows()){//如果有子类
while($rows=mysql_fetch_assoc($result)){ //循环记录集
$rows['list'] = get_array($rows['id']); //调用函数，传入参数，继续查询下级
$arr[] = $rows; //组合数组
}
return $arr;
}
}*/