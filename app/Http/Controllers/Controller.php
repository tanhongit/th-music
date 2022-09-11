<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\ApiResponser;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiResponser;

    /**
     * @OA\Info(
     *     description="The Music App API documentation",
     *     version="1.0.0",
     *     title="The Music App API Swagger",
     *     termsOfService="http://swagger.io/terms/",
     *     @OA\Contact(
     *         email="tannp27@gmail.com",
     *         name="Tan Nguyen",
     *         url="tanhongit.com"
     *     ),
     *     @OA\License(
     *         name="Apache 2.0",
     *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *     )
     * )
     *  @OA\Server(
     *      url=L5_SWAGGER_CONST_DEV_HOST,
     *      description="Development Environment"
     *  )
     *
     *  @OA\Server(
     *      url=L5_SWAGGER_CONST_START_HOST,
     *      description="Staging Environment"
     * )
     * @OA\Schemes(
     *     scheme="http",
     *     scheme="https",
     * )
     * @OA\ExternalDocumentation(
     *     description="Find out more about Swagger",
     *     url="http://swagger.io"
     * )
     * @OA\PathItem (
     *     path="/",
     * )
     */
    public function __construct()
    {
    }
}
