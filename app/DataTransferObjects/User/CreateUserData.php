<?php

namespace App\DataTransferObjects\User;

readonly class CreateUserData
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}
}
