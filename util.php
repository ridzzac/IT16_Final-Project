<?php

function hasNull(array $arr): bool {
    foreach($arr as $value) {
        if($value === null) 
            return true;
    }
    return false;
}

?>
