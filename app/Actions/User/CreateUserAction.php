<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\DataTransferObjects\User\CreateUserData;
use App\Models\User;
use App\Notifications\WelcomeNotification;

class CreateUserAction
{
    public function execute(CreateUserData $data): User
    {
        $user = User::query()->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password,
        ]);

        $user->notify(new WelcomeNotification($user));

        return $user;
    }
}
