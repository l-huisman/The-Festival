<?php
require_once __DIR__ . '/../elements/header.php';

if (isset($customPage)) {
    echo $customPage->getContent();
    if (!isset($_SESSION['user']) or $_SESSION['user']['role'] == 'admin') {
        $action = '/custom/update';
        $data = $customPage->getContent();
?>
        <div class="container">

            <?php require_once __DIR__ . '/../wysiwyg/index.php'; ?>
        </div>
<?php
    }
} else {
    require_once __DIR__ . '/../404.php';
}
require_once __DIR__ . '/../elements/footer.php';
