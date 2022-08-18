<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Service\PostServices;

class BasePostController extends Controller
{

    public $service;

    public function __construct(PostServices $service)
    {
        $this->service = $service;
    }

}
