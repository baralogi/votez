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

    public function test_voting_create_screen_can_be_rendered()
    {

        $data = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $this->actingAs($data->users[0]);
        $this->get('/committee/voting/create')
            ->assertStatus(200);
    }

    public function test_can_store_voting_data()
    {
        Storage::fake('images');
        $data = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $this->actingAs($data->users[0]);
        $this->post('committee/voting', [
            'organization_id' => 1,
            'logo' => UploadedFile::fake()->image('logo.jpg'),
            'name' => "Badan Eksekutif Mahasiswa Vote",
            'description' => 'Lorem ipsum set dolor amet',
            'start_at' => Carbon::now(),
            'end_at' => Carbon::tomorrow(),
        ])->assertStatus(302);
        $data = Voting::query()->where('name', 'Badan Eksekutif Mahasiswa Vote')->first();

        Storage::disk('images')->assertExists('public/images/logo/' . $data->logo);
        $this->assertSame('Badan Eksekutif Mahasiswa Vote', $data->name);
        $this->assertSame('Lorem ipsum set dolor amet', $data->description);
    }

    public function test_cant_store_voting_with_invalid_data()
    {
        Storage::fake('images');
        $data = Organization::factory()
            ->has(User::factory(), 'users')
            ->create();

        $this->actingAs($data->users[0]);
        $this->post('committee/voting', [
            'organization_id' => 1,

            'description' => 'Lorem ipsum set dolor amet',
            'start_at' => Carbon::now(),
            'end_at' => Carbon::tomorrow(),
        ])->assertInvalid([
            'logo', 'name'
        ]);;
    }
}
