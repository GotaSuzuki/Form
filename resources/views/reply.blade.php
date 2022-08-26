<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Custom Mail Portal With Sendgrid</title>
   <script>
    function alertFunction1() {
    alert("返信内容を送信しました");
    }
    </script>
   <!-- Styles -->
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet"
       integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
   <div class="container">
       <div class="jumbotron">
           @if (session('success'))
           <div class="alert alert-success">
               {{ session('success') }}
           </div>
           @endif
           @if ($errors->any())
           <div class="alert alert-danger">
               <ul>
                   @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
           @endif
           <div class="row">
               <div class="col">
                <button type="submit" class="btn btn-link"><a href="/list">戻る</a></button>
                   <div class="card">
                    <div class="card-body">
                        <label>Title</label>：<label>{{ $show['title'] }}</label>
                        <hr>
                        <p>お問い合わせ内容</p>
                        <p>{{ $show['content'] }}</p>
                        <hr>
                   </div>
                       <div class="card-header">
                           Send Custom Mail
                       </div>
                       <div class="card-body">
                           <form method="POST" action="/sendmail">
                               @csrf
                               <div class="form-group">
                                   <label>あなた</label>
                                   <input required name="from" value="{{ $user['email'] }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>宛先</label>
                                    <input required class="form-control" type="text" name="to" value="{{ $show['email'] }}">
                                </div>
                               <div class="form-group">
                                   <label>件名</label>
                                   <input required name="subject" class="form-control">
                               </div>
                               <div class="form-group">
                                   <label>返信内容</label>
                                   <textarea required name="body" class="form-control" rows="3"></textarea>
                               </div>
                               <input type="hidden" name="status" value="{{ $show['status'] }}">
                               <button type="submit" class="btn btn-primary" onclick="alertFunction1()">Send Mail(s)</button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</body>
</html>
