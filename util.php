<?php

function hasNull(array $arr): bool {
    foreach($arr as $value) {
        if($value === null) 
            return true;
    }
    return false;
}

function toArrayOfRef(array $arr): array {
    foreach ($arr as $key => $value){
        $arr[$key] = &$value;
    }
    return $arr;
}

?>
