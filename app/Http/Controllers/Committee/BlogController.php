<?php

namespace App\Http\Controllers\Committee;

use App\DataTables\BlogsDataTable;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(BlogsDataTable $dataTable)
    {
        return $dataTable->render('pages.committee.blog.index');
    }
}
