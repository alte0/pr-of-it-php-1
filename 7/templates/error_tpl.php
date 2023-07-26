<?php

if (isset($error) && is_array($error)) {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo implode('</br>', $error); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php

}