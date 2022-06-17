<?php

namespace App\Http\Controllers\Committee;

use App\DataTables\BlogsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Committee\Blog\StoreBlogRequest;
use App\Http\Requests\Committee\Blog\UpdateBlogRequest;
use App\Models\Blog;
use App\Repositories\Eloquent\BlogRepository;
use Illuminate\Auth\Events\Validated;

class BlogController extends Controller
{
    private $repository;

    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(BlogsDataTable $dataTable)
    {
        return $dataTable->render('pages.committee.blog.index');
    }

    public function show(Blog $blog)
    {
        return view('pages.committee.blog.show')->with(['blog' => $blog]);
    }

    public function create()
    {
        return view('pages.committee.blog.create');
    }

    public function store(StoreBlogRequest $request)
    {
        $this->repository->create($request->validated());
        return redirect()->route('committee.blog.index');
    }

    public function edit(Blog $blog)
    {
        return view('pages.committee.blog.edit')->with(['blog' => $blog]);
    }

    public function update(Blog $blog, UpdateBlogRequest $request)
    {
        $this->repository->update($blog, $request->validated());
        return redirect()->route('committee.blog.index');
    }

    public function destroy(Blog $blog)
    {
        $this->repository->destroy($blog);
        return redirect()->route('committee.blog.index');
    }
}
