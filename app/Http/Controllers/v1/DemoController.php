<?php

namespace App\Http\Controllers\v1;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\V1Controller;
use App\Helpers\ResponseHelper;
use App\Helpers\ValidationHelper;
use Illuminate\Support\Facades\Validator;

class DemoController extends V1Controller
{
    public $responseHelper;
    public $validationHelper;
    public function __construct()
    {
        $this->responseHelper = new ResponseHelper;
        $this->validationHelper = new ValidationHelper;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/greet",
     *     tags={"greeting"},
     *     summary="Returns a Sample API response",
     *     description="A sample greeting to test out the API",
     *     operationId="greet",
     *     @OA\Parameter(
     *          name="firstname",
     *          description="nama depan",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="lastname",
     *          description="nama belakang",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function greet(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "firstname" => "required",
            "lastname" => "required"
        ]);

        if ($validator->fails()) {
            return $this->validationHelper->response($validator);
        };

        $dataRes['firstname'] = $input['firstname'];
        $dataRes['lastname'] = $input['lastname'];
        return $this->responseHelper->successWithData($dataRes);
    }
}
