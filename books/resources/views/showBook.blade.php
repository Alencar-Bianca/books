<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Table</title>
<style>
     table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(odd) {
        background-color: #f0f8ff;
    }
    tr:nth-child(even) {
        background-color: #fff;
    }
    .edit-button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 2px 2px;
        cursor: pointer;
        border-radius: 5px;
    }
    .delete-button {
        background-color: #f44336;
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 2px 2px;
        cursor: pointer;
        border-radius: 5px;
    }
    .add-button {
        background-color: #008CBA;
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 2px 2px;
        cursor: pointer;
        border-radius: 5px;
    }
    .added-button {
        background-color: #555555;
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 2px 2px;
        cursor: pointer;
        border-radius: 5px;
    }
    .remove-button {
        background-color: #ff9800;
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 2px 2px;
        cursor: pointer;
        border-radius: 5px;
    }
    a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
    }

    a:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>ISBN</th>
            <th>Value</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

            @forelse($books as $book)
            <tr class="book_{{$book->id}}" id="book_{{$book->id}}">
            <td> {{$book->id}}</td>
            <td> {{$book->name}}</td>
            <td> {{$book->ISBN}}</td>
            <td>{{ number_format($book->value, 2, '.', ',') }}</td>
            <td>

              <button class="edit-button">Edit</button>
              <button class="delete-button" onclick="confirmDelete({{$book->id}})">Delete</button>
              <button class="add-button">Add</button>
            </td>
            </tr>
            @empty
            <tr>
                <td>None books registered.</td>
            </tr>
            @endforelse
    </tbody>
</table>
<a href="{{route('book.index')}}">Create book</a>

<script>
    function confirmDelete(bookId) {
  if (confirm("Are you sure you want to delete this book?")) {
    deleteBook(bookId);
  }
}
    function deleteBook(bookId) {
  fetch('/delete-book/' + bookId, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {


    if (data.success) {
      document.getElementById('book_' + bookId).remove();
      alert('Book deleted successfully.');
    } else {
      throw new Error('Book deletion failed');
    }
  })
  .catch(error => {
    console.error('There was an error!', error);
    alert('An error occurred while deleting the book.');
  });


}

</script>
</body>
</html>
