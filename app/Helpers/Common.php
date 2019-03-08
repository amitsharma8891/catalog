<?php
/**
 * @param $length
 *
 * @return string
 */
function random_string($length)
{
    $str = '';
    $characters = array_merge(range('a', 'z'), range('1', '5'), array('.'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; ++$i) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }

    return $str;
}
