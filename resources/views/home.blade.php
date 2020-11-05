<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManageToDo-Top</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>

<body>
    <div class="jumbotron jumbotron-fluid home">
        <div class="home-wrapper">
            <div class="container">
                <div class="message">
                    <h1>タスク管理を人生にたとえたら、<br>大げさでしょうか？</h1>
                    <h2>タスク管理アプリ「ManageToDo」</h2>
                </div>
            </div>
            <form action="post" class="form-box">
                <div id="form">
                    <p>Email</p>
                    <p class="mail"><input type="email" name="mail" /></p>
                    <p>Password</p>
                    <p class="pass"><input type="password" name="pass" /></p>
                    <p class="check"><input type="checkbox" name="checkbox" />パスワードを保存</p>
                    <div class="login-box">
                        <button type="submit" class="btn btn-primary login-btn">ログイン</button>
                    </div>
                </div>
                <div class="login-box new">
                <button type="button" class="btn btn-success">新規登録はこちら</button>
                <button type="button" class="btn btn-dark">ゲストログイン</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>