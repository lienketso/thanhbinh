<?php

use Menu\Models\Menu;

function getAllmenu(){
    $lang = session('lang');
    $menuWise = Menu::orderBy('sort_order','asc')
        ->where('lang_code',$lang)->where('status','active')->where('parent',0)
        ->get();
    return $menuWise;
}
function sub($str,$num){
    return mb_substr(strip_tags($str), 0, $num);
}
if (! function_exists('cut_string')) {

    function cut_string($str, $int)
    {
        if(strlen($str)>$int){
            return substr($str,0,$int).'...';
        }else{
            return substr($str,0,$int);
        }

    }
}
function stringDate($time){
    $time = strtotime($time);
    return date('d',$time) .' tháng '.date('m',$time).' ,'.date('Y',$time);
}
