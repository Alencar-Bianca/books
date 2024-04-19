<?php
namespace App\Domain\Book\Actions;
use App\Domain\Book\DataTransferObjects\BookData;
use App\Domain\Book\Models\Book;

final class DeleteBookAction {
    public function __invoke(BookData $bookData): Book {
         $book = Book::findOrFail($bookData);

         return $book->delete();
    }
}
