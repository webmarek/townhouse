<?php

if (!isset($_SESSION['is_logged_in_admin'])) {
    header('location: ' . ROOT_PATH);
    exit();
}

//var_dump($viewmodel);
?>

<div id="container2">

    <a  href="<?php echo ROOT_URL; ?>admins/addMonthAll" class="button">Dodaj miesięczne zużycie</a>

    <a  href="<?php echo ROOT_URL; ?>admins/editParticular" class="button">Edytuj lub popraw poszczególne</a>

</div>