<?php
require_once __DIR__ . '/../elements/header.php';


if (isset ($customPage)) {
    echo $customPage->getContent();
    $user = unserialize($_SESSION['user']);
    if (isset ($user) and $user->role == 'admin') {

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
?>

<?php
require_once __DIR__ . '/../elements/footer.php';
?>