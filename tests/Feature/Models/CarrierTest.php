<?php

use App\Models\Carrier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

uses(RefreshDatabase::class);

it('can create a carrier', function () {
    $carrier = Carrier::factory()->create([
        'name' => 'Carrier One',
        'price' => 1500,
        'city' => 'New York',
        'limit' => 100,
    ]);

    expect($carrier->name)->toBe('Carrier One');
    expect($carrier->price)->toBe(1500);
    expect($carrier->city)->toBe('New York');
    expect($carrier->limit)->toBe(100);
});

it('can have many users', function () {
    $carrier = Carrier::factory()->create();
    $user = User::factory()->create();
    dd($carrier, $user);
    $carrier->user()->attach($user->id);

    expect($carrier->users)->toHaveCount(1);
    expect($carrier->users->first()->id)->toEqual($user->id);
});

