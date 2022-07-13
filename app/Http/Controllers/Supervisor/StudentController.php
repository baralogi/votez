<?php

namespace App\Http\Controllers\Supervisor;

use App\DataTables\StudentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidatePartner;
use App\Models\Organization;
use App\Models\Student;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function index(StudentDataTable $dataTable)
    {
        return $dataTable->render('pages.supervisor.student.index');
    }

    public function show(Student $student)
    {
        $organizations = Organization::all();
        return view('pages.supervisor.student.show')->with(['student' => $student, 'organizations' => $organizations]);
    }

    public function recommendation(Request $request)
    {
        DB::beginTransaction();
        try {
            //dd($request->all());
            $user = User::create([
                'name' => $request->name,
                'email' => $request->nim . '@dinamika.ac.id',
                'password' => Hash::make('password'),
                'organization_id' => auth()->user()->organization_id,
            ]);
            $user->assignRole('kandidat');

            $candidatePartner = CandidatePartner::create([
                'voting_id' => $request->voting_id,
                'is_pass' => false
            ]);

            Candidate::create([
                'user_id' => $user->id,
                'candidate_partner_id' => $candidatePartner->id,
                'name' => $request->name,
                'status' => Candidate::CHAIRMAN
            ]);

            DB::commit();
        } catch (Exception $error) {
            DB::rollback();
            dd($error);
            Log::error($error->getMessage());
        }

        return redirect()->route('supervisor.student.index');
    }
}
