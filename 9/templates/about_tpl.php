<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Обо мне</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Обо мне</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/photo_gallery">Фото</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/guest_book">Гостевая книга</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Обо мне</h1>
        <p><?php
            if (isset($aboutText)) {
                echo $aboutText;
            }
            ?></p>
        <?php if (isset($arrCurUser) && is_array($arrCurUser) && count($arrCurUser)) { ?>
            <button
                    class="btn btn-primary"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseExample"
                    aria-expanded="false"
                    aria-controls="collapseExample"
            >Редактировать</button>
            <div class="collapse" id="collapseExample">
            <form method="post">
                <?php
                if (isset($idAboutText) && $idAboutText > 0) {
                    ?><input type="hidden" name="idAbout" value="<?php echo $idAboutText; ?>"><?php
                }
                ?>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Текст обо мне:</label>
                    <textarea
                            class="form-control"
                            id="exampleFormControlTextarea1"
                            rows="5"
                            name="newText"
                    ><?php
                        if (isset($aboutText)) {
                            echo $aboutText;
                        }
                        ?></textarea>
                </div>
                <?php
                if (isset($contentError)) {
                    echo $contentError;
                }
                ?>
                <button type="submit" class="btn btn-danger">Сохранить</button>
            </form>
        </div>
        <?php } else { ?>
            <a href="login.php">Войти</a>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
</body>
</html>
