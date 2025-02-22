<?php
use App\Models\Address;
use App\Models\City;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);

it('can create an address', function () {

    $city = City::factory()->create();

    $address = Address::create([
        'address' => '123 Main Street',
        'post' => '12345',
        'name' => 'Test Address',
        'latitude' => 12.345678,
        'longitude' => 98.765432,
        'status' => true,
        'city_id' => $city->id,
        'plaque' => false,
        'unit' => 'A1',
        'number' => '10',
    ]);

    expect($address)->toBeInstanceOf(Address::class);
    expect($address->address)->toBe('123 Main Street');
    expect($address->city->name)->toBe($city->name);
});

it('can associate address with a user', function () {

    $address = Address::factory()->create();

    $user = User::factory()->create();

    $address->user()->attach($user);

    expect($address->user->first()->id)->toEqual($user->id);
});

it('belongs to a city', function () {

    $city = City::factory()->create();
    $address = Address::factory()->create(['city_id' => $city->id]);

    expect($address->city->name)->toBe($city->name);
});

it('casts attributes correctly', function () {

    $city = City::factory()->create();
    $address = Address::create([
        'address' => '123 Example St',
        'post' => '12345',
        'name' => 'John Doe',
        'latitude' => 37.7749,
        'longitude' => -122.4194,
        'number' => 1234567890,
        'status' => true,
        'plaque' => false,
        'city_id' => $city->id
    ]);

    expect($address->latitude)->toBeFloat();
    expect($address->longitude)->toBeFloat();
    expect($address->status)->toBeBool();
    expect($address->plaque)->toBeBool();
});

it('sets default values for status and plaque', function () {
    $city = City::factory()->create();
    $address = Address::create([
        'address' => '123 Example St',
        'post' => '12345',
        'name' => 'John Doe',
        'latitude' => 37.7749,
        'longitude' => -122.4194,
        'number' => 1234567890,
        'status' => false,
        'plaque' => false,
        'city_id' => $city->id
    ]);

    expect($address->status)->toBeFalse();
    expect($address->plaque)->toBeFalse();
});

it('can update an address', function () {

    $address = Address::factory()->create();
    expect($address)->not()->toBeNull();
    $address->update([
        'address' => '123 New Street',
        'status' => true,
    ]);

    expect($address->address)->toBe('123 New Street');
    expect($address->status)->toBeTrue();
});
