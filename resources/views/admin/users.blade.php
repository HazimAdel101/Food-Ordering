<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>
<body>
    <h1 class="text-xl">All users</h1>

    @foreach ($users as $user)
    <p class="ml-5">{{$user->role}}</p>
    @endforeach
</body>
</html>
