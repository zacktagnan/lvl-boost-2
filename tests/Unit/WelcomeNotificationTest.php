<?php

use App\Models\User;
use App\Notifications\WelcomeNotification;

it('creates a welcome notification with user data', function () {
    $user = User::factory()->create(['name' => 'Juan']);

    $notification = new WelcomeNotification($user);

    expect($notification->user->name)->toBe('Juan');
});

it('welcome notification uses mail channel', function () {
    $user = User::factory()->create();
    $notification = new WelcomeNotification($user);

    expect($notification->via($user))->toContain('mail');
});

it('welcome notification has correct subject', function () {
    config(['app.name' => 'MyApp']);

    $user = User::factory()->create(['name' => 'Juan']);
    $notification = new WelcomeNotification($user);

    $mailMessage = $notification->toMail($user);

    expect($mailMessage)->toBeInstanceOf(\Illuminate\Notifications\Messages\MailMessage::class);
    expect($mailMessage->subject)->toContain('Bienvenido');
    expect($mailMessage->subject)->toContain('MyApp');
});

it('welcome notification uses markdown template', function () {
    $user = User::factory()->create();
    $notification = new WelcomeNotification($user);

    $mailMessage = $notification->toMail($user);

    expect($mailMessage->markdown)->toBe('emails.welcome');
});
