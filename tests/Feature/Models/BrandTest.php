<?php

use App\Models\Brand;
use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);

it('can create a brand', function () {
    $brand = Brand::factory()->create([
        'name' => 'Test Brand',
    ]);

    expect($brand->name)->toBe('Test Brand');
    expect($brand->slug)->toBe('test-brand');
});

it('can generate slug from name', function () {
    $brand = Brand::factory()->create([
        'name' => 'Test Brand',
    ]);

    expect($brand->slug)->toBe('test-brand');
});

it('can have many users', function () {
    $brand = Brand::factory()->create();
    $user = User::factory()->create();

    $brand->users()->attach($user);

    expect($brand->users)->toHaveCount(1);
    expect($brand->users->first()->id)->toEqual($user->id);
});

it('can have many posts', function () {
    $brand = Brand::factory()->create();
    $post = Post::factory()->create();

    $brand->posts()->attach($post);

    expect($brand->posts)->toHaveCount(1);
    expect($brand->posts->first()->id)->toEqual($post->id);
});