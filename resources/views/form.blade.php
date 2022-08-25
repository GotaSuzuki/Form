<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        function alertFunction1() {
        alert("お問い合わせ内容を送信しました");
        }
        </script>
</head>

<body>
    <form action="{{ action('App\Http\Controllers\FormController@create') }}" method="POST">
        @csrf
        タイトル:<br>
        <input name="title">
        <br>
        内容:<br>
        <textarea name="content" rows="4" cols="40"></textarea>
        <br>
        メールアドレス：<br>
        <textarea name="email" id="" cols="30" rows="1"></textarea>
        <br>
        <button class="btn btn-success" onclick="alertFunction1()"> 送信 </button>
    </form>
</body>
</html>
