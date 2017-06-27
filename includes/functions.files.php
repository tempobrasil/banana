<?

function GetArquivosArray($str){

    if(empty($str))
        return array();

    return explode('|', $str);
}

function GetArquivosString($array){
    return implode('|', $array);
}

?>