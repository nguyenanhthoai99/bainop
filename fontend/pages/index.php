<?php
if (session_id() === '') {
    session_start();
}
// $checkSession = isset($_SESSION['kh_tendangnhap_logged']) && !empty($_SESSION['kh_tendangnhap_logged']);
// $checkCookie = isset($_COOKIE['kh_tendangnhap_logged']) && !empty($_COOKIE['kh_tendangnhap_logged']);

// if ($checkCookie) {
//     $_SESSION['kh_tendangnhap_logged'] = $_COOKIE['kh_tendangnhap_logged'];
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once(__DIR__ . '/../layouts/partials/config.php') ?>
    <style>
        body {
            background-color: #f0f0f0;
        }
    </style>
    <?php
    include_once(__DIR__ . '/../layouts/styles.php');
    include_once(__DIR__ . '/../../dbconnect.php');
    ?>
</head>

<body>
    <?php include_once(__DIR__ . '/../layouts/partials/header.php') ?>
    <div class="container-fluid">
        <?php include_once(__DIR__ . '/../layouts/partials/content.php') ?>
    </div>
    <div class="container-fluid">
        <?php include_once(__DIR__ . '/../layouts/partials/footer.php') ?>
    </div>
</body>

</html>