<?php

use App\Models\Bookmark;
use App\Models\Post;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);

it('can create a bookmark', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $user->id]);    
    
    expect($post->user_id)->toBe($user->id);
    $bookmark = Bookmark::create([
        'user_id' => $user->id,
        'post_id' => $post->id,
    ]);
    
    expect($bookmark->user_id)->toBe($user->id);
    expect($bookmark->post_id)->toBe($post->id);
});

test('a bookmark belongs to a user', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();
    $bookmark = Bookmark::factory()->create([ 'user_id' => $user->id, 'post_id' => $post->id ]);

    expect($bookmark->user)->toBeInstanceOf(User::class);
    expect($bookmark->user->id)->toEqual($user->id);
});

test('a bookmark belongs to a post', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();
    $bookmark = Bookmark::factory()->create([ 'user_id' => $user->id, 'post_id' => $post->id ]);

    expect($bookmark->post)->toBeInstanceOf(Post::class);
    expect($bookmark->post->id)->toEqual($post->id);
});

test('mass assignment works for bookmarks', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();

    $data = ['user_id' => $user->id, 'post_id' => $post->id];
    $bookmark = Bookmark::create($data);

    expect($bookmark->user_id)->toBe($user->id);
    expect($bookmark->post_id)->toEqual($post->id);
});