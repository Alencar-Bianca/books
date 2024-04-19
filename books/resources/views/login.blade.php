<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body,html {
    background-color: #F4F4F4;
}

.container-form {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.form {
    background-color: #ffffff;
    padding: 40px;
    border-radius: 30px;
}

.form.register{
    max-width: 500px;
}


.container-form .form .title-container img {
    width: 100%;
    margin-bottom: 30px;
    max-width: 350px;
}
.container-form .form .title-container h1,  .container-form .form .title-container span {
    text-align: center;
    font-weight: bold;
}
.container-form .form .title-container p, .container-form .form .title-container a {
    font-size: 14px;
    color: #ccc;
    text-align: center;
    font-weight: bold;
    margin: 5px 0 ;
}
.container-form .form .title-container a {
    color: #2d2597;
    font-weight: bold;
}
.container-form .form .title-container a:hover {
    color: #1c1768;
    font-weight: bold;
}


.container-form .form .title-container {
    margin-bottom: 20px;
}

.form input {
    width: 100%;
    background-color: #f3f3f3;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 14px;
    margin-bottom: 25px;
}

.form .button-enter {
    text-align: center;
}

.form .button-enter button{
    width: 130px;
    height: 50px;
    font-size: 18px;
}
    </style>
</head>
<body>
    <main class="container-form">
        @if(session('success'))
            <div class="alert alert-success">
                 {{session('success')}}
             </div>
         @endif
         @if(session('error'))
         <div class="alert alert-danger">
              {{session('error')}}
          </div>
      @endif
     <form action="{{route('user.login')}}" method="POST" class="form">
         @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif

         @csrf
         <div class="title-container">
             <h1 class="main-title">Sign up</h1>
             <p>or <a href="{{route('user.create')}}"> Register</a></p>
         </div>
         <input type="text" name="name" placeholder="Name" required>
         <input type="password" name="password" placeholder="password" required>
         <div class="button-enter">
             <button type="submit">enter</button>
         </div>
     </form>
 </main>
</body>
</html>

