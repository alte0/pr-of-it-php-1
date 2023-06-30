<?php
function getDataFile($filePath)
{
    if (!is_dir($filePath) && is_readable($filePath)) {
        $fileRes = file($filePath);

        if (is_array($fileRes)) {
            return $fileRes;
        }
    }

    return [];
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

function getAllowLoadImages()
{
    return [
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'webp' => 'image/webp',
    ];
}

function getDirImages()
{
    return 'images/';
}

function getPathGuestBook()
{
    return '../guest_book/data.txt';
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