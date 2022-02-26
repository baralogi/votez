<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->get();
    }

    public function getById($id)
    {
        return $this->user->where('id', $id)->first();
    }

    public function getByOrganizationAndCommitteRoles()
    {
        # get users by organization and have committee roles
        return $this->user->where('organization_id', auth()->user()->organization_id)
            ->whereHas('roles', function ($query) {
                $query->whereIn('roles.name', ['ketua panitia', 'panitia']);
            });
    }

    public function store($data)
    {
        $user = new $this->user;
        $user->organization_id = $data['organization_id'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->assignRole($data['roles']);
        $user->save();

        return $user;
    }

    public function update($id, $data)
    {
        $user = $this->user->find($id);
        $user->name = $data['name'];
        $user->syncRoles([$data['roles']]);
        $user->update();
        return $user;
    }

    public function destroy($id)
    {
        return $this->user->where('id', $id)->delete();
    }
}
