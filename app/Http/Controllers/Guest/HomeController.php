<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\BlogRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        $blogs = $this->blogRepository->list();
        return view('pages.guest.index')->with(['blogs' => $blogs]);
    }
}
