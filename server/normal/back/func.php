<?php
function strstr_array($str,$array){
    foreach ($array as $value) {
        if(strstr($str, $value))
        return true;
    }
    return false;
}

function Json2Html($json){
    if(!is_array($json)) return $json;
    $str = '';

    $singleTags = array('hr','br','img','input','param');

    foreach($json as $key => $value){
        if(!is_array($value)) {$str .= $value;continue;}
        $str .= '<'.$value['tag'];
        if(!empty($value['attrs'])){
            foreach($value['attrs'] as $v){
                $str .= " {$v['name']}=\"{$v['value']}\"";
            }
        }
        $str .= '>';
        $str .= Json2Html($value['children']);
        if(!in_array($value['tag'],$singleTags)){
            $str .= "</{$value['tag']}>";
        }
    }
    return $str;
}
