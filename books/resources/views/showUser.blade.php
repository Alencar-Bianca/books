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
        width: 72px;
        height: 32px;
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

    a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
    }

</style>
</head>
<body>

<table>
    <a href="{{route('logout')}}">logout</a>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>

            @forelse($users as $user)
            <tr class="user{{$user->id}}" id="user{{$user->id}}">
            <td> {{$user->id}}</td>
            <td> {{$user->name}}</td>
            <td> {{$user->address}}</td>
            <td>

              <a  href="{{route('user.edit', ['id' => $user->id])}}">Edit</a>
              <button class="delete-button" onclick="confirmDelete({{$user->id}})">Delete</button>
            </td>
            </tr>
            @empty
            <tr>
                <td>None user registered.</td>
            </tr>
            @endforelse
    </tbody>
</table>
<a href="{{route('user.index')}}">Create User</a>
<a href="{{route('book.index')}}">Create Book</a>

<script>
    function confirmDelete(userId) {
      if (confirm("Are you sure you want to delete this user?")) {
        deleteUser(userId);
      }
    }
    function deleteUser(userId) {
      fetch('/delete-user/' + userId, {
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
          document.getElementById('user' + userId).remove();
          alert('user deleted successfully.');
        } else {
          throw new Error('user deletion failed');
        }
      })
      .catch(error => {
        console.error('There was an error!', error);
        alert('An error occurred while deleting the user.');
      });


    }
</script>

</body>
</html>
