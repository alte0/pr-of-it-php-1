<?php
function getDataFile($filePath){
    if (!is_dir($filePath) && is_readable($filePath)){
        $fileRes = file($filePath);

        if (is_array($fileRes)){
            return $fileRes;
        }
    }

    return [];
}

function getFilesInDir($dir){
    if (is_dir($dir)){
        $arrIgnoreList = ['.', '..'];
        $files = scandir($dir);

        return array_diff($files, $arrIgnoreList);
    }

    return [];
}

function showError(){
    if (isset($_SESSION['ERROR'])){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= implode('</br>', $_SESSION['ERROR']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['ERROR']);
    }
}