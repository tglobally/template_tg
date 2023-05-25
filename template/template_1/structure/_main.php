<?php include $path_base_template . 'template_1/structure/_sidebar.php'; ?>
<div class="wrapper d-flex flex-column min-vh-100 bg-light dark:bg-transparent">

    <?php include $path_base_template . 'template_1/structure/_head.php'; ?>

    <div class="body flex-grow-1 px-3">
        <?php  include($data->include_action); ?>
    </div>
</div>
