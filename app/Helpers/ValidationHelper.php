<?php

namespace App\Helpers;

use App\Helpers\ArrayHelper;


Class ValidationHelper {

    public function __construct()
    {
        $this->arrayHelper = new ArrayHelper;
    }

    public function validate($request, $validation)
    {
        $validator = \Validator::make($request, $validation);

        if ($validator->fails()) {
            $error = $validator->messages()->toArray();
            $error = $this->arrayHelper->array_flatten($error);
            $error = implode(' ', $error);

            return [
                "meta" => [
                    "code" => 400,
                    "message" => $error
                ]
            ];
        }

        return true;
    }

    public function response($validator)
    {
        // $validator = \Validator::make($request, $validation);

        // if ($validator->fails()) {
        $arrError = [];
        $error = $validator->messages()->toArray();
        foreach ($error as $key => $value) {
            $arrError[$key] = $value[0];
        }
       
        $meta = array(
            'code' => 422,
            'message' => 'Error validation',
            'error' => true
        );
        $response = array(
            "meta" => $meta,
            "data" => $arrError
        );
        return response($response, $meta['code']);
        
    }

}