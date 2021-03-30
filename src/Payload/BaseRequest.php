<?php


namespace Opay\Payload;


abstract class BaseRequest
{
    public function sort($array): array
    {
        if (!is_array($array) || empty($array)) {
            return $array;
        }
        ksort($array);
        foreach ($array as $key => $val) {
            if (is_array($val)) {
                $array[$key] = $this->sort($val);
            }
        }
        return $array;
    }
}