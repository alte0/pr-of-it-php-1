<?php

require __DIR__ . '/include/include.php';

if (getCurrentUser()) {
    header('Location: /');
}

if (isset($_POST['login_user']) && isset($_POST['password_user'])) {
    if (checkPassword($_POST['login_user'], $_POST['password_user'])) {
        setCurrentUser($_POST['login_user']);
        header('Location: /');
    } else {
        if (isset($_SESSION)) {
            $_SESSION['error'][] = 'Неверный логин или пароль';
        }
    }
}

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ДЗ 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form method="post">
        <div class="mb-3">
            <label for="login" class="form-label">Ваша логин</label>
            <input type="text" class="form-control" id="login" name="login_user"
                   value="<?php echo isset($_POST['login_user']) ? $_POST['login_user'] : null; ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Ваш пароль</label>
            <input type="password" class="form-control" id="password" name="password_user" autocomplete="off">
        </div>
        <?php showError(); ?>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>