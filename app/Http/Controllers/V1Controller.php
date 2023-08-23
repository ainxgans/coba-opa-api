<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="OPA API", version="0.1")
 */
class V1Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
