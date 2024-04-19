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

  input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
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

    <h2>User Registration</h2>
    <form id="userForm" method="POST" action="{{ route('user.create') }}">
      @csrf
      <div class="form-group">
        <label for="nome">Name:</label>
        <input type="text" id="nome" name="name" >
      </div>
      <div class="form-group">
        <label for="endereco">Address:</label>
        <input type="text" id="endereco" name="address" >
      </div>
      <div class="form-group">
        <label for="endereco">Password:</label>
        <input type="password" id="password" class="password" name="password" >
      </div>
      <input type="hidden" id="active" name="active" value="1">
      <input type="hidden" id="book_id" name="book_id" value="1">
      <button type="button" id="submitButton">Send</button>
    </form>

    @if(session('success'))
    <li>{{session('success')}}</li>
    @endif
  </div>

  <script>
    document.getElementById('submitButton').addEventListener('click', function() {
      let form = document.getElementById('userForm');
      let formData = new FormData(form);

      let xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            alert('User registration successful!');
            window.location.href = "{{ route('user.show') }}";
          } else {

            alert('An error occurred during user registration.');
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
