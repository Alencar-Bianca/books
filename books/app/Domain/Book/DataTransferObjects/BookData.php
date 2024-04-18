<?php

namespace App\Domain\Book\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjects;

class BookData extends DataTransferObjects {

    /** @var string */
    public $name;

    /** @var int */
    public $ISBN;

    /** @var double */
    public $value;

    public static function FromRequest(BookRequest $bookRequest): BookData {
        return new Self([
            'name' => $bookRequest['name'],
            'ISBN' => $bookRequest['ISBN'],
            'value' => $bookRequest['value']
        ]);
    }
}
