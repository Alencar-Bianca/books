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

    <h2>User Edit</h2>
    <form id="userForm" method="POST" action="{{ route('user.edit.req',[ 'id' => $user->id]) }}">
      @csrf
      <div class="form-group">
        <label for="nome">Name:</label>
        <input type="text" id="nome" name="name" @if($user->name) value="{{$user->name}}" @endif>
      </div>
      <div class="form-group">
        <label for="endereco">Address:</label>
        <input type="text" id="endereco" name="address" @if($user->address) value="{{$user->address}}" @endif>
      </div>
      <div class="form-group">
        <label for="endereco" >Password:</label>
        <input type="password" id="password" class="password" name="password" @if($user->password) value="{{$user->password}}" @endif>
      </div>
      <input type="hidden" id="id" name="id" value="{{$user->password}}">
      <button type="button" id="submitButton" onclick="confirmEdit({{ $user->id }})">Send</button>

    </form>

    @if(session('success'))
    <li>{{session('success')}}</li>
    @endif
  </div>

 <script>
    function confirmEdit(userId) {
     const formData = new FormData(document.getElementById('userForm'));

      formData.append('id', userId);

      fetch('/user-editar/' + userId, {
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
          alert('User updated successfully.');
        } else {
          throw new Error('User update failed');
        }
      })
      .catch(error => {
        console.error('There was an error!', error);
        alert('An error occurred while updating the user.');
      });
    }

</script>
</body>
</html>
