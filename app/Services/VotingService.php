<?php

namespace App\Services;

use App\Repositories\VotingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VotingService
{
    /**
     * @var VotingRepository
     */
    protected $votingRepository;

    /**
     * VotingRepository constructor.
     *
     * @param VotingRepository $votingRepository
     */
    public function __construct(VotingRepository $votingRepository)
    {
        $this->votingRepository = $votingRepository;
    }

    public function getVotings()
    {
        return $this->votingRepository->getAll();
    }

    public function getByOrganizationId($id)
    {
        return $this->votingRepository->getByOrganizationId($id);
    }

    public function getVotingById($id)
    {
        return $this->votingRepository->getById($id);
    }

    public function storeVotingData($data)
    {
        Validator::make($data, [
            'organization_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'logo' => 'mimes:jpeg,jpg,png|max:2000'
        ])->validate();

        DB::beginTransaction();
        try {
            $logoName = $this->votingRepository->uploadFile($data['logo'], '/images/logo');
            $result = $this->votingRepository->store($data, $logoName);
            DB::commit();
            return $result;
        } catch (Exception $error) {
            DB::rollback();
            Log::error($error->getMessage());
        }
    }

    public function updateVoting($id, $data)
    {
        return $this->votingRepository->update($id, $data);
    }

    public function destroyVoting($id)
    {
        return $this->votingRepository->destroy($id);
    }
}
