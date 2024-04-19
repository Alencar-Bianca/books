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

    <h2>Book Registration</h2>
    <form id="bookForm" method="POST" action="{{ route('book.create') }}">
      @csrf
      <div class="form-group">
        <label for="nome">Name:</label>
        <input type="text" id="nome" name="name" >
      </div>
      <div class="form-group">
        <label for="ISBN">ISBN:</label>
        <input type="number" id="ISBN" name="ISBN" >
      </div>
      <div class="form-group">
        <label for="value">Value:</label>
        <input type="number" id="value"  name="value" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any">
      </div>
      <button type="button" id="submitButton">Send</button>
    </form>

    @if(session('success'))
    <li>{{session('success')}}</li>
    @endif
  </div>

  <script>
    document.getElementById('submitButton').addEventListener('click', function() {
      let form = document.getElementById('bookForm');
      let formData = new FormData(form);

      let xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {

            alert('Book registration successful!');
          } else {

            alert('An error occurred during book registration.');
          }
        }
      };

      xhr.open('POST', form.getAttribute('action'), true);
      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
      xhr.send(formData);
    });
  </script>
</body>
</html>
