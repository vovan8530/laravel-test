<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Services\PostApiService;

class BaseController extends Controller
{
    /**
     * @param  PostApiService  $service
     */
    public function __construct(protected PostApiService $service)
    {
    }
}
