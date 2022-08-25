@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($lists as $list)
        <p><a href="{{ action('App\Http\Controllers\MailingController@reply', $list->id) }}">{{ $list['title'] }}</a></p>
    @endforeach
</body>
</html>

@endsection
