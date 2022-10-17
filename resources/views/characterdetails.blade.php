<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Characterdetails</title>
</head>

<body>
    <ul>
        <li>{{ $character->in_game_name }}</li>
        <li>{{ $character->class }}</li>
        <li>{{ $character->level }}</li>
    </ul>
</body>

</html>
