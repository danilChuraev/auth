<?
session_start();
if ($_SESSION['IS_AUTH']) {
    header('Location: success.php');
    exit;
}
$salt = "ARE4315281";
$hostDB = 'localhost';
$loginDB = 'root';
$passDB = 'root';
$nameDB = 'auth';
$connection = mysqli_connect($hostDB, $loginDB, $passDB, $nameDB);

if (isset($_POST['submit'])) {
    $queryString = "SELECT user_id, user_password FROM users WHERE user_login='" . mysqli_real_escape_string($connection, $_POST['login']) . "' LIMIT 1";
    $queryResult = mysqli_query($connection, $queryString);
    $data = mysqli_fetch_assoc($queryResult);

    if (trim($data['user_password']) === md5($_POST['password'] . $salt)) {
        $_SESSION['IS_AUTH'] = true;
        header('Location: success.php');
        exit();
    } else {
        echo 'Вы ввели неправильный логин/пароль';
    }
}
?>
<!DOCTYPE html>
    <head>
        <title>Авторизация</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous"
        >
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container main-container">
            <form method="post">
                <div class="form-group">
                    Логин <input class="form-control" name="login" type="text" required><br>
                    Пароль <input class="form-control" name="password" type="password" required><br>
                    <input name="submit" type="submit" value="Войти" class="btn btn-primary">
                </div>
            </form>
        </div>
    </body>
</html>
