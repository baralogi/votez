<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repository
 */
interface EloquentRepositoryInterface
{
    public function index();

    // public function create(array $attributes): Model;

    // public function upsert(array $query, array $attributes): Model;

    // public function find($id): ?Model;

    // public function update(Model $model, array $attributes): Model;

    // public function destroy(Model $model);

    // public function restore($id): Model;
}
