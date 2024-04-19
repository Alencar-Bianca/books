<?php

namespace App\Domain\Book\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;
use App\Web\Book\Request\BookRequest;
use App\Domain\Book\Models\Book;
class BookData extends DataTransferObject {

    /** @var string */
    public $name;

    /** @var int */
    public $ISBN;

    /** @var numeric */
    public $value;

    public static function FromRequest(BookRequest $bookRequest): BookData {
        return new Self([
            'name' => $bookRequest['name'],
            'ISBN' => $bookRequest['ISBN'],
            'value' => $bookRequest['value']
        ]);
    }
}
