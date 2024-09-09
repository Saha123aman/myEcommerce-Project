<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error Display</title>
    <style>
        .err {
            color: red;
            border: 1px solid red;
            background-color: #f8d7da;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .err ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .err li {
            margin-bottom: 10px;
        }
        .err li:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    
@if ($errors->any())
    <div class="err">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>
