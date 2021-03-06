<?php
if (session_id() === '') {
    session_start();
}
include_once(__DIR__ . '/../../../dbconnect.php');

if (isset($_COOKIE["kh_tendangnhap_logged"])) {
    $_SESSION['kh_tendangnhap_logged'] = $_COOKIE["kh_tendangnhap_logged"];
}

if (isset($_SESSION['kh_tendangnhap_logged'])) {
    $tenkhachhang = $_SESSION['kh_tendangnhap_logged'];
    $sql = "SELECT * FROM khachhang WHERE kh_tendangnhap = '$tenkhachhang'";
    $result = mysqli_query($conn, $sql);
    $dataAnhKhachHang = [];

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $dataAnhKhachHang[] = array(
            'kh_ma' => $row['kh_ma'],
            'kh_tendangnhap' => $row['kh_tendangnhap'],
            'kh_avatar' => $row['kh_avatar']
        );
    }
    $dataAnhKhachHang = $dataAnhKhachHang[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điện thoại di động giá rẻ nhất - Siêu thị điện thoại Vesper Nguyễn Mobile</title>
    <meta name="keywords " content="Vesper Nguyễn, vespernguyen, vesper nguyễn, Điện Thoại Giá Rẻ, dienthoaigiare, điện thoại giá rẻ, dtdd, smartphone,laptop,tablet">
    <link rel="icon" href="/nguyenanhthoai/fontend/images/icon/icon.jpg" type="image/jpg" sizes="16x16">
    <link rel="icon" href="/nguyenanhthoai/fontend/images/icon/icon.jpg" type="image/jpg" sizes="32x32">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .ten-menu a {
            text-align: center;
            font-size: 10px;
        }

        .hinh-icon {
            height: 30px;
            width: 30px;
            margin-right: 10px;
        }

        main-menu li:hover div {
            display: block;
        }

        .TimKiem {
            font-size: small;
        }

        .btn-TimKiem {
            font-size: small;
        }

        .icon-shop:hover {
            color: grey;
        }

        .icon-shop {
            color: white;
            font-size: 48px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <!-- Menu -->
        <div class="container">
            <a class="navbar-brand" href="/nguyenanhthoai/fontend/pages/index.php"><img src="/nguyenanhthoai/fontend/images/icon/icon.jpg" class="hinh-icon" />Vesper Nguyễn</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse menu-ngang" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto main-menu">
                    <li class="nav-item active">
                        <a class="nav-link" href="/nguyenanhthoai/fontend/pages/index.php">Trang Chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/nguyenanhthoai/fontend/pages/gioithieu.php">Giới Thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/nguyenanhthoai/fontend/pages/lienhe.php">Liên Hệ</a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sản Phẩm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/nguyenanhthoai/fontend/pages/dienthoai.php">Điện Thoại</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/nguyenanhthoai/fontend/pages/laptop.php">Laptop</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/nguyenanhthoai/fontend/pages/tablet.php">Tablet</a>
                        </div>
                    </li>
                    </li>
                </ul>
                <!-- Form Tìm Kiếm -->
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 TimKiem" style="width:190px" type="search" placeholder="Tìm sản phẩm, thương hiệu bạn muốn mua..." aria-label="Search">
                    <a href="#"><button class="btn btn-outline-secondary my-2 my-sm-0 mr-5 btn-TimKiem" type="submit">Tìm Kiếm</button></a>
                </form>
                <!-- menu ngang bên phải -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link nav-dangnhap" href="/nguyenanhthoai/fontend/pages/card.php">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>Giỏ Hàng
                        </a>
                    </li>
                    <?php

                    function showDebug($thongbao)
                    {
                        echo '<script type="text/javascript">alert("' . $thongbao . '");</script>';
                    }

                    $checkSession = isset($_SESSION['kh_tendangnhap_logged']) && !empty($_SESSION['kh_tendangnhap_logged']);
                    $checkCookie = isset($_COOKIE['kh_tendangnhap_logged']) && !empty($_COOKIE['kh_tendangnhap_logged']);

                    if ($checkCookie) {
                        $_SESSION['kh_tendangnhap_logged'] = $_COOKIE['kh_tendangnhap_logged'];
                    }

                    if ($checkCookie || $checkSession) :
                    ?>

                        <?php if ($_SESSION['kh_tendangnhap_logged'] == 'admin') : ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <?php if ($dataAnhKhachHang['kh_avatar'] != null) : ?>
                                        <img src="/nguyenanhthoai/fontend/images/hinhavatar/<?= $dataAnhKhachHang['kh_avatar'] ?>" class="img-fluid" style="width:20px;height:20px;">
                                    <?php else : ?>
                                        <img src="/nguyenanhthoai/fontend/images/hinhavatar/avatar-default.png" class="img-fluid" style="width:20px;height:20px;">
                                    <?php endif; ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/nguyenanhthoai/backend/functions/dienthoai/index.php">Thêm Điện Thoại</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/nguyenanhthoai/backend/functions/laptop/index.php">Thêm Laptop</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/nguyenanhthoai/backend/functions/tablet/index.php">Thêm Tablet</a>
                                </div>
                            </li>

                        <?php else : ?>
                            <?php if (($dataAnhKhachHang['kh_avatar'] != null) && ($_SESSION['kh_tendangnhap_logged'] != 'admin')) : ?>
                                <a class="nav-link"><img src="/nguyenanhthoai/fontend/images/hinhavatar/<?= $dataAnhKhachHang['kh_avatar'] ?>" class="img-fluid" style="width:20px;height:20px;"></a>
                            <?php else : ?>
                                <a class="nav-link"><img src="/nguyenanhthoai/fontend/images/hinhavatar/avatar-default.png" class="img-fluid" style="width:20px;height:20px;"></a>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li class="nav-item text-nowrap">
                            <a class="nav-link" href="/nguyenanhthoai/backend/pages/auth/logout.php">Đăng xuất</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item text-nowrap">
                            <a class="nav-link" href="/nguyenanhthoai/backend/pages/auth/login.php">Đăng nhập</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>