<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Services\PostApiService;


class BaseApiController extends Controller
{
    /**
     * @param  PostApiService  $service
     */
    public function __construct(protected PostApiService $service)
    {
    }
}
