<?php
if (isset($_SESSION['reData'])) {

    $re = $_SESSION['reData'];
    unset($_SESSION['reData']);

?>
    <?php if ($re) { ?>
        <?php if ($re['status']) { ?>
            <div class="alert alert-success alert-dismissible"><?= $re['message'] ?></div>
        <?php } else { ?>
            <div class="alert alert-danger alert-dismissible"><?= $re['message'] ?></div>
        <?php } ?>
<?php
    }
}
?>