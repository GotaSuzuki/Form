<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
    <script>
        function alertFunction1() {
        alert("お問い合わせ内容を送信しました");
        }
        </script>
</head>

<body>
    <div class="container">
        <div class="center-block" style="width: 1200px;">
            <form action="{{ action('App\Http\Controllers\FormController@create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name1">タイトル</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="title">
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="ask1">お問い合わせ内容</label>
                  <div class="col-sm-6">
                  <textarea rows="7" name="content" class="form-control"></textarea>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="name1">メールアドレス</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="email">
                  </div>
                  </div>
                <button class="btn btn-success" onclick="alertFunction1()"> 送信 </button>
            </form>
            <button><a href="/">戻る</a></button>
          </div>
    </div>
</body>
</html>

{{-- タイトル:<br>
        <input name="title">
        <br>
        内容:<br>
        <textarea name="content" rows="4" cols="40"></textarea>
        <br>
        メールアドレス：<br>
        <textarea name="email" id="" cols="30" rows="1"></textarea>
        <br>
        <button class="btn btn-success" onclick="alertFunction1()"> 送信 </button> --}}
