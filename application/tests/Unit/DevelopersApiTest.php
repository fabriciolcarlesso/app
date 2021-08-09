<?php

namespace Tests\Unit;

use App\Models\Developers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Tests\TestCase;

class DevelopersApiTest extends TestCase
{
    public function test_create()
    {
        $developer = Developers::factory()->create();

        $this->withHeaders([
            'authorization' => config('app.authorization'),
        ])->postJson(
            config('app.url').'/api/developers/create',
            $developer->toArray()
        )->assertStatus(201);

        $this->withHeaders([
            'authorization' => config('app.authorization'),
        ])->postJson(
            config('app.url').'/api/developers/create',
            array()
        )->assertStatus(400);

        $this->withHeaders([
            'authorization' => '',
        ])->postJson(
            config('app.url').'/api/developers/create',
            $developer->toArray()
        )->assertStatus(400);
    }

    public function test_read()
    {     
        $developer = Developers::factory()->create();

        $this->withHeaders([
            'authorization' => config('app.authorization'),
        ])->getJson(
            config('app.url').'/api/developers/read/'.$developer->id
        )->assertStatus(200);

        $this->withHeaders([
            'authorization' => config('app.authorization'),
        ])->getJson(
            config('app.url').'/api/developers/read/{id}'
        )->assertStatus(404);

        $this->withHeaders([
            'authorization' => '',
        ])->getJson(
            config('app.url').'/api/developers/read/'.$developer->id
        )->assertStatus(400);
    }

    public function test_update()
    {
        $developer = Developers::factory()->create();

        $updatedData = [
            'name' => 'New name',
            'sex' => 'M',
            'birthdate' => '1988-04-06',
            'age' => 15,
            'hobby' => 'Correr',
        ];

        $this->withHeaders([
            'authorization' => config('app.authorization'),
        ])->putJson(
            config('app.url').'/api/developers/update/'.$developer->id,
            $updatedData
        )->assertStatus(200);

        $this->withHeaders([
            'authorization' => config('app.authorization'),
        ])->putJson(
            config('app.url').'/api/developers/update/'.$developer->id,
            []
        )->assertStatus(400);

        $this->withHeaders([
            'authorization' => config('app.authorization'),
        ])->putJson(
            config('app.url').'/api/developers/update/{id}',
            $updatedData
        )->assertStatus(400);

        $this->withHeaders([
            'authorization' => '',
        ])->putJson(
            config('app.url').'/api/developers/update/'.$developer->id,
            $updatedData
        )->assertStatus(400);
    }

    public function test_delete()
    {
        $developer = Developers::factory()->create();

        $this->withHeaders([
            'authorization' => config('app.authorization'),
        ])->deleteJson(
            config('app.url').'/api/developers/delete/'.$developer->id
        )->assertStatus(204);

        $this->withHeaders([
            'authorization' => config('app.authorization'),
        ])->deleteJson(
            config('app.url').'/api/developers/delete/{id}'
        )->assertStatus(400);

        $this->withHeaders([
            'authorization' => '',
        ])->deleteJson(
            config('app.url').'/api/developers/delete/'.$developer->id
        )->assertStatus(400);
    }
}
