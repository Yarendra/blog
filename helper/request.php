<?php 
function request($key=''){
    $obj=(object)['controller'=>'login','method'=>'index','para'=>'','get'=>$_GET,'post'=>$_POST];    
    if(isset($_GET['url'])){
    $url=$_GET['url'];
    $url=explode('/',rtrim($url,'/'));
    $obj->controller=ucfirst(setstring($url[0]));
    $obj->method=isset($url[1])?strtolower($url[1]):$obj->method;
    $obj->para=isset($url[2])?$url[2]:$obj->para;
    unset($obj->get['url']);
    }
    if($key){
        if(array_key_exists($key,$_POST)){
            
            return $_POST[$key];
        }
        if(array_key_exists($key,$_GET)){
            return $_GET[$key];
        }
        return null;
    }
    return $obj;
}

function paint($key){
    $str='<div style="background:black;color:white;font-width:bold;"> ';
    if(is_array($key) or is_object($key)){
        $str.="<pre>";
        $str.=print_r($key);
        $str.="</pre>";
    }elseif(is_bool($key)){
        $str.="<pre>";
        $str.="TRUE";
        $str.="</pre>";
        
    }elseif(is_null($key)){
        $str.="<pre>";
        $str.="NULL";
        $str.="</pre>";
    }else{
        $str.=$key;
    }
    $str.=" </div>";
    echo $str;

}
?>