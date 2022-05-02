<?php

namespace Tests\Feature\Committee\Voting;

use App\Models\Organization;
use App\Models\User;
use App\Models\Voting;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StoreVotingTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Sets up the tests
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RoleSeeder::class);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_store_voting_data()
    {
        Storage::fake('images');
        $data = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $this->actingAs($data->users[0]);
        $dataX = $this->post('committee/voting', [
            'organization_id' => 1,
            'logo' => UploadedFile::fake()->image('logo.jpg'),
            'name' => "Badan Eksekutif Mahasiswa Vote",
            'description' => 'Lorem ipsum set dolor amet',
            'start_at' => Carbon::now(),
            'end_at' => Carbon::tomorrow(),
        ]);
        $data = Voting::query()->where('name', 'Badan Eksekutif Mahasiswa Vote')->first();
        //Storage::disk('images')->assertExists('image/' . $_SESSION['testing']);
        $this->assertSame('Badan Eksekutif Mahasiswa Vote', $data->name);
    }
}
