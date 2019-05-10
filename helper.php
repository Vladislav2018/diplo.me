<?php
function b_dump($dumped)
{
    echo '<pre>';print_r($dumped); echo '</pre>';
}
function in_multidimensional_array($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_multidimensional_array($needle, $item, $strict))) {
            return true;
        }
    }
    return false;
}
?>