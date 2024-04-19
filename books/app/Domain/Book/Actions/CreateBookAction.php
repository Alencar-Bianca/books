<?php
namespace App\Domain\Book\Actions;
use App\Domain\Book\DataTransferObjects\BookData;
use App\Domain\Book\Models\Book;
final class CreateBookAction {
    public function __invoke(BookData $bookData): Book {
        return Book::create([
            'name' =>  $bookData->name,
            'ISBN' => $bookData->ISBN,
            'value' => $bookData->value,
        ]);
    }
}
