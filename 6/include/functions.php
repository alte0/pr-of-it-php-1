<?php
function getPathGuestBook()
{
    return '../guest_book/data.txt';
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

function showError()
{
    if (isset($_SESSION['error'])) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo implode('</br>', $_SESSION['error']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['error']);
    }
}

function getUsersList()
{
    // password - 123
    return [
        [
            'login' => 'test',
            'password_hash' => '$2y$10$J0GTM.AsRTeox1Bu5JyvT.0L0iJKdQS21RaLYY/WyvdbL9jQSYJnC',
            'name' => 'Тестовый',
        ],
        [
            'login' => 'test2',
            'password_hash' => '$2y$10$J0GTM.AsRTeox1Bu5JyvT.0L0iJKdQS21RaLYY/WyvdbL9jQSYJnC',
        ],
    ];
}

function getLoginsUsers()
{
    return array_column(getUsersList(), 'login');
}

function getIndexLogin($login)
{
    $arrLoginUsers = getLoginsUsers();
    return array_search($login, $arrLoginUsers);
}

function existsUser($login)
{
    $arrLoginUsers = getLoginsUsers();

    return in_array($login, $arrLoginUsers);
}

function checkPassword($login, $password)
{
    $isVerificationPassed = false;

    if (existsUser($login)) {
        $indexUser = getIndexLogin($login);

        if ($indexUser !== false) {
            $isVerificationPassed = password_verify($password, getUsersList()[$indexUser]['password_hash']);
        }
    }

    return $isVerificationPassed;
}

function setCurrentUser($login)
{
    $indexUser = getIndexLogin($login);

    if (isset(getUsersList()[$indexUser]) && isset($_SESSION)) {
        $userData = getUsersList()[$indexUser];
        $_SESSION['USER'] = $userData;
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
        file_put_contents($pathFileLog, implode(' ; ', $data) . PHP_EOL, FILE_APPEND);
    }
}