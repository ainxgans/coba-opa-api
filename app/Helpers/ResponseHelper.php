<?php

namespace App\Helpers;

class ResponseHelper {
    public function successWithData($input) {
        $meta = array(
            'code' => 200,
            'message' => 'Success',
            'error' => false
        );
        $data = $input;
        $response = array(
            "meta" => $meta,
            "data" => $data
        );
        return $response;
    }
    public function successWithoutData($msg) {
        $meta = array(
            'code' => 200,
            'message' => $msg,
            'error' => false
        );
        $response = array(
            "meta" => $meta,
        );
        return $response;
    }
    public function errorSomething() {
        $meta = array(
            'code' => 400,
            'message' => 'Something Error',
            'error' => true
        );
        $response = array(
            "meta" => $meta
        );
        return $response;
    }
    public function errorCustom($code, $msg) {
        $meta = array(
            'code' => $code,
            'message' => $msg,
            'error' => true
        );
        $response = array(
            "meta" => $meta
        );
        return $response;
    }
    public function custom($error, $code, $msg) {
        $meta = array(
            'code' => $code,
            'message' => $msg,
            'error' => $error
        );
        $response = array(
            "meta" => $meta
        );
        return $response;
    }
    public function errorCustomArr($code, $arr) {
        $response = array(
            "meta" => $arr
        );
        return $response;
    }
    public function errorCustomBuyer($code, $msg, $input) {
        $meta = array(
            'code' => $code,
            'message' => $msg,
            'detail_transaction' => $input,
            'error' => true
        );
        $response = array(
            "meta" => $meta
        );
        return $response;
    }
    public function dataNotFound() {
        $meta = array(
            'code' => 204,
            'message' => 'Data Not Found',
            'error' => true
        );
        $response = array(
            "meta" => $meta
        );
        return $response;
    }

    public function errorCustomWithData($code, $msg, $data) {
        $meta = array(
            'code' => $code,
            'message' => $msg,
            'error' => true
        );
        $response = array(
            "meta" => $meta,
            "data" => $data
        );
        return $response;
    }
}
