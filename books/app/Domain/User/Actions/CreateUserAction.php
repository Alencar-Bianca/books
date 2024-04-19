<?php
namespace App\Domain\User\Actions;
use App\Domain\User\DataTransferObjects\UserData;
use App\Domain\User\Models\User;

final class CreateUserAction {
    public function __invoke(UserData $userData): User {
        return User::create([
            'name' =>  $userData->name,
            'address' => $userData->address,
            'password' => $userData->password,
            'active' => $userData->active,
            'book_id' => $userData->book_id,
        ]);
    }
}
