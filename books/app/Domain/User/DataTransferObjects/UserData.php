<?php

namespace App\Domain\User\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;
use App\Web\User\Request\UserRequest;
class UserData extends DataTransferObject {

    /** @var string */
    public $name;

    /** @var string */
    public $address;

    /** @var string */
    public $active;

    public $password;
    public $book_id;

    public static function FromRequest(UserRequest $UserRequest): UserData {
        return new Self([
            'name' => $UserRequest['name'],
            'address' => $UserRequest['address'],
            'password' => $UserRequest['password'],
            'active' => $UserRequest['active'],
            'book_id' => $UserRequest['book_id']
        ]);
    }
}


