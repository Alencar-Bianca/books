<?php

namespace App\Web\Book\Controller;

use App\Core\Http\Controllers\Controller;
use App\Domain\Book\Actions\CreateBookAction;
use App\Domain\Book\Actions\DeleteBookAction;
use App\Domain\Book\DataTransferObjects\BookData;
use App\Domain\Book\Models\Book;
use App\Web\Book\Request\BookRequest;
use Illuminate\Http\Request;
class BookController extends Controller
{
    public function index(){
        $books = Book::all();

        return view('createBook', compact('books'));
    }
    public function store(BookRequest $request, CreateBookAction $action){
        $data = BookData::FromRequest($request);
        $action($data);

        return back()->with(['sucess'=> 'Book successfully registered']);
    }

    public function show(){
        $books = Book::all();

        return view('showBook', compact('books'));
    }

    public function edit($id){
        try {
            $book = Book::findOrFail($id);
            return view('editBook', compact('book'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('book.index');
        }
    }
    public function editReq(Request $request, $id) {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['error' => 'book not found']);
        }

        $book->update($request->all());
        return response()->json(['success' => true]);
    }
    public function delete($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(['success' => true]);
    }
}
