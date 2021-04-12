<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>voting</title>
</head>
<body>
    <div>
        <form action="{{route('register.submit')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <label for="name">name</label>
          <input type="text" name="name">
          <label for="email">email</label>
          <input type="text" name="email">
          <input type="file" value="upload photo">
          <input type="submit" value="register">
        </form>
    </div>
</body>
</html>