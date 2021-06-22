<?
    session_start();
    if ('y' == isset($_GET['exit'])) {
        session_destroy();
        header('Location: login.php');
        exit;
    }
?>
<!DOCTYPE html>
    <head>
        <title>Страница авторизированного пользователя</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous"
        >
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container main-container main-container-success">
            <? if ($_SESSION['IS_AUTH']): ?>
                <h1>Добро пожаловать!</h1>
                <form action="" method="get">
                    <div class="form-group">
                        <input type="hidden" name="exit" value="y">
                        <input type="submit" value="Выйти" class="btn btn-lg btn-primary"/>
                    </div>
                </form>
            <? else: ?>
                <h1>Вы не авторизированы!</h1>
            <? endif; ?>
        </div>
    </body>
</html>