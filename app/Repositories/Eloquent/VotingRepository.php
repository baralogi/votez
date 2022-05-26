<?php

namespace App\Repositories\Eloquent;

use App\Models\Voting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class VotingRepository extends BaseRepository
{

    public function __construct(Voting $model)
    {
        $this->model = $model;
    }

    public function listByOrganizationId($organizationId)
    {
        return $this->model->where('organization_id', $organizationId)->get();
    }

    public function create(array $attributes): Model
    {
        // Upload Image
        $extension = $attributes['logo']->extension();
        $fileName = date('dmyHis') . '.' . $extension;
        Storage::putFileAs('public' . '/images/logo', $attributes['logo'], $fileName);


        $attributes['logo'] = $fileName;
        $attributes['organization_id'] = auth()->user()->organization->id;
        return parent::create($attributes);
    }

    public function update(Model $model, array $attributes): Model
    {

        $fileName = $model->logo;

        if (!empty($attributes['logo'])) {
            // Upload Image
            $extension = $attributes['logo']->extension();
            $fileName = date('dmyHis') . '.' . $extension;
            $updateFile = Storage::putFileAs('public' . '/images/logo', $attributes['logo'], $fileName);
            if ($updateFile) {
                // Remove Image
                Storage::delete('public/images/logo/' . $model->logo);
            }
        }

        $attributes['logo'] = $fileName;
        return parent::update($model, $attributes);
    }

    public function destroy(Model $model)
    {
        Storage::delete('public/images/logo/' . $model->logo);
        return parent::destroy($model);
    }
}
