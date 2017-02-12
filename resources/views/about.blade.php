<!DOCTYPE html>
<html>
<head>
    <title>About us</title>
</head>
<body>
    <ul>
        
        @foreach ($guests as $guest)
            <li>{{ $guest }}</li>
        @endforeach
    </ul>


</body>
</html>