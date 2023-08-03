<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Гостевая книга</title>
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
    <div class="py-3">
        <h1>Записи из гостевой книги</h1>
        <?php if (isset($arrCurUser) && is_array($arrCurUser) && count($arrCurUser)) { ?>
            <button
                    class="btn btn-primary"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseExample"
                    aria-expanded="false"
                    aria-controls="collapseExample"
            >Удалить запись из книги</button>
            <div class="collapse py-3" id="collapseExample">
                <form action="/guest_book/remove_record.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="selectedId">
                            <option value="0">Выберите запись для удаления</option>
                            <?php
                            if (isset($arrDataGuestBook)) {
                                foreach ($arrDataGuestBook as $recordOption) {
                            ?>
                                <option value="<?php echo $recordOption['id']; ?>"><?php echo 'id' . $recordOption['id']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </div>
                </form>
            </div>
        <?php } else { ?>
            <a href="login.php">Войти</a>
        <?php } ?>
        <?php
        if (isset($contentError)) {
            echo $contentError;
        }
        ?>
        <ul class="">
            <?php
            if (isset($arrDataGuestBook)) {
                foreach ($arrDataGuestBook as $record) { ?>
                    <li class=""><?php echo 'id' . $record['id'] . ' ' . $record['text']; ?></li>
                <?php }
            } ?>
        </ul>
    </div>
    <div class="py-3">
        <?php if (isset($arrCurUser) && is_array($arrCurUser) && count($arrCurUser)) { ?>
            <form action="/guest_book/record_book.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Оставьте вашу запись в гостевой
                        книге:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="record"></textarea>
                </div>
                <div>
                    <button class="btn btn-success" type="submit">Оставить запись</button>
                </div>
            </form>
            <?php
            if (isset($contentErrorAdd)) {
                echo $contentErrorAdd;
            }
            ?>
        <?php } else { ?>
            <a href="login.php">Войти</a>
        <?php } ?>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
