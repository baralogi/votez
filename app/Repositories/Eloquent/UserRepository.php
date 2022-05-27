<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function listDataTables($organizationId)
    {
        return $this->model
            ->WhereOrganization($organizationId)
            ->RoleCommittee()
            ->newQuery();
    }

    public function listWhereCommittee($organizationId)
    {
        return $this->model
            ->WhereOrganization($organizationId)
            ->RoleCommittee()
            ->get();
    }

    public function create(array $attributes): Model
    {
        $roles = $attributes['roles'];
        unset($attributes['roles']);
        $attributes['organization_id'] = auth()->user()->organization->id;
        $attributes['password'] = Hash::make('password');
        $user = parent::create($attributes);
        $user->syncRoles($roles);

        return $user;
    }

    public function update(Model $model, array $attributes): Model
    {
        $roles = $attributes['roles'];
        unset($attributes['roles']);
        $user = parent::update($model, $attributes);
        $user->syncRoles($roles);

        return $user;
    }
}
