<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model;
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function find($id): Model
    {
        return $this->model->find($id);
    }

    public function update(Model $model, array $attributes): Model
    {
        $model->update($attributes);
        return $model;
    }

    public function upsert(array $query, array $attributes): Model
    {
        return $this->model->updateOrCreate($query, $attributes);
    }

    public function destroy(Model $model)
    {
        return $model->delete();
    }

    public function restore($id): Model
    {
        $model = $this->model->onlyTrashed()->where($this->model->getRouteKeyName(), $id)->firstOrFail();
        $model->restore();
        return $model;
    }
}
