<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    {{-- @foreach ($data as $datas) --}}

    <h1>Name :{{ $data['name'] }} </h1>
    <h5>Email :{{ $data['email'] }} </h5>
    <h5>Subject :{{ $data['subject'] }} </h5>
    <p>Message :{{ $data['message'] }} </p>
    {{-- @endforeach --}}

</body>
</html>
