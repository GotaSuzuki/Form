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
    @foreach ($detas as $deta)
                <div class="row">
                    <div class="col-6"><a href="{{ action('App\Http\Controllers\MailingController@reply', $deta->id) }}" class="link-info">{{ $deta['title'] }}</a></div>
                <div class="col-6">
                    <form action="remove" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$deta->id}}">
                        <input type="submit" value="削除する">
                    </form>
                </div>
                </div>
                <p>{!! nl2br(e(Str::limit($deta->content, 30))) !!}</p>
        <hr>
    @endforeach
    {{ $lists->links() }}
          </div>
    </div>
</body>
</html>

@endsection
