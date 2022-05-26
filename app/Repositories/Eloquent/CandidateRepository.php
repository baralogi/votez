<?php

namespace App\Repositories\Eloquent;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;

class CandidateRepository extends BaseRepository
{

    public function __construct(Candidate $model)
    {
        $this->model = $model;
    }

    public function listByPartnerId($candidatePartnerId)
    {
        return $this->model
            ->where('candidate_partner_id', $candidatePartnerId)
            ->get();
    }

    public function create(array $attributes): Model
    {
        $description['nim'] = $attributes['nim'];
        $description['email'] = $attributes['email'];
        $description['phone'] = $attributes['phone'];
        $description['sex'] = $attributes['sex'];
        $description['address'] = $attributes['address'];
        $description['birth_place'] = $attributes['birth_place'];
        $description['birth_date'] = $attributes['birth_date'];
        $description['faculty'] = $attributes['facultyText'];
        $description['major'] = $attributes['majorText'];
        $description['semester'] = $attributes['semester'];
        $description['ipk'] = $attributes['ipk'];
        $description['sskm'] = $attributes['sskm'];

        $attributes['status'] = $this->model::VICE;
        $attributes['candidate_partner_id'] = auth()->user()->candidate->candidate_partner_id;
        $attributes['description'] = json_encode($description);
        return parent::create($attributes);
    }

    public function update(Model $model, array $attributes): Model
    {
        $description['nim'] = $attributes['nim'];
        $description['email'] = $attributes['email'];
        $description['phone'] = $attributes['phone'];
        $description['sex'] = $attributes['sex'];
        $description['address'] = $attributes['address'];
        $description['birth_place'] = $attributes['birth_place'];
        $description['birth_date'] = $attributes['birth_date'];
        $description['faculty'] = $attributes['facultyText'];
        $description['major'] = $attributes['majorText'];
        $description['semester'] = $attributes['semester'];
        $description['ipk'] = $attributes['ipk'];
        $description['sskm'] = $attributes['sskm'];

        $attributes['description'] = json_encode($description);
        return parent::update($model, $attributes);
    }
}
