<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogRepository extends BaseRepository
{

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function dataTables()
    {
        return $this->model->newQuery();
    }

    public function list()
    {
        return parent::index()->where('status', 'PUBLISHED')->cursorPaginate(6);
    }

    public function create($attributes): Model
    {
        $attributes['user_id'] = auth()->user()->id;
        $attributes['status'] = Blog::PUBLISHED;
        $attributes['slug'] = Str::of($attributes['title'])->slug('-');
        return parent::create($attributes);
    }
}
