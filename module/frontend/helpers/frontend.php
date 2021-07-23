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

function stringDate($time){
    $time = strtotime($time);
    return date('d',$time) .' tháng '.date('m',$time).' ,'.date('Y',$time);
}
