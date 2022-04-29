<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repository
 */
interface EloquentRepositoryInterface
{
    public function create(array $attributes): Model;

    public function upsert(array $query, array $attributes): Model;

    public function update(Model $model, array $attributes): Model;

    public function destroy(Model $model);

    public function restore($id): Model;
}
