<?php

namespace App\Helpers;

use Arr;

Class ArrayHelper {

    public function array_flatten($array) {
        if (!is_array($array)) {
            return FALSE;
        }

        $result = Arr::flatten($array);

        return $result;
    }

}