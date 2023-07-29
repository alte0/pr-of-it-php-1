<?php
function getPathGuestBook()
{
    return __DIR__ . '/../guest_book/data.txt';
}

function getFilesInDir($dir)
{
    if (is_dir($dir)) {
        $arrIgnoreList = ['.', '..'];
        $files = scandir($dir);

        if (is_array($files)) {
            return array_diff($files, $arrIgnoreList);
        }
    }

    return [];
}

function showError($error)
{
    if (!empty($error)) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $error; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    }
}

function getUsersList()
{
    // password - 123
    return [
        'test' => [
            'login' => 'test',
            'password_hash' => '$2y$10$J0GTM.AsRTeox1Bu5JyvT.0L0iJKdQS21RaLYY/WyvdbL9jQSYJnC',
            'name' => 'Тестовый',
        ],
        'test2' => [
            'login' => 'test2',
            'password_hash' => '$2y$10$J0GTM.AsRTeox1Bu5JyvT.0L0iJKdQS21RaLYY/WyvdbL9jQSYJnC',
        ],
    ];
}

function existsUser($login)
{
    return key_exists($login, getUsersList());
}

function checkPassword($login, $password)
{
    $isVerificationPassed = false;

    if (existsUser($login)) {
        $isVerificationPassed = password_verify($password, getUsersList()[$login]['password_hash']);
    }

    return $isVerificationPassed;
}

function setCurrentUser($login)
{
    if (existsUser($login) && isset($_SESSION)) {
        $_SESSION['USER'] = getUsersList()[$login];
    }
}

function getCurrentUser()
{
    $userData = null;

    if (isset($_SESSION['USER'])) {
        $userData = $_SESSION['USER'];
    }

    return $userData;
}

function logger($data)
{
    $dirLog = __DIR__ . '/../logs/';
    $pathFileLog = $dirLog . 'log.txt';

    if (!is_dir($dirLog)) {
        mkdir($dirLog, 0700);
    }

    if (is_array($data) && count($data)) {
        file_put_contents($pathFileLog, PHP_EOL . implode(' ; ', $data), FILE_APPEND);
    }
}