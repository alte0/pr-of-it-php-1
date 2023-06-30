<?php

require '../include/include.php';

$arrDataGuestBook = getDataFile(getPathGuestBook());

?>
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
<div class="container">
    <div class="py-3">
        <h1>Записи из гостевой книги</h1>
        <ol class="">
            <?php foreach ($arrDataGuestBook as $recordRow) { ?>
                <li class=""><?php echo $recordRow ?></li>
            <?php } ?>
        </ol>
    </div>
    <div class="py-3">
        <form action="record_book.php" method="post">
            <input type="text" hidden value="<?php echo $_SERVER['REQUEST_URI'] ?>" name="redirect">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Оставьте вашу запись в гостевой
                    книге:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="record"></textarea>
            </div>
            <div>
                <button class="btn btn-success" type="submit">Оставить запись</button>
            </div>
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
