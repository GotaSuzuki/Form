@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
</head>
<body>
    <div class="container">
        <div class="mx-auto" style="width: 500px;">
            @foreach ($lists as $list)
        <p><a href="{{ action('App\Http\Controllers\MailingController@reply', $list->id) }}" class="link-info">{{ $list['title'] }}</a></p>
        <p>{!! nl2br(e(Str::limit($list->content, 30))) !!}</p>
        <hr>
    @endforeach
    {{ $lists->links() }}
          </div>
    </div>
</body>
</html>

@endsection
