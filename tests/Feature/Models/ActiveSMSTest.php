<?php

use App\Models\ActiveSMS;
use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);

it('can generate a unique code', function () {
    $code = ActiveSMS::buildCode();

    expect($code)->toBeString();    
    expect(ActiveSMS::where('code', $code)->exists())->toBeFalse();
});


it('can create a new active SMS record', function () {
    $sms = ActiveSMS::create([
        'phone' => '09123456789',
        'code' => '123456',
        'expire' => now()->addMinutes(5),
    ]);

    expect($sms)->toBeInstanceOf(ActiveSMS::class);
    expect($sms->phone)->toBe('09123456789');
    expect($sms->code)->toBe('123456');
    expect($sms->expire)->toBeInstanceOf(\Carbon\Carbon::class);
});

it('validates the expiration time', function () {
    $sms = ActiveSMS::create([
        'phone' => '09123456789',
        'code' => '654321',
        'expire' => now()->addMinutes(5),
    ]);

    expect($sms->expire)->toBeInstanceOf(\Carbon\Carbon::class);
    expect($sms->expire->gt(now()))->toBeTrue();
});
