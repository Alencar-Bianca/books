<?php
namespace App\Domain\User\Actions;
use App\Domain\User\DataTransferObjects\UserData;
use App\Domain\User\Models\User;

final class EditUserAction {
    public function __invoke(UserData $userData): User {

        return UserData::update([
            'name' =>  $userData->name,
            'address' => $userData->address,
            'password' => $userData->password,
            'active' => $userData->active,
        ]);
    }
}
