<?php

namespace App\Domain\User\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjects;

class UserData extends DataTransferObjects {

    /** @var string */
    public $name;

    /** @var string */
    public $address;

    /** @var string */
    public $active;

    public static function FromRequest(UserRequest $UserRequest): UserData {
        return new Self([
            'name' => $UserRequest['name'],
            'address' => $UserRequest['address'],
            'active' => $UserRequest['active']
        ]);
    }
}


