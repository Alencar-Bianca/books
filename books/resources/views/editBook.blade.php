<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Usuário</title>
  <style>
    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  h2 {
    text-align: center;
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
  }

  input[type="text"], input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;

}
input[type=number] {
   -moz-appearance: textfield;
   appearance: textfield;

}
  button {
    display: block;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  button:hover {
    background-color: #0056b3;
  }

  button:focus {
    outline: none;
  }

  </style>
  </style>
</head>
<body>
  <div class="container">
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error}}</li>
        @endforeach
    </ul>
    @endif
    <a href="{{route('logout')}}"><button>logout</button></a>
    <h2>Book Edit</h2>
    <form id="bookForm" method="POST" action="{{ route('book.edit.req',[ 'id' => $book->id]) }}">
      @csrf
      <div class="form-group">
        <label for="nome">Name:</label>
        <input type="text" id="nome" name="name" @if($book->name) value="{{$book->name}}" @endif>
      </div>
      <div class="form-group">
        <label for="endereco">ISBN:</label>
        <input type="number" id="endereco" name="ISBN" @if($book->ISBN) value="{{$book->ISBN}}" @endif>
      </div>
      <div class="form-group">
        <label for="endereco" >Value:</label>
        <input type="number" id="value" class="value" name="value" @if($book->value) value="{{$book->value}}" @endif>
      </div>
      <button type="button" id="submitButton" onclick="confirmEdit({{ $book->id }})">Send</button>

    </form>

    @if(session('success'))
    <li>{{session('success')}}</li>
    @endif
  </div>

 <script>
    function confirmEdit(bookId) {
     const formData = new FormData(document.getElementById('bookForm'));

      formData.append('id', bookId);

      fetch('/book-editar/' + bookId, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => {
        if (data.success) {
          alert('book updated successfully.');
        } else {
          throw new Error('book update failed');
        }
      })
      .catch(error => {
        console.error('There was an error!', error);
        alert('An error occurred while updating the book.');
      });
    }

</script>
</body>
</html>
