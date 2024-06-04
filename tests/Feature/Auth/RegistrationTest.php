<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('register a user without name', function () {
    $response = $this->postJson('/register', dummyData(['name' => '']));

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['name']);
});

it('register a user without last name', function () {
    $response = $this->postJson('/register', dummyData(['last_name' => '']));

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['last_name']);
});

it('register a user without email', function () {
    $response = $this->postJson('/register', dummyData(['email' => '']));

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['email']);
});

it('register a user without password', function () {
    $response = $this->postJson('/register', dummyData(['password' => '']));

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['password']);
});

it('register a user without password confirmation', function () {
    $response = $this->postJson('/register', dummyData(['password_confirmation' => '']));

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['password']);
});

it('registers a user with valid data', function () {
    $response = $this->postJson('/register', dummyData());

    $response->assertStatus(201);
    $response->assertJsonStructure([
        'data' => [
            'user' => ['id', 'name', 'last_name', 'email', 'created_at', 'updated_at'],
            'token',
        ],
    ]);
});

function dummyData(array $data = []): array
{
    return array_merge([
        'name' => 'test',
        'last_name' => 'test',
        'email' => 'test@email',
        'password' => 'Pass@rD1',
        'password_confirmation' => 'Pass@rD1',
    ], $data);
}
